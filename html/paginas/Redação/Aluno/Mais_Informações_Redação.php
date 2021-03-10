


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

    <link rel="stylesheet" type="text/css" href="../Professor/Redação.css">
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
		<script type="text/javascript" src="Pesquisar.js"></script>
		<script src="https://kit.fontawesome.com/704a3ad3a2.js" crossorigin="anonymous"></script>
	<title>Feed Eventos</title>
</head>
<body>
    <div class="LateralDireitaCriar">
	</div>
	<div class="NavegaçãoLateral"> <!--Navegação Lateral -->
	<img class="LogoLateral" src="../../../../css/imagens/Logo_Lateral.png"><h1>Desespero</h1>
	<div class="liLateral">
			<li><a href="../../Feed/Feed_Eventos.php">Feed</a></li>
			<li><a href="../../Provas/Prova.php">Provas</a></li>
			<?php if($_SESSION['Email_pessoal'] != "Sem Conta"){ ?>
			<li><a href="../../Agenda/Agenda.php">Agenda</a></li>
			<li><a href="../../Perfil/Perfil.php">Perfil</a></li>
            <li class="LateralSelecionado"><a href=""><b>Redação</b></a></li>
			<li><a href="../../Criar/Resumos/Criar_Resumo.php">Criar</a></li>
			<?php } ?>
			<li><?php echo "<a href='../../login/Sair.php'>Sair</a>"; ?></li>
			
		</div>
    </div>
    
    <div class="BodyConteudo"> <!-- Corpo, onde fica todo  conteudo do site -->
	<div class="NavegaçãoSuperior">
	<!-- Pesquisa -->
		<div class="aSuperior">
        <a href="Redação_Aluno.php"><b>Criar</b></a>
			<a class="SuperiorSelecionado" href="Feed_Resumos"><b>Redações</b></a>
		</div>
    </div>
    <div class="Publicações">

    <?php 

    
        $Id = $_GET['codigo'];

        $Tabela_Redações = "SELECT * from redacoes where Id_Redação = '$Id'"; //Teste
        $Query_Redações = mysqli_query($conexao, $Tabela_Redações) or die (mysqli_error($conexao));
    
        
        while($rows_redações = mysqli_fetch_assoc($Query_Redações)) 
        {
			
                ?>

<div class="Resumo_Click_Corpo">
	<div class="Título">
        <h2><?php echo $rows_redações['Título']; ?></h2>
	</div>
        <div class="Resumo_Click_Conteudo">
            <p><?php echo $rows_redações['Redação']; ?></p>
        </div>
	</div>
				<?php
					} ?>

    </div>
    </div>

<?php
	$Tabela_Redações = "SELECT * from correcao where id_redacao = '$Id' limit 4"; //Teste
    $Query_Redações = mysqli_query($conexao, $Tabela_Redações) or die (mysqli_error($conexao));
	while($rows_redações = mysqli_fetch_assoc($Query_Redações)) 
        { 
			$Correção = $rows_redações['titulo'];
		}
	
	if(!empty($Correção)){
	?>
	<div class="LateralDireita">
	<form method="Post" action="">
	<div class="CorpoFiltros">
				<!-- Radios Button -->
				<div class="Filtros">
	<?php
		
		$Numero = 1;
		
        $Tabela_Redações1 = "SELECT * from correcao where id_redacao = '$Id' limit 4"; //Teste
    $Query_Redações1 = mysqli_query($conexao, $Tabela_Redações1) or die (mysqli_error($conexao));
	while($rows_redações1 = mysqli_fetch_assoc($Query_Redações1)) 
        { 
			$id_redacao = $rows_redações1['id_redacao'];?>
			<div class="Corpo_Numero">
			<p class="Numero"><?php  echo $Numero; ?></p>
			</div>
			<div class="Correções_Pequenas">
			<p><?php echo $rows_redações1['titulo']; ?></p>
		 	</div>
		<?php $Numero++; }?>
		</div>
		
		<div class="btnFiltrar">
		<button><a href="Info_Correções.php?codigo=<?php echo $id_redacao;?>">Ver mais</a></button>
		</div>
		<?php }else
		{ ?>
			<div class="LateralDireita">
		<?php } ?>
    </body>

<?php
}else{
	header("Location: ../../index.php");	
}
?>

</html>

