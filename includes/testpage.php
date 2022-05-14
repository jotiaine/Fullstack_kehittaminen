<?php 
  /*
    Testpage

    Alla oleva koodi näyttää mahdollisen div-rakenteen testille. Sivusta on jätetty pois
    paljon tietokannan käsittelyyn liityvää koodia, jotta virheilmoitukset eivät peitä sivua.

    Tentin vastausten perässä eri vaihtoehtoja oikein/väärin ilmoitusten sijainnille

    CSS tyylit toimivat Firefoxilla. Toimi aikaisemmin myös Chromella, mutta sitten lakkasi toimimasta jostain syystä.
  */
?>

<?php

//include('classes/student.php');

$oppilas = new Student("456", "Mikko", "Mallikas", "mikko@mallikas.net");  // esimerkkioppilas


$sql='SELECT * FROM question WHERE questionID = 2';

$result = mysqli_query($conn, $sql);

$questions = mysqli_fetch_assoc($result);

mysqli_free_result($result);

$conn->close();

?>
 
    <div class='heading-container'>
      <h1>Tentti</h1>
      <div class='heading'>
        <div class='heading'>
          <p>Jokaiseen kysymykseen on olemassa yksi oikea vastaus. Valitse monivalintatehtävistä
             mielestäsi oikea vaihtoehto.
          </p>
        </div>
        <div class='studentName'>
            <p>Oppilas: <?= $oppilas->getFullName() ?></p>
        </div>
      </div>
    </div>

    <div id="start-btn-container" class="container-fluid pb-5 pt-3 text-center bg-light">
      <h3 class="mb-4">Ready to start?</h3>
      <button id="start-test-btn" class="btn btn-dark text-white"> Show nudes! </button>
    </div>

    <!-- QUESTION 1 -->
    <div class='question-container'>
      <div class='question'>
        <div class='question-text'><?php echo htmlspecialchars($questions['question_1']); ?></div>
      </div>
    </div>

    <div class='answer-container'>
      <div class='answer'>

        <form action="index.php?page=test&user=student" method="get">

          <div class="radio-button-box">
            <input class="form-check-input" type="radio" name="radioBtn1" id="answerSerie-1.1"/>
            <label class="form-check-label" for="answerSerie-1.1"> Vastaus 1 asdasdasdasdasd</label>
            <div class="resultCheck" id="pelialue2">Oikein</div>
          </div>

          <div class="radio-button-box">
            <input class="form-check-input" type="radio" name="radioBtn1" id="answerSerie-1.2"/>
            <label class="form-check-label" for="answerSerie-1.2"> Vastaus 2 </label>
            <div class="resultCheck" id="pelialue2"></div>
          </div>

          <div class="radio-button-box">
            <input class="form-check-input" type="radio" name="radioBtn1" id="answerSerie-1.3"/>
            <label class="form-check-label" for="answerSerie-1.3"> Vastaus 3 asdasdasdad</label>
            <div class="resultCheck" id="pelialue2">Väärin</div>
          </div> 
        
        </form>    

      </div>
    </div>

    <!-- QUESTION 2 -->
    <div class='question-container'>
      <div class='question'>
        <div class='question-text'><?php echo htmlspecialchars($questions['question_2']); ?></div>
      </div>
    </div>

    <div class='answer-container'>
      <div class='answer'>

        <form action="index.php?page=test&user=student" method="get">

          <div class="radio-button-box">
            <input class="form-check-input" type="radio" name="radioBtn2" id="answerSerie-2.1"/>
            <label class="form-check-label" for="answerSerie-2.1"> Vastaus 1 </label>
          </div>

          <div class="radio-button-box">
            <input class="form-check-input" type="radio" name="radioBtn2" id="answerSerie-2.2"/>
            <label class="form-check-label" for="answerSerie-2.2"> Vastaus 2 </label>
          </div>

          <div class="radio-button-box">
            <input class="form-check-input" type="radio" name="radioBtn2" id="answerSerie-2.3"/>
            <label class="form-check-label" for="answerSerie-2.3"> Vastaus 3 </label>
          </div>

        </form> 

        <div class="resultCheck" id="pelialue2">Oikein</div>
        
      </div>
    </div>
 
    <!-- QUESTION 3 -->
    <div class='question-container'>
      <div class='question'>
        <div class='question-text'><?php echo htmlspecialchars($questions['question_3']); ?></div>
      </div>
    </div>

    <div class='answer-container'>
      <div class='answer'>

        <form action="index.php?page=test&user=student" method="get">

          <div class="radio-button-box">
            <input class="form-check-input" type="radio" name="radioBtn3" id="answerSerie-3.1"/>
            <label class="form-check-label" for="answerSerie-3.1"> Vastaus 1 </label>
          </div>
          <div class="radio-button-box">
            <input class="form-check-input" type="radio" name="radioBtn3" id="answerSerie-3.2"/>
            <label class="form-check-label" for="answerSerie-3.2"> Vastaus 2 </label>
          </div>
          <div class="radio-button-box">
            <input class="form-check-input" type="radio" name="radioBtn3" id="answerSerie-3.3"/>
            <label class="form-check-label" for="answerSerie-3.3"> Vastaus 3 </label>
          </div>

        </form>  

      </div>
      <div class="resultCheck" id="pelialue2">Oikein</div>
    </div>
  

    <div class="button-container">
        <button id="tulokset" onclick = "jotain()" type="submit" id="submit">Palauta vastaukset</button>
    </div>

