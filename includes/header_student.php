    <!-- HEADER STUDENT -->
    <header id="header-container"  class="shadow">

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
              <a id="home-link" class="test-page-link nav-link <?php if($page == '') echo 'active' ?>" href="index.php?user=student">HOME</a>
            </li>
            <li id="test-page" class="nav-item">
                <a id="test-page-link" class="nav-link <?php if($page == 'test') echo 'active' ?>" href="index.php?page=test&user=student">TEST</a>
            </li>
            <li class="nav-item">
              <a class="test-page-link nav-link <?php if($page == 'faq') echo 'active' ?>" href="index.php?page=faq&user=student">FAQ</a>
            </li>
          </ul>
        </div>
      </nav>

  </header>