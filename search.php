<?php include "includes/header.php" ?>
<?php include "includes/db.php" ?>
<div class="container">
  <br>
    <?php $current_page = basename($_SERVER['PHP_SELF']); ?>
    <form class="form-inline" action="<?php echo $current_page; ?>" method="post">
      <div class="search_container">
        <input type="text" name="search_text" class="form-control" size=60 >
        <input type="submit" name="Search" class="btn btn-default m-2" value="Search"></input>
      </div>
    </form>
  <br>
  <hr>
  <?php search_recipy(); ?>
</div>
<?php include "includes/footer.php" ?>
