<?php
  require_once('includes/dbConnect.php'); 

    /*
    ********************************
    ** Get students and their tests from db **
    ** and use AJAX to update the part of the site to get more tests & students? **
    ** Udate Teacher feedback to db****
    ** First done without AJAX **
    ** JSON prolly not needed here **
    ********************************
    */

    
    // Updating feedback to DB using AJAX
    
    $sql = "SELECT * FROM test INNER JOIN student ON test.studentID = student.studentID ORDER BY student.last_name, student.first_name, student.studentID";
    $result = $conn -> query($sql);
    $rows = mysqli_num_rows($result);

  if(isset($_POST['submit-feedback'])) {
    
  $hiddenStudentID = $conn->real_escape_string($_REQUEST['hiddenStudentID']);
  $teacher_feedback = $conn->real_escape_string($_POST['teacher_feedback']);
  echo "<p class='alert alert-success'>". $hiddenStudentID . "</p>";
  echo "<p class='alert alert-success'>" . $teacher_feedback . "</p>";
  $sql = "UPDATE test SET teacher_feedback = '$teacher_feedback' WHERE studentID = '$hiddenStudentID'";
  $result = $conn -> query($sql);

  if($result) echo "<p class='alert alert-success'>Updating feedback for studentID:" . $hiddenStudentID . " is a success!</p>";
  else echo "<p class='alert alert-warning'>Updating feedback failed</p>";
  //$conn -> close();
}

?>

<div class="container-fluid d-flex flex-column align-items-center justify-content-center text-center bg-dark h-100">
  <div id="header-feedback" class='FAQ-header text-white shadow w-100 mb-3'>
    <h1 class="display-2 m-0">STUDENTS</h1>
    <div class='FAQ-instruction'>
      <p class="m-0">Press student and open test</p>
    </div>
  </div>

  <!-- SEARCH BAR & AJAX -->
  <div class="input-group d-flex justify-content-center align-center pb-3 shadow-sm w-75">
    <div class="form-outline">
      <input id="search-text" name="search-text" type="text" class="form-control" placeholder="Search" />
    </div>
    <button type="button" class="btn btn-primary">
      <i class="fas fa-search"></i>
    </button>
  </div>

  <table id="search-result" class="table table-striped table-dark text-white d-none w-50 mb-5"></table>

  <table id="feedback-table" class="table table-dark table-striped table-bordered table-hover w-50 text-center shadow">
      <!-- Results here -->
      <?php 
        if($rows > 0) {
          // Tests exist, print the tests
          $i = 0;
          while($i < $rows) {
            while($row = $result -> fetch_assoc()) {
              
              
              for($x = 0; $x < 1; $x++) {
                $studentID = $row['studentID'];
                $first_name = $row['first_name'];
                $last_name = $row['last_name'];
                echo "<thead>";
                echo "<th id='th-feedback' colspan='2' class='student-name display-4'>" . $studentID . " " . $first_name . " " . $last_name . "</th>";
                echo "</thead>";
                echo "<tbody class='student-body'>";
                
                foreach($row as $key => $value) {
                  echo "<tr id='tr-feedback' class='student-row table-dark'>";
                  echo "<td>". $key . "</td>" ;
                  echo "<td>" . $value . "</td>" ;
                  echo "</tr>";
                }
                /* FORM */
                //echo "<form action='index.php?page=feedback&user=teacher' method='post'>";
                echo "<td colspan='2' class='px-4 py-3'>";
                echo "<label for='feedback' class='form-label text-danger'>Feedback</label>";
                echo "<textarea name='teacher_feedback' id='feedback' class='form-control bg-dark text-white border border-danger' placeholder='The test went well!' required>";
                echo "</textarea>";
                echo "<div class='mt-2'>";
                /* Sending studentID & testID hidden in form input */
                echo "<input type='hidden' name='hiddenStudentID' id='hiddenStudentID' value='$studentID'>";
                echo "<input type='hidden' name='hiddenTestID' id='hiddenTestID' value='$testID'>";
                echo "<input type='submit' name='submit-feedback' class='btn btn-dark text-white submit-feedback' id='submit-feedback' value='Send'>";
                echo "</div>";
                echo "</td>";
                //echo "</form>";
                /* /FORM */
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
