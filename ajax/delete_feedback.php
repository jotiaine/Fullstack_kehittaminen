<?php

require('../includes/dbConnect.php');

if(isset($_POST['hiddenTestID']))
{
    $hiddenTestID = $conn -> real_escape_string($_POST['hiddenTestID']);
    $output = "";

    $query = "UPDATE test SET teacher_feedback = NULL WHERE testID = '$hiddenTestID'";

    $result = $conn->query($query);

    if($result) {
        echo $output;
    } else echo "<p class='alert alert-danger'>query failed</p>";

} else echo "<p class='alert alert-danger'>hiddenTestID is not set</p>";

?>