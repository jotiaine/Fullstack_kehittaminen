<?php 
  // Modal to the index page to
  // ask if the user is a student or a teacher

?>

<!-- MODAL -->
<div id="myModal" class="modal">
  <div class="modal-dialog ">
    <div class="modal-content bg-light ">

      <!-- MODAL HEADER -->
      <div class="modal-header bg-dark text-light ">
        <h5 id="modal-title" class="modal-title">Select One</h5>
        <button id="closeModal" type="button" class="btn-close btn-close-white"></button>
      </div>

      <!-- MODAL BODY -->
      <div class="modal-body">
        <div class="d-flex justify-content-center">
          <button id="goBackBtn" type="button" class="btn btn-secondary d-none">Back</button>
        </div>
        <p id="modalHeadText" class="m-0">Are you a student or a teacher?</p>
      </div>

      <!-- MODAL FOOTER -->
      <div class="d-flex flex-column modal-footer justify-content-center">

        <div>
          <button id="student" type="button" class="btn btn-primary">Student</button>
          <button id="teacher" type="button" class="btn btn-secondary">Teacher</button>
        </div>  

              <form id="studentForm" class="m-0 text-center d-none" action="main.php" method="post">
                <div>
                  <input class="form-control" type="text" placeholder="first name" name="first_name">
                </div>
                <div  class="my-2">
                  <input class="form-control" type="text" placeholder="last name" name="last_name">
                </div>
                <div>
                  <input class="form-control" type="email" placeholder="email" name="email">
                </div>
                <div>
                  <button type="submit" class="btn btn-dark mt-3">BEGIN</button>
                </div>
              </form>

      </div>
    </div>
  </div>
</div>

