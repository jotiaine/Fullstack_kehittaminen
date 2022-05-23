<?php 
  // Modal to the index page to
  // ask if the user is a student or a teacher

?>

<!-- MODAL -->
<div id="myModal" class="modal">
  <div class="modal-dialog">
    <div class="modal-content bg-light">

      <!-- MODAL HEADER -->
      <div class="modal-header bg-dark text-light">
        <h5 id="modal-title" class="modal-title">Select One</h5>
        <button id="closeModal" type="button" class="btn-close btn-close-white"></button>
      </div>

      <!-- MODAL BODY -->
      <div class="modal-body shadow">
        <div class="d-flex justify-content-center">
          <button id="goBackBtn" type="button" class="btn btn-secondary d-none">Back</button>
        </div>
        <p id="modalHeadText" class="m-0">Are you a student or a teacher?</p>
      </div>

      <!-- MODAL FOOTER -->
      <div class="d-flex flex-column modal-footer justify-content-center">

        <div>
          <button id="student" type="button" class="btn btn-primary">Student</button>
          <a id="teacher" type="button" class="btn btn-secondary" href="index.php?user=teacher">Teacher</a>
        </div>  
              <!-- STUDENT FORM -->
              <form id="studentForm" class="m-0 text-center d-none  shadow-lg p-3" action="index.php?page=test&user=student" method="post">
                <div>
                  <input class="form-control" type="text" placeholder="first name" name="first_name" required>
                </div>
                <div  class="my-2">
                  <input class="form-control" type="text" placeholder="last name" name="last_name" required>
                </div>
                <div>
                  <input class="form-control" type="email" placeholder="email" name="email" required>
                </div>
                <div>
                  <button id="submit-student" type="submit" class="btn btn-dark mt-3 shadow-lg" name="submit-student">BEGIN</button>
                </div>
              </form>

      </div>
    </div>
  </div>
</div>

<!-- For test purposes -->
<div class="jumbotron ">
  <h1 class="my-0 mt-0 display-3 text-light bg-dark p-3 text-center">Welcome to Datadrivers</h1>
</div>
<div id="hero-container">
  <img id="hero-pic" class="img-fluid" src="img/hero.jpg"/>
  <h2 id="hero-text" class="display-2 text-white text-center m-0 w-100 shadow-sm">
    Become an expert <span id="driver-text" class="fw-bold text-danger">Driver</span>
    <p id="hero-auto-text" class="text-white"></p>
  </h2>  
<div>


