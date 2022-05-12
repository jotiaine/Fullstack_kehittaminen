<?php 
  /*
    Functions here...
  */

  // Creating a student to the db
  function createUser() {
              // Student form first name, last name & email
              if(isset($_POST['submit'])) {
                include('dbConnect.php');
    
                $first_name = $conn->real_escape_string($_POST['first_name']);
                $last_name = $conn->real_escape_string($_POST['last_name']);
                $email = $conn->real_escape_string($_POST['email']);
    
                // Generate student object
                include('classes/classes.php');
                $student = new Student($first_name, $last_name, $email);
    
                // Values reassigned from the student object
                $first_name = $student -> first_name;
                $last_name = $student -> last_name;
                $email = $student -> email;
    
                // Testing if user exists
                $sql = "SELECT * FROM student WHERE first_name = '$first_name' AND last_name = '$last_name' AND email = '$email'";
    
                // Query result
                $result = $conn -> query($sql);
    
                if($result -> num_rows > 0) {
                  // User exists
                  echo "User exists!";
                } else {
                  // User does not exist
                  // SQL-query for inserting student to db
                  $sql = "INSERT INTO student (first_name, last_name, email) VALUES ('$first_name', '$last_name', '$email')";
                  $result = $conn -> query($sql);
    
                  // If insert succeeded?
                  if($result) echo "Insert success!";
                  else echo "Insert failed";
                }        
    
              }
  }
?>