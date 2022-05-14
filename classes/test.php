<?php 

                // TEST
                class Test {

                  function __construct($testID, $studentID, $questionID, $question_1, $question_2, $question_3, $opt_1_1, $opt_1_2,	$opt_1_3, $opt_2_1, $opt_2_2, $opt_2_3, $opt_3_1, $opt_3_2, $opt_3_3, $user_answer_1, $user_answer_2, $user_answer_3, $score, $teacher_feedback, $date) {
                    $this -> testID = $testID;
                    $this -> studentID = $studentID;
                    $this -> questionID = $questionID;
                    $this -> question_1 = $question_1;
                    $this -> question_2 = $question_2;
                    $this -> question_3 = $question_3;
                    $this -> opt_1_1 = $opt_1_1;
                    $this -> opt_1_2 = $opt_1_2;
                    $this -> opt_1_3 = $opt_1_3;
                    $this -> opt_2_1 = $opt_2_1;
                    $this -> opt_2_2 = $opt_2_2;
                    $this -> opt_2_3 = $opt_2_3;
                    $this -> opt_3_1 = $opt_3_1;
                    $this -> opt_3_2 = $opt_3_2;
                    $this -> opt_3_3 = $opt_3_3;
                    $this -> user_answer_1 = $user_answer_1;
                    $this -> user_answer_2 = $user_answer_2;
                    $this -> user_answer_3 = $user_answer_3;
                    $this -> score = $score;
                    $this -> teacher_feedback = $teacher_feedback;
                    $this -> date = $date;
                  }

                  // Some methods just in case if they are needed at front-end side

                  public function getScore() {
                    return $this -> score;
                  }

                  public function getDate() {
                    return $this -> date;
                  }                  
                } 

?>