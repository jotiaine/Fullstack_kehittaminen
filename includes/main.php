      <!-- MAIN SECTION -->
      <main class="container-fluid px-1 bg-light min-vh-100">

        <?php
          // createUser from functions.php
          require_once('classes/student.php');
          require_once('functions/create_student.php');
          createUser();
        ?>
        
        <!-- PHP scripts render here -->
        <?php 
          if($page == '' && $user == '') include('indexmodal.php');   
          elseif($page == 'about') include('about.php');
          elseif($page == 'faq') include('faq.php');
          elseif($page == 'test') include('test.php');
          elseif($page == 'feedback') include('feedback.php');
          elseif($page == 'testpage') include('testpage.php');  //väliaikainen testpage
          else echo '
          <div class="jumbotron">
           <h1 class="my-0 mt-0 display-3 text-light bg-dark p-3 text-center">Welcome to Datadrivers</h1>
          </div>
          <div id="hero-container">
            <img id="hero-pic" class="img-fluid" src="img/hero.jpg"/>
            <h2 id="hero-text" class="display-2 text-white text-center m-0 w-100">
              Become an expert <span id="driver-text" class="fw-bold text-danger">Driver</span>
              <p id="hero-auto-text" class="text-white"></p>
            </h2>  
          <div>
          ';
        ?>
        
      
      </main>