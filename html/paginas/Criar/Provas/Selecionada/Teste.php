<?php

session_start();
include_once("../../../../../conexao.php");
$Materia = $_SESSION['Materia'];
$Tema = $_POST['Tema'];
$Ano = $_POST['Ano'];


$sql = "SELECT * FROM aux where Materia ='$Materia' && Ano = '$Ano' && Tema = '$Tema'";
	$query = mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
	while($rows = mysqli_fetch_assoc($query)) 
	{
		$id = $rows['id'];
        $questao = $rows['questao'];

		
		$sql = "Insert into questoes (id_prova, questao, materia, tema, ano) values ('$id', '$questao', '$Materia', '$Tema', '$Ano')";
		$execute = mysqli_query($conexao, $sql);
		
    }

    header("Location: Criar_Prova1.php");

?>
