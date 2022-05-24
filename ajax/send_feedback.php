<?php

require('../includes/dbConnect.php');


if(isset($_POST['t_feedback_SFB'])) {
    $t_feedback_SFB = $conn -> real_escape_string($_POST['t_feedback_SFB']);
    $hiddenTestID_SFB = $conn -> real_escape_string($_POST['hiddenTestID_SFB']);

    $query = "UPDATE test SET teacher_feedback = '$t_feedback_SFB' WHERE testID = '$hiddenTestID_SFB'";

    $result = $conn->query($query);
    
    echo $t_feedback_SFB;
    // if($result) {
    //     echo $t_feedback_SFB;
    // } else echo "<p class='alert alert-danger'>query failed</p>";

}
//  else echo "<p class='alert alert-danger'>t_feedback is not set</p>";

?>
