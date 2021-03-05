<?php 
session_start();
include_once("../../../../conexao.php");

if(!empty($_SESSION['id_usuario'])){
	$id_estudante = $_SESSION['id_usuario'];
?>

<!DOCTYPE html>
<html lang="pt_br">
<head>
	<meta charset="utf-8">

    <link rel="stylesheet" type="text/css" href="Redação.css">
	<link rel="stylesheet" type="text/css" href="../../Criar/style.css">
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
		<script type="text/javascript" src="Pesquisar.js"></script>
		<script src="https://kit.fontawesome.com/704a3ad3a2.js" crossorigin="anonymous"></script>
	<title>Feed Eventos</title>
</head>
<body>

	<div class="NavegaçãoLateral"> <!--Navegação Lateral -->
	<img class="LogoLateral" src="../../../../css/imagens/Logo_Lateral.png"><h1>Desespero</h1>
	<div class="liLateral">
			<li><a href="../Feed/Feed_Eventos.php"><b>Feed</b></a></li>
			<li><a href="../Provas/Prova.php">Provas</a></li>
			<?php if($_SESSION['Email_pessoal'] != "Sem Conta"){ ?>
			<li><a href="">Agenda</a></li>
			<li><a href="">Perfil</a></li>
            <li class="LateralSelecionado"><a href="">Redação</a></li>
			<li><a href="../Criar/Resumos/Criar_Resumo.php">Criar</a></li>
			<?php } ?>
			<li><?php echo "<a href='../../login/Sair.php'>Sair</a>"; ?></li>
			
		</div>
    </div>
    
    <div class="BodyConteudo"> <!-- Corpo, onde fica todo  conteudo do site -->
	<div class="NavegaçãoSuperior">
	<!-- Pesquisa -->
		<div class="aSuperior">
		<a href="Minhas_Redações.php"><b>Redações</b></a>
		<a class="SuperiorSelecionado" href=""><b>Correções</b></a>
		</div>
    </div>

    <div class="Publicações">
	<?php 
	
	$Id = $_GET['codigo'];

        $Tabela_Redações = "SELECT * from correcao where id_redacao = '$Id'"; //Teste
        $Query_Redações = mysqli_query($conexao, $Tabela_Redações) or die (mysqli_error($conexao));
        $Numero = 1;
		
        while($rows_redações = mysqli_fetch_assoc($Query_Redações)) 
        { 
		 ?>
		
		<div class="Corpo_Numero">
		<p class="Numero"><?php  echo $Numero; ?></p>
		</div>
		<div class="Correções_Grandes">
			<p><?php echo $rows_redações['titulo']; ?></p>
			</div> 
		<?php $Numero++; 
		 }
	
	?>
    </div>
	</div>


    <div class="LateralDireita">
	</div>


    </body>

<?php
}else{
	header("Location: ../../index.php");	
}
?>

</html>
