<?php 
  /*
    ABOUT page

    Alla oleva koodi lisätty helpottamaan yhteyksien testaamista tietokantaan. Näkee
    nopeammin onko tietokantaan tullut muutoksia sisältöön kuten oli tarkoitus.
  */
?>


<?php
include('dbConnect.php'); 
$sql='SELECT * FROM student ORDER by last_name, first_name';  
$tulos=$conn->query($sql);
$montako=mysqli_num_rows($tulos);

?>
<h3>Kaikki opiskelijat  (<?php echo $montako ?>kpl)</h3>
<table class="table table-striped">
    <thead>
      <tr>
        <th>StudentID</th>
        <th>CertificateID</th>
        <th>Etunimi</th>
        <th>Sukunimi</th>
        <th>Email</th>
        <th>Total_result</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while($rivi=$tulos->fetch_assoc()){
          echo '<tr>';
          echo '<td>'.$rivi['studentID'].'</td>';
          echo '<td>'.$rivi['certificateID'].'</td>';
          echo '<td>'.$rivi['first_name'].'</td>';
          echo '<td>'.$rivi['last_name'].'</td>';
          echo '<td>'.$rivi['email'].'</td>';
          echo '<td>'.$rivi['total_result'].'</td>';
          echo '</tr>';
      }
      //$conn->close(); 
      ?>
    </tbody>
  </table>

<?php
//include('dbConnect.php');
$sql='SELECT * FROM test ORDER by testID';  
$tulos=$conn->query($sql);
$montako=mysqli_num_rows($tulos);
?>
<br><h3>Kaikki tentit  (<?php echo $montako ?>kpl)</h3>
<table class="table table-striped">
    <thead>
      <tr>
        <th>TestID</th>
        <th>StudentID</th>
        <th>AnswerID</th>
        <th>QuestionID</th>
        <th>Result</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while($rivi=$tulos->fetch_assoc()){
          echo '<tr>';
          echo '<td>'.$rivi['testID'].'</td>';
          echo '<td>'.$rivi['studentID'].'</td>';
          echo '<td>'.$rivi['answerID'].'</td>';
          echo '<td>'.$rivi['questionID'].'</td>';
          echo '<td>'.$rivi['result'].'</td>';
          echo '</tr>';
      }
      //$conn->close(); 
      ?>
    </tbody>
  </table>

  <?php
//include('dbConnect.php');
$sql='SELECT * FROM question ORDER by questionID';
$tulos=$conn->query($sql);
$montako=mysqli_num_rows($tulos);
?>
<br><h3>Kaikki kysymykset  (<?php echo $montako ?>kpl)</h3>
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
      while($rivi=$tulos->fetch_assoc()){
          echo '<tr>';
          echo '<td>'.$rivi['questionID'].'</td>';
          echo '<td>'.$rivi['question_1'].'</td>';
          echo '<td>'.$rivi['question_2'].'</td>';
          echo '<td>'.$rivi['question_3'].'</td>';
          echo '<td>'.$rivi['correct_answer_1'].'</td>';
          echo '<td>'.$rivi['correct_answer_2'].'</td>';
          echo '<td>'.$rivi['correct_answer_3'].'</td>';
          echo '</tr>';
      }
      //$conn->close(); 
      ?>
    </tbody>
  </table>

  <?php
//include('dbConnect.php');
$sql='SELECT * FROM answer ORDER by answerID';
$tulos=$conn->query($sql);
$montako=mysqli_num_rows($tulos);
?>
<br><h3>Kaikki vastaukset  (<?php echo $montako ?>kpl)</h3>
<table class="table table-striped">
    <thead>
      <tr>
        <th>answerID</th>
        <th>answer_1</th>
        <th>answer_2</th>
        <th>answer_3</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while($rivi=$tulos->fetch_assoc()){
          echo '<tr>';
          echo '<td>'.$rivi['answerID'].'</td>';
          echo '<td>'.$rivi['answer_1'].'</td>';
          echo '<td>'.$rivi['answer_2'].'</td>';
          echo '<td>'.$rivi['answer_3'].'</td>';
          echo '</tr>';
      }
      //$conn->close(); 
      ?>
    </tbody>
  </table>

  <?php
//include('dbConnect.php');
$sql='SELECT * FROM message ORDER by messageID';
$tulos=$conn->query($sql);
$montako=mysqli_num_rows($tulos);
?>
<br><h3>Kaikki viestit  (<?php echo $montako ?>kpl)</h3>
<table class="table table-striped">
    <thead>
      <tr>
        <th>messageID</th>
        <th>studentID</th>
        <th>message</th>
        <th>user_type</th>
        <th>date</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while($rivi=$tulos->fetch_assoc()){
          echo '<tr>';
          echo '<td>'.$rivi['messageID'].'</td>';
          echo '<td>'.$rivi['studentID'].'</td>';
          echo '<td>'.$rivi['message'].'</td>';
          echo '<td>'.$rivi['user_type'].'</td>';
          echo '<td>'.$rivi['date'].'</td>';
          echo '</tr>';
      }
      $conn->close(); 
      ?>
    </tbody>
  </table>

