<?php
include("conexao.php"); // caminho do seu arquivo de conexão ao banco de dados
$consulta = "SELECT * FROM wp_users";
$con      = $mysqli->query($consulta) or die($mysqli->error);
 
 while($dado = $con->fetch_array()) { 
     echo $dado['ID']; 
      echo $dado['user_login']; 
       echo $dado['user_pass']; 
	   
	   
	   ?>
