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
	<link rel="stylesheet" type="text/css" href="../../../../css/Teste.css"/>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
		<script type="text/javascript" src="Pesquisar.js"></script>
		<script src="https://kit.fontawesome.com/704a3ad3a2.js" crossorigin="anonymous"></script>
	<title>Feed Eventos</title>
</head>
<body>
	<div class="NavegaçãoLateral"> <!--Navegação  Lateral -->
		<img class="LogoLateral" src="../../../../css/imagens/Logo_Lateral.png"><h1>Desespero</h1>
		<div class="liLateral">
				<li><a href="../../Feed/Feed_Eventos.php">Feed</a></li>
				<li><a href="../../Provas/Prova.php">Provas</a></li>
				<?php if($_SESSION['Email_pessoal'] != "Sem Conta"){ ?>
				<li><a href="">Agenda</a></li>
				<li><a href="">Perfil</a></li>
				<li class="LateralSelecionado"><a href=""><b>Criar</b></a></li>
				<?php } ?>
				<li><?php echo "<a href='../../login/Sair.php'>Sair</a>"; ?></li>
				
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
				echo $value;
			}
		}
		else 
		{
			$campo = "";
		}

	}

	$restricao = "";
	if(isset($_POST['ação']) && $_POST['ação'] == "Filtrar")
	{
		if(!empty($_POST['Restricao']))
		{
			$restricao = $_POST['Restricao'];
			foreach($restricao as $restricao2)
			{
				echo $restricao2;
			}
		}
		else 
		{
			$restricao2 = "";
		}

	}

?>
	<div class="BodyConteudo"> <!-- Corpo, onde fica todo  conteudo do site -->
        <div class="NavegaçãoSuperior"> <!-- Parte superior  -->
            <div class="aSuperior"> 
				<a class="SuperiorSelecionado" href="Criar_Resumo.php"><b>Resumos</b></a>
				<?php if($_SESSION['Restricao'] == "Professor"){?>
				<a href="../Eventos/Criar_Evento.php"><b>Eventos</b></a>
                <a href=""><b>Provas</b></a>
				<a href="Criar_Perguntas.php"><b>Questões</b></a>
				<?php } ?>
            </div>
        </div>

	<div class="Publicações">
        <div class="container">
            <form class="FormEventos" method="post" action="PHPCriar_Resumo.php">
            <h2>Crie o seu resumo...</h2><br><br>
            <div class="box">
                <div class="inputBox">
                    <label><b>Titulo</b></label>
                    <input type="text" name="Titulo" required>
                </div>
            </div>
			<br>
			<div class="box">
            <div class="inputBox">
				<label><b>Tema</b></label>
				<input type="text" name="Tema" required>
			</div>
		</div>

        <br><br>
        <div class="inputBox">
			<label><b>Matéria</b></label>
		</div>
		<br>
        <div class="Filtros">
			<input type="radio" name="Materia" value="Matemática" onclick="return myfun()" id="Matemática">
			<label for="Matemática">Matemática</label>
			
			<input type="radio" name="Materia" value="Física" onclick="return myfun()" class="form_radio" id="Física">
			<label for="Física" class="form_label">Física</label>
				
			<input type="radio" name="Materia" value="Português" onclick="return myfun()" class="form_radio" id="Português">
			<label for="Português" class="form_label">Portugês</label>

			<input type="radio" name="Materia" value="Inglês" onclick="return myfun()" class="form_radio" id="Inglês">
			<label for="Inglês" class="form_label">Inglês</label>

			<input type="radio" name="Materia" value="Educação Física" onclick="return myfun()" class="form_radio" id="Educação Física">
			<label for="Educação Física" class="form_label">Educação Física</label><br><br>

			<input type="radio" name="Materia" value="História" onclick="return myfun()" class="form_radio" id="História">
			<label for="História" class="form_label">História</label>

			<input type="radio" name="Materia" value="Geografia" onclick="return myfun()" class="form_radio" id="Geografia">
			<label for="Geografia" class="form_label">Geografia</label>

			<input type="radio" name="Materia" value="Biologia" onclick="return myfun()" class="form_radio" id="Biologia">
			<label for="Biologia" class="form_label">Biologia</label>

			<input type="radio" name="Materia" value="Química" onclick="return myfun()" class="form_radio" id="Química">
			<label for="Química" class="form_label">Química</label>
		</div>
            <br><br>
            

			<div class="inputBox">
			<label><b>Restrição</b></label>
		</div>
		<br>
        <div class="Restrição">
			<input type="radio" name="Restricao" value="Publico" onclick="return myfun()" id="Publico" required>
			<label for="Publico">Público</label>
			
			<input type="radio" name="Restricao" value="Privado" onclick="return myfun()" class="form_radio" id="Privado" required>
			<label for="Privado" class="form_label">Privado</label>
				
		</div>
		

			<div class="inputBox">
			<label><b>Descrição</b></label><br><br>
			<textarea class="Descrição"  type="text" name="Descricao" id="Descricao" required></textarea>
            </div>
            <br><br><br>
            

            <div class="inputBox">
            <label><b>Conteúdo</b></label><br><br>
            <div class="Conteudo">
                <textarea name="Conteudo" id="Conteudo" require></textarea>
            </div>
            </div>
	

			<div class="btnFiltrar">
			<input type="hidden" name="ação" value="Filtrar">
			<input type="submit" value="Criar">
			</div>
			</div>
			
			
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

			function myfun()
			{
				var a = document.getElementsByName('Restricao');
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
		

		
       
</form>
	<div class="LateralDireitaCriar">
			
	</div>
	<script src="../../ckeditor/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('Conteudo');
        </script>
</body>
</html>

<?php
}else{
	header("Location: ../../index.php");	
}
?>