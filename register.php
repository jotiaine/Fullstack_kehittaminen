<?php 
  /*
    REGISTER page
  */

  include('includes/dbConnect.php');
?>

<!-- MODAL -->
<div id="modal" class="modal">
  <div class="modal-item rounded modal-dialog-scrollable">
    
    <!-- REGISTER FORM -->
    <form class="bg-light p-4" action="newAccount.php" method="post">
      <h3 class="my-1 bg-dark text-white p-3">Register Account</h3>
      <div class="form-group">
        <label for="first_name">First name:</label>
        <input type="text" class="form-control" name="first_name" required>
      </div>
      <div class="form-group">
        <label for="last_name">Last name:</label>
        <input type="text" class="form-control" name="last_name" required>
      </div>
      <div class="form-group">
        <label for="address">Address:</label>
        <input type="text" class="form-control" name="address" required>
      </div>
      <div class="form-group">
        <label for="zip_code">Zip code:</label>
        <input type="text" class="form-control" name="zip_code" required>
      </div>
      <div class="form-group">
        <label for="city">City:</label>
        <input type="text" class="form-control" name="city" required>
      </div>
      <div class="form-group">
        <label for="state">State:</label>
        <input type="text" class="form-control" name="state" required>
      </div>
      <div class="form-group">
        <label for="country">Country:</label>
        <input type="text" class="form-control" name="country" required>
      </div>
      <div class="form-group">
        <label for="telephone">Telephone:</label>
        <input type="text" class="form-control" name="telephone">
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" name="email" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" name="password" required>
      </div>
      <div class="form-group">
        <label for="password_confirmation">Retype password:</label>
        <input type="password" class="form-control" name="password_confirmation" required>
      </div>
      <div class="form-group">
        <label for="password_confirmation">Retype password:</label>
        <input type="password" class="form-control" name="password_confirmation" required>
      </div>

      <input type="submit" class="btn-lg btn-dark mt-3" value="Register"></input>
      <button type="button" id="cancel-btn" class="btn-lg btn-danger mt-3">Close</button>
    </form>

  </div>
</div>