<?php
  include "functions.php";
  //error_reporting(E_ALL);
  //ini_set('display_errors', 1);

  $db_host = 'localhost';
  $db_username = 'root';
  $db_password = 'password';
  $db_name = 'ittwebfront';
  $db_port = "3306";
  $conn = new mysqli ($db_host, $db_username, $db_password, $db_name, $db_port);

  if ($conn->connect_error) {
		die ("*Error connecting to the DB.*<br>".$conn->connect_error);
	}

  $name_regex = '/^[a-zA-Z]+$/';
  $email_regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

  if (isset($_POST['Logout'])) {
    $_SESSION['login_is_succesful'] = 0;
    header("Location: main_page.php");
  }

  if (isset($_POST['Login'])) {
    $username_login = $_POST['username_login'];
		$password_login = $_POST['password_login'];

    if ($username_login != null || $password_login != null) {
			$sql = "SELECT * FROM `register` WHERE `email` = '$username_login'";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
    		while($row = $result->fetch_assoc()) {
					if(password_verify($password_login, $row["password"])){
            $_SESSION['login_is_succesful'] = 1;
            $_SESSION['firstname']=$row["firstname"];
						$_SESSION['lastname']=$row["lastname"];
						$_SESSION['email']=$row["email"];
						$_SESSION['ID']=$row["ID"];
						header("Location: main_page.php");
					}else{
             echo "pwd: ".$password_login." un: ".$username_login;
						 echo '<script language="javascript">';
						 echo 'alert("wrong password")';
						 echo '</script>';
					}
    		}
			} else {
				echo '<script language="javascript">';
				echo 'alert("no such user")';
				echo '</script>';
			}
		}
  }

  if (isset($_POST['confirm'])){
    $category = $_POST['select_Category'];
    $num_of_ingredient = $_POST['num_of_ingredient'];
    $num_of_steps = $_POST['num_of_steps'];
    $name = $_POST['name_of_recipe'];
    $comment = test_input($_POST["comment"]);
    $user_id = $_POST['user_id'];

    $recipe_image = $_FILES['recipe_image']['name'];
		$recipe_image_temp = $_FILES['recipe_image']['tmp_name'];
		$recipe_image_filesize = $_FILES['recipe_image']['size'];
    $target_file = "images/" . $recipe_image;

    for ($i = 1; $i <= $num_of_ingredient; $i++) {
          $ingredient .= $_POST["numi"][$i].">_<2333!orz!~";
    }

    for ($i = 1; $i <= $num_of_steps; $i++) {
      $text = test_input($_POST["nums"][$i]);
      $steps .= $text.">_<2333!orz!~";
    }

    $stmt = $conn->prepare("INSERT INTO recipe(name, ingredient, steps, comment, category, user_id,image) VALUES (?,?,?,?,?,?,?)");
		$stmt->bind_param("sssssis", $name, $ingredient, $steps, $comment, $category, $user_id, $recipe_image);

    if (move_uploaded_file($recipe_image_temp, $target_file)) {

     }
     $stmt->execute();
     $current_page = basename($_SERVER['PHP_SELF']);
     header("Location: " . $current_page);
  }

  if (isset($_POST['singup'])){
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $confirmation = $_POST['psw-repeat'];
      $hash = password_hash($password,PASSWORD_DEFAULT);
      $address = 'address';
      $postalcode = 'postalcode';
      $ok = 1;
      if($firstname == "" ||$lastname == "" ||$email == ""||$password == ""||$confirmation==""){
        echo '<script language="javascript">';
        echo 'alert("All field must be filled out")';
        echo '</script>';
        $ok = 0;
      }
      if(strlen($password)<8){
        echo '<script language="javascript">';
        echo 'alert("Password too shot")';
        echo '</script>';
        $ok = 0;
      }
      if($password != $confirmation){
        echo '<script language="javascript">';
        echo 'alert("Password you entered are different")';
        echo '</script>';
        $ok = 0;
      }
      if (!preg_match($name_regex, $firstname)) {
        echo '<script language="javascript">';
        echo 'alert("Enter only letters for you first name")';
        echo '</script>';
        $ok = 0;
      }
      if (!preg_match($name_regex, $lastname)) {
        echo '<script language="javascript">';
        echo 'alert("Enter only letters for you last name")';
        echo '</script>';
        $ok = 0;
      }
      if (!preg_match($email_regex, $email)) {
        echo '<script language="javascript">';
        echo 'alert("Invailed email")';
        echo '</script>';
        $ok = 0;
      }

      if ($ok) {
        $sql = "SELECT * FROM `register` WHERE `email` = '$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          echo '<script language="javascript">';
          echo 'alert("This email address already exist")';
          echo '</script>';
        }else {
          $hash = password_hash($password,PASSWORD_DEFAULT);
  				$stmt = $conn->prepare("INSERT INTO register (firstname, lastname, email, password, address, postalcode) VALUES (?, ?, ?, ?, ?, ?)");
  				$stmt->bind_param("ssssss", $firstname, $lastname, $email, $hash, $address, $postalcode);
          $stmt->execute();
          header("Location: login.php");
        }
      }
  }

  if (isset($_POST['edit'])) {
    $id = $_POST['ID_userinfo'];
		$firstname = $_POST['firstname_userinfo'];
		$lastname = $_POST['lastname_userinfo'];
		$email = $_POST['email_userinfo'];
    $current_page = basename($_SERVER['PHP_SELF']);

		if($_POST['password_userinfo'] != "" && $_POST['confirmation_userinfo'] != ""){
			if($_POST['password_userinfo'] == $_POST['confirmation_userinfo']){
				$password = $_POST['password_userinfo'];
				$hash = password_hash($password,PASSWORD_DEFAULT);
				$stmt = $conn->prepare("UPDATE `register` SET `firstname`=?,`lastname`=?,`email`=?,`password`=? WHERE `ID`='$id'");
				$stmt->bind_param("ssss", $firstname, $lastname, $email, $hash);
				$stmt->execute();

        $sql = "SELECT * FROM `register` WHERE `ID` = '$id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $_SESSION['firstname']=$row["firstname"];
        $_SESSION['lastname']=$row["lastname"];
        $_SESSION['email']=$row["email"];
        $_SESSION['address']=$row["address"];
        $_SESSION['postalcode']=$row["postalcode"];

				header("Location: ".$current_page);
			}else{
				echo '<script language="javascript">';
				echo 'alert("Password you entered are different")';
				echo '</script>';
			}
		}else{
      if($stmt = $conn->prepare("UPDATE `register` SET `firstname`=?,`lastname`=?,`email`=? WHERE `ID`='$id'")){
        $stmt->bind_param("sss", $firstname, $lastname, $email);
        $stmt->execute();
        //echo "UPDATE `register` SET `firstname`=$firstname,`lastname`=$lastname,`email`=$email,`address`=$address,`postalcode`=$postalcode WHERE `ID`='$id'";

        $sql = "SELECT * FROM `register` WHERE `ID` = '$id'";
        $result = $conn->query($sql);
        if($row = $result->fetch_assoc()) {
          $_SESSION['firstname']=$row["firstname"];
          $_SESSION['lastname']=$row["lastname"];
          $_SESSION['email']=$row["email"];
          $_SESSION['address']=$row["address"];
          $_SESSION['postalcode']=$row["postalcode"];
        }else{
          echo "<br>hahaha: ".$sql;
        }

        header("Location: ".$current_page);
      }else{
        echo "Error: ".$conn->error;
      }

     }
	}

  if (isset($_POST['confirm_edit'])) {
    $category = $_POST['select_Category'];
    $num_of_ingredient = $_POST['num_of_ingredient_edit'];
    $num_of_steps = $_POST['num_of_steps_edit'];
    $name = $_POST['name_of_recipe_edit'];
    $comment = test_input($_POST["comment_edit"]);
    $ID = $_POST['recipy_ID'];

    for ($i = 1; $i <= $num_of_ingredient; $i++) {
          $ingredient .= $_POST["numi_edit"][$i].">_<2333!orz!~";
    }

    for ($i = 1; $i <= $num_of_steps; $i++) {
      $text = test_input($_POST["nums_edit"][$i]);
      $steps .= $text.">_<2333!orz!~";
    }

    $stmt = $conn->prepare("UPDATE `recipe` SET `name`=?,`ingredient`=?,`steps`=?,`comment`=?,`category`=? WHERE ID = $ID");
    $stmt->bind_param("sssss", $name, $ingredient, $steps, $comment, $category);
    $stmt->execute();

    $sql = "SELECT * FROM `recipe` WHERE `ID` = '$ID'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
      $_SESSION['name_edit']=$row["name"];
      $_SESSION['ingredient_edit']=$row["ingredient"];
      $_SESSION['steps_edit']=$row["steps"];
      $_SESSION['comment_edit']=$row["comment"];
      $_SESSION['category_edit']=$row["category"];



    }

    $current_page = basename($_SERVER['PHP_SELF']);
    header("Location: " . $current_page);
	}

  if (isset($_POST['delete'])){
		$ID = $_POST['recipy_ID'];
    $stmt = $conn->prepare("DELETE FROM recipe WHERE ID = $ID");
		$stmt->execute();
		header("Location: profile.php");
	}

?>
