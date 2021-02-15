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
	<link rel="stylesheet" type="text/css" href="../../../css/Feed1.css"/>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
		<script type="text/javascript" src="Pesquisar.js"></script>
		<script src="https://kit.fontawesome.com/704a3ad3a2.js" crossorigin="anonymous"></script>
	<title>Feed Eventos</title>
</head>
<body>
	<div class="NavegaçãoLateral"> <!--Navegação Lateral -->
	<img class="LogoLateral" src="../../../css/imagens/Logo_Lateral.png"><h1>Desespero</h1>
	<div class="liLateral">
			<li class="LateralSelecionado"><a href="Feed_Eventos.php"><b>Feed</b></a></li>
			<li><a href="../Provas/Prova.php">Provas</a></li>
			<?php if($_SESSION['Email_pessoal'] != "Sem Conta"){ ?>
			<li><a href="../Agenda/Agenda.php">Agenda</a></li>
			<li><a href="../Perfil/Perfil.php">Perfil</a></li>
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
			<a class="SuperiorSelecionado" href="Feed_Eventos.php"><b>Eventos</b></a>
			<a href="Feed_Resumos"><b>Resumos</b></a>
		</div>
	</div>


	<?php
	//Pegando os valores das checkbox do lateral direita
	$campo = "";
	if(isset($_POST['ação']) && $_POST['ação'] == "Filtrar")
	{
		if(!empty($_POST['Materia']))
		{
			$campo = $_POST['Materia'];
			foreach($campo as $value)
			{
			}
		}
		else 
		{
			$campo = "";
		}

	}

?>

	<div class="Publicações">
	<ul class="resultado">
		
	</ul>
	<?php
		$Query_Eventos = "SELECT Titulo, Descricao, Data, Horario, Materia, Id_Quem_Postou, Restricao FROM feed where Topico = 'Evento'"; //Pegando dados do evento do banco
		$Eventos = mysqli_query($conexao, $Query_Eventos) or die (mysqli_error($conexao));
		while($rows_eventos = mysqli_fetch_assoc($Eventos))
			{ 
				//Se não tiver checkbox selecionada ele irá mostrar todos os temas
				if($campo == "")
				{ 
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
				</div>
				<?php
					}

				//Caso não esteja em branco ele armazenará todos os valores das checkbox e
				//buscará no banco de dados temas iguais aos selecionados.
				if(!empty($_POST['Materia']))
				{
					if ($rows_eventos['Materia'] == $value)
					{
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
					<?php
					}
				}
			} 
	// }?>
		</div>

	</div>


	<div class="LateralDireita">
		<form method="Post" action="">
			<!-- Filtros da Lateral direita -->
			<div class="CorpoFiltros">
				<b><p>FILTROS</p></b>
				<p class="Selecionar">Selecione a matéria</p>
				<!-- Radios Button -->

				
				<div class="Filtros">
					<input type="radio" name="Materia[]" value="Matemática" onclick="return myfun()" id="Matemática">
					<label for="Matemática">Matemática</label>
			
					<input type="radio" name="Materia[]" value="Física" onclick="return myfun()" class="form_radio" id="Física">
					<label for="Física" class="form_label">Física</label>
				
					<input type="radio" name="Materia[]" value="Português" onclick="return myfun()" class="form_radio" id="Português">
					<label for="Português" class="form_label">Portugês</label>

					<input type="radio" name="Materia[]" value="Inglês" onclick="return myfun()" class="form_radio" id="Inglês">
					<label for="Inglês" class="form_label">Inglês</label>

					<input type="radio" name="Materia[]" value="Educação Física" onclick="return myfun()" class="form_radio" id="Educação Física">
					<label for="Educação Física" class="form_label">Educação Física</label>

					<input type="radio" name="Materia[]" value="História" onclick="return myfun()" class="form_radio" id="História">
					<label for="História" class="form_label">História</label>

					<input type="radio" name="Materia[]" value="Geografia" onclick="return myfun()" class="form_radio" id="Geografia">
					<label for="Geografia" class="form_label">Geografia</label>

					<input type="radio" name="Materia[]" value="Biologia" onclick="return myfun()" class="form_radio" id="Biologia">
					<label for="Biologia" class="form_label">Biologia</label>

					<input type="radio" name="Materia[]" value="Química" onclick="return myfun()" class="form_radio" id="Química">
					<label for="Química" class="form_label">Química</label>
					</div>
			</div>

			<span id="notvalid"></span>
			<script type="text/javascript">

			function myfun()
			{
				var a = document.getElementsByName('Materia');
				var newvar = 0;
				var count;
				for(count=0; count<a.length; count++)
				{
					if(a[count].checked == true)
					{
						newvar = newvar + 1;
					}
				}
				
			}

		</script>
		
		<div class="btnFiltrar">
		<input type="hidden" name="ação" value="Filtrar">
		<input type="submit" value="Filtrar"></div>
		</form>

	</div>
	
</body>
</html>

<?php
}else{
	header("Location: ../../index.php");	
}
?>