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
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
		<script type="text/javascript" src="Pesquisar.js"></script>
		<script src="https://kit.fontawesome.com/704a3ad3a2.js" crossorigin="anonymous"></script>
		<link rel="icon" type="image/png" sizes="32x32" href="../../../../css/imagens/favicon-32x32.png">
	<title>Redações para corrigir</title>
</head>
<body>
    <div class="LateralDireitaCriar">
	</div>
	<div class="NavegaçãoLateral"> <!--Navegação Lateral -->
	<img class="LogoLateral" src="../../../../css/imagens/Logo_Lateral.png"><h1>Arivu</h1>
	<div class="liLateral">
			<li><a href="../../Feed/Feed_Eventos.php">Feed</a></li>
			<li><a href="../../Provas/Prova.php">Provas</a></li>
			<?php if($_SESSION['Email_pessoal'] != "Sem Conta"){ ?>
			<li><a href="../../Agenda/Agenda.php">Agenda</a></li>
			<li><a href="../../Perfil/Perfil.php">Perfil</a></li>
            <li class="LateralSelecionado"><a href=""><b>Redação</b></a></li>
			<li><a href="../../Criar/Resumos/Criar_Resumo.php">Criar</a></li>
			<?php } ?>
			<li><?php echo "<a href='../../../login/Sair.php'>Sair</a>"; ?></li>
			
		</div>
    </div>
    
    <div class="BodyConteudo"> <!-- Corpo, onde fica todo  conteudo do site -->
	<div class="NavegaçãoSuperior">
	<!-- Pesquisa -->
		<div class="aSuperior">
		<a class="SuperiorSelecionado" href="Feed_Resumos"><b>Redações</b></a>
			<a href="Correções.php"><b>Correções</b></a>
		</div>
    </div>
    <div class="Publicações">
	<h2 id="h2">Redações para corrigir...</h2>

    <?php 
        $Tabela_Redações = "SELECT * from redacoes where Id_Professor = '$id_estudante' && Estado = 'Não'"; //Teste
        $Query_Redações = mysqli_query($conexao, $Tabela_Redações) or die (mysqli_error($conexao));
    
        
        while($rows_redações = mysqli_fetch_assoc($Query_Redações)) 
        {
				//Se não tiver checkbox selecionada ele irá mostrar todos os tema
                ?>

					<div class="PublicaçõesEvento">
                    <a class="DescriçãoEvento" href="Mais_Informações_Redação.php?codigo=<?php echo $rows_redações['Id_Redação']; ?>"><?php echo $rows_redações['Redação']?></a>
						<div  class="TituloEvento">
						<h2><?php echo $rows_redações['Título'];?></h2></div>

						
						
						<div id="DividirPublicação">
                        <div class="Teste">
							<p><b>Data</b></p>
							<?php 
								$data = $rows_redações['Data']; ?>
								<p><?php echo date("d-m-Y", strtotime($data))."<br>";?></p>
							</div>
							
							<div class="Teste">
								<p><b>Professor</b></p>
								<p><?php echo $rows_redações['Nome_Professor'];?></p>
							</div>
							<div class="Teste">
							<p><b>Tema</b></p>
								<p><?php echo $rows_redações['Tema'];?></p>
							</div>
						</div>
				</div>
				<?php
					} ?>

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

