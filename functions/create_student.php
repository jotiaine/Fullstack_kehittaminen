<?php 
                /*
                  Ohjelman toiminta:
                  1. Ladataaan index
                  2. Oppilas, Opettaja vai Default käyttäjä?
                    2.1 Default käyttäjä
                      - Näkymä: home, faq ja logosta -> vaihe 2.
                    2.2 Opettaja
                      - Näkymä: home, faq, raportti, palaute(feedback) ja logosta -> vaihe 2.
                      - Toiminnallisuudet:
                        - Raportti:
                          -> Mahdollisuus nähdä visuaalisesti tietokannan dataa raportti sivulla
                          -> Mahdollisuus ladata pdf-tiedoston datasta
                        - Palaute/Feedback
                          -> Ladataan kaikki testit ja koko sivu(ei AJAX, hirveä looppi renderoi testit)
                            -> AJAX
                              - send_feedback.php 
                              - delete_feedback.php
                              - search-toiminto -> load_tests.php
                            -> jQuery 
                              - sendFeedback()
                              - deleteFeedback()
                              - loadStudents()
                    2.3 Oppilas -> (submit-student -> create_student())
                      - Onko oppilas olemassa? if-else
                        - ON:
                          -> Ladataan koko sivu kerran(ei AJAX)
                          -> Testi tehty? if-else
                            - ON: 
                              - Hyväksytty || Hylätty
                                -> Näytetään testi
                            - EI:
                              -> Generoidaan uusi testi
                        - EI:
                          -> create_student() - if(isset(submit-student))
                            1. Tallennetaan oppilaan tiedot muuttujiin
                              - $first_name 
                              - $last_name 
                              - $email 
                            2. -> vaihe 2.3
                            3. SQL(INSERT) -> Uusi käyttäjä tietokantaan tauluun -> student
                            4. SQ(SELECT) -> Haetaan studentID
                              - $studentID
                            5. SQL(SELECT) -> Haetaan random testi tietokannasta
                                    - $questionID
                                    - Talllennetaan questionTableValues Arrayhin kysymyssarjan key => values
                                    - SQL(INSERT)
                                      -> Tauluihin test & reward uudet tyhjät rivit tietokantaan
                                        - Käytetään tähän mennessä haettuja muuttujia:
                                        - $studentID 
                                        - $questionID 

                            6. Luodaan oliot:
                              - student
                              - test
                              - reward
                              - question_series
                            7. Tallennetaan oliot JSON-tiedostoihin(file kansio):
                              - student.json
                              - test.json
                              - reward.json
                              - question_series.json
                            8. Funktio loppuu
                              - test ja reward taulut
                              - jäävät odottamaan päivityksiä
                              - testien teosta ja palautteista(SQL:UPDATE)
                            
                            
                            
                            
                              test.php

                  
                */
?>


<?php // Creating a student to the db
function create_student() {
              require('includes/dbConnect.php'); 

              
              /*
              ********************************
              ** FIRST NAME, LAST NAME, EMAIL **
              ********************************
              */
              $first_name = $conn->real_escape_string($_POST['first_name']);
              $last_name = $conn->real_escape_string($_POST['last_name']);
              $email = $conn->real_escape_string($_POST['email']);
              /******************************/

              // Testing if student exists
              $sql = "SELECT * FROM student WHERE first_name = '$first_name' AND last_name = '$last_name' AND email = '$email'";
              
              // Query result
              $result = $conn -> query($sql);

              /*
              ********************************
              ** IF STUDENT EXIST **
              ********************************
              */
              
              if($result -> num_rows > 0) {
                // - ON:
                // -> Ladataan koko sivu kerran(ei AJAX)
                // -> Testi tehty?
                //   - ON: 
                //     - Hyväksytty || Hylätty
                //       -> Näytetään testi
                //   - EI:
                //     -> Generoidaan uusi testi
                // User exists
                echo "<p class='alert alert-warning'>User exists!</p>";

                // studentID
                $row = mysqli_fetch_assoc($result);
                $studentID = $row['studentID'];
                echo "<p class='alert alert-success'>STudentID" . $studentID . "</p>";

                // Get score, creationDate
                $sql = "SELECT * FROM test WHERE studentID = '$studentID'";
                
                // Query result
                $result = $conn -> query($sql);
                if($result) {
                  echo "<p class='alert alert-success'>studentID success</p>";
                } else {
                  echo "<p class='alert alert-warning'>studentID failed</p>";
                }
                $row = mysqli_fetch_assoc($result);

                // Variables score & creationDate
                $score = $row['score'];
                $creationDate = $row['creationDate'];

                // Test approved || failed || is not done
                $testApproved = $score == 1;
                $testFailed = $score == 0 || $score == NULL && $creationDate != NULL;
                //$testIsNotDone = $score == 0 && $creationDate == NULL; 

                  // Test done
                  if($testApproved || $testFailed) {

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
                        $user_answer_1 = $row['user_answer_1'];
                        $user_answer_2 = $row['user_answer_2'];
                        $user_answer_3 = $row['user_answer_3'];
                        $score = $row['score'];
                        $creationDate = $row['creationDate'];
                        $teacher_feedback = $row['teacher_feedback'];
                        $level = $row['level'];
                        $certificate = $row['certificate'];
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
                          <div id="certificate-container" class="text-light border border-primary rounded p-3 shadow">
                              <h3 class="display-3 text-center shadow">Certificate<h3>
                              <p>Congratulations for completing the test succesfully!</p>
                              <p>Here"s your certificate</p>
                              <div class="d-flex justify-content-center align-items-center">
                                <span class="me-1">Download</span>
                                <i class="certificate fa fa-certificate text-primary"></i>                              </div>
                              </div>
                          </div>

                          ';

                    echo $output;


                    //return ;
                    if($result) {
                      echo "<p class='alert alert-success'>Query success</p>";
                    } else {
                      echo "<p class='alert alert-warning'>Query failed</p>";
                    }

                  } else {
                    // Test not done
                    // Generate new test
                    //return ;
                  }


              } else {

                /*
                ********************************
                ** IF STUDENT DOES NOT EXIST **
                ********************************
                */
                
                // INSERT STUDENT TO DB
                $sql = "INSERT INTO student (first_name, last_name, email) VALUES ('$first_name', '$last_name', '$email')";
                $result = $conn -> query($sql);
                
                // If insert succeeded?
                if($result) echo "<p class='alert alert-success'>Insert student is a success!</p>";
                else echo "<p class='alert alert-warning'>Insert student failed</p>";

                // Find studentID
                $sql = "SELECT studentID FROM student WHERE first_name = '$first_name' AND last_name = '$last_name' AND email = '$email'";
                $result = $conn -> query($sql);
                $row = mysqli_fetch_assoc($result);

                $studentID = $row['studentID'];
                // If query
                if($result) echo "<p class='alert alert-success'>Found the studenID!</p>";
                else echo "<p class='alert alert-warning'>Did not find studentID</p>";
                

                /*
                ********************************
                ** GENERATING A RANDOM QUESTIONNAIRE **
                ********************************
                */
                $sql = 'SELECT * FROM question';
                
                $result = mysqli_query($conn, $sql);
                // The "length" of question table
                $rows = mysqli_num_rows($result);
                
                // Random number between 1-$rows
                $randomQuestionID = rand(1, $rows);
                
                // Getting the questionID for random question_series
                if($rows > 0) {
                  $sql = "SELECT questionID FROM question WHERE questionID = '$randomQuestionID'";
                  $result = mysqli_query($conn, $sql); 
                  $row = mysqli_fetch_assoc($result);
                  $questionID = $row['questionID'];
                }
                
                //mysqli_free_result($result); 

                // QUESTION ROW
                $sql = "SELECT * FROM question WHERE questionID = '$questionID'";
                
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $questionTableValues = array();

                // Looping one question_series table values to an array
                foreach ($row as $key => $value) {
                  array_push($questionTableValues, $value);
                }   
                /******************************/

                
                /*
                ********************************
                ** INSERTING EMPTY TEST & REWARD **
                ** (will be updated after the test) **
                ** Student was inserted earlier **
                ********************************
                */

                // Creating empty test for the student
                $sql = "INSERT INTO test (studentID, questionID) VALUES ('$studentID', '$questionID')";
                $result = $conn -> query($sql);
                if($result) echo "<p class='alert alert-success'>Insert empty test is a success!</p>";
                else echo "<p class='alert alert-warning'>Empty test addition failed</p>";
                // Getting testID also
                $sql = "SELECT testID FROM test WHERE studentID = '$studentID'";
                $result = $conn -> query($sql);
                $row = mysqli_fetch_assoc($result);

                if($result) {
                  echo "<p class='alert alert-success'>Insert empty test is a success!</p>";
                  $testID = $row['testID'];
                }
                else echo "<p class='alert alert-warning'>Empty test addition failed</p>";
               
                // Creating empty reward row for student
                $sql = "INSERT INTO reward (studentID) VALUES ('$studentID')";
                $result = $conn -> query($sql);
                if($result) echo "<p class='alert alert-success'>Insert empty reward is a success!</p>";
                else echo "<p class='alert alert-warning'>Empty reward addition failed</p>";
                // Getting rewardID also
                $sql = "SELECT rewardID FROM reward WHERE studentID = '$studentID'";
                $result = $conn -> query($sql);
                $row = mysqli_fetch_assoc($result);

                if($result) {
                  echo "<p class='alert alert-success'>Getting rewardID is a success!</p>";
                  $rewardID = $row['rewardID'];
                }
                else echo "<p class='alert alert-warning'>Failed to get rewardID!</p>";
                
                /******************************/

               
                /*
                ********************************
                ** GENERATING OBJECTS **
                ********************************
                */
                
                // Generate student object
                $student = new Student($studentID, $first_name, $last_name, $email);
                echo "<pre class='bg-info p-3'>";
                echo print_r($student);
                echo "</pre>";
                
                // Generate test object
                $test = new Test($testID, $studentID, $questionID, $questionTableValues['1'], $questionTableValues['2'], $questionTableValues['3'], $questionTableValues['4'], $questionTableValues['5'], $questionTableValues['6'], $questionTableValues['7'], $questionTableValues['8'], $questionTableValues['9'], $questionTableValues['10'], $questionTableValues['11'], $questionTableValues['12'], 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL' );
                echo "<pre class='bg-info p-3'>";
                echo print_r($test);
                echo "</pre>";

                // Generate question_series object
                $question_series = new Question_Series($questionTableValues[0], $questionTableValues[1], $questionTableValues[2], $questionTableValues[3], $questionTableValues[4], $questionTableValues[5], $questionTableValues[6], $questionTableValues[7], $questionTableValues[8], $questionTableValues[9], $questionTableValues[10], $questionTableValues[11], $questionTableValues[12], $questionTableValues[13], $questionTableValues[14], $questionTableValues[15],); 
                echo "<pre class='bg-info p-3'>";
                echo print_r($question_series);
                echo "</pre>";
                
                // Generate reward object
                $reward = new Reward($rewardID, $studentID, '0', 'NULL');
                echo "<pre class='bg-info p-3'>";
                echo print_r($reward);
                echo "</pre>";
                /******************************/

  
  
  /*
  ********************************
  ** SAVING OBJECTS TO JSON FILES **
  ********************************
  */
  
  // Save Student object to student.json
  $fp = fopen('file/student.json', 'w');
  fwrite($fp, json_encode($student));
  fclose($fp);
  
  // Save Test object to test.json
  $fp = fopen('file/test.json', 'w');
  fwrite($fp, json_encode($test));
  fclose($fp);
  
  // Save Question_Qeries object to question_series.json
  $fp = fopen('file/question_series.json', 'w');
  fwrite($fp, json_encode($question_series));
  fclose($fp);
  
  // Save Reward object to reward.json
  $fp = fopen('file/reward.json', 'w');
  fwrite($fp, json_encode($reward));
  fclose($fp);
  
  
  
  /*
  ********************************
  ** AFTER THIS script **
  ** TEST & REWARD wait for UPDATES **
  ********************************
  */
  
  
  
  return $student;
              }
                      
  
              
}

?>


  
