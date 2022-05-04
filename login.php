<?php 
  /*
    REGISTER page
  */

  include('includes/dbConnect.php');
?>

<!-- MODAL -->
<div id="modal" class="modal modal-test">
  <div class="modal-item rounded modal-dialog-scrollable">
    
    <!-- LOGIN FORM -->
    <form class="bg-light p-4" action="loginPost.php" method="post">
      <h3 class="my-1 bg-dark text-white p-3">Login</h3>
      <div class="form-group">
        <label for="email">Username:</label>
        <input type="email" class="form-control" name="email" placeholder="email" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" name="password" placeholder="password" required>
      </div>

      <input type="submit" class="btn-lg btn-dark mt-3" value="Login"></input>
      <button type="button" class="btn-lg btn-secondary" data-dismiss="modal">Close</button>
    </form>

  </div>
</div>