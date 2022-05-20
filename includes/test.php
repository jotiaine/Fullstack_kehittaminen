<?php 
    require('includes/dbConnect.php'); 
    require('classes/question_series.php');
    require('classes/test.php');
    require('classes/student.php');
    require('classes/reward.php');
    require('functions/create_student.php');
?>

<?php 
  /***********************************/
        /** SUBMIT STUDENT, TEST, REWARD ***/ 
        /***********************************/
        // Create student object & save object to student.json
        if(isset($_POST['submit-student'])) {
          // creating student obj, json file, insert empty test & reward
          create_student();

          // Read the JSON file, Testing that it works 
          $student = file_get_contents('file/student.json');
          $question_series = file_get_contents('file/question_series.json');
          $test = file_get_contents('file/test.json');
          $reward = file_get_contents('file/reward.json');
          
          // Decode the JSON file
          $json_data_student = json_decode($student,true);
          $json_data_question_series = json_decode($question_series,true);
          $json_data_test = json_decode($test,true);
          $json_data_reward = json_decode($reward,true);
          
          // Display data
          echo "<pre>";
          echo print_r($json_data_student);
          echo "</pre>";
          echo "<pre>";
          echo print_r($json_data_question_series);
          echo "</pre>";
          echo "<pre>";
          echo print_r($json_data_test);
          echo "</pre>";
          echo "<pre>";
          echo print_r($json_data_reward);
          echo "</pre>";
          

          // Shuffle options
          $q1_options = array("opt_1_1", "opt_1_2", "opt_1_3");
          shuffle($q1_options);
          $q2_options = array("opt_2_1", "opt_2_2", "opt_2_3");
          shuffle($q2_options);                   
          $q3_options = array("opt_3_1", "opt_3_2", "opt_3_3");
          shuffle($q3_options);
          
          
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


        } 
  /*****************/
?>


<?php

    if($_GET['user'] == 'student' && $_GET['page'] == 'test' || isset($_POST['submit-test'])) {

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
    


    $conn->close();



    
    ?>

    
  <div id="start-btn-container" class="container-fluid pb-5 pt-3 text-center bg-dark text-white">
    <h2 class="var-header mb-4  shadow-lg p-3">Ready to start?</h2>
    <button id="start-test-btn" class="btn btn-dark text-white"> Show nudes! </button>
  </div>

  <div id="test-container" class="container-fluid p-5 text-center bg-dark text-white shadow">
    <form action="index.php?page=test&user=student" method="post" class="d-flex flex-column align-items-center justify-content-center">
      <h3 class="var-header mb-3  shadow-lg p-3 w-50"> Test of Mensa </h3>

      
      <table class="table table-dark text-white table-striped table-hover w-75 text-center text-dark table-bordered shadow-lg">
          <thead class="shadow">
            <!-- QUESTION 1 -->
            <th colspan='3' class='var-header p-5 fs-4'>
              <?php echo htmlspecialchars($question_series['question_1']); ?> 
            </th>
          </thead>
          <tbody class='shadow-lg'>
            <td colspan='' class='table-dark text-white p-5 d-flex gap-3 justify-content-left align-items-center'>
              <input class="form-check-input" type="radio" name="question_1" id="answerSerie-1.1" value="<?php echo htmlspecialchars($question_series[$q1_options[2]]); ?>"/>
              <label class="form-check-label" for="answerSerie-1.1"> <?php echo htmlspecialchars($question_series[$q1_options[2]]); ?> </label>
            </td>
            <td colspan='' class='table-dark text-white p-5 d-flex gap-3 justify-content-left align-items-center'>
              <input class="form-check-input" type="radio" name="question_1" id="answerSerie-1.2" value="<?php echo htmlspecialchars($question_series[$q1_options[1]]);  ?>"/>
              <label class="form-check-label" for="answerSerie-1.2"> <?php echo htmlspecialchars($question_series[$q1_options[1]]);  ?> </label>
            </td>
            <td colspan='' class='table-dark text-white p-5 d-flex gap-3 justify-content-left align-items-center'>
              <input class="form-check-input" type="radio" name="question_1" id="answerSerie-1.3" value="<?php echo htmlspecialchars($question_series[$q1_options[0]]); ?>"/>
              <label class="form-check-label" for="answerSerie-1.3"> <?php echo htmlspecialchars($question_series[$q1_options[0]]); ?> </label>
            </td>
          </tbody>
          <thead>
            <!-- QUESTION 2 -->
            <th colspan='3' class='var-header p-5 fs-4'>
              <?php echo htmlspecialchars($question_series['question_2']); ?>
            </th>
          </thead>
          <tbody class=''>
            <td colspan='' class='table-dark text-white p-5 d-flex gap-3 justify-content-left align-items-center'>
              <input class="form-check-input" type="radio" name="question_2" id="answerSerie-2.1" value="<?php echo htmlspecialchars($question_series[$q2_options[2]]); ?>"/>
              <label class="form-check-label" for="answerSerie-2.1"> <?php echo htmlspecialchars($question_series[$q2_options[2]]); ?> </label>
            </td>
            <td colspan='' class='table-dark text-white p-5 d-flex gap-3 justify-content-left align-items-center'>
              <input class="form-check-input" type="radio" name="question_2" id="answerSerie-2.2" value="<?php echo htmlspecialchars($question_series[$q2_options[1]]); ?>"/>
              <label class="form-check-label" for="answerSerie-2.2"> <?php echo htmlspecialchars($question_series[$q2_options[1]]);  ?> </label>
            </td>
            <td colspan='' class='table-dark text-white p-5 d-flex gap-3 justify-content-left align-items-center'>
              <input class="form-check-input" type="radio" name="question_2" id="answerSerie-2.3" value="<?php echo htmlspecialchars($question_series[$q2_options[0]]); ?>"/>
              <label class="form-check-label" for="answerSerie-2.3"> <?php echo htmlspecialchars($question_series[$q2_options[0]]); ?> </label>
            </td>
          </tbody>
          <thead>
            <!-- QUESTION 3 -->
            <th colspan='3' class='var-header p-5 fs-4'>
              <?php echo htmlspecialchars($question_series['question_3']); ?>
            </th>
          </thead>
          <tbody class=''>
            <td colspan='' class='table-dark text-white p-5 d-flex gap-3 justify-content-left align-items-center'>
              <input class="form-check-input" type="radio" name="question_3" id="answerSerie-3.1" value="<?php echo htmlspecialchars($question_series[$q3_options[2]]); ?>"/>
              <label class="form-check-label" for="answerSerie-3.1"> <?php echo htmlspecialchars($question_series[$q3_options[2]]); ?> </label>
            </td>
            <td colspan='' class='table-dark text-white p-5 d-flex gap-3 justify-content-left align-items-center'>
              <input class="form-check-input" type="radio" name="question_3" id="answerSerie-3.2" value="<?php echo htmlspecialchars($question_series[$q3_options[1]]);  ?>"/>
              <label class="form-check-label" for="answerSerie-3.2"> <?php echo htmlspecialchars($question_series[$q3_options[1]]);  ?> </label>
            </td>
            <td colspan='' class='table-dark text-white p-5 d-flex gap-3 justify-content-left align-items-center'>
              <input class="form-check-input" type="radio" name="question_3" id="answerSerie-3.3" value="<?php echo htmlspecialchars($question_series[$q3_options[0]]); ?>"/>
              <label class="form-check-label" for="answerSerie-3.3"> <?php echo htmlspecialchars($question_series[$q3_options[0]]); ?> </label>
            </td>
          </tbody>
          
        </table>
        
        <div id="submit-btn-container" class="container-fluid py-5 text-center bg-dark">
          <button id="submit-test-btn" class="btn fs-1 btn-primary" type="submit" name="submit-test"> Submit </button>
        </div>

          <!-- Sending studentId and questionId hidden with submit-test -->
          <!-- <input type="hidden" name="questionID" value='$questionID'>
          <input type="hidden" name="studentID" value='$studentID'> -->
         

  </form>         
  </div> 

