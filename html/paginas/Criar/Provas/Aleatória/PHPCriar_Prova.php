<?php
session_start();
	include_once("../../../../../conexao.php");
    $Tema = $_POST['Tema'];
    $Materia = $_SESSION['Materia'];
	$Ano = $_SESSION['Ano'];
	$Numero = $_POST['Numero'];
    ?>

<?php 
if(!empty($_SESSION['id_usuario'])){
    $id_estudante = $_SESSION['id_usuario'];
?>

<!DOCTYPE html>
<html lang="pt_br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../Criar_Prova.css"/>
	<link rel="stylesheet" type="text/css" href="../gabarito.css"/>
	<link rel="stylesheet" type="text/css" href="../../../../../css/Feeds.css"/>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
		<script type="text/javascript" src="Pesquisar.js"></script>
		<script src="https://kit.fontawesome.com/704a3ad3a2.js" crossorigin="anonymous"></script>
	<title>Prova Aleatória</title>
</head>
<body>
<div class="NavegaçãoLateral"> <!--Navegação  Lateral -->
		<img class="LogoLateral" src="../../../../../css/imagens/Logo_Lateral.png"><h1>Arivu</h1>
		<div class="liLateral">
			<li><a href="../../../Feed/Feed_Eventos.php">Feed</a></li>
			<li><a href="../../../Provas/Prova.php">Provas</a></li>
			<?php if($_SESSION['Email_pessoal'] != "Sem Conta"){ ?>
			<li><a href="../../../Agenda/Agenda.php">Agenda</a></li>
			<li><a href="../../../Perfil/Perfil.php">Perfil</a></li>
			<?php if($_SESSION['Restricao'] == "Professor"){ ?>
			<li><a href="../../../Redação/Professor/Minhas_Redações.php">Redação</a></li>
			<?php }?>
			<?php if($_SESSION['Restricao'] == "Estudante"){ ?>
			<li><a href="../../../Redação/Aluno/Redação_Aluno.php">Redação</a></li>
			<?php }?>
			<li class="LateralSelecionado"><a href="../../../Criar/Resumos/Criar_Resumo.php"><b>Criar</b></a></li>
			<?php } ?>
			<li><?php echo "<a href='../../../../login/Sair.php'>Sair</a>"; ?></li>	
		</div>
	</div>
	<?php


?>
	<div class="BodyConteudo"> <!-- Corpo, onde fica todo  conteudo do site -->
        <div class="NavegaçãoSuperior"> <!-- Parte superior  -->
            <div class="aSuperior"> 
				<a href="../../Eventos/Criar_Evento.php"><b>Resumos</b></a>
				<?php if($_SESSION['Restricao'] == "Professor"){?>
				<a href="../../Eventos/Criar_Evento.php"><b>Eventos</b></a>
                <a class="SuperiorSelecionado" href=""><b>Provas</b></a>
				<a href="../../Questões/Criar_Perguntas.php"><b>Questões</b></a>
				<?php } ?>
            </div>
        </div>


    <div class="Publicações">
	<div class="Caracteristicas">
		<h3>Avaliação de <?php echo $Materia; ?></h3>
		<p><b>Nome: </b>____________________________________________________________________</p>
		<p><b>Turma: </b>________________⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀<b>Data: </b>____ /_____ /_____</p>
	</div>
    <?php


$Truncate = "Truncate table questoes";
$Truncate_Execute = mysqli_query($conexao, $Truncate);


$Truncate_gabarito = "Truncate table gabarito";
$Truncate_Execute_gabarito = mysqli_query($conexao, $Truncate_gabarito);

    $Query_Prova = "SELECT * FROM aux where Materia = '$Materia'"; //Pegando dados do evento do banco
	$Prova = mysqli_query($conexao, $Query_Prova) or die (mysqli_error($conexao));
	while($rows_eventos = mysqli_fetch_assoc($Prova)) 
	{
		$Pergunta = $rows_eventos['questao'];
		$Id_Questão = $rows_eventos['id'];

		$sql1 = "Insert into questoes (questao, id_prova) values ('$Pergunta', '$Id_Questão')";
		$execute1 = mysqli_query($conexao, $sql1);
	}

	
	$Query_Limite = "SELECT * from questoes order by id desc limit 1"; //Teste
	$Limita = mysqli_query($conexao, $Query_Limite) or die (mysqli_error($conexao));
	while($rows_limite = mysqli_fetch_assoc($Limita)) 
	{
		$Limite = $rows_limite['id'];
	}


	for($Numero; $Numero > 0; $Numero--){
		
		$random = rand(1, $Limite);


	$Query_Teste = "SELECT * from questoes where id = '$random'"; //Teste
	$Limita1 = mysqli_query($conexao, $Query_Teste) or die (mysqli_error($conexao));
	?>
	<div class="Perguntas">
	<?php
	while($rows_limite1 = mysqli_fetch_assoc($Limita1)) 
	{
	$id = $rows_limite1['id_prova'];
	$Query_Teste2 = "SELECT * from opcoes where id_questao = '$id'"; //Teste

	echo "Valor (⠀⠀)";
	?><div class="Pergunta"><?php echo $rows_limite1['questao']; ?></div><?php
	$Teste2 = mysqli_query($conexao, $Query_Teste2) or die (mysqli_error($conexao));
	
	while($rows_limite3 = mysqli_fetch_assoc($Teste2)) 
	{
		$opcao = $rows_limite3['opcao'];
		$alternativa = $rows_limite3['correta'];
		echo "(".$alternativa.") " .$opcao. "<br>";
	}}  ?>	</div> <?php
	
	

	$Query_Teste4 = "SELECT * from opcoes where id_questao = '$id'"; //Teste
	$Teste4 = mysqli_query($conexao, $Query_Teste4) or die (mysqli_error($conexao));
	while($rows_limite4 = mysqli_fetch_assoc($Teste4)) 
	{ 
	$correta = $rows_limite4['correta'];
	$correta_1 = $rows_limite4['correta_1'];

	$Query_Teste5 = "INSERT INTO gabarito (correta, correta_1, id_questao) values ('$correta','$correta_1', '$id')"; //Teste
	$Teste5 = mysqli_query($conexao, $Query_Teste5) or die (mysqli_error($conexao));
}
}
?>

	</div>
	</div>
	<div class="LateralDireita">
	<form method="Post" action="">
			<!-- Filtros da Lateral direita -->
			<div class="CorpoFiltros1">
				<b><p>GABARITO</p></b>
				<p class="Selecionar">Você pode imprimir o gabarito</p>
				<div class="q">
				<?php
				
				$Query_Teste5 = "SELECT * from gabarito"; //Teste
				$Teste5 = mysqli_query($conexao, $Query_Teste5) or die (mysqli_error($conexao));
				while($rows_limite5 = mysqli_fetch_assoc($Teste5)) 
				{ ?>
				<?php
						if($rows_limite5['correta'] == $rows_limite5['correta_1']){
					?><a class="a"><?php echo $rows_limite5['correta_1']; ?></a><?php }else{ ?><a><?php echo $rows_limite5['correta']; ?></a><?php }
				} ?>
				
				</div>
				<!-- Radios Button -->
				</div> 
	
			</div>
		</form>

</body>
</html>

<?php
}else{
	header("Location: ../../index.php");	
}
?>