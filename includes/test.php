<?php
  require('includes/dbConnect.php'); 
  require('classes/question_series.php');
  require('classes/test.php');

    /*
    ********************************
    ** GENERATING A RANDOM QUESTIONNAIRE **
    ********************************
    */
    $sql='SELECT * FROM question';
    
    $result = mysqli_query($conn, $sql);
    // The "length" of question table
    $rows = mysqli_num_rows($result);
    echo $rows . "<br>";
    
    // Random number between 1-$rows
    $randomQuestionID = rand(1, $rows);
    echo $randomQuestionID; 
    
    if($rows > 0) {
      $sql = "SELECT * FROM question WHERE questionID = '$randomQuestionID'";
      $result = mysqli_query($conn, $sql); 
      $questions = mysqli_fetch_assoc($result);
    }
    
    mysqli_free_result($result); 
    
    // Shuffle options
    $q1_options = array("opt_1_1", "opt_1_2", "opt_1_3");
    shuffle($q1_options);
    $q2_options = array("opt_2_1", "opt_2_2", "opt_2_3");
    shuffle($q2_options);                   
    $q3_options = array("opt_3_1", "opt_3_2", "opt_3_3");
    shuffle($q3_options);
    /******************************/

    /*
    ********************************
    ** GENERATING A QUESTION OBJECT **
    ********************************
    */
    $sql = "SELECT * FROM question WHERE questionID = '$randomQuestionID'";
    
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $questionTableValues = array();

    foreach ($row as $key => $value) {
      array_push($questionTableValues, $value);
    }   

    // Constructing object
    $question_series = new Question_Series($questionTableValues[0], $questionTableValues[1], $questionTableValues[2], $questionTableValues[3], $questionTableValues[4], $questionTableValues[5], $questionTableValues[6], $questionTableValues[7], $questionTableValues[8], $questionTableValues[9], $questionTableValues[10], $questionTableValues[11], $questionTableValues[12], $questionTableValues[13], $questionTableValues[14], $questionTableValues[15],); 
    echo "<pre>";
    echo print_r($question_series);
    echo "</pre>";
    /******************************/




    /*
    ********************************
    ** SUBMIT &                   **
    ** CREATING TEST OBJECT       **
    ********************************
    */
    if(isset($_POST['submit-test'])) {

      $user_answer_1 = $_POST['question_1'];
      $user_answer_2 = $_POST['question_2'];
      $user_answer_3 = $_POST['question_3'];
      echo $user_answer_1 . "<br>";
      echo $user_answer_2 . "<br>";
      echo $user_answer_3;



      
      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $email = $_POST['email'];
  
      echo $first_name . "<br>";
      echo $last_name . "<br>";
      echo $email . "<br>";
  
      $sql = "SELECT studentID FROM student WHERE first_name = '$first_name' AND last_name = '$last_name' AND email = '$email'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      echo $row['studentID'];
  
      if($result -> num_rows == 1) {
        // Getting the studendID
        $studentID = $row['studentID'];
        echo $studentID;
  
      }
  
      // Score 
      $testIsApproved = $user_answer_1 == $question_series -> correct_answer_1 && $user_answer_2 == $question_series -> correct_answer_2 && $user_answer_3 == $question_series -> correct_answer_3;
      if($testIsApproved) $score = 1;
      else $score = 0;
  
      // creation date
      $creationDate = date('Y-m-d H:i:s');
  
      $test = new Test('null', $studentID, $question_series -> questionID,  $question_series -> question_1,  $question_series -> question_2,  $question_series -> question_3,  $question_series -> opt_1_1, $question_series -> opt_1_2, $question_series -> opt_1_3, $question_series -> opt_2_1, $question_series -> opt_2_2, $question_series -> opt_2_3, $question_series -> opt_3_1, $question_series -> opt_3_2, $question_series -> opt_3_3, $user_answer_1, $user_answer_2, $user_answer_3, $score, 'null', $creationDate);
      echo "<pre>";
      echo print_r($test);
      echo "</pre>";
  
      /*
      ********************************
      ** INSERT TEST TO DB **
      ********************************
      */
      $sql = "INSERT INTO test (studentID, questionID, question_1, question_2, question_3, opt_1_1, opt_1_2, opt_1_3, opt_2_1, opt_2_2, opt_2_3, opt_3_1, opt_3_2, opt_3_3, user_answer_1, user_answer_2, user_answer_3, score, teacher_feedback, creationDate) VALUES ('$studentID', '$question_series -> questionID',  '$question_series -> question_1',  '$question_series -> question_2',  '$question_series -> question_3',  '$question_series -> opt_1_1', '$question_series -> opt_1_2', '$question_series -> opt_1_3', '$question_series -> opt_2_1', '$question_series -> opt_2_2', '$question_series -> opt_2_3', '$question_series -> opt_3_1', '$question_series -> opt_3_2', '$question_series -> opt_3_3', '$user_answer_1', '$user_answer_2', '$user_answer_3', '$score', 'null', '$creationDate')";
      $result = mysqli_query($conn, $sql);
      if($result) echo "Insert success!";
      else echo "Insert failed";

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


