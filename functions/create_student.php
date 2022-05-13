<?php // Creating a student to the db
function createUser() {
            // Student form first name, last name & email
            if(isset($_POST['submit-student'])) {
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
                echo "User exists!";
              } else {
                // User does not exist
                // SQL-query for inserting student to db
                $sql = "INSERT INTO student (first_name, last_name, email) VALUES ('$first_name', '$last_name', '$email')";
                $result = $conn -> query($sql);
                
                // If insert succeeded?
                if($result) echo "Insert success!";
                else echo "Insert failed";

                // Find studentID
                $sql = "SELECT studentID FROM student WHERE first_name = '$first_name' AND last_name = '$last_name' AND email = '$email'";
                $result = $conn -> query($sql);
                $row = mysqli_fetch_assoc($result);

                $studentID = $row['studentID'];
                // If query
                if($result) echo "Found the studenID!";
                else echo "Did not find studentID";
                
                
                // Generate student object
                $student = new Student($studentID, $first_name, $last_name, $email);
                echo "<pre>";
                echo print_r($student);
                echo "</pre>";


                /*
                ********************************
                ** GENERATING A RANDOM QUESTIONNAIRE **
                ********************************
                */
                $sql = 'SELECT * FROM question';
                
                $result = mysqli_query($conn, $sql);
                // The "length" of question table
                $rows = mysqli_num_rows($result);
                echo $rows . "<br>";
                
                // Random number between 1-$rows
                $randomQuestionID = rand(1, $rows);
                echo $randomQuestionID; 
                
                if($rows > 0) {
                  $sql = "SELECT questionID FROM question WHERE questionID = '$randomQuestionID'";
                  $result = mysqli_query($conn, $sql); 
                  $row = mysqli_fetch_assoc($result);
                  $questionID = $row['questionID'];
                }
                
                mysqli_free_result($result); 


                // Creating empty test for the student
                $sql = "INSERT INTO test (studentID, questionID, question_1, question_2, question_3, opt_1_1, opt_1_2, opt_1_3, opt_2_1, opt_2_2, opt_2_3, opt_3_1, opt_3_2, opt_3_3, user_answer_1, user_answer_2, user_answer_3, score, teacher_feedback, creationDate) VALUES ('$studentID', '$questionID', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '2022-05-13')";
                echo $sql;
                $result = $conn -> query($sql);
                if($result) echo "Empty test added";
                else echo "Empty test addition failed";

                return $student;
              }
                      
  
              
            }
}

?>


  
