<?php

require('../includes/dbConnect.php');


if(isset($_POST['t_feedback']))
{
    $t_feedback = $conn -> real_escape_string($_POST['t_feedback']);
    $hiddenID = $conn -> real_escape_string($_POST['hiddenID']);

    $query = "UPDATE test SET teacher_feedback = '$t_feedback' WHERE testID = '$hiddenID'";

    $result = $conn->query($query);

    if($result) {
        echo $t_feedback;
    } else echo "<p class='alert alert-danger'>query failed</p>";

} else echo "<p class='alert alert-danger'>t_feedback is not set</p>";

?>
