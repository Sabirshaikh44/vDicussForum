<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModal
    Label">Login to vDiscuss</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="/myforum/partials/_loginhandle.php" method="post">
      <div class="mb-3">
        <label for="loginEmail" class="form-label">Username</label>
        <input type="text" class="form-control" id="loginEmail" name="loginEmail" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="loginPassword" class="form-label">Password</label>
        <input type="password" class="form-control" id="loginPassword" name="loginPassword">
      </div>
      <button type="submit" class="btn btn-primary">Login</button>
    </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>