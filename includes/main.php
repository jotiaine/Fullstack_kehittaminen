      <!-- MAIN SECTION -->
      <main class="bg-light min-vh-100">

        <?php
          // Student form first name, last name & email
          if(isset($_POST['submit'])) {
            include('dbConnect.php');

            $first_name = $conn->real_escape_string($_POST['first_name']);
            $last_name = $conn->real_escape_string($_POST['last_name']);
            $email = $conn->real_escape_string($_POST['email']);

            // Class for student
            class Student {

              function __construct($first_name, $last_name, $email) {
                $this -> first_name = $first_name;
                $this -> last_name = $last_name;
                $this -> email = $email;
              }
            }

            // Generate student object
            $student = new Student($first_name, $last_name, $email);


            // test tulostus Post succeeded
            echo $first_name . " " . $last_name . " " . $email . "<br>";
            echo print_r($student);

            // Testing if user exists
            $sql = "SELECT * FROM datadrivers WHERE first_name = '$first_name' AND last_name = '$last_name' AND email = '$email'";

            // Query result
            $result = $conn -> query($sql);

            if($result -> num_rows > 0) {
              // User exists
              echo "User exists!";
            } else {
              // User does not exist
              // SQL-query for inserting student to db
              $sql = "INSERT INTO student (first_name, last_name, email) VALUES ('$first_name', '$last_name', '$email')";
              
              // If insert succeeded?
              if($result) echo "Insert success!";
              else echo "Insert failed";
            }        

          }
        ?>
        
        <!-- PHP scripts render here -->
        <?php 
          if($page == '') include('indexmodal.php');   
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