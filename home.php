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
  <title>Document</title>
</head>
<body>
  <h1>ENTROU!!!!</h1>
  <h3>Olá <?php echo $data['name']; ?></h3>
  <a href="logout.php">Logout</a>
</body>
</html>