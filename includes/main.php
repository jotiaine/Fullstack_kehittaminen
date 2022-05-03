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