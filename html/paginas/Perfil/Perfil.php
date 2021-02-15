<?php 
session_start();
include_once("../../../conexao.php");

if(!empty($_SESSION['id_usuario'])){
	$id_estudante = $_SESSION['id_usuario'];
?>

<!DOCTYPE html>
<html lang="pt_br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../../../css/Perfil.css"/>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
		<script type="text/javascript" src="Pesquisar.js"></script>
		<script src="https://kit.fontawesome.com/704a3ad3a2.js" crossorigin="anonymous"></script>
	<title>Feed Eventos</title>
</head>
<body>
	<div class="NavegaçãoLateral"> <!--Navegação Lateral -->
	<img class="LogoLateral" src="../../../css/imagens/Logo_Lateral.png"><h1>Desespero</h1>
	<div class="liLateral">
			<li><a href="Feed_Eventos.php">Feed</a></li>
			<li><a href="../Provas/Prova.php">Provas</a></li>
			<?php if($_SESSION['Email_pessoal'] != "Sem Conta"){ ?>
			<li><a href="../Agenda/Agenda.php">Agenda</a></li>
			<li  class="LateralSelecionado"><a href=""><b>Perfil</b></a></li>
			<li><a href="../Redação/Redação.php">Redação</a></li>
			<li><a href="../Criar/Resumos/Criar_Resumo.php">Criar</a></li>
			<?php } ?>
			<li><?php echo "<a href='../../login/Sair.php'>Sair</a>"; ?></li>
			
		</div>
	</div>
	<div class="BodyConteudo"> <!-- Corpo, onde fica todo  conteudo do site -->
	<div class="NavegaçãoSuperior">
	<!-- Pesquisa -->
		<div class="aSuperior">
			<a class="SuperiorSelecionado" href="Feed_Eventos.php"><b>Público</b></a>
			<a href="Perfil_Privado.php"><b>Privado</b></a>
		</div>
	</div>

   

	<div class="Publicações">
    <div class="Perfil">
        <div class="Foto">
		<?php $Info = "SELECT Nome_Completo, Email_academico, Restricao from login where id_usuario = '$id_estudante'"; //Pegando dados do evento do banco
		$Info_Query = mysqli_query($conexao, $Info) or die (mysqli_error($conexao));
		while($rows_info = mysqli_fetch_assoc($Info_Query))
			{ if($rows_info['Restricao'] == 'Professor'){ ?>
            <img class="imagem_elefante" src="Elefante.jpg">
			 <?php }
			else{ ?>
			<img class="imagem_elefante" src="Tartaruga.jpg">
			<?php } ?>
        </div>
        <div class="Informacoes">
            <?php 
 
            ?>

			<p id="Destacado"><b><?php echo $rows_info['Nome_Completo'];?></b></p>
			<p><?php echo $rows_info['Email_academico'];?></p>
            <?php } ?>
        </div>
    </div>

	<?php
		$Query_Eventos = "SELECT Titulo, Descricao, Data, Horario, Materia, Id_Quem_Postou, Restricao, Topico FROM feed where Id_Quem_Postou = '$id_estudante' && Restricao = 'Publico'"; //Pegando dados do evento do banco
		$Eventos = mysqli_query($conexao, $Query_Eventos) or die (mysqli_error($conexao));
		while($rows_eventos = mysqli_fetch_assoc($Eventos))
			{ 
                
				if($rows_eventos['Topico'] == 'Evento') {
					?>
							<div class="PublicaçõesEvento">
								<p class="DescriçãoEvento"><?php echo $rows_eventos['Descricao'];?><br></p>
								<div  class="TituloEvento">
								<h2><?php echo $rows_eventos['Titulo'];?><br></h2></div>
								
								<hr width="646px" color="#D1D0D0">
							<div id="DividirPublicação">
								<div class="Teste">
									<p><b>Tema</b></p>
									<p><?php echo $rows_eventos['Materia'];?></p>
								</div>
								<div class="Teste">
								<p><b>Data</b></p>
									<p><?php echo $rows_eventos['Data'];?></p>
								</div>
								<div class="Teste">
								<p><b>Horário</b></p>
									<p><?php echo $rows_eventos['Horario'];?></p>
								</div>
							</div>
								<br><br>
							
							</div>
							<?php }if($rows_eventos['Topico'] == 'Resumo'){ ?>
	
							<div class="PublicaçõesResumo">
						
							<p class="DescriçãoResumo"><?php echo $rows_eventos['Descricao'];?><br></p>
							<div  class="TituloResumo">
							<h2><?php echo $rows_eventos['Titulo'];?><br></h2></div>
									
							</div>		

    
					<?php
            }	}	
				
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