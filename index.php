<?php 
  /*
    This is the main page.
  */

  if(isset($_GET['page'])) $page=$_GET['page']; else $page='';

?>

<?php include('includes/head.php') ?>
<?php include('includes/header.php') ?>
<?php include('includes/main.php') ?>
<?php include('includes/footer.php') ?>
<?php include('includes/dbConnect.php') ?>
