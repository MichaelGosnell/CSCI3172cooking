<?php

function display_recipy_img($id){
  $db_host = 'localhost';
  $db_username = 'root';
  $db_password = 'root';
  $db_name = 'csci3172';
  $conn = new mysqli ($db_host, $db_username, $db_password, $db_name);

  if ($conn->connect_error) {
    die ("*Error connecting to the DB.*<br>".$conn->connect_error);
  }
  $sql = "SELECT image FROM `recipe` WHERE `ID` = '$id'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  echo 'images/'.$row['image'];
}

function display_recipy($id){
  $db_host = 'localhost';
  $db_username = 'root';
  $db_password = 'root';
  $db_name = 'csci3172';
  $conn = new mysqli ($db_host, $db_username, $db_password, $db_name);
  $int = 1;
  if ($conn->connect_error) {
    die ("*Error connecting to the DB.*<br>".$conn->connect_error);
  }

  $sql = "SELECT * FROM `recipe` WHERE `ID` = '$id'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();

  $ingredient = $row["ingredient"];
  $steps = $row["steps"];

  // http://php.net/manual/en/function.explode.php
  $ingredient_pieces = explode(">_<2333!orz!~", $ingredient);
  $steps_pieces = explode(">_<2333!orz!~", $steps);

  echo '<h3>ingredient</h3><br><p>';

  foreach ($ingredient_pieces as $i) {
    echo "$i <br>";
  }
  echo '</p><hr><br>';
  echo '<h3>Steps</h3><br><p>';
  foreach ($steps_pieces as $s) {
    if($s != ""){
      echo "<h5>Step $int:</h5> $s <br><br>";
      $int++;
    }
  }
  echo '</p><hr><br>';
  echo '<h3>Comment</h3><br><p>';
  echo $row["comment"];
  echo '</p>';
}

function list_my_recipy($user_id){
  $db_host = 'localhost';
  $db_username = 'root';
  $db_password = 'root';
  $db_name = 'csci3172';
  $conn = new mysqli ($db_host, $db_username, $db_password, $db_name);

  if ($conn->connect_error) {
    die ("*Error connecting to the DB.*<br>".$conn->connect_error);
  }

  $sql = "SELECT * FROM `recipe` WHERE `user_id` = '$user_id'";
  $result = $conn->query($sql);
  while ($row = $result->fetch_assoc()) {
    echo "<h4><a href='edit_recipe.php?Recipy_ID=".$row[ID]."'>".$row['name']."</a></h4><br>";
  }

}

function show_edit_steps($input){
  $steps_pieces = explode(">_<2333!orz!~", $input);
  $num_of_steps = 1;
  foreach ($steps_pieces as $s) {
    if($s != ""){
      echo "<br><hr><br>";
      echo "<h3>Step $num_of_steps</h3>";
      echo "<textarea name='nums_edit[$num_of_steps]' class='form-control' rows='5' id='comment'>$s</textarea>";
      $num_of_steps++;
    }
  }
  return $num_of_steps-1;
}

function show_edit_ingredient($input){
  $ingredient_pieces = explode(">_<2333!orz!~", $input);
  $num_of_ingredient = 1;
  foreach ($ingredient_pieces as $s) {
    if($s != ""){
      echo "<div class='form-group mt-2 mr-2 mb-2'>";
      echo  "<input type='text' name='numi_edit[$num_of_ingredient]' class='form-control' value='$num_of_ingredient'>";
      echo "</div>";
      $num_of_ingredient++;
    }
  }
  return $num_of_ingredient-1;
}

function edit_recipe_session($id){
  $db_host = 'localhost';
  $db_username = 'root';
  $db_password = 'root';
  $db_name = 'csci3172';
  $conn = new mysqli ($db_host, $db_username, $db_password, $db_name);

  if ($conn->connect_error) {
    die ("*Error connecting to the DB.*<br>".$conn->connect_error);
  }

  $sql = "SELECT * FROM `recipe` WHERE `ID` = '$id'";
  $result = $conn->query($sql);
  while ($row = $result->fetch_assoc()) {
    $_SESSION['name_edit']=$row["name"];
    $_SESSION['ingredient_edit']=$row["ingredient"];
    $_SESSION['steps_edit']=$row["steps"];
    $_SESSION['comment_edit']=$row["comment"];
    $_SESSION['category_edit']=$row["category"];
    $_SESSION['user_id_edit']=$row["user_id"];
    $_SESSION['image_edit']=$row["image"];
  }
}

function show_recipy($category){
  $db_host = 'localhost';
  $db_username = 'root';
  $db_password = 'root';
  $db_name = 'csci3172';
  $conn = new mysqli ($db_host, $db_username, $db_password, $db_name);

  if ($conn->connect_error) {
    die ("*Error connecting to the DB.*<br>".$conn->connect_error);
  }
  if($category != ""){
    $sql = "SELECT * FROM `recipe` WHERE `category` = '$category'";

  }else{
    $sql = "SELECT * FROM `recipe`";
  }

  $result = $conn->query($sql);
  while ($row = $result->fetch_assoc()) {
    echo '<div class="container p-3"> ';
    echo '      <div class="row">';
    echo '          <div class="col-md p-3">';
    echo '              <img class="img-fluid rounded" alt="Fruit" src="images/'.$row['image'].'" />';
    echo '          </div>';
    echo '          <div class="col-sm p-3">';
    echo '        <h2 class="align-text-bottom"><a href="view_recipe.php?Recipy_ID='.$row['ID'].'">'.$row['name'].'</a></h4><br>';
    echo '        <h5 class="align-text-bottom">'.$row['category'].'</h5>';
    echo '              <p class="align-text-bottom">'.$row['comment'].'</p>';
    echo '          </div>';
    echo '      </div>';
    echo '</div><hr>';
  }

}

function search_recipy(){
  $db_host = 'localhost';
  $db_username = 'root';
  $db_password = 'root';
  $db_name = 'csci3172';
  $conn = new mysqli ($db_host, $db_username, $db_password, $db_name);

  if ($conn->connect_error) {
    die ("*Error connecting to the DB.*<br>".$conn->connect_error);
  }

  $search_text = $_POST['search_text'];

  if($search_text != ""){

    $sql = "SELECT * FROM `recipe` WHERE `name` LIKE '%$search_text%' OR `category` LIKE '%$search_text%'";

    $result = $conn->query($sql);

    $a = mysqli_num_rows($result);
    if($a == 0){
      echo "<h4>No result.</h4><hr>";
    }
    else if($a == 1){
      echo "<h4>There is only " . $a . " result.</h4><hr>";
    }
    else {
      echo "<h4>There are " . $a . " results.</h4><hr>";
    }


    while ($row = $result->fetch_assoc()) {
      echo '<div id="middle_1 search" class="container p-3">';
      echo '  <div class="row">';
      echo '    <div class="col-md-4 p-3">';
      echo '      <span class="align-text-bottom"><img class="img-fluid rounded" alt="Fruit" src="images/'.$row['image'].'" /></span>';
      echo '    </div>';
      echo '    <div class="col-md-8 p-3">';
      echo '      <h4 class="align-text-bottom"><a href="view_recipe.php?Recipy_ID='.$row['ID'].'">'.$row['name'].'</a></h4><br>';
      echo '      <h5 class="align-text-bottom">'.$row['category'].'</h5>';
      echo '      <p class="align-text-bottom">'.$row['comment'].'</p>';
      echo '    </div>';
      echo '  </div>';
      echo '</div><hr>';
    }
  }else {
    echo "<h4>No result, please enter keywords</h4>";
  }
}

function display_recommendation() {
  $db_host = 'localhost';
  $db_username = 'root';
  $db_password = 'root';
  $db_name = 'csci3172';
  $conn = new mysqli ($db_host, $db_username, $db_password, $db_name);

  if ($conn->connect_error) {
    die ("*Error connecting to the DB.*<br>".$conn->connect_error);
  }

  $sql = "SELECT * FROM `recipe` LIMIT 6";

  $result = $conn->query($sql);

  $a = mysqli_num_rows($result);

  echo '<div class="row">';
  while ($row = $result->fetch_assoc()) {
    $a--;
    echo '<div id="botton_left_div" class="col-md p-4">';
    echo '    <img class="img-fluid rounded" alt="Fruit" src="images/'.$row['image'].'" />';
    echo '    <h3 class="align-text-bottom"><a href="view_recipe.php?Recipy_ID='.$row['ID'].'">'.$row['name'].'</a></h3><br>';
    echo '    <p class="align-text-bottom">'.$row['comment'].'</p>';
    echo '</div>';
    if($a<4){
      break;
    }
  }
  echo '</div><hr>';

  echo '<div class="row">';
  while ($row = $result->fetch_assoc()) {
    echo '<div id="botton_left_div" class="col-md p-4">';
    echo '    <img class="img-fluid rounded" alt="Fruit" src="images/'.$row['image'].'" />';
    echo '    <h3 class="align-text-bottom"><a href="view_recipe.php?Recipy_ID='.$row['ID'].'">'.$row['name'].'</a></h3><br>';
    echo '    <p class="align-text-bottom">'.$row['comment'].'</p>';
    echo '</div>';
  }
  echo '</div><hr>';
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
