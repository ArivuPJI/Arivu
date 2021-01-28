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
	<link rel="stylesheet" type="text/css" href="../../../css/Criar1.css"/>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
		<script type="text/javascript" src="Pesquisar.js"></script>
		<script src="https://kit.fontawesome.com/704a3ad3a2.js" crossorigin="anonymous"></script>
	<title>Feed Eventos</title>
</head>
<body>
	<div class="NavegaçãoLateral"> <!--Navegação  Lateral -->
		<img class="LogoLateral" src="../../../css/imagens/Logo_Lateral.png"><h1>Desespero</h1>
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


	
    $Query_Prova = "SELECT * FROM perguntas where Materia = '$Materia' && Tema = '$Tema' && Ano = '$Ano'"; //Pegando dados do evento do banco
	$Prova = mysqli_query($conexao, $Query_Prova) or die (mysqli_error($conexao));
	while($rows_eventos = mysqli_fetch_assoc($Prova)) 
	{
		$Pergunta = $rows_eventos['Pergunta'];

		$sql1 = "Insert into criar_provas (Pergunta) values ('$Pergunta')";
		$execute1 = mysqli_query($conexao, $sql1);
	}

	
	$Query_Limite = "SELECT * from criar_provas order by Id_Prova desc limit 1"; //Teste
	$Limita = mysqli_query($conexao, $Query_Limite) or die (mysqli_error($conexao));
	while($rows_limite = mysqli_fetch_assoc($Limita)) 
	{
		$Limite = $rows_limite['Id_Prova'];
		echo $Limite;
	}


	for($Numero; $Numero > 0; $Numero--){
		
		$random = rand(1, $Limite);


	$Query_Teste = "SELECT * from criar_provas where Id_Prova = '$random'"; //Teste
	$Limita1 = mysqli_query($conexao, $Query_Teste) or die (mysqli_error($conexao));

	
	while($rows_limite1 = mysqli_fetch_assoc($Limita1)) 
	{
		echo $rows_limite1['Pergunta']."<br>";
		
	}
	}


	

	?>
    </div>
	</div>
	<div class="LateralDireita">
			
	</div>
</body>
</html>

<?php
}else{
	header("Location: ../../index.php");	
}
?>