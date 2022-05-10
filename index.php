<?php 
  /*
    This is the main page.
  */

  if(isset($_GET['page'])) $page=$_GET['page']; else $page='';
  if(isset($_GET['user'])) $user=$_GET['user']; else $user='';

?>

<?php include('includes/dbConnect.php') ?>
<?php include('includes/head.php') ?>
<?php
  // Student
  if($_GET['user'] === 'teacher') include('includes/header_teacher.php');
  // Teacher
  elseif($_GET['user'] === 'student') include('includes/header_student.php');
  // Default
  else include('includes/header_default.php')
?>

<?php include('includes/main.php') ?>
<?php include('includes/footer.php') ?>
