<?php

                // QUESTION
                class Question_Series {

                  function __construct($questionID , $question_1, $question_2, $question_3, $opt_1_1, $opt_1_2,	$opt_1_3, $opt_2_1, $opt_2_2, $opt_2_3, $opt_3_1, $opt_3_2, $opt_3_3, $correct_answer_1, $correct_answer_2, $correct_answer_3) {
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
                    $this -> correct_answer_1 = $correct_answer_1;
                    $this -> correct_answer_2 = $correct_answer_2;
                    $this -> correct_answer_3 = $correct_answer_3;
                  }
                } 
  
?>