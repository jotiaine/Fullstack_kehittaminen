<?php
  require('includes/dbConnect.php'); 

    /*
    ********************************
    **     Feedback with ajax     **
    ********************************
    */

    
    
    $sql = "SELECT * FROM test INNER JOIN student ON test.studentID = student.studentID ORDER BY student.last_name, student.first_name, student.studentID";
    $result = $conn -> query($sql);
    $rows = mysqli_num_rows($result);
    
?>

<div class="container-fluid d-flex flex-column align-items-center justify-content-center text-center bg-dark h-100">
  <div id="header-feedback" class='FAQ-header text-white shadow w-100 mb-3'>
    <h1 class="display-2 m-0">STUDENTS</h1>
    <div class='FAQ-instruction'>
      <p class="m-0">Press student and open test</p>
    </div>
  </div>
  
  <!-- SEARCH BAR & AJAX -->
  <div  id="search-bar" class="input-group d-flex justify-content-center align-center pb-3 shadow-sm w-75">
    <div class="form-outline">
      <input id="search-text" name="search-text" type="text" class="form-control bordered border-danger bg-dark text-white" placeholder="Search" />
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
                $testID = $row['testID'];
                $first_name = $row['first_name'];
                $last_name = $row['last_name'];
                echo "<thead id='$studentID'>";
                echo "<th id='th-feedback' colspan='2' class='student-name display-4'>" . $studentID . " " . $first_name . " " . $last_name . "</th>";
                echo "</thead>";
                echo "<tbody class='student-body'>";
                
                foreach($row as $key => $value) {
                  if($key == "teacher_feedback") {
                    echo "<tr id='tr-feedback' class='feedback-hover student-row table-dark'>";
                    echo "<td>". $key . "</td>" ;
                    echo "<td id='current_t_feedback'>";
                    echo $value;
                    echo  "</td>" ;
                    // DELETE ICON on click with AJAX
                    echo "<td>";
                    echo "<i id='delete-icon' name='delete-icon' class='fa fa-trash text-danger'></i>";
                    echo "</td>";
                    echo "</tr>";
                    
                  } else {
                    echo "<tr id='tr-feedback' class='student-row table-dark'>";
                    echo "<td>". $key . "</td>" ;
                    echo "<td>" . $value . "</td>" ;
                    echo "</tr>";
                    
                  }
                }
                echo "<td colspan='2' class='px-4 py-3'>";
                echo "<label for='feedback' class='form-label text-danger'>Feedback</label>";
                echo "<textarea name='teacher_feedback' id='feedback' class='form-control bg-dark text-white border border-danger' placeholder='The test went well!' required>";
                echo "</textarea>";
                echo "<div class='mt-2'>";
                /* studentID & testID hidden */
                echo "<input type='hidden' name='hiddenStudentID' id='hiddenStudentID' value='$studentID'>";
                echo "<input type='hidden' name='hiddenTestID' id='hiddenTestID' value='$testID'>";
                // Updating feedback to DB using AJAX
                echo "<button id='submit-feedback' name='submit-feedback' class='btn btn-dark text-white submit-feedback'>";
                echo "Send</button>";
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
