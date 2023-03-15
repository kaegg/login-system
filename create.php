<?php 

// inicializa a sessão
session_start();
// conexão com o banco
require_once 'db_connect.php';

if(isset($_POST['btn-register'])){

  $name = mysqli_escape_string($connect, $_POST['name']);
  $login = mysqli_escape_string($connect, $_POST['user']);
  $pass = mysqli_escape_string($connect, $_POST['pass']);

  $pass = md5($pass);

  $sql = "INSERT INTO users (name, login, password) VALUES ('$name', '$login', '$pass')";

  $errors = array();

  if(empty($name) or empty($login) or empty($pass)){
    $errors[] = "<li class='center error'>All fields need to be filled in</li>";
  }

  if(mysqli_query($connect, $sql)){
    // redireciona para a página home.php
    header('Location: home.php');
  }
}