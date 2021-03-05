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
	<title>Redações</title>
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
			<li><?php echo "<a href='../../login/Sair.php'>Sair</a>"; ?></li>
			
		</div>
    </div>
    
    <div class="BodyConteudo"> <!-- Corpo, onde fica todo  conteudo do site -->
	<div class="NavegaçãoSuperior">
	<!-- Pesquisa -->
		<div class="aSuperior">
        <a class="SuperiorSelecionado" href="Feed_Eventos.php"><b>Criar</b></a>
			<a href="Minhas_Redações.php"><b>Redações</b></a>
		</div>
    </div>
    <div class="Publicações">
        <div class="container">
        <form action="PHPRedação_Aluno.php" method="POST" class="FormEventos">
            <h2>Crie a sua redação...</h2><br><br>
            
    <?php
    //Esse PHP pega o tema da tabela "temas_redação" e os coloca em forma decrescente. Dessa forma o código pega o último valor e conseguimos fazer uma
    //seleção de temas de forma randômica. A variável "$Limite" é esse último valor. Usamos esse mesmo sistema na criação de provas e no envio para o professor.
    $Query_Limite = "SELECT * from temas_redação order by Id_Tema desc limit 1";
	$Limita1 = mysqli_query($conexao, $Query_Limite) or die (mysqli_error($conexao));


	$Limita = mysqli_query($conexao, $Query_Limite) or die (mysqli_error($conexao));
	while($rows_limite = mysqli_fetch_assoc($Limita)) 
	{
		$Limite = $rows_limite['Id_Tema'];
	}
		
		$random = rand(1, $Limite);


	$Query_Teste = "SELECT * from temas_redação where Id_Tema = '$random'"; //Teste
	$Limita1 = mysqli_query($conexao, $Query_Teste) or die (mysqli_error($conexao));

	
	while($rows_limite1 = mysqli_fetch_assoc($Limita1)) 
	{
        $Tema = $rows_limite1['Tema'];
        $_SESSION['Tema'] = $rows_limite1['Tema'];

        ?>
        <!--Aqui o Html volta a aparecer e iremos fazer todo o corpo do site que vai ser enviado para o professor.-->
            <div class="box">
                <div class="inputBox">
                    <label><b>Tema:   <?php echo$Tema; ?></b></label>
            <?php } ?>
            <br><br><br><br>
                    <label><b>Título:</b></label>
                    <input type="text" name="Titulo" required><br><br>
                </div>

            <div class="inputBox">
            <label><b>Redação</b></label><br><br>
            <div class="Conteudo">
                <textarea name="Conteudo" id="Conteudo" require></textarea>
            </div>
            </div>
            
            <br>
        </div>
			<div class="btnFiltrar">
			<input type="hidden" name="ação" value="Filtrar">
			<input type="submit" value="Criar">
			</div>
			</div>
    </div>
    </form>
   
    <script src="../../ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('Conteudo');
    </script>
</body>

<?php
}else{
	header("Location: ../../index.php");	
}
?>

</html>

