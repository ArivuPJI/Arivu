<?php
	// include database connection file
	session_start();
	include_once("../../../../../conexao.php");

	// fetch data from student table..



	$output = "";
	
	
?>
<!DOCTYPE html>
<html lang="pt_br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../../../../../css/Teste.css"/>
	<link rel="stylesheet" type="text/css" href="../Criar_Prova.css"/>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
		<script type="text/javascript" src="Pesquisar.js"></script>
		<script src="https://kit.fontawesome.com/704a3ad3a2.js" crossorigin="anonymous"></script>
		<link rel="icon" type="image/png" sizes="32x32" href="../../../../../css/imagens/favicon-32x32.png">
	<title>Criar prova</title>
</head>
<body>
<div class="NavegaçãoLateral"> <!--Navegação  Lateral -->
		<img class="LogoLateral" src="../../../../../css/imagens/Logo_Lateral.png"><h1>Arivu</h1>
		<div class="liLateral">
		<li><a href="../../../Feed/Feed_Eventos.php">Feed</a></li>
			<li><a href="../../../Provas/Prova.php">Provas</a></li>
			<?php if($_SESSION['Email_pessoal'] != "Sem Conta"){ ?>
			<li class="LateralSelecionado"><a href="../../Agenda/Agenda.php"><b>Agenda</b></a></li>
			<li><a href="../../../Perfil/Perfil.php">Perfil</a></li>
			<?php if($_SESSION['Restricao'] == "Professor"){ ?>
			<li><a href="../../../Redação/Professor/Minhas_Redações.php">Redação</a></li>
			<?php }?>
			<?php if($_SESSION['Restricao'] == "Estudante"){ ?>
			<li><a href="../../../Redação/Aluno/Redação_Aluno.php">Redação</a></li>
			<?php }?>
			<li><a href="../../../Criar/Resumos/Criar_Resumo.php">Criar</a></li>
			<?php } ?>
			<li><?php echo "<a href='../../../../login/Sair.php'>Sair</a>"; ?></li>	
		</div>
	</div>
	<div class="BodyConteudo"> <!-- Corpo, onde fica todo  conteudo do site -->
        <div class="NavegaçãoSuperior"> <!-- Parte superior  -->
            <div class="aSuperior"> 
				<a href="../../Resumos/Criar_Resumo.php"><b>Resumos</b></a>
				<?php if($_SESSION['Restricao'] == "Professor"){?>
				<a href="../../Eventos/Criar_Evento.php"><b>Eventos</b></a>
                <a class="SuperiorSelecionado" href="../Criar_Prova.php"><b>Provas</b></a>
				<a href="../../Questões/Criar_Perguntas.php"><b>Questões</b></a>
				<?php } ?>
            </div>
        </div>

        <div class="Publicações">
<?php 
$sql2 = "SELECT * FROM questoes ORDER BY id ASC";
$query2 = mysqli_query($conexao, $sql2) or die (mysqli_error($conexao));

	if (mysqli_num_rows($query2) > 0) {
		$output .= "<table class='table table-hover table-striped'>";
		while ($row = mysqli_fetch_assoc($query2)) {
			$id_questao = $row['id_prova'];
			
		$output .= "<div class='Perguntas'>
				<input type='checkbox' class='delete-id' value='{$row['id']}'>
		    	<p>{$row['questao']}</p></div>";
		
	}?><?php
	$output .="</table>";
		echo $output;
	}else{
		echo "<h5>No record found</h5>";
	}
	
	if($_SESSION['Teste'] != 1){
		$Truncate = "Truncate table questoes";
		$Truncate_Execute = mysqli_query($conexao, $Truncate);
	
	}
?>

<a style="
      margin-bottom: 100px; z-index: 100; background: transparent;
                border: none;
                outline: none;
                color: white;
                background-color: #a28bba;
                padding: 10px 30px;
                cursor: pointer;
                float: right;
				margin-right: 190px
                " href="Prova.php">Criar</a>
</div>