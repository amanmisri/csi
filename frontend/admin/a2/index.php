<head>
    <title>Login - CSI Admin</title>
</head>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Admin Login</h5>
      </div>
      <div class="modal-body">
        <form id="login_form" action="index_check.php" method="POST">
            <div class="form-group">
                <label for="username">Username: </label>
                <input type="text" name="username" id="user_name" class="form-control" required autocomplete="off">
            </div>
            <div class="form-group">
                <label for="password">Password: </label>
                <input type="password" name="password" id="pass_word" class="form-control" required>
            </div>
      </div>
      <div class="modal-footer">
        <input type="submit" value="Login" class="btn btn-dark">
      </div>
      </form>
    </div>
  </div>
</div>

<?php include('../layout/footer.php') ?>