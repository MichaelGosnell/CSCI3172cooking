<?php include "includes/header.php" ?>
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <div id="middle" class="container p-3">
        <div class="row">
            <div id="middle_left_div" class="col-md p-3">
                <img class="img-fluid rounded" alt="Fruit" src="images/blueberry.jpeg" />
            </div>
            <div id="middle_right_div" class="col-sm p-3">
                <h2>Entry</h2>
                <br>
                <form action="login.php" method="post">
                  <div class="form-group">
                    <label for="firstname">E-mail:</label>
                    <input type="text" id="username" name="username_login" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="passward">Password:</label>
                    <input type="passward" id="passward" name="password_login" class="form-control">
                  </div>
                  <div class="checkbox">
                    <label><input type="checkbox"> Remember me</label>
                  </div>
                  <input name="Login" type="submit" value="Login" class="btn btn-info">
				         </form>
            </div>
            <div class="container">
              <a href="register.php" class="float-right">Do not have an account? Click here!</a>
            </div>
        </div>
        <hr>
      </div>
      <br>
<?php include "includes/db.php" ?>
<?php include "includes/footer.php" ?>
