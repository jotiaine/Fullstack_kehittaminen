<?php // Creating a student to the db
function create_student() {
              require('includes/dbConnect.php'); 

              $first_name = $conn->real_escape_string($_POST['first_name']);
              $last_name = $conn->real_escape_string($_POST['last_name']);
              $email = $conn->real_escape_string($_POST['email']);
              $studentID = 0;
  
              // Testing if user exists
              $sql = "SELECT * FROM student WHERE first_name = '$first_name' AND last_name = '$last_name' AND email = '$email'";
              
              // Query result
              $result = $conn -> query($sql);
              
              if($result -> num_rows > 0) {
                // User exists
                echo "<p class='alert alert-warning'>User exists!</p>";
              } else {
                // User does not exist
                // SQL-query for inserting student to db
                $sql = "INSERT INTO student (first_name, last_name, email) VALUES ('$first_name', '$last_name', '$email')";
                $result = $conn -> query($sql);
                
                // If insert succeeded?
                if($result) echo "<p class='alert alert-success'>Insert student is a success!</p>";
                else echo "<p class='alert alert-warning'>Insert student failed</p>";

                // Find studentID
                $sql = "SELECT studentID FROM student WHERE first_name = '$first_name' AND last_name = '$last_name' AND email = '$email'";
                $result = $conn -> query($sql);
                $row = mysqli_fetch_assoc($result);

                $studentID = $row['studentID'];
                // If query
                if($result) echo "<p class='alert alert-success'>Found the studenID!</p>";
                else echo "<p class='alert alert-warning'>Did not find studentID</p>";
                

                /*
                ********************************
                ** GENERATING A RANDOM QUESTIONNAIRE **
                ********************************
                */
                $sql = 'SELECT * FROM question';
                
                $result = mysqli_query($conn, $sql);
                // The "length" of question table
                $rows = mysqli_num_rows($result);
                
                // Random number between 1-$rows
                $randomQuestionID = rand(1, $rows);
                
                if($rows > 0) {
                  $sql = "SELECT questionID FROM question WHERE questionID = '$randomQuestionID'";
                  $result = mysqli_query($conn, $sql); 
                  $row = mysqli_fetch_assoc($result);
                  $questionID = $row['questionID'];
                }
                
                mysqli_free_result($result); 


                // Creating empty test for the student
                $sql = "INSERT INTO test (studentID, questionID, question_1, question_2, question_3, opt_1_1, opt_1_2, opt_1_3, opt_2_1, opt_2_2, opt_2_3, opt_3_1, opt_3_2, opt_3_3, user_answer_1, user_answer_2, user_answer_3, score, teacher_feedback, creationDate) VALUES ('$studentID', '$questionID', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '2022-05-13')";
                $result = $conn -> query($sql);
                if($result) echo "<p class='alert alert-success'>Empty test added</p>";
                else echo "<p class='alert alert-warning'>Empty test addition failed</p>";

                // Creating empty reward row for student
                $sql = "INSERT INTO reward (studentID) VALUES ('$studentID')";
                $result = $conn -> query($sql);
                if($result) echo "<p class='alert alert-success'>Empty reward row added for student</p>";
                else echo "<p class='alert alert-warning'>Empty reward addition failed</p>";

                                
                // Generate student object
                $student = new Student($studentID, $first_name, $last_name, $email);
                echo "<pre class='bg-info p-3'>";
                echo print_r($student);
                echo "</pre>";


                // SAVE Student object to student.json
                $fp = fopen('file/student.json', 'w');
                fwrite($fp, json_encode($student));
                fclose($fp);

                return $student;
              }
                      
  
              
}

?>


  
