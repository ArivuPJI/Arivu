<?php
    session_start();
    include ('config.php');
    include_once('../../../conexao.php');


    //Recebendo variáveis para realizar a filtragem
    $Numero = $_POST['Numero'];
    $Matéria = $_SESSION['Materia'];
    $Tema = $_POST['Tema'];
    $Ano = $_POST['Ano'];


   
    
    //Fa
    $Truncate = "Truncate table questoes";
    $Truncate_Execute = mysqli_query($conexao, $Truncate);

    $provas = $pdo->prepare("SELECT * FROM `aux` where materia = '$Matéria' && tema = '$Tema' && restricao = 'Todos' && ano = '$Ano'");
    $provas->execute();

    while ($row = $provas->fetchObject()) {
    $id_questao = $row->id;
    $questao = $row->questao;
    $tipo = $row->tipo;
    $tema = $row->tema;
    $materia = $row->materia;
    $restricao = $row->restricao;
    $ano = $row->ano;
    


    $provas1 = $pdo->prepare("INSERT INTO questoes (id, id_prova, questao, tipo, tema, materia, restricao, ano) values ('$id_questao', 3, '$questao','$tipo', '$tema', '$materia', '$restricao', '$ano')");
    $provas1->execute();

    $sua_prova = $pdo->prepare("INSERT INTO provas (id, titulo, status) values (3, 'Sua prova', 1)");
    $sua_prova->execute();
    }

    
	$Query_Limite = "SELECT * from questoes order by id desc limit 1"; //Teste
	$Limita = mysqli_query($conexao, $Query_Limite) or die (mysqli_error($conexao));
	while($rows_limite = mysqli_fetch_assoc($Limita)) 
	{
		$Limite = $rows_limite['id'];
	

    for($x = $rows_limite['id'];  $x > $Numero; $x--){

    for($Numero; $Numero > 0; $Numero--){	
    $random = rand(1, $Limite);
    }

    	
//Deletando errado... acha algo
    $provas3 = $pdo->prepare("DELETE FROM `questoes` where id='$random'");
    $provas3->execute();
    }
}
?>
    


<!DOCTYPE html>
<html lang="pt_br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/provas1.css"/>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
		<script type="text/javascript" src="Pesquisar.js"></script>
		<script src="https://kit.fontawesome.com/704a3ad3a2.js" crossorigin="anonymous"></script>
        <link rel="icon" type="image/png" sizes="32x32" href="../../../css/imagens/favicon-32x32.png">
	<title>Provas</title>
</head>
<body>


	<div class="NavegaçãoLateral"> <!--Navegação Lateral -->
	<img class="LogoLateral" src="../../../css/imagens/Logo_Lateral.png"><h1>Arivu</h1>
	<div class="liLateral">
    <li><a href="Feed_Eventos.php">Feed</a></li>
			<li class="LateralSelecionado"><a href="../Provas/Prova.php"><b>Provas</b></a></li>
			<?php if($_SESSION['Email_pessoal'] != "Sem Conta"){ ?>
			<li><a href="../Agenda/Agenda.php">Agenda</a></li>
			<li><a href="../Perfil/Perfil.php">Perfil</a></li>
			<?php if($_SESSION['Restricao'] == "Professor"){ ?>
			<li><a href="../Redação/Professor/Minhas_Redações.php">Redação</a></li>
			<?php }?>
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
			<a class="SuperiorSelecionado" href=""><b>Prova</b></a>
		</div>
	</div>
    <div class="Publicações">
    <section id="wrap-geral">
            <ul id="prova-lista">
            <?php

                    
                
                $provas = $pdo->prepare("SELECT * FROM `provas` ORDER BY `id` DESC");
                $provas->execute();

                while ($row = $provas->fetchObject()) { ?>
            
                <li class="open-prova" data-id="<?php echo $row->id;?>">
                    <a href="prova.php?prova=<?php echo $row->id;?>">
                        <?php echo $row->titulo; ?>
                    </a>
                </li>
            <?php }?>
            </ul>


            <section id="wrap-prova">
                <div class="sucesso">
                    <p>A prova foi submetida para avaliação! <br> Veja o gabarito da prova.</p>
                    <p></p>
                    <input type="button" onclick="window.location = 'Teste2.php'" value="Ver gabarito">
                </div>

                <h1></h1>

                <div class="questoes">
                
                </div>

                <button class="button" id="prev">Anterior</button>
                <button class="button" id="next">Próxima</button>
            </section>

            <div style="clear:both;"></div>
</div>
    </div>
<div class="LateralDireita">
    
    </div>
        </section>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/functions.js"></script>
        <script type="text/javascript" src="js/timer.js"></script>
    </body>
</html>
