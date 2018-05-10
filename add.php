<?php include "includes/header.php" ?>
<?php include "includes/db.php" ?>

<div class="container">
  <?php $current_page = htmlentities($_SERVER['PHP_SELF']); ?>
  <form  action="<?php echo $current_page; ?>" enctype="multipart/form-data" id="add_form" method="post">
  <div class="row mt-5">
    <div class="col-md">
      <img class="img-fluid rounded mb-3" id="aaa" alt="Fruit" src="images/red_orange.jpeg" />
    </div>
    <div class="col-md">
      <h5>Upload image here: </h5>
        <input type="file" onchange="preview(this);" name="recipe_image" id="recipe_image" accept="image/*">
    </div>
  </div>
  <hr>

  <br>
  <div id="form_name" action="action.php" class="myForm">
    <div class="form-group mt-2 mr-2 mb-2">
      <h3>Name</h3>
      <input type="text"  name="name_of_recipe"  class="form-control">
    </div>
  </div>
  <br><hr>
  <div action="action.php" class="myForm">
    <h3>Category</h3>
    <select class="form-control" name="select_Category" id="select_Category">
      <option value="nothing">Please select the Category</option>
      <option value="Breakfast">Breakfast</option>
      <option value="Lunch">Lunch</option>
      <option value="Dinner">Dinner</option>
      <option value="Snapshot">Snapshot</option>
    </select>
  </div>
  <br><hr>
  <h3>Ingredient</h3>
  <div id="form_ingredient" action="action.php" class="form-inline myForm">
    <div class="form-group mt-2 mr-2 mb-2">
      <input type="text"  name="numi[1]" value="1" class="form-control">
    </div>
  </div>
  <br>
  <button id="addIngredient" type="button" class="btn btn-info">Add Ingredient</button>
  <input type="hidden" name="num_of_ingredient" id="num_of_ingredient" value="1" />
  <br><br><br><hr>
  <div id="form_steps" action="action.php" class="myForm">
    <h3>Step 1</h3>
    <textarea class="form-control" name="nums[1]" rows="5"></textarea>
  </div>
  <br>
  <button id="addSteps" type="button" class="btn btn-info">Add Steps</button><br><br>
  <input type="hidden"  name="num_of_steps" id="num_of_steps" value="1" />

  <br><hr>
  <div id="form_steps" action="action.php" class="myForm">
    <h3>Additional comment:</h3>
    <textarea class="form-control" name="comment" rows="5"></textarea>
  </div>
  <br><hr>
  <input type="hidden" name="user_id" class="form-control" value="<?php echo $_SESSION['ID'];?>">
  <button id="confirm" name="confirm" type="submit" class="btn btn-warning">Confirm</button><br><br>
</form>
</div>

<?php include "includes/footer.php" ?>
<script type="text/javascript">
    var num_of_ingredient = 1;
    var num_of_steps = 1;
    $("#num_of_ingredient").val(num_of_ingredient);
    $("#num_of_steps").val(num_of_steps);

    $("#addIngredient").click(function(){
      num_of_ingredient++;
      $("#form_ingredient").append("<div class='form-group mt-2 mr-2 mb-2'><input type='text' name='numi["+num_of_ingredient+"]' class='form-control' value='"+num_of_ingredient+"'></div>");
      $("#num_of_ingredient").val(num_of_ingredient);
    });

    $("#addSteps").click(function(){
      num_of_steps++;
      $("#form_steps").append("<br><hr><br><h3>Step "+num_of_steps+"</h3><textarea name='nums["+num_of_steps+"]' class='form-control' rows='5' ></textarea>");
      $("#num_of_steps").val(num_of_steps);
    });

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
