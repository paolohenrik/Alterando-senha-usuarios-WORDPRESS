<?php
include("conexao.php"); // caminho do seu arquivo de conexão ao banco de dados
 
// declaração de variáveis

$id = $_POST["id"];
$novasenha = $_POST["novasenha"];

/* echo $id . " " . $novasenha;*/

$atualizar = "UPDATE wp_users SET user_pass = '$novasenha' WHERE ID = $id
";
$con = $mysqli->query($atualizar) or die($mysqli->error);

header('Location: index.php');

?>
