<?php



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
      $questionID = $question_series['questionID'];
      $testID = $test['testID'];

  $sql = "SELECT * FROM student INNER JOIN test ON student.studentID = test.studentID INNER JOIN reward ON student.studentID = reward.studentID WHERE student.studentID = '$studentID'";
  
  $result = $conn -> query($sql);
  if($result) {
    echo "<p class='alert alert-success'>Kolmosliitos success</p>";
  } else {
    echo "<p class='alert alert-warning'>Kolmosliitos failed</p>";
  }

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
      $correct_answer_1 = $row['correct_answer_1'];
      $correct_answer_1 = $row['correct_answer_1'];
      $correct_answer_1 = $row['correct_answer_1'];
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
      if($result) {
        echo "<p class='alert alert-success'>Kolmosliitos success</p>";
      } else {
        echo "<p class='alert alert-warning'>Kolmosliitos failed</p>";
      }

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

        <div id="certificate-container" class="mx-auto text-light border border-primary rounded p-3 shadow w-50">
        <h3 class="display-3 text-center shadow">Certificate<h3>
        <p>Congratulations for completing the test succesfully!</p>
        <p>Here"s your certificate</p>
        <div class="d-flex justify-content-center align-items-center">
          <span class="me-1">Download</span>
          <i class="certificate fa fa-certificate text-primary"></i>                              </div>
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
?>