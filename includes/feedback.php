<?php
  require_once('includes/dbConnect.php'); 
  require_once('classes/test.php');

    /*
    ********************************
    ** INSERTING TEST TO DB **
    ********************************
    */

    // Tässä on pohjaa valmiina


    // $sql = "INSERT INTO test VALUES studentID = '$studentID', questionID = '$questionID', question_1 = '$question_1', question_2 = '$question_2', question_3 = '$question_3', opt_1_1 = '$opt_1_1', opt_1_2 = '$opt_1_2', opt_1_3 = '$opt_1_3', opt_2_1 = '$opt_2_1', opt_2_2 = '$opt_2_2', opt_2_3 = '$opt_2_3', opt_3_1 = '$opt_3_1', opt_3_2 = '$opt_3_2', opt_3_3 = '$opt_3_3', user_answer_1 = '$user_answer_1', user_answer_2 = '$user_answer_2', user_answer_3 = '$user_answer_3', score = '$score', teacher_feedback = '$teacher_feedback', creationDate = '$creationDate'";
    
    // $result = mysqli_query($conn, $sql);  

    // if(!$result) {
    //   die("Connection failed: " . $conn->connect_error);
    // }
    /******************************/

    /*
    ********************************
    ** GENERATING A TEST OBJECT **
    ********************************
    */

    // Tähän arrayhin kerätään studentin vastaukset
    // $testTableValues = array();

    // // Luodaan uus testi olio käyttäjän vastauksilla
    // // Constructing object
    // $test = new Test($testTableValues[0], $testTableValues[1], $testTableValues[2], $testTableValues[3], $testTableValues[4], $testTableValues[5], $testTableValues[6], $testTableValues[7], $testTableValues[8], $testTableValues[9], $testTableValues[10], $testTableValues[11], $testTableValues[12], $testTableValues[13], $testTableValues[14], $testTableValues[15], $testTableValues[16], $testTableValues[17], $testTableValues[18], $testTableValues[19]); 
    // echo "<pre>";
    // echo print_r($test);
    // echo "</pre>";
    // /******************************/

    // $conn->close();

    ?>