<?php include "includes/header.php" ?>
<?php include "includes/db.php" ?>
<?php
  edit_recipe_session($_GET['Recipy_ID']);
?>

<div class="container">
  <?php $current_page = htmlentities($_SERVER['PHP_SELF']); ?>
  <form  action="<?php echo $current_page; ?>" enctype="multipart/form-data" id="add_form" method="post">
  <div class="row mt-5">
    <div class="col-md">
      <img class="img-fluid rounded mb-3" id="aaa" alt="Fruit" src='<?php echo "images/".$_SESSION['image_edit'] ?>' />
    </div>
    <div class="col-md">
      <button id="confirm" name="delete" type="submit" class="btn btn-warning float-right">Delete</button><br><br>
    </div>
  </div>
  <hr>

  <br>
  <div id="form_name" action="action.php" class="myForm">
    <div class="form-group mt-2 mr-2 mb-2">
      <h3>Name</h3>
      <input type="text"  name="name_of_recipe_edit"  class="form-control" value='<?php echo $_SESSION['name_edit'] ?>'>
    </div>
  </div>
  <br><hr>
  <div action="action.php" class="myForm">
    <h3>Category</h3>
    <select class="form-control" name="select_Category" id="select_Category">
      <option value='<?php echo $_SESSION['category_edit'] ?>'>Please select the Category</option>
      <option value="Breakfast">Breakfast</option>
      <option value="Lunch">Lunch</option>
      <option value="Dinner">Dinner</option>
      <option value="Snapshot">Snapshot</option>
    </select>
  </div>
  <br><hr>
  <h3>Ingredient</h3>
  <div id="form_ingredient" action="action.php" class="form-inline myForm">
    <?php $ni = show_edit_ingredient($_SESSION['ingredient_edit']); ?>
  </div>
  <br>
  <input type="hidden" name="num_of_ingredient_edit" value='<?php echo $ni ?>' />
  <div id="form_steps" action="action.php">
    <?php $ns = show_edit_steps($_SESSION['steps_edit']); ?>
  </div>
  <br>
  <input type="hidden"  name="num_of_steps_edit" value='<?php echo $ns ?>' />
  <br><hr>
  <div id="form_steps" action="action.php">
    <h3>Additional comment:</h3>
    <textarea class="form-control" name="comment_edit" rows="5"><?php echo $_SESSION['comment_edit'] ?></textarea>
  </div>
  <br><hr>
  <input type="hidden" name="recipy_ID" class="form-control" value="<?php echo $_GET['Recipy_ID'];?>">
  <button id="confirm" name="confirm_edit" type="submit" class="btn btn-info">Edit</button><br><br>
</form>
</div>
<script type="text/javascript">
  function preview(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
        reader.onload = function (e) {
          $('#aaa').attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
      }
  }
</script>
<?php include "includes/footer.php" ?>
