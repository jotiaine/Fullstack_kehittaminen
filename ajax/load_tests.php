<?php 
  include("../includes/dbConnect.php");
  $output = "";
  
  if(isset($_POST['query'])) {
    $searchTxt = $conn -> real_escape_string($_POST['query']);
    
    $sql = "SELECT * FROM test INNER JOIN student ON test.studentID = student.studentID WHERE student.first_name LIKE '%$searchTxt%' OR last_name LIKE '%$searchTxt%' ORDER BY student.first_name, student.last_name";
  } else {
    $sql = "SELECT * FROM test INNER JOIN student ON test.studentID = student.studentID ORDER BY student.first_name, student.last_name LIMIT 1";
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
        $link = "#" . $studentID;
        $output .= '
          <thead class="search-tbody-toggle">;
            <th colspan="2" class="student-name-search display-4">' . $first_name . " " . $last_name . '
            <a href="' . $link . '" class="text-white">
              <i id="link-to-student" class="fa-solid fa-anchor text-primary hover"></i>
            </a>
            </th>
            </thead>
            <tbody class="search-table-body">
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
              <tr class="feedback-hover">
                <td>teacher_feedback</td>
                <td>' . $teacher_feedback . '</td>
              </tr>
              <tr>
              <td colspan="2" class="px-4 py-3">
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