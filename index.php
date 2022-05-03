<?php 
  /*
    This is the main page.
  */

  if(isset($_GET['page'])) $page=$_GET['page']; else $page='';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- OWN CSS -->
  <link href="css/style.css" rel="stylesheet">
  <title>Datadrivers</title>
</head>
<body>
  <div class="container-fluid ">

    <!-- HEADER -->
    <header>
      <nav id="navbar" class="navbar navbar-expand-sm bg-dark navbar-dark">

        <!-- LOGO -->
        <a class="navbar-brand m-0" href="index.php">
          <img id="mainlogo" class="img-fluid d-block" src="img/testlogo.jpg" alt="logo">
        </a>

        <!-- TOGGLER BTN -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link <?php if($page == '') echo 'active' ?>" href="index.php">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if($page == 'about') echo 'active' ?>" href="index.php?page=about">ABOUT</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if($page == 'faq') echo 'active' ?>" href="index.php?page=fag">FAQ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link pe-0 <?php if($page == 'login') echo 'active' ?>" href="index.php?page=login">Login/</a>
            </li>
            <li class="nav-item">
              <a class="nav-link ps-0 <?php if($page == 'register') echo 'active' ?>" href="index.php?page=register">Register?</a>
            </li>
          </ul>
        </div>
      </nav>
    <header>
  
      <!-- MAIN SECTION -->
    <main class="bg-light">
      
    <!-- PHP scripts render here -->
      <?php 
        if($page == 'about') include('about.php');
        elseif($page == 'faq') include('faq.php');
        elseif($page == 'login') include('login.php');
        elseif($page == 'register') include('register.php');
        else echo '
        <div class="jumbotron">
          <h1 class="my-3 display-3 text-light bg-dark p-3 text-center">Welcome to Datadrivers</h1>
        </div>
        ';
      ?>
    </main>
    
    
    <!-- FOOTER -->
    <footer class="container-fluid bg-transparent p-2">
      <p class="text-white text-center m-0">FOOTER</p>
    </footer> 
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="js/script.js"></script>
</body>
</html>