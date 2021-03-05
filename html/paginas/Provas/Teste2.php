<?php
    session_start();
    include ('config.php');
    include_once('../../../conexao.php');
    ?>
<!DOCTYPE html>
<html lang="pt_br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/gabarito.css"/>
    <link href="css/provas.css" rel="stylesheet" type="text/css"/>
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
			<li class="LateralSelecionado"><a href="../Provas/Prova.php"><b>Provas</b></a></li>
			<?php if($_SESSION['Email_pessoal'] != "Sem Conta"){ ?>
			<li><a href="../Agenda/">Agenda</a></li>
			<li><a href="../Perfil/Perfil.php">Perfil</a></li>
			<?php if($_SESSION['Restricao'] == "Professor"){ ?>
			<li><a href="../Redação/Professor/Minhas_Redações.php">Redação</a></li>
			<?php }?>
			<?php if($_SESSION['Restricao'] == "Estudante"){ ?>
			<li><a href="../Redação/Aluno/Redação_Aluno.php">Redação</a></li>
			<?php }?>
			<li><a href="../Criar/Resumos/Criar_Resumo.php">Criar</a></li>
			<?php } ?>
			<li><?php echo "<a href='../../login/Sair.php'>Sair</a>"?></li>
			
		</div>
	</div>
  
	<div class="BodyConteudo"> <!-- Corpo, onde fica todo  conteudo do site -->
	<div class="NavegaçãoSuperior">
	<!-- Pesquisa -->
		<div class="aSuperior">
			<a class="SuperiorSelecionado" href=""><b>Provas</b></a>
		</div>
	</div>
    <div class="Publicações">
    <div class="Cores">
       <div class="Verde"> Acertou</div><!--
    --><div class="Amarelo">Sua resposta</div><!--
    --><div class="Vermelho">Errou</div>
    </div>
    
    
<?php
$id_questao_resposta = 0;

$id_historico1 = $pdo->prepare("SELECT id_historico FROM `respostas`  order by id_historico desc limit 1");
$id_historico1->execute();
while ($row = $id_historico1->fetchObject()) {
$id_historico = $row->id_historico;
}


$id = $pdo->prepare("SELECT id FROM `aux`");
$id->execute();
while ($row = $id->fetchObject()) {
$id_questao = $row->id;


$id_opc = $pdo->prepare("SELECT id FROM `opcoes` ");
$id_opc->execute();
while ($row = $id_opc->fetchObject()) {
$id_opcao = $row->id;



$id_foda = $id_historico;
$respostas = $pdo->prepare("SELECT * FROM `respostas` where id_questao='$id_questao' and resposta='$id_opcao' and id_historico='$id_historico'");
        $respostas->execute();
        while ($row = $respostas->fetchObject()) {
        $gabarito = $row->resposta;
        $id_questao_resposta = $row->id_questao;  
        $resposta_pessoa = $row->resposta_pessoa;
        
        ?>
        
        <div class="teste">
        <div class="q"><?php
        
  
       ?>  <?php    $contador = 0;
        $q = $pdo->prepare("SELECT * FROM `opcoes` where id_questao='$id_questao_resposta'");
        $q->execute();
        while ($row = $q->fetchObject()) {
        $q1 = $row->correta;
        $q2 = $row->correta_1;
        $id2 = $row->id;

        
        
        if ($q2 != "")
        {
            if($q2 == $resposta_pessoa){
                
        ?><a class="a"><?php echo $resposta_pessoa?></a><?php
            }else{
                ?><a class="c"><?php echo $q1?></a><?php
            }
            }else{
            ?><a><?php echo $q1?></a><?php
        }
    }   }
}?> </div></div> <?php } ?> <div class="b"> <?php



    
    $id = $pdo->prepare("SELECT id FROM `aux`");
    $id->execute();
    while ($row = $id->fetchObject()) {
    $id_questao = $row->id;
    
    
    $id_opc = $pdo->prepare("SELECT id FROM `opcoes` ");
    $id_opc->execute();
    while ($row = $id_opc->fetchObject()) {
    $id_opcao = $row->id;
    
    ?>
    

    <?php
    $respostas = $pdo->prepare("SELECT * FROM `respostas` where id_questao='$id_questao' and resposta='$id_opcao' and id_historico='$id_historico'");
            $respostas->execute();
            while ($row = $respostas->fetchObject()) {
            $gabarito = $row->resposta;
            $id_questao_resposta = $row->id_questao;  
            $resposta_pessoa = $row->resposta_pessoa;
            
            
            
  
    $mostrar_gabarito = $pdo->prepare("SELECT * FROM `respostas` where id_questao='$id_questao_resposta' and id_historico='$id_historico'");
    $mostrar_gabarito->execute(); 


    while ($row = $mostrar_gabarito->fetchObject()) {
    $mostrar_resposta = $row->resposta_pessoa;
    ?><a class="b2"><?php echo $mostrar_resposta;?></a><br><?php
    }

}}
    }
     ?>
     </div>
    </div>
    </div>

<div class="LateralDireita">
</div>
      </body>