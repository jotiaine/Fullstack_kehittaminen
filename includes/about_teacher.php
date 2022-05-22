<?php 
  /*
    ABOUT_teacher page

  */
?>

<?php
include('dbConnect.php');

$sql='SELECT test.testID, student.studentID, student.first_name, student.last_name, student.email, test.score, test.teacher_feedback, test.creationDate
FROM test
INNER JOIN student ON test.studentID = student.studentID
ORDER by student.last_name, student.first_name, student.studentID';

$result=$conn->query($sql);
$howMany=mysqli_num_rows($result);
$examPassed = 0;
$feedBackMissing = 0;
$examFailed = 0;
$failedExamFeedback = 0;
?>
<div class='container-fluid d-flex flex-column align-items-center justify-content-center text-center bg-dark h-100 text-white'>
  <h5>Yhteenvetoa opiskelijoiden tiedoista:</h5><br>
</div>

<table class="table table-striped table-dark text-white">
    <thead>
      <tr>
        <th>Koe ID</th>
        <th>Oppilaan ID</th>
        <th>Etunimi</th>
        <th>Sukunimi</th>
        <th>Email</th>
        <th>Pisteet</th>
        <th>Palaute</th>
        <th>Koepäivä</th>
        <th>Sertifikaatti</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while($row=$result->fetch_assoc()){
          echo '<tr>';
          echo '<td>'.$row['testID'].'</td>';
          echo '<td>'.$row['studentID'].'</td>';
          echo '<td>'.$row['first_name'].'</td>';
          echo '<td>'.$row['last_name'].'</td>';
          echo '<td>'.$row['email'].'</td>';
          echo '<td>'.$row['score'].'</td>';
          echo '<td>'.$row['teacher_feedback'].'</td>';
          echo '<td>'.$row['creationDate'].'</td>';
          
          if ($row['score'] == 1) {
            $examPassed++;
            if ($row['teacher_feedback'] == "" || $row['teacher_feedback'] == 0 || $row['teacher_feedback'] == NULL) {
              $feedBackMissing++;
            }
            echo '<td><a href = index.php?page=cerPDF&user=teacher&pID='.$row['studentID'].'><button>Tulosta</button></a></td>';

          } else if ($row['score'] == 0 && $row['score'] != "" && $row['score'] != NULL){
              $examFailed++;
              if ($row['teacher_feedback'] == 'NULL') {
                $failedExamFeedback++;
              }
              
              echo '<td>'.'Odottaa uusintaa'.'</td>';
          }
          
           else {
            echo '<td>'.'Odottaa suoritusta'.'</td>';
          }
          echo '</tr>';
          
      }
      ?>
    </tbody>
  </table>
  <p class="table table-striped table-dark text-white">Opiskelijoita yhteensä: <?php echo $howMany ?> kpl</p>

      <div class='table table-striped table-dark text-white heading-container-summary'>
      <h4>Lukuja koesuorituksista:</h4>
      <div class='container-fluid d-flex flex-column align-items-center justify-content-center text-center bg-dark h-100'>
        <div class='text-box'>
          <p>Kokeen hyväksytysti suorittaneita opiskelijoita:
          </p>
          <div class='number'>
            <p><?php echo $examPassed ?> kpl</p>
        </div>
        </div>
        <div class='text-box'>
          <p>Palaute annettu kokeen hyväksytysti suorittaneille:
          </p>
          <div class='number'>
            <p><?php echo ($examPassed - $feedBackMissing) ?> kpl</p>
        </div>
        </div>
        <div class='text-box'>
          <p>Palaute kokeesta antamatta sen hyväksytysti suorittaneille:
          </p>
          <div class='number'>
            <p><?php echo $feedBackMissing ?> kpl</p>
        </div>
        </div>
        <p></p>
        <div class='text-box'>
          <p>Kokeen hylättynä suorittaneita opiskelijoita:
          </p>
          <div class='number'>
            <p><?php echo $examFailed ?> kpl</p>
        </div>
        </div>
        <div class='text-box'>
          <p>Palaute annettu kokeen hylättynä suorittaneille:
          </p>
          <div class='number'>
            <p><?php echo ($examFailed - $failedExamFeedback) ?> kpl</p>
        </div>
        </div>
        <div class='text-box'>
          <p>Palaute kokeesta antamatta sen hylättynä suorittaneille:
          </p>
          <div class='number'>
            <p><?php echo $failedExamFeedback ?> kpl</p>
        </div>
        </div>
      </div>
      <div class='table table-striped table-dark text-white'></div><br>
    </div>

<?php

$sql='SELECT test.testID, question.questionID, question.question_1, question.question_2, question.question_3, 
question.correct_answer_1, question.correct_answer_2, question.correct_answer_3, test.score, test.creationDate
FROM test
INNER JOIN question ON test.questionID = question.questionID
ORDER by testID';
$result=$conn->query($sql);
$rows=mysqli_num_rows($result);
?>
<div class='container-fluid d-flex flex-column align-items-center justify-content-center text-center bg-dark h-100 text-white'>
  <h5>Muodostettujen kokeiden kysymykset ja oikeat vastaukset:</h5>
</div>
<h6 class="table table-dark text-white">Kokeita yhteensä: <?php echo $rows ?>kpl</h6>
<table class="table table-striped table-dark text-white">
    <thead>
      <tr>
        <th>Koe_ID</th>
        <th>Koepäivä</th>
        <th>Kysymys 1</th>
        <th>1 Oikea vastaus</th>
        <th>Kysymys 2</th>
        <th>2 Oikea vastaus</th>
        <th>Kysymys 3</th>
        <th>3 Oikea vastaus</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while($row=$result->fetch_assoc()){
          echo '<tr>';
          echo '<td>'.$row['testID'].'</td>';
          echo '<td>'.$row['creationDate'].'</td>';
          echo '<td>'.$row['question_1'].'</td>';
          echo '<td>'.$row['correct_answer_1'].'</td>';
          echo '<td>'.$row['question_2'].'</td>';
          echo '<td>'.$row['correct_answer_2'].'</td>';
          echo '<td>'.$row['question_3'].'</td>';          
          echo '<td>'.$row['correct_answer_3'].'</td>';
          echo '</tr>';
          
      }
      ?>
    </tbody>
  </table>


