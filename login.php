<?php 
  /*
    REGISTER page
  */

  include('includes/dbConnect.php');
?>


      <!-- Modal -->
     <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
       <div class="modal-dialog">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <form class="bg-light p-4" action="loginPost.php" method="post">
            <!-- LOGIN FORM -->
            <h3 class="my-1 bg-dark text-white p-3">Login</h3>

            <div class="modal-body">
              
                    <div class="form-group">
                      <label for="email">Username:</label>
                      <input type="email" class="form-control" name="email" placeholder="email" required>
                    </div>
                    <div class="form-group">
                      <label for="password">Password:</label>
                      <input type="password" class="form-control" name="password" placeholder="password" required>
                    </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a type="button" class="btn btn-primary" href="index.php?page=register">
                  Not yet registered?
                </a>
                <input type="submit" class="btn-lg btn-dark mt-3" value="Login"></input>
              </div>
            
            </form>
          </div>
        </div>
      </div>  



