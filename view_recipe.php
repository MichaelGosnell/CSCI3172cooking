<?php include "includes/header.php" ?>
<?php include "includes/db.php" ?>
  <div class="container">
    <div class="row">
      <div class="col-md-4 p-3">
        <img id="user_img" class="img-fluid rounded" alt="Fruit" src= <?php display_recipy_img($_GET['Recipy_ID']); ?> />
      </div>
      <div class="col-md p-3">
        <p>
        <?php
          display_recipy($_GET['Recipy_ID']);
        ?>
        </p>
      </div>
    </div>
  </div>
<?php include "includes/footer.php" ?>
