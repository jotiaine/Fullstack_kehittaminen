<?php 
/**
 *  file:   about_teacher.php
 *  desc:   Shows information about the students and exams for the teachers, sorting with buttons.
 * 
 */
?>

<?php
include('dbConnect.php');

$sql='SELECT test.testID, student.studentID, student.first_name, student.last_name, student.email, test.score, test.teacher_feedback, test.creationDate
FROM test
INNER JOIN student ON test.studentID = student.studentID
ORDER by student.last_name, student.first_name, student.studentID';

if(isset($_POST['Koe_ID'])) {
  $sql='SELECT test.testID, student.studentID, student.first_name, student.last_name, student.email, test.score, test.teacher_feedback, test.creationDate
  FROM test
  INNER JOIN student ON test.studentID = student.studentID
  ORDER by test.testID';
}

if(isset($_POST['Koe_ID2'])) {
  $sql='SELECT test.testID, student.studentID, student.first_name, student.last_name, student.email, test.score, test.teacher_feedback, test.creationDate
  FROM test
  INNER JOIN student ON test.studentID = student.studentID
  ORDER by test.testID DESC';
}

if(isset($_POST['Oppilaan_ID'])) {
  $sql='SELECT test.testID, student.studentID, student.first_name, student.last_name, student.email, test.score, test.teacher_feedback, test.creationDate
  FROM test
  INNER JOIN student ON test.studentID = student.studentID
  ORDER by student.studentID';
}

if(isset($_POST['Oppilaan_ID2'])) {
  $sql='SELECT test.testID, student.studentID, student.first_name, student.last_name, student.email, test.score, test.teacher_feedback, test.creationDate
  FROM test
  INNER JOIN student ON test.studentID = student.studentID
  ORDER by student.studentID DESC';
}

if(isset($_POST['Etunimi'])) {
  $sql='SELECT test.testID, student.studentID, student.first_name, student.last_name, student.email, test.score, test.teacher_feedback, test.creationDate
  FROM test
  INNER JOIN student ON test.studentID = student.studentID
  ORDER by student.first_name';
}

if(isset($_POST['Etunimi2'])) {
  $sql='SELECT test.testID, student.studentID, student.first_name, student.last_name, student.email, test.score, test.teacher_feedback, test.creationDate
  FROM test
  INNER JOIN student ON test.studentID = student.studentID
  ORDER by student.first_name DESC';
}

if(isset($_POST['Sukunimi'])) {
  $sql='SELECT test.testID, student.studentID, student.first_name, student.last_name, student.email, test.score, test.teacher_feedback, test.creationDate
  FROM test
  INNER JOIN student ON test.studentID = student.studentID
  ORDER by student.last_name';
}

if(isset($_POST['Sukunimi2'])) {
  $sql='SELECT test.testID, student.studentID, student.first_name, student.last_name, student.email, test.score, test.teacher_feedback, test.creationDate
  FROM test
  INNER JOIN student ON test.studentID = student.studentID
  ORDER by student.last_name DESC';
}

if(isset($_POST['Email'])) {
  $sql='SELECT test.testID, student.studentID, student.first_name, student.last_name, student.email, test.score, test.teacher_feedback, test.creationDate
  FROM test
  INNER JOIN student ON test.studentID = student.studentID
  ORDER by student.email';
}

if(isset($_POST['Email2'])) {
  $sql='SELECT test.testID, student.studentID, student.first_name, student.last_name, student.email, test.score, test.teacher_feedback, test.creationDate
  FROM test
  INNER JOIN student ON test.studentID = student.studentID
  ORDER by student.email DESC';
}

if(isset($_POST['Pisteet'])) {
  $sql='SELECT test.testID, student.studentID, student.first_name, student.last_name, student.email, test.score, test.teacher_feedback, test.creationDate
  FROM test
  INNER JOIN student ON test.studentID = student.studentID
  ORDER by test.score, student.studentID DESC';   //studentID is another search parameter because score is 1 or 0 or empty,
}                                                  //assumption is that latest students are without feedback -> studentID DESC

if(isset($_POST['Pisteet2'])) {
  $sql='SELECT test.testID, student.studentID, student.first_name, student.last_name, student.email, test.score, test.teacher_feedback, test.creationDate
  FROM test
  INNER JOIN student ON test.studentID = student.studentID
  ORDER by test.score DESC, student.studentID DESC';
}

if(isset($_POST['Palaute'])) {
  $sql='SELECT test.testID, student.studentID, student.first_name, student.last_name, student.email, test.score, test.teacher_feedback, test.creationDate
  FROM test
  INNER JOIN student ON test.studentID = student.studentID
  ORDER by test.teacher_feedback';
}

if(isset($_POST['Palaute2'])) {
  $sql='SELECT test.testID, student.studentID, student.first_name, student.last_name, student.email, test.score, test.teacher_feedback, test.creationDate
  FROM test
  INNER JOIN student ON test.studentID = student.studentID
  ORDER by test.teacher_feedback DESC';
}

if(isset($_POST['Koepaiva'])) {
  $sql='SELECT test.testID, student.studentID, student.first_name, student.last_name, student.email, test.score, test.teacher_feedback, test.creationDate
  FROM test
  INNER JOIN student ON test.studentID = student.studentID
  ORDER by test.creationDate';
}

if(isset($_POST['Koepaiva2'])) {
  $sql='SELECT test.testID, student.studentID, student.first_name, student.last_name, student.email, test.score, test.teacher_feedback, test.creationDate
  FROM test
  INNER JOIN student ON test.studentID = student.studentID
  ORDER by test.creationDate DESC';
}

$result=$conn->query($sql);
$howMany=mysqli_num_rows($result);
$examPassed = 0;
$feedBackMissing = 0;
$examFailed = 0;
$failedExamFeedback = 0;

?>
<div class='container-fluid d-flex flex-column align-items-center justify-content-center text-center bg-dark h-100 text-white'>
  <h5 id="main-title" class="display-1 text-light text-center">Yhteenvetoa opiskelijoiden tiedoista:</h5><br>
  <a href = "#report"><button class="button-link">Suora linkki raporttikohtaan</button></a>
  <p><a href = "#exams"><button class="button-link">Suora linkki koekysymyskohtaan</button></a></p>
</div>

<table class="table-style table text-muted table-borderless table-dark table-striped table-hover w-75 mb-5 shadow mx-auto">
    <thead>
      <tr>
        <th><a class="btn btn-primary" href = "#exams">Koe ID</a></th>
        <th>Oppilaan ID</th>
        <th>Etunimi</th>
        <th>Sukunimi</th>
        <th>Email</th>
        <th>Pisteet</th>
        <th>Palaute</th>
        <th>Koepäivä</th>
        <th>Sertifikaatti</th>
      </tr>
      <tr>
      <th>
        <!--<th>Koe ID</th>-->
        <form method="post">
            <button class="btn-primary"><input type="submit" name="Koe_ID" value="<"/></button>
            <button class="btn-primary"><input type="submit" name="Koe_ID2" value=">"/></button>
        </form>
        
        <!--<th>Oppilaan ID</th>-->
        <th><form method="post">
            <button class="btn-primary"><input type="submit" name="Oppilaan_ID" value="<"/></button>
            <button class="btn-primary"><input type="submit" name="Oppilaan_ID2" value=">"/></button>
        </form>
        
        <!--<th>Etunimi</th>-->
        <th><form method="post">
            <button class="btn-primary"><input type="submit" name="Etunimi" value="<"/></button>
            <button class="btn-primary"><input type="submit" name="Etunimi2" value=">"/></button>
        </form>
        
        <!--<th>Sukunimi</th>-->
        <th><form method="post">
            <button class="btn-primary"><input type="submit" name="Sukunimi" value="<"/></button>
            <button class="btn-primary"><input type="submit" name="Sukunimi2" value=">"/></button>
        </form>
        
        <!--<th>Email</th>-->
        <th><form method="post">
            <button class="btn-primary"><input type="submit" name="Email" value="<"/></button>
            <button class="btn-primary"><input type="submit" name="Email2" value=">"/></button>
        </form>
        
        <!--<th>Pisteet</th>-->
        <th><form method="post">
            <button class="btn-primary"><input type="submit" name="Pisteet" value="<"/></button>
            <button class="btn-primary"><input type="submit" name="Pisteet2" value=">"/></button>
        </form>
        
        <!--<th>Palaute</th>-->
        <th><form method="post">
            <button class="btn-primary"><input type="submit" name="Palaute" value="<"/></button>
            <button class="btn-primary"><input type="submit" name="Palaute2" value=">"/></button>
        </form>
        
        <!--<th>Koepäivä</th>-->
        <th><form method="post">
            <button class="btn-primary"><input type="submit" name="Koepaiva" value="<"/></button>
            <button class="btn-primary"><input type="submit" name="Koepaiva2" value=">"/></button>
        </form>        
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

          if (($row['teacher_feedback'] == 0 || $row['teacher_feedback'] == 'NULL') && $row['teacher_feedback'] != "") {
            echo '<td class="red">'.'Palaute puuttuu'.'</td>';  //Sql search produces results according to database values:
          }                                                     //"", 0, NULL, or feedback texts ->some "Palaute puuttuu"
          else {                                                //lines after feedback texts bacause of this.
          echo '<td>'.$row['teacher_feedback'].'</td>';
          }

          echo '<td>'.$row['creationDate'].'</td>';
          
          if ($row['score'] == 1) {
            $examPassed++;
            if ($row['teacher_feedback'] == "" || $row['teacher_feedback'] == 0 || $row['teacher_feedback'] == 'NULL') {
              $feedBackMissing++;
            }
            echo '<td><a class="btn btn-primary text-white" href = index.php?page=cerPDF&user=teacher&pID='.$row['studentID'].'>Tulosta</a></td>';

          } else if ($row['score'] == 0 && $row['score'] != "" && $row['score'] != 'NULL'){
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

  <h2 id="report" class="display-4 fw-bold text-muted text-black text-center">Opiskelijoita yhteensä: <?php echo $howMany ?> kpl</h2>

      <div class='table-style table text-muted table-borderless table-dark table-striped table-hover w-50 mb-5 shadow mx-auto heading-container-summary'>
      <h4 class="display-5 text-muted text-center">Lukuja koesuorituksista:</h4>
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
    <a href = "#main-title"><button class="button-link">Takaisin ylös</button></a>

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
  <h5 id="exams" class="display-4 fw-bold text-muted text-center">Muodostettujen kokeiden kysymykset ja oikeat vastaukset:</h5>
</div>
<h6 class="display-5 text-muted text-center">Kokeita yhteensä: <?php echo $rows ?>kpl</h6>
<table class="table-style table text-muted table-borderless table-dark table-striped table-hover w-75 mb-5 shadow mx-auto">
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
  <a href = "#main-title"><button class="button-link">Takaisin ylös</button></a>


