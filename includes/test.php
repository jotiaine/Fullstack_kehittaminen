<?php
  require('includes/dbConnect.php'); 
  require('classes/question_series.php');
  require('classes/test.php');
  require('classes/student.php');
  require('classes/reward.php');
  require('functions/create_student.php');

  /***********************************/
  /** SUBMIT STUDENT, TEST, REWARD ***/ 
  /***********************************/
  // Create student object & save object to student.json
  if(isset($_POST['submit-student'])) {
    // creating student obj, json file, insert empty test & reward
    create_student();

    // Read the JSON file, Testing that it works 
    $json = file_get_contents('file/student.json');
    
    // Decode the JSON file
    $json_data = json_decode($json,true);
    
    // Display data
    echo "<pre>";
    echo print_r($json_data);
    echo "</pre>";
    
    
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

  // Get studentID
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $email =  $_POST['email'];
  getStudentID($conn, $first_name, $last_name, $email);
  $studentID = getStudentID($conn, $first_name, $last_name, $email);

  // Getting correct questionID
  $sql = "SELECT questionID FROM test WHERE studentID = '$studentID'";
  $result = mysqli_query($conn, $sql);
  $row  = mysqli_fetch_assoc($result);
  $questionID = $row['questionID'];
    
  /*
    ********************************
  ** PRINTING RANDOM QUESTION(QuestionID is defined already and shuffle options)**
  ********************************
  */
  $sql = "SELECT * FROM question WHERE questionID = '$questionID'";
  $result = mysqli_query($conn, $sql); 
  // $row = mysqli_fetch_assoc($result);
  $questions = mysqli_fetch_assoc($result);
                
              
  // mysqli_free_result($result); 
  
  // Shuffle options
  $q1_options = array("opt_1_1", "opt_1_2", "opt_1_3");
  shuffle($q1_options);
  $q2_options = array("opt_2_1", "opt_2_2", "opt_2_3");
  shuffle($q2_options);                   
  $q3_options = array("opt_3_1", "opt_3_2", "opt_3_3");
  shuffle($q3_options);
  /******************************/



  function getStudentID($conn, $first_namei, $last_namei, $emaili) {

    
      $first_name = $first_namei;
      $last_name = $last_namei;
      $email = $emaili;
  
      $sql = "SELECT studentID FROM student WHERE first_name = '$first_name' AND last_name = '$last_name' AND email = '$email'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
  
      if($result) {
        $studentID = $row['studentID'];
        return $studentID;
        // Getting the studendID
  
      }



     else echo "<p>Not getting studentID</p>";
  }

  

    /*
    ********************************
    ** SUBMIT &                   **
    ** CREATING TEST OBJECT       **
    ********************************
    */

    if(isset($_POST['submit-test'])) {
      $question_1 = $_POST['question_1'];
      $question_2 = $_POST['question_2'];
      $question_3 = $_POST['question_3'];
      $studentID = $_POST['studentID'];
      $questionID = $_POST['questionID'];
      sendTest($conn, $question_series, $studentID, $questionID );
    }

    function sendTest ($conn, $question_series, $studentID, $questionID) {

        // Student answers
        $user_answer_1 = $_POST['question_1'];
        $user_answer_2 = $_POST['question_2'];
        $user_answer_3 = $_POST['question_3'];
        echo $user_answer_1 . "<br>";
        echo $user_answer_2 . "<br>";
        echo $user_answer_3;
  
  
    
        // Score 
        $testIsApproved = $user_answer_1 == $question_series -> correct_answer_1 && $user_answer_2 == $question_series -> correct_answer_2 && $user_answer_3 == $question_series -> correct_answer_3;
        if($testIsApproved) $score = 1;
        else $score = 0;
    
        /*
        ********************************
        ** UPDATE TEST TO DB **
        ********************************
        */
        // Date lisäys
        // $creationDate = 'SELECT NOW()';
        $creationDate = new DateTime();
        $creationDate -> format('Y-m-d H:i:s');
        $sql = "UPDATE test SET (question_1 = '$question_series -> question_1', question_2 = '$question_series -> question_2', question_3 = '$question_series -> question_3', opt_1_1 = '$question_series -> opt_1_1', opt_1_2 = '$question_series -> opt_1_2', opt_1_3 = '$question_series -> opt_1_3', opt_2_1 = '$question_series -> opt_2_1', opt_2_2 = '$question_series -> opt_2_2', opt_2_3 = '$question_series -> opt_2_3', opt_3_1 = '$question_series -> opt_3_1', opt_3_2 = '$question_series -> opt_3_2', opt_3_3 = '$question_series -> opt_3_3', user_answer_1 = '$user_answer_1', user_answer_2 = '$user_answer_2', user_answer_3 = '$user_answer_3', score = '$score', teacher_feedback = 'null', creationDate = '$creationDate') WHERE studentID = '$studentID' AND questionID = '$questionID'";
        $result = mysqli_query($conn, $sql);

        if($result) echo "Update success!";
        else echo "Update failed";


        // NEW TEST OBJECT
        $test = new Test('null', $studentID, $question_series -> questionID,  $question_series -> question_1,  $question_series -> question_2,  $question_series -> question_3,  $question_series -> opt_1_1, $question_series -> opt_1_2, $question_series -> opt_1_3, $question_series -> opt_2_1, $question_series -> opt_2_2, $question_series -> opt_2_3, $question_series -> opt_3_1, $question_series -> opt_3_2, $question_series -> opt_3_3, $user_answer_1, $user_answer_2, $user_answer_3, $score, 'null', "Paevaa");
        echo "<pre>";
        echo print_r($test);
        echo "</pre>";

        return $test;
      }


    $conn->close();

    ?>



<div id="start-btn-container" class="container-fluid pb-5 pt-3 text-center bg-light">
    <h2 class="mb-4">Ready to start?</h2>
    <button id="start-test-btn" class="btn btn-dark text-white"> Show nudes! </button>
  </div>

  <div id="test-container" class="container p-5 text-center bg-light">
    <form action="index.php?page=test&user=student" method="post">
      <h3 class="mb-3"> Test of Mensa </h3><br><br>

      <!-- QUESTION 1 -->
        <h4 class="mb-3"> <?php echo htmlspecialchars($questions['question_1']); ?> </h4>

          <!-- Sending studentId and questionId hidde with submit-test -->
          <input type="hidden" name="questionID" value='$questionID'>"/>
          <input type="hidden" name="studentID" value='$studentID'>"/>
          <input class="form-check-input" type="radio" name="question_1" id="answerSerie-1.1" value="<?php echo htmlspecialchars($questions[$q1_options[2]]); ?>"/>
          <label class="form-check-label" for="answerSerie-1.1"> <?php echo htmlspecialchars($questions[$q1_options[2]]); ?> </label><br>

          <input class="form-check-input" type="radio" name="question_1" id="answerSerie-1.2" value="<?php echo htmlspecialchars($questions[$q1_options[1]]);  ?>"/>
          <label class="form-check-label" for="answerSerie-1.2"> <?php echo htmlspecialchars($questions[$q1_options[1]]);  ?> </label><br>

          <input class="form-check-input" type="radio" name="question_1" id="answerSerie-1.3" value="<?php echo htmlspecialchars($questions[$q1_options[0]]); ?>"/>
          <label class="form-check-label" for="answerSerie-1.3"> <?php echo htmlspecialchars($questions[$q1_options[0]]); ?> </label><br>
      
          <!-- QUESTION 2 -->
          <h4 class="mb-3"> <?php echo htmlspecialchars($questions['question_2']); ?> </h4>

            <input class="form-check-input" type="radio" name="question_2" id="answerSerie-2.1" value="<?php echo htmlspecialchars($questions[$q2_options[2]]); ?>"/>
            <label class="form-check-label" for="answerSerie-2.1"> <?php echo htmlspecialchars($questions[$q2_options[2]]); ?> </label><br>

            <input class="form-check-input" type="radio" name="question_2" id="answerSerie-2.2" value="<?php echo htmlspecialchars($questions[$q2_options[1]]); ?>"/>
            <label class="form-check-label" for="answerSerie-2.2"> <?php echo htmlspecialchars($questions[$q2_options[1]]); ?> </label><br>

            <input class="form-check-input" type="radio" name="question_2" id="answerSerie-2.3" value="<?php echo htmlspecialchars($questions[$q2_options[0]]); ?>"/>
            <label class="form-check-label" for="answerSerie-2.3"> <?php echo htmlspecialchars($questions[$q2_options[0]]); ?> </label><br>

          <!-- QUESTION 3 -->
          <h4 class="mb-3"> <?php echo htmlspecialchars($questions['question_3']); ?> </h4>

            <input class="form-check-input" type="radio" name="question_3" id="answerSerie-3.1" value="<?php echo htmlspecialchars($questions[$q3_options[2]]); ?>"/>
            <label class="form-check-label" for="answerSerie-3.1"> <?php echo htmlspecialchars($questions[$q3_options[2]]); ?> </label><br>

            <input class="form-check-input" type="radio" name="question_3" id="answerSerie-3.2" value="<?php echo htmlspecialchars($questions[$q3_options[1]]); ?>"/>
            <label class="form-check-label" for="answerSerie-3.2"> <?php echo htmlspecialchars($questions[$q3_options[1]]); ?> </label><br>

            <input class="form-check-input" type="radio" name="question_3" id="answerSerie-3.3" value="<?php echo htmlspecialchars($questions[$q3_options[0]]); ?>"/>
            <label class="form-check-label" for="answerSerie-3.3"> <?php echo htmlspecialchars($questions[$q3_options[0]]); ?> </label><br>
            
            <div id="submit-btn-container" class="container-fluid py-5 text-center bg-light">
              <button id="submit-test-btn" class="btn btn-dark text-white" type="submit" name="submit-test"> Submit </button>
            </div>
  </form>         
  </div> 


