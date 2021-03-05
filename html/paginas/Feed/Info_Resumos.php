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
	<link rel="stylesheet" type="text/css" href="../../paginas/Redação/Aluno/Redação.css"/>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
		<script type="text/javascript" src="Pesquisar.js"></script>
		<script src="https://kit.fontawesome.com/704a3ad3a2.js" crossorigin="anonymous"></script>
	<title>Feed Resumos</title>
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
			<?php if($_SESSION['Restricao'] == "Professor"){ ?>
			<li><a href="../Redação/Professor/Minhas_Redações.php">Redação</a></li>
			<?php }?>
			<?php if($_SESSION['Restricao'] == "Estudante"){ ?>
			<li><a href="../Redação/Aluno/Redação_Aluno.php">Redação</a></li>
			<?php }?>
			<li><a href="../Criar/Criar_Resumo.php">Criar</a></li>
			<?php } ?>
			<li><?php echo "<a href='../../login/Sair.php'>Sair</a>"; ?></li>
			
		</div>
	</div>
	<div class="BodyConteudo"> <!-- Corpo, onde fica todo  conteudo do site -->
	<div class="NavegaçãoSuperior">
	<!-- Pesquisa -->
	
	<form method="POST" id="form-pesquisa" action=""  class="Pesquisa">
			<div class="Pesquisar">
				<div class="PesquisarIcone">
					<i class="fas fa-search"></i>
				</div>
				<input class="input" type="text" name="pesquisa" id="pesquisa" placeholder="Buscar eventos...">
			</div>
		</form>
		
		
		<div class="aSuperior">
			<a class="" href="Feed_Eventos.php"><b>Eventos</b></a>
			<a class="SuperiorSelecionado" href=""><b>Resumos</b></a>
		</div>
	</div>

    <div class="Publicações">
	<ul class="resultado">
		
		</ul>
	<?php
    $Id_Feed = $_GET['codigo'];
		$Query_Eventos = "SELECT Id_Feed, Titulo, Materia, Descricao, Data, Horario, Tema, Topico, Conteudo, Id_Quem_Postou, Restricao FROM feed where Id_Feed = '$Id_Feed'"; //Pegando dados do evento do banco
		$Eventos = mysqli_query($conexao, $Query_Eventos) or die (mysqli_error($conexao));
		while($rows_eventos = mysqli_fetch_assoc($Eventos))
			{  ?>
			
                <div class="Resumo_Click_Corpo">
                <div class="Título">
                    <h2><?php echo $rows_eventos['Titulo']; ?></h2>
                </div>
                    <div class="Resumo_Click_Conteudo">
                        <p><?php echo $rows_eventos['Conteudo']; ?></p>
                    </div>
                </div>
                            <?php
                                } ?>
            
                </div>
                </div>
				<?php
                    ?>

<div class="LateralDireita">
</div>
	
    </body>
    </html>
    
    <?php
    }else{
        header("Location: ../../index.php");	
    }
    ?>