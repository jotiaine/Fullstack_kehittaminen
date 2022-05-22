<?php 
    require('includes/dbConnect.php'); 
    require('classes/question_series.php');
    require('classes/test.php');
    require('classes/student.php');
    require('classes/reward.php');
    include('functions/create_student.php');
?>

<?php 
  /***********************************/
        /** SUBMIT STUDENT, TEST, REWARD ***/ 
        /***********************************/
        // Create student object & save object to student.json
        if(isset($_POST['submit-student'])) {
          // creating student obj, json file, insert empty test & reward
          create_student();


          // Test: read file "new_file.json" & "poista.json" for testing
          // $file_pointer = fopen('file/poista.json', 'r');
          // echo fread($file_pointer, filesize('file/poista.json'));
          // fclose($file_pointer);
          
          // //Test: Create a file and write
          // $new_file = fopen('file/new_file.json', 'w');
          // fwrite($new_file, 'Testing creating a file');
          // fclose($new_file);
          
          // Test: open file, write, close & DELETE file
          // $file_pointer = fopen('file/poista.json', 'w');
          // fwrite($file_pointer, 'Testing writing and DELETING');
          // fclose($file_pointer);
          // unlink('file/poista.json'); // Deletes a file, be careful

          // if($testIsNotDone) {

          // }
        } 
  /*****************/
?>


<?php
    // user ja page turhia?(kun student on sisällä ja vaihtaa sivuja) 
    if(isset($_POST['submit-test'])) {

      // Using JSONS to find studentID, first_name and last_name and email
      $json_student = file_get_contents('file/student.json');
      $json_question_series = file_get_contents('file/question_series.json');
      $json_test = file_get_contents('file/test.json');
      
      // Decode the JSON file
      $student = json_decode($json_student,true);
      $question_series = json_decode($json_question_series,true);
      $test = json_decode($json_test,true);
  
      // All necessary info gathered from jsons
      $studentID = $student['studentID'];
      $first_name = $student['first_name'];
      $last_name = $student['last_name'];
      $email = $student['email'];
      $questionID = $question_series['questionID'];
      $question_1 = $question_series['question_1'];
      $question_2 = $question_series['question_2'];
      $question_3 = $question_series['question_3'];
      $opt_1_1 = $question_series['opt_1_1'];
      $opt_1_2 = $question_series['opt_1_2'];
      $opt_1_3 = $question_series['opt_1_3'];
      $opt_2_1 = $question_series['opt_2_1'];
      $opt_2_2 = $question_series['opt_2_2'];
      $opt_2_3 = $question_series['opt_2_3'];
      $opt_3_1 = $question_series['opt_3_1'];
      $opt_3_2 = $question_series['opt_3_2'];
      $opt_3_3 = $question_series['opt_3_3'];
      $correct_answer_1 = $question_series['correct_answer_1'];
      $correct_answer_2 = $question_series['correct_answer_2'];
      $correct_answer_3 = $question_series['correct_answer_3'];
      $testID = $test['testID'];
      
      // Getting correct questionID
      $sql = "SELECT score, creationDate FROM test WHERE studentID = '$studentID'";
      $result = mysqli_query($conn, $sql);
      $row  = mysqli_fetch_assoc($result);
  
      // get score & creationDate
      $score = $row['score'];
      $creationDate = $row['creationDate'];
  
      // Has or hasn't done the test?
      $testIsNotDone = empty($score) && empty($creationDate);
      $testFailed = $score == 0 && !empty($creationDate) ;
      $testApproved = $score == 1 && !empty($creationDate) ;
  
      if( $testIsNotDone ) {
        echo "<p class='alert alert-warning'> Student hasn't made the test yet! </p>";
          
  
      } elseif ( $testFailed ) {
        echo "<p class='alert alert-warning'> Student has made the test but failed! </p>";
      } elseif ($testApproved ) {
        echo "<p class='alert alert-warning'> Student has succesfully made the test! </p>";
  
      }

                // Shuffle options
                $q1_options = array("opt_1_1", "opt_1_2", "opt_1_3");
                shuffle($q1_options);
                $q2_options = array("opt_2_1", "opt_2_2", "opt_2_3");
                shuffle($q2_options);                   
                $q3_options = array("opt_3_1", "opt_3_2", "opt_3_3");
                shuffle($q3_options);


  

    }

?>

<?php


 
  

    /*
    ********************************
    ** SUBMIT &                   **
    ** CREATING TEST OBJECT       **
    ********************************
    */

    if(isset($_POST['submit-test'])) {
      require('includes/dbConnect.php'); 

      
              // Student answers
              $user_answer_1 = $conn->real_escape_string($_POST['question_1']);
              $user_answer_2 = $conn->real_escape_string($_POST['question_2']);
              $user_answer_3 = $conn->real_escape_string($_POST['question_3']);
              echo $user_answer_1 . "<br>";
              echo $user_answer_2 . "<br>";
              echo $user_answer_3;
        
        
          
              // Score 
              $testIsApproved = $user_answer_1 == $correct_answer_1 && $user_answer_2 == $correct_answer_2 && $user_answer_3 == $correct_answer_3;
              if($testIsApproved) $score = 1;
              else $score = 0;
          
              /*
              ********************************
              ** UPDATE TEST TO DB **
              ********************************
              */

              $creationDate  = date('Y-m-d H:i:s');
              $sql = "UPDATE test SET question_1 = '$question_1', question_2 = '$question_2', question_3 = '$question_3', opt_1_1 = '$opt_1_1', opt_1_2 = '$opt_1_2', opt_1_3 = '$opt_1_3', opt_2_1 = '$opt_2_1', opt_2_2 = '$opt_2_2', opt_2_3 = '$opt_2_3', opt_3_1 = '$opt_3_1', opt_3_2 = '$opt_3_2', opt_3_3 = '$opt_3_3', user_answer_1 = '$user_answer_1', user_answer_2 = '$user_answer_2', user_answer_3 = '$user_answer_3', score = '$score', teacher_feedback = 'NULL', creationDate = '$creationDate' WHERE studentID = '$studentID' AND questionID = '$questionID'";
              $result = mysqli_query($conn, $sql);
      
              if($result) echo "<p class='alert-success'>Update success!</p>";
              else echo "<p class='alert-warning'>Update failed!</p>";
      
      
              // NEW TEST OBJECT
              $test = new Test($testID, $studentID, $questionID,  $question_1,  $question_2,  $question_3,  $opt_1_1, $opt_1_2, $opt_1_3, $opt_2_1, $opt_2_2, $opt_2_3, $opt_3_1, $opt_3_2, $opt_3_3, $user_answer_1, $user_answer_2, $user_answer_3, $score, 'NULL', $creationDate);
              echo "<pre>";
              echo print_r($test);
              echo "</pre>";
      
            }
    





    
    ?>

