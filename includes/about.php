<?php 
  /*
    ABOUT page

  */
?>


<?php
include('dbConnect.php'); 
$sql='SELECT * FROM student ORDER by last_name, first_name';  
$result=$conn->query($sql);
$rows=mysqli_num_rows($result);

?>
<h3>All Students  (<?php echo $rows ?>kpl)</h3>
<table class="table table-striped table-dark text-white shadow">
    <thead>
      <tr>
        <th>StudentID</th>
        <th>First Name</th>
        <th>Sukunimi</th>
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
          echo '<td><a href = index.php?page=cerPDF&user=teacher&pID='.$row['studentID'].'><button>Sertifikaatti</button></a></td>';
      }
      //$conn->close(); 
      ?>
    </tbody>
  </table>

<?php
//include('dbConnect.php');
$sql='SELECT * FROM test ORDER by testID';  
$result=$conn->query($sql);
$rows=mysqli_num_rows($result);
?>
<br><h3>All Tests (<?php echo $rows ?>kpl)</h3>
<table class="table table-striped table-dark text-white">
    <thead>
      <tr>
        <th>TestID</th>
        <th>StudentID</th>
        <th>Question 1</th>
        <th>Question 2</th>
        <th>Question 3</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while($row=$result->fetch_assoc()){
          echo '<tr>';
          echo '<td>'.$row['testID'].'</td>';
          echo '<td>'.$row['studentID'].'</td>';
          echo '<td>'.$row['question_1'].'</td>';
          echo '<td>'.$row['question_2'].'</td>';
          echo '<td>'.$row['question_3'].'</td>';
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
<br><h3>All Questions (<?php echo $rows ?>kpl)</h3>
<table class="table table-striped table-dark text-white">
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

 

<?php
$sql='SELECT * FROM reward ORDER by studentID';
$result=$conn->query($sql);
$rows=mysqli_num_rows($result);
?>
<br><h3>All Rewards (<?php echo $rows ?>kpl)</h3>
<table class="table table-striped table-dark text-white">
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

      }
      ?>
    </tbody>
  </table>

 

