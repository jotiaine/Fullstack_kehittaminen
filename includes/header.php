    <!-- HEADER -->
    <header>

      <nav id="navbar" class="navbar navbar-expand-sm bg-dark navbar-dark px-2">

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