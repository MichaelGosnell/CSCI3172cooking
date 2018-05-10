<?php
  /*error_reporting(E_ALL);
  ini_set('display_errors', 1);*/
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $category = $_POST['select_Category'];
  $num_of_ingredient = $_POST['num_of_ingredient'];
  $num_of_steps = $_POST['num_of_steps'];
  $name = $_POST['name_of_recipe'];
  $comment = test_input($_POST["comment"]);

  echo '$num_of_ingredient:'.$num_of_ingredient."<br>";
  echo '$num_of_steps: '.$num_of_steps."<br>";
  echo '$select_Category: '.$category.'<br>';
  echo "<br>ingredient:";

  for ($i = 1; $i <= $num_of_ingredient; $i++) {
        $ingredient .= $_POST["numi"][$i].">_<2333!orz!~";
  }
  echo $ingredient;

  echo "<br>steps: ";
  for ($i = 1; $i <= $num_of_steps; $i++) {
    $text = test_input($_POST["nums"][$i]);
    $steps .= $text.">_<2333!orz!~";
  }
  echo $steps."<br>";

  $pieces = explode(">_<2333!orz!~", $steps);
  for ($i = 0; $i < $num_of_steps; $i++) {
    echo $pieces[$i]." ";
  }

  echo "<br>";
  echo "INSERT INTO `recipe`(`name`, `ingredient`, `steps`, `comment`, `category`) VALUES ('$name','$ingredient','$steps','$comment','$category')";
 ?>
