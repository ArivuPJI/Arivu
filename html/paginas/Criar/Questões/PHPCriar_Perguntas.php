<?php
session_start();
include_once("../../Provas/config.php");


    $Materia = $_SESSION['Materia'];
    $Tema = $_POST['Tema'];
    $Ano = $_POST['Ano'];
    $Restrição = $_POST['Restricao'];
    $Pergunta = $_POST['Pergunta'];

    $Correta = $_POST['Alternativa'];
    $Alternativa_A = $_POST['Alternativa_A'];
    $Alternativa_B = $_POST['Alternativa_B'];
    $Alternativa_C = $_POST['Alternativa_C'];
    $Alternativa_D = $_POST['Alternativa_D'];
    $Alternativa_E = $_POST['Alternativa_E'];

    
        $adicionando_aux = $pdo->prepare ("Insert into aux (questao, tipo, tema, materia, restricao, ano) 
        values ('$Pergunta', 0, '$Tema', '$Materia','$Restrição','$Ano')");
        $adicionando_aux ->execute();


        $id = $pdo->prepare("SELECT id FROM `aux`");
        $id->execute();
        while ($row = $id->fetchObject()) {
        $id_questao = $row->id;
        }

        $adicionando_A = $pdo->prepare ("Insert into opcoes (id_questao, opcao, correta, correta_1) 
        values ('$id_questao', '$Alternativa_A', 'A', '')");
        $adicionando_A ->execute();
        $adicionando_B = $pdo->prepare ("Insert into opcoes (id_questao, opcao, correta, correta_1) 
        values ('$id_questao', '$Alternativa_B', 'B', '')");
        $adicionando_B ->execute();
        $adicionando_C = $pdo->prepare ("Insert into opcoes (id_questao, opcao, correta, correta_1) 
        values ('$id_questao', '$Alternativa_C', 'C', '')");
        $adicionando_C ->execute();
        $adicionando_D = $pdo->prepare ("Insert into opcoes (id_questao, opcao, correta, correta_1) 
        values ('$id_questao', '$Alternativa_D', 'D', '')");
        $adicionando_D ->execute();
        $adicionando_E = $pdo->prepare ("Insert into opcoes (id_questao, opcao, correta, correta_1) 
        values ('$id_questao', '$Alternativa_E', 'E', '')");
        $adicionando_E ->execute();



 //Checando a resposta corrteta para adicionar o "X" somente nela
 if($Correta == "A")
 {
 $adicionando_A = $pdo->prepare ("update opcoes SET correta_1='A' where id_questao='$id_questao' and correta='A'");
 $adicionando_A ->execute();
 }

 if($Correta == "B")
 {
 $adicionando_B = $pdo->prepare ("update opcoes SET correta_1='B' where id_questao='$id_questao' and  correta='B'");
 $adicionando_B ->execute();
 }

 if($Correta == "C")
 {
 $adicionando_C = $pdo->prepare ("update opcoes SET correta_1='C' where id_questao='$id_questao' and  correta='C'");
 $adicionando_C ->execute();
 }

 if($Correta == "D")
 {
 $adicionando_D = $pdo->prepare ("update opcoes SET correta_1='D' where id_questao='$id_questao' and  correta='D'");
 $adicionando_D ->execute();
 }

 if($Correta == "E")
 {
 $adicionando_E = $pdo->prepare ("update opcoes SET correta_1='E' where id_questao='$id_questao' and correta='E'");
 $adicionando_E ->execute();
 }


 header("Location: Criar_Perguntas.php");
?>