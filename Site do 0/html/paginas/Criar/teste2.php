<?php
session_start();
require_once('../../../conexao.php');

$Temas = $_SESSION['Temas'];
$Id = $_SESSION["Id"];

$sql = "UPDATE criar_provas set Tema = '$Temas' where Id_Prova = '$Id'"; 
$execute = mysqli_query($conexao, $sql);

header('Location: PHPCriar_Prova.php');
?>