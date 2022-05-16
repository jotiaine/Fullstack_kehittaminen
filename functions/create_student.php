<?php // Creating a student to the db
function create_student() {
              require('includes/dbConnect.php'); 

              
              /*
              ********************************
              ** FIRST NAME, LAST NAME, EMAIL **
              ********************************
              */
              $first_name = $conn->real_escape_string($_POST['first_name']);
              $last_name = $conn->real_escape_string($_POST['last_name']);
              $email = $conn->real_escape_string($_POST['email']);
              /******************************/

              // Testing if student exists
              $sql = "SELECT * FROM student WHERE first_name = '$first_name' AND last_name = '$last_name' AND email = '$email'";
              
              // Query result
              $result = $conn -> query($sql);

              /*
              ********************************
              ** IF STUDENT EXIST **
              ********************************
              */
              
              if($result -> num_rows > 0) {
                // User exists
                echo "<p class='alert alert-warning'>User exists!</p>";
              } else {

                /*
                ********************************
                ** IF STUDENT DOES NOT EXIST **
                ********************************
                */
                
                // INSERT STUDENT TO DB
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
                
                // Getting the questionID for random question_series
                if($rows > 0) {
                  $sql = "SELECT questionID FROM question WHERE questionID = '$randomQuestionID'";
                  $result = mysqli_query($conn, $sql); 
                  $row = mysqli_fetch_assoc($result);
                  $questionID = $row['questionID'];
                }
                
                //mysqli_free_result($result); 

                // QUESTION ROW
                $sql = "SELECT * FROM question WHERE questionID = '$questionID'";
                
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $questionTableValues = array();

                // Looping one question_series table values to an array
                foreach ($row as $key => $value) {
                  array_push($questionTableValues, $value);
                }   
                /******************************/

                
                /*
                ********************************
                ** INSERTING EMPTY TEST & REWARD **
                ** (will be updated after the test) **
                ** Student was inserted earlier **
                ********************************
                */

                // Creating empty test for the student
                $sql = "INSERT INTO test (studentID, questionID) VALUES ('$studentID', '$questionID')";
                $result = $conn -> query($sql);
                if($result) echo "<p class='alert alert-success'>Insert empty test is a success!</p>";
                else echo "<p class='alert alert-warning'>Empty test addition failed</p>";
                // Getting testID also
                $sql = "SELECT testID FROM test WHERE studentID = '$studentID'";
                $result = $conn -> query($sql);
                $row = mysqli_fetch_assoc($result);

                if($result) {
                  echo "<p class='alert alert-success'>Insert empty test is a success!</p>";
                  $testID = $row['testID'];
                }
                else echo "<p class='alert alert-warning'>Empty test addition failed</p>";
               
                // Creating empty reward row for student
                $sql = "INSERT INTO reward (studentID) VALUES ('$studentID')";
                $result = $conn -> query($sql);
                if($result) echo "<p class='alert alert-success'>Insert empty reward is a success!</p>";
                else echo "<p class='alert alert-warning'>Empty reward addition failed</p>";
                // Getting rewardID also
                $sql = "SELECT rewardID FROM reward WHERE studentID = '$studentID'";
                $result = $conn -> query($sql);
                $row = mysqli_fetch_assoc($result);

                if($result) {
                  echo "<p class='alert alert-success'>Getting rewardID is a success!</p>";
                  $rewardID = $row['rewardID'];
                }
                else echo "<p class='alert alert-warning'>Failed to get rewardID!</p>";
                
                /******************************/

               
                /*
                ********************************
                ** GENERATING OBJECTS **
                ********************************
                */
                
                // Generate student object
                $student = new Student($studentID, $first_name, $last_name, $email);
                echo "<pre class='bg-info p-3'>";
                echo print_r($student);
                echo "</pre>";
                
                // Generate test object
                $test = new Test($testID, $studentID, $questionID, $questionTableValues['1'], $questionTableValues['2'], $questionTableValues['3'], $questionTableValues['4'], $questionTableValues['5'], $questionTableValues['6'], $questionTableValues['7'], $questionTableValues['8'], $questionTableValues['9'], $questionTableValues['10'], $questionTableValues['11'], $questionTableValues['12'], 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL' );
                echo "<pre class='bg-info p-3'>";
                echo print_r($test);
                echo "</pre>";

                // Generate question_series object
                $question_series = new Question_Series($questionTableValues[0], $questionTableValues[1], $questionTableValues[2], $questionTableValues[3], $questionTableValues[4], $questionTableValues[5], $questionTableValues[6], $questionTableValues[7], $questionTableValues[8], $questionTableValues[9], $questionTableValues[10], $questionTableValues[11], $questionTableValues[12], $questionTableValues[13], $questionTableValues[14], $questionTableValues[15],); 
                echo "<pre class='bg-info p-3'>";
                echo print_r($question_series);
                echo "</pre>";
                
                // Generate reward object
                $reward = new Reward($rewardID, $studentID, '0', 'NULL');
                echo "<pre class='bg-info p-3'>";
                echo print_r($reward);
                echo "</pre>";
                /******************************/

  
  
  /*
  ********************************
  ** SAVING OBJECTS TO JSON FILES **
  ********************************
  */
  
  // Save Student object to student.json
  $fp = fopen('file/student.json', 'w');
  fwrite($fp, json_encode($student));
  fclose($fp);
  
  // Save Test object to test.json
  $fp = fopen('file/test.json', 'w');
  fwrite($fp, json_encode($test));
  fclose($fp);
  
  // Save Question_Qeries object to question_series.json
  $fp = fopen('file/question_series.json', 'w');
  fwrite($fp, json_encode($question_series));
  fclose($fp);
  
  // Save Reward object to reward.json
  $fp = fopen('file/reward.json', 'w');
  fwrite($fp, json_encode($reward));
  fclose($fp);
  
  
  
  /*
  ********************************
  ** AFTER THIS script **
  ** TEST & REWARD wait for UPDATES **
  ********************************
  */
  
  
  
  return $student;
              }
                      
  
              
}

?>


  
