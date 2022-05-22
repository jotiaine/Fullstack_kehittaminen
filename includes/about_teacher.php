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

?>
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
            echo '<td><a href = index.php?page=cerPDF&user=teacher&pID='.$row['studentID'].'><button>Tulosta</button></a></td>';
          } else {
            echo '<td>'.'Odottaa suoritusta'.'</td>';
          }
          echo '</tr>';
          
      }
      ?>
    </tbody>
  </table>
    
<?php

$sql='SELECT test.testID, question.questionID, question.question_1, question.question_2, question.question_3, 
question.correct_answer_1, question.correct_answer_2, question.correct_answer_3, test.score, test.creationDate
FROM test
INNER JOIN question ON test.questionID = question.questionID
ORDER by testID';
$result=$conn->query($sql);
$rows=mysqli_num_rows($result);
?>
<br><h3>All Tests (<?php echo $rows ?>kpl)</h3>
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


