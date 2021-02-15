<?php
    session_start();
    include ('config.php');
    include_once('../../../conexao.php');

    $Query_Truncate = $pdo->prepare ("DELETE FROM `questoes`");
    $Query_Truncate->execute();


    //Recebendo variáveis para realizar a filtragem
    $Numero = $_POST['Numero'];
    $Matéria = $_SESSION['Materia'];
   
    
    //Fa
    $provas = $pdo->prepare("SELECT * FROM `aux` where tema = '$Matéria'");
    $provas->execute();

    while ($row = $provas->fetchObject()) {
    $id_questao = $row->id;
    $questao = $row->questao;
    $tipo = $row->tipo;
    


    $provas1 = $pdo->prepare("INSERT INTO questoes (id, id_prova, questao, tipo) values ('$id_questao', 3, '$questao','$tipo')");
    $provas1->execute();

    $sua_prova = $pdo->prepare("INSERT INTO provas (id, titulo, status) values (3, 'Sua prova', 1)");
    $sua_prova->execute();
    }

    

    $provas2 = $pdo->prepare("SELECT * FROM `questoes`");
    $provas2->execute();

    while ($row1 = $provas2->fetchObject()) {
    $id_questao1 = $row1->id;
    $questao1 = $row1->questao;
    $tipo1 = $row1->tipo;
?>
    <?php }?>
    


<!DOCTYPE html>
<html lang="pt_br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/provas1.css"/>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
		<script type="text/javascript" src="Pesquisar.js"></script>
		<script src="https://kit.fontawesome.com/704a3ad3a2.js" crossorigin="anonymous"></script>
	<title>Feed Eventos</title>
</head>
<body>


	<div class="NavegaçãoLateral"> <!--Navegação Lateral -->
	<img class="LogoLateral" src="../../../css/imagens/Logo_Lateral.png"><h1>Desespero</h1>
	<div class="liLateral">
			<li><a href="Feed_Eventos.php">Feed</b></li>
			<li  class="LateralSelecionado"><a href="../Provas/Prova.php"><b>Provas</a></a></li>
			<?php if($_SESSION['Email_pessoal'] != "Sem Conta"){ ?>
			<li><a href="">Agenda</a></li>
			<li><a href="">Perfil</a></li>
			<li><a href="../Redação/Redação.php">Redação</a></li>
			<li><a href="../Criar/Resumos/Criar_Resumo.php">Criar</a></li>
			<?php } ?>
			<li><?php echo "<a href='../../login/Sair.php'>Sair</a>"?></li>
			
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

                while ($row = $provas->fetchObject()) {
            ?>
                <li class="open-prova" data-id="<?php echo $row->id;?>">
                    <a href="prova.php?prova=<?php echo $row->id;?>">
                        <?php echo $row->titulo;?>
                    </a>
                </li>
            <?php }?>
            </ul>


            <section id="wrap-prova">
                <div class="sucesso">
                    <p>A prova foi submetida para avaliação!</p>
                    <p>Veja o gabarito da prova.</p>
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
