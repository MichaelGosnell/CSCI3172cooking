<?php include "includes/header.php"?>

  <div id="middle_1 profile" class="container p-3">
        <div class="row">
            <div class="col-md p-3">
                <img id="user_img" class="img-fluid rounded" alt="Fruit" src="images/blueberry.jpeg" />
            </div>
            <div class="col-md p-3">
              <form action="profile.php" method="post">
                <input name="Logout" type="submit" value="Logout" class="btn btn-info">
              </form>
            </div>
        </div>

      </div><?php include "includes/db.php" ?>
        <div class="container p-3">
            <?php $current_page = htmlentities($_SERVER['PHP_SELF']); ?>
            <form name="userinfoForm" method="post" action="<?php echo $current_page; ?>">
            <div class="row">
              <div class="col-md p-3">
                <label for="firstname">First name:</label>
                <input type="text" id="firstname" name="firstname_userinfo" class="form-control" value="<?php echo $_SESSION['firstname'];?>">
                <br><br>
                <label for="lastname">Last name:</label>
                <input type="text" id="lastname" name="lastname_userinfo" class="form-control" value="<?php echo $_SESSION['lastname'];?>">
                <br><br>
                <label for="email">E-mail:</label>
                <input type="text" id="email" name="email_userinfo" class="form-control" value="<?php echo $_SESSION['email'];?>">
              </div>
              <div class="col-md p-3">
                <label for="password">Password:</label>
                <input type="password" id="password" class="form-control" name="password_userinfo">
                <br><br>
                <label for="confirmation">Confirm Password:</label>
                <input type="password" id="confirmation" class="form-control" name="confirmation_userinfo">
                <br><br>
                <label for="ID">ID:</label>
                <input type="hidden" name="ID_userinfo" value="<?php echo $_SESSION['ID'];?>">
                <input type="text" class="form-control" value="<?php echo $_SESSION['ID'];?>" disabled>
                <br><br>
              </div>
            </div>
                <input type="submit" name="edit" id="submitbutton" class="btn btn-warning" value="EDIT"></input>
            </form>

        </div>
        <div id="middle_2" class="container p-3">
        <hr>
        <div class="row">

            <div id="middle_left_div_2" class="col-sm p-3">
                <h3 class="align-text-bottom">My Recipe:</h3>
                <?php
                  list_my_recipy($_SESSION['ID']);
                ?>
            </div>

            </div>
        </div>
        <hr>
        <br>
<?php include "includes/footer.php" ?>
