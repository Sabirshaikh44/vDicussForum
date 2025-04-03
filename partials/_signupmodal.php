<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupModal
    Label">Signup to get an account on vDiscuss</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="/myforum/partials/_signuphandle.php" method="post">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Username</label>
        <input type="text" class="form-control" id="signupEmail" name="signupEmail" aria-describedby="emailHelp" required>
        <!-- <input type="email" class="form-control" id="signupEmail" name="signupEmail" aria-describedby="emailHelp" required> -->
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="signupPassword" name="signupPassword" required>
      </div>
      <div class="mb-3">
      <label for="exampleInputconfirmPassword1" class="form-label">Confirm Password</label>
      <input type="password" class="form-control" id="signupcPassword" name="signupcPassword" required>
      <div id="emailHelp" class="form-text">Make sure you entered the same password</div>
    </div>
      
      <button type="submit" class="btn btn-primary">Signup</button>
    </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>