<?php 
/**
 *  file:   about_teacher.php
 *  desc:   Shows information about the students and exams for the teachers, sorting with buttons.
 * 
 */
?>

<?php
include('dbConnect.php');

$sql='SELECT test.testID, student.studentID, student.first_name, student.last_name, student.email, test.score, test.teacher_feedback, test.creationDate
FROM test
INNER JOIN student ON test.studentID = student.studentID
ORDER by student.last_name, student.first_name, student.studentID';

if(isset($_POST['Koe_ID'])) {
  $sql='SELECT test.testID, student.studentID, student.first_name, student.last_name, student.email, test.score, test.teacher_feedback, test.creationDate
  FROM test
  INNER JOIN student ON test.studentID = student.studentID
  ORDER by test.testID';
}

if(isset($_POST['Koe_ID2'])) {
  $sql='SELECT test.testID, student.studentID, student.first_name, student.last_name, student.email, test.score, test.teacher_feedback, test.creationDate
  FROM test
  INNER JOIN student ON test.studentID = student.studentID
  ORDER by test.testID DESC';
}

if(isset($_POST['Oppilaan_ID'])) {
  $sql='SELECT test.testID, student.studentID, student.first_name, student.last_name, student.email, test.score, test.teacher_feedback, test.creationDate
  FROM test
  INNER JOIN student ON test.studentID = student.studentID
  ORDER by student.studentID';
}

if(isset($_POST['Oppilaan_ID2'])) {
  $sql='SELECT test.testID, student.studentID, student.first_name, student.last_name, student.email, test.score, test.teacher_feedback, test.creationDate
  FROM test
  INNER JOIN student ON test.studentID = student.studentID
  ORDER by student.studentID DESC';
}

if(isset($_POST['Etunimi'])) {
  $sql='SELECT test.testID, student.studentID, student.first_name, student.last_name, student.email, test.score, test.teacher_feedback, test.creationDate
  FROM test
  INNER JOIN student ON test.studentID = student.studentID
  ORDER by student.first_name';
}

if(isset($_POST['Etunimi2'])) {
  $sql='SELECT test.testID, student.studentID, student.first_name, student.last_name, student.email, test.score, test.teacher_feedback, test.creationDate
  FROM test
  INNER JOIN student ON test.studentID = student.studentID
  ORDER by student.first_name DESC';
}

if(isset($_POST['Sukunimi'])) {
  $sql='SELECT test.testID, student.studentID, student.first_name, student.last_name, student.email, test.score, test.teacher_feedback, test.creationDate
  FROM test
  INNER JOIN student ON test.studentID = student.studentID
  ORDER by student.last_name';
}

if(isset($_POST['Sukunimi2'])) {
  $sql='SELECT test.testID, student.studentID, student.first_name, student.last_name, student.email, test.score, test.teacher_feedback, test.creationDate
  FROM test
  INNER JOIN student ON test.studentID = student.studentID
  ORDER by student.last_name DESC';
}

if(isset($_POST['Email'])) {
  $sql='SELECT test.testID, student.studentID, student.first_name, student.last_name, student.email, test.score, test.teacher_feedback, test.creationDate
  FROM test
  INNER JOIN student ON test.studentID = student.studentID
  ORDER by student.email';
}

if(isset($_POST['Email2'])) {
  $sql='SELECT test.testID, student.studentID, student.first_name, student.last_name, student.email, test.score, test.teacher_feedback, test.creationDate
  FROM test
  INNER JOIN student ON test.studentID = student.studentID
  ORDER by student.email DESC';
}

if(isset($_POST['Pisteet'])) {
  $sql='SELECT test.testID, student.studentID, student.first_name, student.last_name, student.email, test.score, test.teacher_feedback, test.creationDate
  FROM test
  INNER JOIN student ON test.studentID = student.studentID
  ORDER by test.score, student.studentID DESC';   //studentID is another search parameter because score is 1 or 0 or empty,
}                                                  //assumption is that latest students are without feedback -> studentID DESC

if(isset($_POST['Pisteet2'])) {
  $sql='SELECT test.testID, student.studentID, student.first_name, student.last_name, student.email, test.score, test.teacher_feedback, test.creationDate
  FROM test
  INNER JOIN student ON test.studentID = student.studentID
  ORDER by test.score DESC, student.studentID DESC';
}

if(isset($_POST['Palaute'])) {
  $sql='SELECT test.testID, student.studentID, student.first_name, student.last_name, student.email, test.score, test.teacher_feedback, test.creationDate
  FROM test
  INNER JOIN student ON test.studentID = student.studentID
  ORDER by test.teacher_feedback';
}

if(isset($_POST['Palaute2'])) {
  $sql='SELECT test.testID, student.studentID, student.first_name, student.last_name, student.email, test.score, test.teacher_feedback, test.creationDate
  FROM test
  INNER JOIN student ON test.studentID = student.studentID
  ORDER by test.teacher_feedback DESC';
}

if(isset($_POST['Koepaiva'])) {
  $sql='SELECT test.testID, student.studentID, student.first_name, student.last_name, student.email, test.score, test.teacher_feedback, test.creationDate
  FROM test
  INNER JOIN student ON test.studentID = student.studentID
  ORDER by test.creationDate';
}

if(isset($_POST['Koepaiva2'])) {
  $sql='SELECT test.testID, student.studentID, student.first_name, student.last_name, student.email, test.score, test.teacher_feedback, test.creationDate
  FROM test
  INNER JOIN student ON test.studentID = student.studentID
  ORDER by test.creationDate DESC';
}

$result=$conn->query($sql);
$howMany=mysqli_num_rows($result);
$examPassed = 0;
$feedBackMissing = 0;
$examFailed = 0;
$failedExamFeedback = 0;

?>
<div class='container-fluid d-flex flex-column align-items-center justify-content-center text-center bg-dark text-white'>
  <h5 id="main-title" class="display-1 text-light text-center">Yhteenvetoa opiskelijoiden tiedoista:</h5>
  <a href = "#report" id="report-heading1" class="btn mb-3 mt-3">Suora linkki raporttikohtaan</a>
  <a href = "#exams" id="report-heading2" class="btn ">Suora linkki koekysymyskohtaan</a>
</div>

<div class="container-fluid">
<table class="table-style table text-muted table-borderless table-dark table-striped table-hover w-75 mb-5 shadow mx-auto">
    <thead>
      <tr>
        <th>Koe ID</th>
        <th>Oppilaan ID</th>
        <th>Etunimi</th>
        <th>Sukunimi</th>
        <th>Email</th>
        <th>Pisteet</th>
        <th>Palaute</th>
        <th>Koepäivä</th>
        <th>Sertifikaatti</th>
      </tr>
      <tr>
      <th>
        <!--<th>Koe ID</th>-->
        <form class="d-flex gap-1" method="post">
            <input class="btn btn-secondary text-dark fw-bold" type="submit" name="Koe_ID" value="<"/>
            <input class="btn btn-secondary text-dark fw-bold" type="submit" name="Koe_ID2" value=">"/>
        </form>
        
        <!--<th>Oppilaan ID</th>-->
        <th><form class="d-flex gap-1" method="post">
            <input class="btn btn-secondary text-dark fw-bold" type="submit" name="Oppilaan_ID" value="<"/>
            <input class="btn btn-secondary text-dark fw-bold" type="submit" name="Oppilaan_ID2" value=">"/>
        </form>
        
        <!--<th>Etunimi</th>-->
        <th><form class="d-flex gap-1" method="post">
            <input class="btn btn-secondary text-dark fw-bold" type="submit" name="Etunimi" value="<"/>
            <input class="btn btn-secondary text-dark fw-bold" type="submit" name="Etunimi2" value=">"/>
        </form>
        
        <!--<th>Sukunimi</th>-->
        <th><form class="d-flex gap-1" method="post">
            <input class="btn btn-secondary text-dark fw-bold" type="submit" name="Sukunimi" value="<"/>
            <input class="btn btn-secondary text-dark fw-bold" type="submit" name="Sukunimi2" value=">"/>
        </form>
        
        <!--<th>Email</th>-->
        <th><form class="d-flex gap-1" method="post">
            <input class="btn btn-secondary text-dark fw-bold" type="submit" name="Email" value="<"/>
            <input class="btn btn-secondary text-dark fw-bold" type="submit" name="Email2" value=">"/>
        </form>
        
        <!--<th>Pisteet</th>-->
        <th><form class="d-flex gap-1" method="post">
            <input class="btn btn-secondary text-dark fw-bold" type="submit" name="Pisteet" value="<"/>
            <input class="btn btn-secondary text-dark fw-bold" type="submit" name="Pisteet2" value=">"/>
        </form>
        
        <!--<th>Palaute</th>-->
        <th><form class="d-flex gap-1" method="post">
            <input class="btn btn-secondary text-dark fw-bold" type="submit" name="Palaute" value="<"/>
            <input class="btn btn-secondary text-dark fw-bold"  type="submit" name="Palaute2" value=">"/>
        </form>
        
        <!--<th>Koepäivä</th>-->
        <th><form class="d-flex gap-1" method="post">
            <input class="btn btn-secondary text-dark fw-bold" type="submit" name="Koepaiva" value="<"/>
            <input class="btn btn-secondary text-dark fw-bold" type="submit" name="Koepaiva2" value=">"/>
        </form>        
      </tr>
    </thead>
    <tbody>
      <?php
      while($row=$result->fetch_assoc()){
          echo '<tr>';
          echo '<td>'.$row['testID'].'</td>';
          echo '<td>'.$row['studentID'].'</td>';
          echo '<td>'.$row['first_name'].'</td>';
          echo '<td>'.$row['last_name'].'</td>';
          echo '<td>'.$row['email'].'</td>';
          echo '<td>'.$row['score'].'</td>';

          if (($row['teacher_feedback'] == 0 || $row['teacher_feedback'] == 'NULL') && $row['teacher_feedback'] != "") {
            echo '<td class="red">'.'Palaute puuttuu'.'</td>';  //Sql search produces results according to database values:
          }                                                     //"", 0, NULL, or feedback texts ->some "Palaute puuttuu"
          else {                                                //lines after feedback texts bacause of this.
          echo '<td>'.$row['teacher_feedback'].'</td>';
          }

          echo '<td>'.$row['creationDate'].'</td>';
          
          if ($row['score'] == 1) {
            $examPassed++;
            if ($row['teacher_feedback'] == "" || $row['teacher_feedback'] == 0 || $row['teacher_feedback'] == 'NULL') {
              $feedBackMissing++;
            }
            echo '<td><a class="btn btn-primary text-white" href = index.php?page=cerPDF&user=teacher&pID='.$row['studentID'].'>Tulosta</a></td>';

          } else if ($row['score'] == 0 && $row['score'] != "" && $row['score'] != 'NULL'){
              $examFailed++;
              if ($row['teacher_feedback'] == 'NULL') {
                $failedExamFeedback++;
              }             
              echo '<td>'.'Odottaa uusintaa'.'</td>';
          }         
           else {
            echo '<td>'.'Odottaa suoritusta'.'</td>';
          }
          echo '</tr>';        
      }
      ?>
    </tbody>
  </table>
  </div>

  <h2 id="report" class="display-4 text-light text-center">Opiskelijoita yhteensä: <?php echo $howMany ?> kpl</h2>
 
 <div class='table-style table text-muted table-borderless table-dark table-striped table-hover w-50 mb-5 shadow mx-auto heading-container-summary'>
 <h4 class="display-5 text-light text-center">Lukuja koesuorituksista:</h4>
 <div class='container-fluid d-flex flex-column align-items-center justify-content-center text-center bg-dark h-100'>
   <div class='text-box'>
     <p>Kokeen hyväksytysti suorittaneita opiskelijoita:
     </p>
     <div class='number'>
       <p class="text-light"><?php echo $examPassed ?> kpl</p>
     </div>
   </div>
   <div class='text-box'>
     <p>Palaute annettu kokeen hyväksytysti suorittaneille:
     </p>
     <div class='number'>
       <p class="text-light"><?php echo ($examPassed - $feedBackMissing) ?> kpl</p>
   </div>
   </div>
   <div class='text-box'>
     <p>Palaute kokeesta antamatta sen hyväksytysti suorittaneille:
     </p>
     <div class='number'>
       <p class="text-light"><?php echo $feedBackMissing ?> kpl</p>
   </div>
   </div>
   <p></p>
   <div class='text-box'>
     <p>Kokeen hylättynä suorittaneita opiskelijoita:
     </p>
     <div class='number'>
       <p class="text-light"><?php echo $examFailed ?> kpl</p>
   </div>
   </div>
   <div class='text-box'>
     <p>Palaute annettu kokeen hylättynä suorittaneille:
     </p>
     <div class='number'>
       <p class="text-light"><?php echo ($examFailed - $failedExamFeedback) ?> kpl</p>
   </div>
   </div>
   <div class='text-box'>
     <p>Palaute kokeesta antamatta sen hylättynä suorittaneille:
     </p>
     <div class='number'>
       <p class="text-light"><?php echo $failedExamFeedback ?> kpl</p>
   </div>
   </div>
 </div>
 <div class='table table-striped table-dark text-white'></div><br>
</div>
<div class="d-flex justify-content-center">
 <a href = "#main-title" class="btn btn-primary text-dark mx-auto">Takaisin ylös</a>
</div>
<?php

$sql='SELECT test.testID, question.questionID, question.question_1, question.question_2, question.question_3, 
question.correct_answer_1, question.correct_answer_2, question.correct_answer_3, test.score, test.creationDate
FROM test
INNER JOIN question ON test.questionID = question.questionID
ORDER by testID';
$result=$conn->query($sql);
$rows=mysqli_num_rows($result);
?>

<div class="container-fluid">
<div class='container-fluid d-flex flex-column align-items-center justify-content-center text-center bg-dark h-100 text-white mt-5'>
  <h5 id="exams" class="display-4 text-light text-center">Muodostettujen kokeiden kysymykset ja oikeat vastaukset:</h5>
</div>
<h6 class="display-5 text-light text-center">Kokeita yhteensä: <?php echo $rows ?>kpl</h6>
<table class="table-style table text-muted table-borderless table-dark table-striped table-hover w-75 mb-5 shadow mx-auto">
    <thead>
      <tr>
        <th>Koe_ID</th>
        <th>Koepäivä</th>
        <th>Kysymys 1</th>
        <th>1 Oikea vastaus</th>
        <th>Kysymys 2</th>
        <th>2 Oikea vastaus</th>
        <th>Kysymys 3</th>
        <th>3 Oikea vastaus</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while($row=$result->fetch_assoc()){
          echo '<tr>';
          echo '<td>'.$row['testID'].'</td>';
          echo '<td>'.$row['creationDate'].'</td>';
          echo '<td>'.$row['question_1'].'</td>';
          echo '<td>'.$row['correct_answer_1'].'</td>';
          echo '<td>'.$row['question_2'].'</td>';
          echo '<td>'.$row['correct_answer_2'].'</td>';
          echo '<td>'.$row['question_3'].'</td>';          
          echo '<td>'.$row['correct_answer_3'].'</td>';
          echo '</tr>';        
      }
      ?>
    </tbody>
  </table>
  <div class="d-flex justify-content-center mb-5">
    <a href = "#main-title" class="btn btn-primary text-dark mx-auto">Takaisin ylös</a>
  </div>
</div>



