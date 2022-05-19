<?php

require('includes/dbConnect.php');


if(isset($_POST['t_feedback']))
{

 /*  $data = array(

        ':t_feedback'       => $_POST["t_feedback"],
        ':hiddenID'         => $_POST["hiddenID"],
    );
*/
    $t_feedback = $_POST['t_feedback'];
    $hiddenID = $_POST['hiddenID'];

    $query = "UPDATE test SET teacher_feedback = '$t_feedback' WHERE testID = '$hiddenID'";

    $statement = $conn->prepare($query);

    $statement->execute($data);

    echo "Your feedback submitted";

}

?>
