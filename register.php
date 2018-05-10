<?php include "includes/header.php" ?>
<?php include "includes/db.php" ?>
    <div class="container">
      <h2 class="display-4">Register</h2><hr>
      <div class="row">
          <div class="col-md p-3">
              <img class="img-fluid rounded" alt="Fruit" src="images/blueberry.jpeg" />
          </div>
          <div class="col-sm p-3">
            <?php $current_page = basename($_SERVER['PHP_SELF']); ?>
            <form name="myForm" method="post" action="<?php echo $current_page; ?>">
              <div class="form-group">
                <label for="firstname">First name:</label>
                <input id="firstname" type="text" name="firstname" class="form-control">
              </div>
              <div class="form-group">
                <label for="lastname">First name:</label>
                <input id="lastname" type="text" name="lastname" class="form-control">
              </div>
              <div class="form-group">
                <label for="email">E-mail:</label>
                <input id="email" type="text" name="email" class="form-control">
              </div>
              <div class="form-group">
                <label for="password">Password:</label>
                <input id="password" type="password" name="password" class="form-control">
              </div>
              <div class="form-group">
                <label for="confirmation">Confirm Password:</label>
                <input id="psw-repeat" type="password" name="psw-repeat" class="form-control">
              </div>
              <input type="submit" name="singup" id="singup" class="btn btn-info" value="Sign Up"></input>
          </form>
        </div>
    </div>
  </div>
<?php include "includes/footer.php" ?>
