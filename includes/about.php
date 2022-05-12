<?php 
  /*
    ABOUT page

    Alla oleva koodi lisätty helpottamaan yhteyksien testaamista tietokantaan. Näkee
    nopeammin onko tietokantaan tullut muutoksia sisältöön kuten oli tarkoitus.
  */
?>


<?php
require_once('dbConnect.php'); 
$sql='SELECT * FROM student ORDER by last_name, first_name';  
$result=$conn->query($sql);
$rows=mysqli_num_rows($result);
?>
<h3>Hi Students  (<?php echo $rows ?>kpl)</h3>
<table class="table table-striped">
    <thead>
      <tr>
        <th>StudentID</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while($row=$result->fetch_assoc()){
          echo '<tr>';
          echo '<td>'.$row['studentID'].'</td>';
          echo '<td>'.$row['first_name'].'</td>';
          echo '<td>'.$row['last_name'].'</td>';
          echo '<td>'.$row['email'].'</td>';
          echo '</tr>';
      }
      ?>
    </tbody>
  </table>

<?php
$sql='SELECT * FROM test ORDER by testID';  
$result=$conn->query($sql);
$rows=mysqli_num_rows($result);
?>
<br><h3>All Tests  (<?php echo $rows ?>kpl)</h3>
<table class="table table-striped">
    <thead>
      <tr>
        <th>TestID</th>
        <th>StudentID</th>
        <th>QuestionID</th>
        <th>Score</th>
        <th>Teacher Feecback</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while($row=$result->fetch_assoc()){
          echo '<tr>';
          echo '<td>'.$row['testID'].'</td>';
          echo '<td>'.$row['studentID'].'</td>';
          echo '<td>'.$row['questionID'].'</td>';
          echo '<td>'.$row['score'].'</td>';
          echo '<td>'.$row['teacher_feedback'].'</td>';
          echo '</tr>';
      }
      ?>
    </tbody>
  </table>

<?php
$sql='SELECT * FROM reward ORDER by studentID';
$result=$conn->query($sql);
$rows=mysqli_num_rows($result);
?>
<br><h3>All rewards  (<?php echo $rows ?>kpl)</h3>
<table class="table table-striped">
    <thead>
      <tr>
        <th>rewardID</th>
        <th>studentID</th>
        <th>level</th>
        <th>certificate</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while($row=$result->fetch_assoc()){
          echo '<tr>';
          echo '<td>'.$row['rewardID'].'</td>';
          echo '<td>'.$row['studentID'].'</td>';
          echo '<td>'.$row['level'].'</td>';
          echo '<td>'.$row['certificate'].'</td>';
          echo '</tr>';
      }
      ?>
    </tbody>
  </table>

<?php
$sql='SELECT * FROM question ORDER by questionID';
$result=$conn->query($sql);
$rows=mysqli_num_rows($result);
?>
<br><h3>All rewards  (<?php echo $rows ?>kpl)</h3>
<table class="table table-striped">
    <thead>
      <tr>
        <th>questionID</th>
        <th>question_1</th>
        <th>question_2</th>
        <th>question_3</th>
        <th>correct_answer_1</th>
        <th>correct_answer_2</th>
        <th>correct_answer_3</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while($row=$result->fetch_assoc()){
          echo '<tr>';
          echo '<td>'.$row['questionID'].'</td>';
          echo '<td>'.$row['question_1'].'</td>';
          echo '<td>'.$row['question_2'].'</td>';
          echo '<td>'.$row['question_3'].'</td>';
          echo '<td>'.$row['correct_answer_1'].'</td>';
          echo '<td>'.$row['correct_answer_2'].'</td>';
          echo '<td>'.$row['correct_answer_3'].'</td>';
          echo '</tr>';
      }
      ?>
    </tbody>
  </table>


