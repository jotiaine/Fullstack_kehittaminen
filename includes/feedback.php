<?php
  require_once('includes/dbConnect.php'); 

    /*
    ********************************
    ** Get students and their tests from db **
    ** and use AJAX to update the part of the site to get more tests & students? **
    ** JSON prolly not needed here **
    ********************************
    */

  $sql = "SELECT * FROM test INNER JOIN student ON test.studentID = student.studentID ORDER BY student.last_name, student.first_name, student.studentID";
  $result = $conn -> query($sql);
  $rows = mysqli_num_rows($result);
  // echo "pre";
  // echo print_r($rows);
  // echo "</pre>";


?>

<div class="container-fluid d-flex flex-column align-items-center justify-content-center text-center bg-dark">
  <div class='FAQ-header text-white'>
    <h1 class="display-2">STUDENTS</h1>
    <div class='FAQ-instruction'>
      <p>Press student and open test</p>
    </div>
  </div>

  <table id="feedback-table" class="table table-dark table-striped table-hover w-50 text-center">
      <!-- Results here -->
      <?php 
        if($rows > 0) {
          // Tests exist, print the tests
          $i = 0;
          while($i < $rows) {
            while($row = $result -> fetch_assoc()) {
              
              
              for($x = 0; $x < 1; $x++) {
                echo "<thead>";
                echo "<th colspan='2' class='student-name display-3'>" . $row['first_name'] . " " . $row['last_name'] . "</th>";
                echo "</thead>";
                echo "<tbody class='student-body'>";

                foreach($row as $key => $value) {
                  echo "<tr class='student-row table-dark'>";
                    echo "<td>". $key . "</td>" ;
                    echo "<td>" . $value . "</td>" ;
                  echo "</tr>";
                }
                echo "<td colspan='2' class='px-4 py-3'>";
                /* FORM */
                echo "<form method=''>";
                echo "<label for='feedback' class='form-label text-danger'>Feedback</label>";
                echo "<textarea id='feedback' class='form-control bg-dark text-white border border-danger'>";
                echo "</textarea>";
                echo "<div class='mt-2'>";
                echo "<button type='stubmit' name='submit-feedback' class='btn btn-dark text-white'>";
                echo "Send";
                echo "</button>";
                echo "</div>";
                echo "</form>";
                /* /FORM */
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