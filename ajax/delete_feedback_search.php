<?php

require('../includes/dbConnect.php');


if(isset($_POST['hiddenTestIDLoad']))
{
    $hiddenID = $conn -> real_escape_string($_POST['hiddenTestIDLoad']);
    $output = "";

    $query = "UPDATE test SET teacher_feedback = NULL WHERE testID = '$hiddenID'";

    $result = $conn->query($query);

    if($result) {
        echo $output;
    } else echo "<p class='alert alert-danger'>query failed</p>";

} else echo "<p class='alert alert-danger'>t_feedback is not set</p>";

?>