<?php

// conexão com o banco
$servername = 'localhost';
$username = 'root';
$password = '';
$db_name = 'sistema_login';

// mysqli tem suporte a programação procedural e orientada a objeto
$connect = mysqli_connect($servername, $username, $password, $db_name);

if(mysqli_connect_error()){
  echo "Falha na conexão " . mysqli_connect_error();
}