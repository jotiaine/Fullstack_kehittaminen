<?php 
  /*
    This is the main page.
    */
?>
<?php require('includes/dbConnect.php') ?>

  <?php
  if(isset($_GET['page'])) $page = $conn -> real_escape_string($_GET['page']); else $page = '';
  if(isset($_GET['user'])) $user = $conn -> real_escape_string($_GET['user']); else $user = '';
  ?>

<?php require('includes/head.php') ?>
<?php
  // Student
  if($user == 'student') require('includes/header_student.php');
  // Teacher
  elseif($user == 'teacher') require('includes/header_teacher.php');
  // Default
  else require('includes/header_default.php');
?>

<?php require('includes/main.php') ?>
<?php require('includes/footer.php') ?>
