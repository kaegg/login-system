<!DOCTYPE html>

<?php

  // Conexão com o banco
  require_once 'db_connect.php';

  // Sessão
  session_start();

  // Verifica se está logado ou não
  if(!isset($_SESSION['logedin'])){
   
    header('Location: index.php');
  
  }

  // Dados
  $id = $_SESSION['id_user'];
  $sql = "SELECT * FROM users WHERE id = '$id'";
  $result = mysqli_query($connect, $sql);
  // Agora a variável $data tem todos os dados do usuário
  $data = mysqli_fetch_array($result);
  mysqli_close($connect);

?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include_once 'assets/includes/header.php';?>

  <link rel="shortcut icon" href="assets/img/user.png" type="image/x-icon">
  <title>Admin page</title>
</head>

<body>
  <!-- <h1>ENTROU!!!!</h1>
   <h3>Olá <?php echo $data['name']; ?></h3> -->
  <div class="header">
    <nav>
      <div class="nav nav-wrapper">
        <a href="" class="brand-logo">Logo</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href="">sass</a></li>
          <li><a href="">sass <span class="new badge">4</span></a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div>
    </nav>
  </div>

  <div class="content">
    <h3>Olá <?php echo $data['name']; ?></h3>
  </div>

  <?php include_once 'assets/includes/footer.php'; ?>

</body>

</html>