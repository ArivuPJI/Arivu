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
	<link rel="stylesheet" type="text/css" href="../../../../css/Criar.css"/>
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
	//Pegando os valores das checkbox do lateral direita
    $Materia = "";
	if(isset($_POST['ação1']) && $_POST['ação1'] == "Teste")
	{
		if(!empty($_POST['Materia']))
		{
            $Materia = $_POST['Materia'];
            $_SESSION['Materia'] = $Materia;
		}
    }
    
    $ano = "";
	if(isset($_POST['ação']) && $_POST['ação'] == "Filtrar")
	{
		if(!empty($_POST['Ano']))
		{
			$ano = $_POST['Ano'];
			foreach($ano as $ano2)
			{
				echo $ano2;
			}
		}
		else 
		{
			$ano = "";
		}

	}
	
	$alternativa = "";
	if(isset($_POST['ação']) && $_POST['ação'] == "Filtrar")
	{
		if(!empty($_POST['Alternativa']))
		{
			$alternativa = $_POST['Alternativa'];
			foreach($alternativa as $alternativa2)
			{
				echo $alternativa2;
			}
		}
		else 
		{
			$alternativa = "";
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
				<a href="Criar_Resumo.php"><b>Resumos</b></a>
				<?php if($_SESSION['Restricao'] == "Professor"){?>
				<a href="Criar_Evento.php"><b>Eventos</b></a>
                <a href="Criar_Prova.php"><b>Provas</b></a>
				<a class="SuperiorSelecionado" href=""><b>Questões</b></a>
				<?php } ?>
            </div>
        </div>

        <div class="Publicações">
        <div class="container">
            <div class="FormEventos" method="post" action="PHPCriar_Resumo.php">
            <h2>Crie a sua questão...</h2><br><br>
            
        <br>
        

        <div class="inputBox">
			<label><b>Matéria</b></label>
		</div>
        <br>

        <form action="" method="post">
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
        <div class="btnMateria">
			<input type="hidden" name="ação1" value="Teste">
			<input type="submit" value="Matéria">
            </div>
        </form>
        <br><br><br>
        
            
            
            <form class="FormCriar_Perguntas" method="post" action="PHPCriar_questao.php">

                    <?php 
                       

                     
						$_SESSION['Materia'] = $Materia;
						echo $_SESSION['Materia'];
                    
                        
                    ?>

        
            <br><br><br><br>
            <div class="inputBox">
			<label><b>Ano</b></label>
		</div>
        <br>
        
        <div class="Ano">
			<input type="radio" name="Ano" value="Primeiro" onclick="return myfun()" id="Primeiro" required>
			<label for="Primeiro">Primeiro</label>
			
			<input type="radio" name="Ano" value="Segundo" onclick="return myfun()" class="form_radio" id="Segundo" required>
            <label for="Segundo" class="form_label">Segundo</label>
            
            <input type="radio" name="Ano" value="Terceiro" onclick="return myfun()" class="form_radio" id="Terceiro" required>
            <label for="Terceiro" class="form_label">Terceiro</label>
            
            <input type="radio" name="Ano" value="Vestibular" onclick="return myfun()" class="form_radio" id="Vestibular" required>
			<label for="Vestibular" class="form_label">Vestibular</label>
				
        </div>
		<div class="inputBox">
			<label><b>Restrição</b></label>
		</div>
		<br>
        <div class="Restrição">
			<input type="radio" name="Restricao" value="Professor" onclick="return myfun()" id="Professor" required>
			<label for="Professor">Professor</label>
			
			<input type="radio" name="Restricao" value="Todos" onclick="return myfun()" class="form_radio" id="Todos" required>
			<label for="Todos" class="form_label">Todos</label>
				
        </div>
        
        <div class="inputBox">
			<label><b>Alternativas.</b></label>
			<p>Selecione a resposta correta.</p>
		</div>
		<br>
        <div class="Correto">
			<input type="radio" name="Alternativa" value="A" onclick="return myfun()" id="A" required><br>
			<input type="radio" name="Alternativa" value="B" onclick="return myfun()" class="form_radio" id="B" required><br>
			
			<input type="radio" name="Alternativa" value="C" onclick="return myfun()" class="form_radio" id="C" required><br>

			<input type="radio" name="Alternativa" value="D" onclick="return myfun()" class="form_radio" id="D" required><br>

			<input type="radio" name="Alternativa" value="E" onclick="return myfun()" class="form_radio" id="E" required><br><br>
			
			
		
		</div>


		<div class="Alternativas">
		<div class="box">
                <div class="inputBox">
					<input type="text" name="Alternativa_A" required><br><br>
					<input type="text" name="Alternativa_B" required><br><br>
					<input type="text" name="Alternativa_C" required><br><br>
					<input type="text" name="Alternativa_D" required><br><br>
					<input type="text" name="Alternativa_E" required>	
					</div>
		</div>
		</div>
			
			
		

	
		<br><br><br><br>
			<div class="inputBox">
			<label><b>Pergunta</b></label><br><br>
			<textarea class="Pergunta"  type="text" name="Pergunta" id="Pergunta" required></textarea>
            </div>
            <br><br><br>


            

	

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
				var a = document.getElementsByName('Ano');
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

			function myfun()
			{
				var a = document.getElementsByName('Alternativa');
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
	<div class="LateralDireita">
			
	</div>
</body>
</html>

<?php
}else{
	header("Location: ../../index.php");	
}
?>