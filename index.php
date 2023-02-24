<!DOCTYPE html>

<?php

  // Conexão
  require_once 'db_connect.php';

  // Sessão
  session_start();

  // Botão enviar
  if(isset($_POST['btn-login'])){

    $errors = array();
    $login = mysqli_escape_string($connect, $_POST['login']);
    $pass = mysqli_escape_string($connect, $_POST['password']);
  
    if(empty($login) or empty($pass)){
      
      $errors[] = "<li class='center error'>User/Password fields need to be filled in</li>";
    
    }else{

      $sql = "SELECT login FROM users WHERE login = '$login'";
      $result  = mysqli_query($connect, $sql);

      if(mysqli_num_rows($result) > 0){
        
        $pass = md5($pass);
        $sql = "SELECT * FROM users WHERE login = '$login' AND password = '$pass'";
        $result = mysqli_query($connect, $sql);

        if(mysqli_num_rows($result) == 1){
          
          $data = mysqli_fetch_array($result);
          $_SESSION['logedin'] = true;
          $_SESSION['id_user'] = $data['id'];
          header('Location: home.php');

        }else{

          $errors[] = "<li class='center error'>User and password do not match</li>";
        
        }

      }else{

        $errors[] = "<li class='center error'>This user do not exist</li>";

      }

    }

  }

?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="assets/js/index.js"></script>
  <title>Login system</title>
</head>
<body>
  <div class="login-box">
  <h1 id="title" class="center">Log in</h1>
  <?php
  
    if(!empty($errors)){
      
      foreach($errors as $error){
    
        echo $error;
    
      }
    
    }

  ?>
  <form class="center" action="<?php $_SERVER['PHP_SELF'];?>" method="post">
    <input id="username_input" class="center" type="text" name="login" placeholder="Username or E-mail"><br>
    <input id="password_input" class="center" type="password" name="password" placeholder="Password">
    <div class="checkbox">
      <input class="checkbox-input" type="checkbox" name="showpass" onclick="showPassword()">
      <label class="label_showpass" for="showpass">Show Password</label>
    </div>
    <button id="button" type="submit" name="btn-login">Log In</button>
</form>
    <p class="center">Not member yet? <a href="#">Subscribe now</a></p>
  </div>
</body>
</html>