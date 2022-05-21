<?php
  require('includes/dbConnect.php'); 

    /*
    ********************************
    **     Feedback with ajax     **
    ********************************
    */

    
    // $sql = "SELECT student.first_name , student.last_name, student.studentID, testID, test.questionID, question.question_1, question.question_2, question.question_3, question.correct_answer_1, question.correct_answer_2, question.correct_answer_3, user_answer_1, user_answer_2, user_answer_3, score, teacher_feedback, creationDate FROM test JOIN question ON test.questionID = question.questionID JOIN student ON test.studentID = student.studentID";
    $sql = "SELECT * FROM test INNER JOIN student ON test.studentID = student.studentID ORDER BY student.first_name, student.last_name, student.studentID";
    $result = $conn -> query($sql);
    $rows = mysqli_num_rows($result);
    
?>

<div id="feedback-container" class="container-fluid d-flex flex-column align-items-center justify-content-center text-center bg-dark h-100">
  <div id="header-feedback" class='FAQ-header text-white shadow w-100 mb-3'>
    <h1 class="display-2 m-0">STUDENTS</h1>
    <div class='FAQ-instruction'>
      <p class="m-0">Press student and open test</p>
    </div>
  </div>
  
  <!-- SEARCH BAR & AJAX -->
  <div  id="search-bar" class="input-group d-flex justify-content-center align-center pb-3 shadow-sm w-75">
    <div class="form-outline">
      <input id="search-text" name="search-text" type="text" class="form-control bordered border-primary bg-dark text-white" placeholder="Search" />
    </div>
    <button id="search-icon" type="button" class="btn btn-primary">
      <i  class="fas fa-search"></i>
    </button>
  </div>
  
  <table id="search-result" class="table-style table gy-3 text-light table-borderless table-dark table-striped table-hover d-none w-50 mb-5 shadow"></table>
  
  <table  id="feedback-table" class="table-style table text-light table-borderless table-dark table-striped table-hover w-50 shadow">
    <!-- Results here -->
    <?php 
        if($rows > 0) {
          // Tests exist, print the tests
          $i = 0;
          while($i < $rows) {
            while($row = $result -> fetch_assoc()) {
              
              
              for($x = 0; $x < 1; $x++) {
                $studentID = $row['studentID'];
                $testID = $row['testID'];
                $first_name = $row['first_name'];
                $last_name = $row['last_name'];
                echo "<thead id='$studentID'>";
                echo "<th id='th-feedback' colspan='2' class='student-name display-4'>" . $studentID . " " . $first_name . " " . $last_name . "</th>";
                echo "</thead>";
                echo "<tbody class='student-body'>";
                
                foreach($row as $key => $value) {
                  if($key == "teacher_feedback") {
                    echo "<tr id='tr-feedback' class=' student-row table-dark'>";
                    echo "<td class='feedback-hover'>". $key . "</td>" ;
                    // Teacher feedback value
                    echo "<td class='feedback-hover current_teacher_feedback_td fs-5 text-primary'>";
                    echo $value;
                    echo  "</td>" ;
                    // DELETE ICON onclick with AJAX
                    echo "<td>";
                    echo "<i name='delete-icon' class='delete-icon fa fa-trash'></i>";
                    /* studentID & testID hidden */
                    echo "<input type='hidden' value='$testID'>";
                    echo "</td>";

                    
                  } else {
                    echo "<tr id='tr-feedback' class='student-row table-dark'>";
                    echo "<td>". $key . "</td>" ;
                    echo "<td>" . $value . "</td>" ;
                    echo "</tr>";
                    
                  }
                }
                echo "</tr>";
                echo "<td colspan='2' class='px-4 py-3'>";
                echo "<label for='teacher_feedback' class='form-label text-light shadow'>Feedback</label>";
                // Teacher feedback value
                echo "<textarea type='text' name='teacher_feedback' class='textarea-feedback form-control bg-dark text-white border-0 shadow' placeholder='The test went well!' required>";
                echo "</textarea>";
                echo "<div class='mt-2'>";
                // Updating feedback to DB using AJAX
                echo "<button name='submit-feedback' class='submit-feedback btn btn-dark text-white shadow'>";
                echo "Send</button>";
                /* testID hidden */
                echo "<input type='hidden' value='$testID'>";
                echo "</div>";
                echo "</td>";

                echo "</tbody>";
                
              }
            }
            
            
            $i++;

          }
      
        } 
        // echo "<p class='alert alert-warning'>No Tests!</p>"
      
      ?>

  </table>
  
</div>
