<?php
                // STUDENT
                class Student {
    
                  function __construct($studentID, $first_name, $last_name, $email) {
                    $this -> studentID = $studentID;
                    $this -> first_name = $first_name;
                    $this -> last_name = $last_name;
                    $this -> email = $email;
                  }


                  public function getFullName() {
                    $fullName = $this->first_name . ' ' . $this->last_name;
                    return $fullName;
                  }

                } 

?>