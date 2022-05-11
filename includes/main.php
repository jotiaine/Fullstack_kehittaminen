      <!-- MAIN SECTION -->
      <main class="bg-light min-vh-100">

        <?php
          // createUser from functions.php
          include('includes/functions.php');
          createUser();
        ?>
        
        <!-- PHP scripts render here -->
        <?php 
          if($page == '' && $user == '') include('indexmodal.php');   
          elseif($page == 'about') include('about.php');
          elseif($page == 'faq') include('faq.php');
          elseif($page == 'test') include('test.php');
          elseif($page == 'feedback') include('feedback.php');
          else echo '
          <div class="jumbotron">
          <h1 class="mb-3 mt-0 display-3 text-light bg-dark p-3 text-center">Welcome to Datadrivers</h1>
          </div>
          ';
        ?>
        
      
      </main>