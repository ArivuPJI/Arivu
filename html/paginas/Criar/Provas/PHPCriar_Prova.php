<?php
session_start();
	include_once("../../../../conexao.php");
    $Tema = $_POST['Tema'];
    $Materia = $_SESSION['Materia'];
	$Ano = $_POST['Ano'];
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
	<link rel="stylesheet" type="text/css" href="../../../../css/Feed1.css"/>
	<link rel="stylesheet" type="text/css" href="Criar_Provas.css"/>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
		<script type="text/javascript" src="Pesquisar.js"></script>
		<script src="https://kit.fontawesome.com/704a3ad3a2.js" crossorigin="anonymous"></script>
	<title>Feed Eventos</title>
</head>
<body>
	<div class="NavegaçãoLateral"> <!--Navegação  Lateral -->
		<img class="LogoLateral" src="../../../../css/imagens/Logo_Lateral.png"><h1>Desespero</h1>
		<div class="liLateral">
				<li><a href="../Feed/Feed_Eventos.php">Feed</a></li>
				<li><a href="">Provas</a></li>
				<?php if($_SESSION['Email_pessoal'] != "Sem Conta"){ ?>
				<li><a href="">Agenda</a></li>
				<li><a href="">Perfil</a></li>
				<li class="LateralSelecionado"><a href="../Criar/Criar_Evento.php"><b>Criar</b></a></li>
				<?php } ?>
				<li><?php echo "<a href='../../login/Sair.php'>Sair</a>"; ?></li>
				
		</div>
	</div>
	<?php


?>
	<div class="BodyConteudo"> <!-- Corpo, onde fica todo  conteudo do site -->
        <div class="NavegaçãoSuperior"> <!-- Parte superior  -->
            <div class="aSuperior"> 
				<a href="Criar_Resumo.php"><b>Resumos</b></a>
				<?php if($_SESSION['Restricao'] == "Professor"){?>
				<a href="Criar_Evento.php"><b>Eventos</b></a>
                <a class="SuperiorSelecionado" href="Criar_Prova.php"><b>Provas</b></a>
				<a href=""><b>Questões</b></a>
				<?php } ?>
            </div>
        </div>

    <div class="Publicações">
    <?php


$Truncate = "Truncate table questoes";
$Truncate_Execute = mysqli_query($conexao, $Truncate);

    $Query_Prova = "SELECT * FROM aux where Tema = '$Materia'"; //Pegando dados do evento do banco
	$Prova = mysqli_query($conexao, $Query_Prova) or die (mysqli_error($conexao));
	while($rows_eventos = mysqli_fetch_assoc($Prova)) 
	{
		$Pergunta = $rows_eventos['questao'];

		$sql1 = "Insert into questoes (questao) values ('$Pergunta')";
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
	$id = $rows_limite1['id'];
	$Query_Teste2 = "SELECT * from opcoes where id_questao = '$id'"; //Teste

	echo "Valor (⠀⠀)";
	?><div class="Pergunta"><?php echo $rows_limite1['questao']; ?></div><?php
	$Teste2 = mysqli_query($conexao, $Query_Teste2) or die (mysqli_error($conexao));
	
	while($rows_limite3 = mysqli_fetch_assoc($Teste2)) 
	{
		$opcao = $rows_limite3['opcao'];
		$alternativa = $rows_limite3['correta'];
		echo "(".$alternativa.") " .$opcao. "<br>";
	} ?>		</div> <?php
	
}
	}


	?>

    </div>
	</div>
	<div class="LateralDireita">
	<form method="Post" action="">
			<!-- Filtros da Lateral direita -->
			<div class="CorpoFiltros">
				<b><p>GABARITO</p></b>
				<p class="Selecionar">Você pode imprimir o gabarito</p>
				<!-- Radios Button -->
				</div> <?php
	$Query_Teste4 = "SELECT * from opcoes where id_questao = '$id'"; //Teste
	$Teste4 = mysqli_query($conexao, $Query_Teste4) or die (mysqli_error($conexao));
	while($rows_limite4 = mysqli_fetch_assoc($Teste4)) 
	{ 
	$correta = $rows_limite4['correta'];
	$correta_1 = $rows_limite4['correta_1'];
?>

	<?php
	if($rows_limite4['correta_1'] == $rows_limite4['correta']){
	?><a class='a'><?php echo $correta_1 ?></a><?php
	}else{
	?><a><?php echo $correta ?></a> <?php } 	} ?>
			</div>
		</form>

</body>
</html>

<?php
}else{
	header("Location: ../../index.php");	
}
?>