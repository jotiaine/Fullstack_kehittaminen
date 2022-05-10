<?php 

  $sql='SELECT * FROM question WHERE questionID = 2';

  $result = mysqli_query($conn, $sql);

  $questions = mysqli_fetch_assoc($result);

  mysqli_free_result($result);

  $conn->close();

?>
  <div style="visibility: hidden;" class="container pt-5 center p-5 text-center bg-light" id="q-form">
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
  </form>         
  </div> 

  <div class="container pt-5 center p-5 text-center bg-light">

     <button id="btn"> Show nudes! </button>
     
</div>

<script>
  const btn = document.getElementById('btn');

    btn.addEventListener('click', () => {
      const form = document.getElementById('q-form');

      if (form.style.visibility === 'hidden') {
        form.style.visibility = 'visible';
      } else {
        form.style.visibility = 'hidden';
      }
});
</script>
