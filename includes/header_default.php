    <!-- HEADER -->
    <header id="header-container">

      <nav class="navbar fixed-top navbar-expand-sm bg-dark navbar-dark px-2">

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
              <a class="nav-link <?php if($page == '') echo 'active' ?>" href="index.php?page=home">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if($page == 'about') echo 'active' ?>" href="index.php?page=about">ABOUT</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if($page == 'faq') echo 'active' ?>" href="index.php?page=faq">FAQ</a>
            </li>
          </ul>
        </div>
      </nav>

  </header>