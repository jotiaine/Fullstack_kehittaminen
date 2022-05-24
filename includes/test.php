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
      
   

      
    /*
    ********************************
    ** SUBMIT &                   **
    ** CREATING TEST OBJECT       **
    ********************************
    */

 

      
              // Student answers
              $user_answer_1 = $conn->real_escape_string($_POST['question_1']);
              $user_answer_2 = $conn->real_escape_string($_POST['question_2']);
              $user_answer_3 = $conn->real_escape_string($_POST['question_3']);        
        
          
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
      
              // if($result) echo "<p class='alert-success'>Update success!</p>";
              // else echo "<p class='alert-warning'>Update failed!</p>";
      
      
              // NEW TEST OBJECT
              $test = new Test($testID, $studentID, $questionID,  $question_1,  $question_2,  $question_3,  $opt_1_1, $opt_1_2, $opt_1_3, $opt_2_1, $opt_2_2, $opt_2_3, $opt_3_1, $opt_3_2, $opt_3_3, $user_answer_1, $user_answer_2, $user_answer_3, $score, 'NULL', $creationDate);
              // echo "<pre>";
              // echo print_r($test);
              // echo "</pre>";
      
            


              $sql = "SELECT * FROM student INNER JOIN test ON student.studentID = test.studentID INNER JOIN reward ON student.studentID = reward.studentID WHERE student.studentID = '$studentID'";
  
              $result = $conn -> query($sql);
              // if($result) {
              //   echo "<p class='alert alert-success'>Kolmosliitos success</p>";
              // } else {
              //   echo "<p class='alert alert-warning'>Kolmosliitos failed</p>";
              // }

              $row = mysqli_fetch_assoc($result);
              
                  $first_name = $row['first_name'];
                  $last_name = $row['last_name'];
                  $email = $row['email'];
                  $studentID = $row['studentID'];
                  $testID = $row['testID'];
                  $questionID = $row['questionID'];
                  $question_1 = $row['question_1'];
                  $question_2 = $row['question_2'];
                  $question_3 = $row['question_3'];
                  $opt_1_1 = $row['opt_1_1'];
                  $opt_1_2 = $row['opt_1_2'];
                  $opt_1_3 = $row['opt_1_3'];
                  $opt_2_1 = $row['opt_2_1'];
                  $opt_2_2 = $row['opt_2_2'];
                  $opt_2_3 = $row['opt_2_3'];
                  $opt_3_1 = $row['opt_3_1'];
                  $opt_3_2 = $row['opt_3_2'];
                  $opt_3_3 = $row['opt_3_3'];
                  $user_answer_1 = $row['user_answer_1'];
                  $user_answer_2 = $row['user_answer_2'];
                  $user_answer_3 = $row['user_answer_3'];
                  $score = $row['score'];
                  $creationDate = $row['creationDate'];
                  $teacher_feedback = $row['teacher_feedback'];
                  $level = $row['level'];
                  $certificate = $row['certificate'];

                  $sql = "SELECT * FROM question WHERE questionID = '$questionID'";
  
                  $result = $conn -> query($sql);
                  // if($result) {
                  //   echo "<p class='alert alert-success'>Kolmosliitos success</p>";
                  // } else {
                  //   echo "<p class='alert alert-warning'>Kolmosliitos failed</p>";
                  // }

                  $row = mysqli_fetch_assoc($result);

                  $correct_answer_1 = $row['correct_answer_1'];
                  $correct_answer_2 = $row['correct_answer_2'];
                  $correct_answer_3 = $row['correct_answer_3'];

                  $output = "";

                  if($score == 1) {
                    $output = '
                    <div class="container-fluid d-flex flex-column justify-content-center align-items-center">
                    <table class="table-style table gy-3 text-light table-borderless table-dark table-striped table-hover w-75 mb-5 shadow text-center">
                      <thead id="student-test-result-heading">;
                        <th colspan="2" class="student-test-result display-4">' . $first_name . " " . $last_name . '
                        <a class="text-white">
                          <i class="fa-solid fa-anchor text-primary hover"></i>
                        </a>
                        </th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>studentID</td>
                          <td>' . $studentID . '</td>
                        </tr>
                        <tr>
                          <td>testID</td>
                          <td>' . $testID . '</td>
                        </tr>
                        <tr>
                        <td>questionID</td>
                        <td>' . $questionID . '</td>
                        </tr>
                        <tr>
                          <td>question_1</td>
                          <td>' . $question_1 . '</td>
                        </tr>
                        <tr>
                          <td>question_2</td>
                          <td>' . $question_2 . '</td>
                        </tr>
                        <tr>
                          <td>question_3</td>
                          <td>' . $question_3 . '</td>
                        </tr>
                        <tr>
                          <td>opt_1_1</td>
                          <td>' . $opt_1_1 . '</td>
                        </tr>
                        <tr>
                          <td>opt_1_2</td>
                          <td>' . $opt_1_2 . '</td>
                        </tr>
                        <tr>
                          <td>opt_1_3</td>
                          <td>' . $opt_1_3 . '</td>
                        </tr>
                        <tr>
                          <td>opt_2_1</td>
                          <td>' . $opt_2_1 . '</td>
                        </tr>
                        <tr>
                          <td>opt_2_2</td>
                          <td>' . $opt_2_2 . '</td>
                        </tr>
                        <tr>
                          <td>opt_2_3</td>
                          <td>' . $opt_2_3 . '</td>
                        </tr>
                        <tr>
                          <td>opt_3_1</td>
                          <td>' . $opt_3_1 . '</td>
                        </tr>
                        <tr>
                          <td>opt_3_2</td>
                          <td>' . $opt_3_2 . '</td>
                        </tr>
                        <tr>
                          <td>opt_3_3</td>
                          <td>' . $opt_3_3 . '</td>
                        </tr>
                        <tr>
                          <td>correct_answer_1</td>
                          <td>' . $correct_answer_1 . '</td>
                        </tr>
                        <tr>
                          <td>correct_answer_2</td>
                          <td>' . $correct_answer_2 . '</td>
                        </tr>
                        <tr>
                          <td>correct_answer_3</td>
                          <td>' . $correct_answer_3 . '</td>
                        </tr>
                        <tr>
                          <td>user_answer_1</td>
                          <td>' . $user_answer_1 . '</td>
                        </tr>
                        <tr>
                          <td>user_answer_2</td>
                          <td>' . $user_answer_2 . '</td>
                        </tr>
                        <tr>
                          <td>user_answer_3</td>
                          <td>' . $user_answer_3 . '</td>
                        </tr>
                        <tr>
                          <td>score</td>
                          <td>' . $score . '</td>
                        </tr>
                        <tr>
                          <td>creationDate</td>
                          <td>' . $creationDate . '</td>
                        </tr>
                        <tr class="feedback-hover">
                          <td>teacher_feedback</td>
                          <td>' . $teacher_feedback . '</td>
                        </tr>
                        <tr class="feedback-hover">
                          <td>level</td>
                          <td>' . $level . '</td>
                        </tr>
                        <tr class="feedback-hover">
                          <td>certificate</td>
                          <td>' . $certificate . '</td>
                        </tr>
                        </tbody>
                        </table>                   

                    </div>

                    <div id="certificate-container" class="text-center mx-auto text-muted border border-primary rounded p-4 shadow w-75 my-5 mb-5">
                    <h3 class="p-1 display-2 text-light text-center bg-black rounded">Certificate</h3>
                    <p class="mt-3">Congratulations for completing the test succesfully!</p>
                    <p>Here"s your certificate</p>
                    <div class="d-flex justify-content-center align-items-center border border-primary p-4 w-50 mx-auto rounded shadow">
                      <a class="text-decoration-none" href = index.php?page=cerPDF&user=teacher&pID='. $studentID .'>Download<i class="certificate fa fa-certificate text-primary"></i></a>
                    </div>
                    </div>
                    ';
                  } 

                  else {

                    $output = '
                    <div class="container-fluid d-flex flex-column justify-content-center align-items-center">
                      <table class="table-style table gy-3 text-light table-borderless table-dark table-striped table-hover w-75 mb-5 shadow text-center">
                        <thead id="student-test-result-heading">;
                          <th colspan="2" class="student-test-result display-4">' . $first_name . " " . $last_name . '
                          <a class="text-white">
                            <i class="fa-solid fa-anchor text-primary hover"></i>
                          </a>
                          </th>
                        </thead>
                        <tbody>
                          <tr>
                            <td>studentID</td>
                            <td>' . $studentID . '</td>
                          </tr>
                          <tr>
                            <td>testID</td>
                            <td>' . $testID . '</td>
                          </tr>
                          <tr>
                          <td>questionID</td>
                          <td>' . $questionID . '</td>
                          </tr>
                          <tr>
                            <td>question_1</td>
                            <td>' . $question_1 . '</td>
                          </tr>
                          <tr>
                            <td>question_2</td>
                            <td>' . $question_2 . '</td>
                          </tr>
                          <tr>
                            <td>question_3</td>
                            <td>' . $question_3 . '</td>
                          </tr>
                          <tr>
                            <td>opt_1_1</td>
                            <td>' . $opt_1_1 . '</td>
                          </tr>
                          <tr>
                            <td>opt_1_2</td>
                            <td>' . $opt_1_2 . '</td>
                          </tr>
                          <tr>
                            <td>opt_1_3</td>
                            <td>' . $opt_1_3 . '</td>
                          </tr>
                          <tr>
                            <td>opt_2_1</td>
                            <td>' . $opt_2_1 . '</td>
                          </tr>
                          <tr>
                            <td>opt_2_2</td>
                            <td>' . $opt_2_2 . '</td>
                          </tr>
                          <tr>
                            <td>opt_2_3</td>
                            <td>' . $opt_2_3 . '</td>
                          </tr>
                          <tr>
                            <td>opt_3_1</td>
                            <td>' . $opt_3_1 . '</td>
                          </tr>
                          <tr>
                            <td>opt_3_2</td>
                            <td>' . $opt_3_2 . '</td>
                          </tr>
                          <tr>
                            <td>opt_3_3</td>
                            <td>' . $opt_3_3 . '</td>
                          </tr>
                          <tr>
                            <td>correct_answer_1</td>
                            <td>' . $correct_answer_1 . '</td>
                          </tr>
                          <tr>
                            <td>correct_answer_2</td>
                            <td>' . $correct_answer_2 . '</td>
                          </tr>
                          <tr>
                            <td>correct_answer_3</td>
                            <td>' . $correct_answer_3 . '</td>
                          </tr>
                          <tr>
                            <td>user_answer_1</td>
                            <td>' . $user_answer_1 . '</td>
                          </tr>
                          <tr>
                            <td>user_answer_2</td>
                            <td>' . $user_answer_2 . '</td>
                          </tr>
                          <tr>
                            <td>user_answer_3</td>
                            <td>' . $user_answer_3 . '</td>
                          </tr>
                          <tr>
                            <td>score</td>
                            <td>' . $score . '</td>
                          </tr>
                          <tr>
                            <td>creationDate</td>
                            <td>' . $creationDate . '</td>
                          </tr>
                          <tr class="feedback-hover">
                            <td>teacher_feedback</td>
                            <td>' . $teacher_feedback . '</td>
                          </tr>
                          <tr class="feedback-hover">
                            <td>level</td>
                            <td>' . $level . '</td>
                          </tr>
                          <tr class="feedback-hover">
                            <td>certificate</td>
                            <td>' . $certificate . '</td>
                          </tr>
                          </tbody>
                          </table>                   
  
                      </div>
  
                      ';
                  } 



              echo $output;
              $output = "";


              // if($result) {
              //   echo "<p class='alert alert-success'>Query success</p>";
              // } else {
              //   echo "<p class='alert alert-warning'>Query failed</p>";
              // }




  

    }

?>

    





    

