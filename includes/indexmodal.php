<?php 
  // Modal to the index page to
  // ask if the user is a student or a teacher

?>

<!-- My Modal -->

<!-- <div id="myModal-container" >
  <div id="modal-item">
    <h3>TEacher or not</h3>
    <h3>TEacher or not</h3>
    <h3>TEacher or not</h3>
  </div>
</div> -->

<!-- Modal -->
<!-- Modal -->
<!-- <div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content bg-dark"">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto, facilis.</p>
      </div>
      <div class="modal-footer">

        <form action="main.php" method="get">
          <a id="student" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Student</a>
          <a id="teacher"  type="button" class="btn btn-primary">Teacher</a>
        </form>
      </div>
    </div>
  </div>
</div> -->

<div id="myModal">
  <div class="modal-dialog ">
    <div class="modal-content bg-light ">
      <div class="modal-header bg-dark text-light ">
        <h5 class="modal-title">Select One</h5>
        <a type="button" class="btn-close btn-close-white"></a>
      </div>
      <div class="modal-body">
        <p>Are you a student or a teacher?</p>
      </div>
      <div class="d-flex flex-column modal-footer justify-content-center">

        <div>
          <button id="student" type="button" class="btn btn-primary">Student</button>
          <button id="teacher" type="button" class="btn btn-secondary">Teacher</button>
          <button id="goBackBtn" type="button" class="btn btn-secondary d-none">Back</button>
        </div>  
     


              <form id="studentForm" class="mt-3 text-center d-none" action="main.php" method="post">
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
                  <button type="submit" class="btn btn-dark mt-2 mx-auto">BEGIN</button>
                </div>
              </form>

     

      </div>
    </div>
  </div>
</div>

