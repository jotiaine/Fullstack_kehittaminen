<?php 
  include("../includes/dbConnect.php");
  $output = "";
  
  if(isset($_POST['query'])) {
    $searchTxt = $conn -> real_escape_string($_POST['query']);
    
    $sql = "SELECT * FROM test INNER JOIN student ON test.studentID = student.studentID WHERE student.first_name LIKE '%$searchTxt%' OR last_name LIKE '%$searchTxt%' ORDER BY student.first_name, student.last_name";
  } else {
    $sql = "SELECT * FROM test INNER JOIN student ON test.studentID = student.studentID ORDER BY student.first_name, student.last_name";
  }
  
  $result = $conn -> query($sql);
  $rows = mysqli_num_rows($result);

  if($rows > 0) {
    
      while($row = mysqli_fetch_array($result)) {
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $studentID = $row['studentID'];
        $testID = $row['testID'];
        $questionID = $row['questionID'];
        $question_1 = $row['question_1'];
        $question_2 = $row['question_2'];
        $question_3 = $row['question_3'];
        $user_answer_1 = $row['user_answer_1'];
        $user_answer_2 = $row['user_answer_2'];
        $user_answer_3 = $row['user_answer_3'];
        $score = $row['score'];
        $creationDate = $row['creationDate'];
        $teacher_feedback = $row['teacher_feedback'];
        $output .= '
          <thead>;
            <th colspan="2" class="display-4">' . $first_name . " " . $last_name . '</th>
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
          <tr>
            <td>teacher_feedback</td>
            <td>' . $teacher_feedback . '</td>
          </tr>
          <tr>
          <td colspan="2" class="px-4 py-3">
          <label for="feedback" class="form-label text-danger">Feedback</label>
          <textarea name="teacher_feedback" id="feedback" class="form-control bg-dark text-white border border-danger" placeholder="The test went well!" required>
          </textarea>
          <div class="mt-2">
          <input type="hidden" name="hiddenStudentID" value="$studentID">
          <input id="btn-feedback" type="submit" name="submit-feedback" class="btn btn-dark text-white" value="Send">
          </div>
          </td>
          </tr>
          </tbody>
          ';
      };

      //echo $output;
      echo $output;

    } else {
      echo "<p class='alert alert-dark bg-dark text-white'>Student not found...</p>";
    }


?>