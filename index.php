<?php 
  /*
    This is the main page.
  */

  if(isset($_GET['page'])) $page = $_GET['page']; else $page = '';
  if(isset($_GET['user'])) $user = $_GET['user']; else $user = '';

?>

<?php require_once('includes/dbConnect.php') ?>
<?php require_once('includes/head.php') ?>
<?php
  // Student
  if($user == 'student') require_once('includes/header_student.php');
  // Teacher
  elseif($user == 'teacher') require_once('includes/header_teacher.php');
  // Default
  else require_once('includes/header_default.php');
?>

<?php require_once('includes/main.php') ?>
<?php require_once('includes/footer.php') ?>
