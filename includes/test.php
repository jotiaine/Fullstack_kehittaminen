<?php 

$sql='SELECT * FROM question WHERE questionID = 2';

$result = mysqli_query($conn, $sql);

$questions = mysqli_fetch_assoc($result);

mysqli_free_result($result);

$conn->close();
//Needs shuffle
?>

  <div id="start-btn-container" class="container-fluid pb-5 pt-3 text-center bg-light">
    <h2 class="mb-4">Ready to start?</h2>
    <button id="start-test-btn" class="btn btn-dark text-white"> Show nudes! </button>
  </div>

  <div id="test-container" class="container p-5 text-center bg-light">
    <form action="index.php?page=test&user=student" method="get">
      <h3 class="mb-3"> Test of Mensa </h3><br><br>

        <h4 class="mb-3"> <?php echo htmlspecialchars($questions['question_1']); ?> </h4>

          <input class="form-check-input" type="radio" name="radioBtn" id="answerSerie-1.1"/>
          <label class="form-check-label" for="answerSerie-1.1"> Vastaus 1 </label><br>

          <input class="form-check-input" type="radio" name="radioBtn" id="answerSerie-1.2"/>
          <label class="form-check-label" for="answerSerie-1.2"> Vastaus 2 </label><br>

          <input class="form-check-input" type="radio" name="radioBtn" id="answerSerie-1.3"/>
          <label class="form-check-label" for="answerSerie-1.3"> Vastaus 3 </label><br>
  </form>
  <form action="index.php?page=test&user=student" class="pt-4" method="get">

          <h4 class="mb-3"> <?php echo htmlspecialchars($questions['question_2']); ?> </h4>

            <input class="form-check-input" type="radio" name="radioBtn" id="answerSerie-2.1"/>
            <label class="form-check-label" for="answerSerie-2.1"> Vastaus 1 </label><br>

            <input class="form-check-input" type="radio" name="radioBtn" id="answerSerie-2.2"/>
            <label class="form-check-label" for="answerSerie-2.2"> Vastaus 2 </label><br>

            <input class="form-check-input" type="radio" name="radioBtn" id="answerSerie-2.3"/>
            <label class="form-check-label" for="answerSerie-2.3"> Vastaus 3 </label><br>
  </form>

  <form action="index.php?page=test&user=student" class="pt-4" method="get">

          <h4 class="mb-3"> <?php echo htmlspecialchars($questions['question_3']); ?> </h4>

            <input class="form-check-input" type="radio" name="radioBtn" id="answerSerie-3.1"/>
            <label class="form-check-label" for="answerSerie-3.1"> Vastaus 1 </label><br>

            <input class="form-check-input" type="radio" name="radioBtn" id="answerSerie-3.2"/>
            <label class="form-check-label" for="answerSerie-3.2"> Vastaus 2 </label><br>

            <input class="form-check-input" type="radio" name="radioBtn" id="answerSerie-3.3"/>
            <label class="form-check-label" for="answerSerie-3.3"> Vastaus 3 </label><br>
            
            <div id="submit-btn-container" class="container-fluid py-5 text-center bg-light">
              <button id="submit-test-btn" class="btn btn-dark text-white" type="submit" name="submit"> Submit </button>
            </div>
  </form>         
  </div> 


