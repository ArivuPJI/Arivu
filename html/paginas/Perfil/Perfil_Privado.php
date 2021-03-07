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
	<link rel="stylesheet" type="text/css" href="../../../css/Perfis.css"/>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
		<script type="text/javascript" src="Pesquisar.js"></script>
		<script src="https://kit.fontawesome.com/704a3ad3a2.js" crossorigin="anonymous"></script>
		<title>Perfil</title>
</head>
<body>
	<div class="NavegaçãoLateral"> <!--Navegação Lateral -->
	<img class="LogoLateral" src="../../../css/imagens/Logo_Lateral.png"><h1>Arivu</h1>
	<div class="liLateral">
			<li><a href="../Feed/Feed_Eventos.php">Feed</a></li>
			<li><a href="../Provas/Prova.php">Provas</a></li>
			<?php if($_SESSION['Email_pessoal'] != "Sem Conta"){ ?>
			<li><a href="../Agenda/Agenda.php">Agenda</a></li>
			<li  class="LateralSelecionado"><a href=""><b>Perfil</b></a></li>
			<li><a href="../Redação/Professor/Minhas_Redações.php">Redação</a></li>
			
			<?php if($_SESSION['Restricao'] == "Estudante"){ ?>
			<li><a href="../Redação/Aluno/Redação_Aluno.php">Redação</a></li>
			<?php }?>
			<li><a href="../Criar/Resumos/Criar_Resumo.php">Criar</a></li>
			<?php } ?>
			<li><?php echo "<a href='../../login/Sair.php'>Sair</a>"; ?></li>
			
		</div>
	</div>
	<div class="BodyConteudo"> <!-- Corpo, onde fica todo  conteudo do site -->
	<div class="NavegaçãoSuperior">
	<!-- Pesquisa -->
		<div class="aSuperior">
			<a href="Perfil.php"><b>Público</b></a>
			<a class="SuperiorSelecionado"><b>Privado</b></a>
		</div>
	</div>



	<div class="Publicações">

	<?php
		$Query_Eventos = "SELECT Id_Feed, Titulo, Descricao, Data, Horario, Materia, Id_Quem_Postou, Restricao, Topico FROM feed where Id_Quem_Postou = '$id_estudante'"; //Pegando dados do evento do banco
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
					
						<a class="DescriçãoResumo" href="Info_Perfil_Privado.php?codigo=<?php echo $rows_eventos['Id_Feed']; ?>"><?php echo $rows_eventos['Descricao']?></a>
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