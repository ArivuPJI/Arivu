<?php
session_start();
include_once("config.php");
    $Tema = $_POST['Tema'];
    $Materia = $_SESSION['Materia'];
    $Ano = $_POST['Ano'];
    $Restricao = $_POST['Restricao'];
    $Pergunta = $_POST['Pergunta'];
    $Correto = $_POST['Alternativa'];
    $Alternativa_A = $_POST['Alternativa_A'];
    $Alternativa_B = $_POST['Alternativa_B'];
    $Alternativa_C = $_POST['Alternativa_C'];
    $Alternativa_D = $_POST['Alternativa_D'];
    $Alternativa_E = $_POST['Alternativa_E'];
    

        
        $sql = "Insert into perguntas (Tema, Materia, Ano, Restricao, Pergunta, Correto, Alternativa_A, Alternativa_B, Alternativa_C, Alternativa_D, Alternativa_E) 
        values ('$Tema', '$Materia', '$Ano', '$Restricao', '$Pergunta', '$Correto', '$Alternativa_A', '$Alternativa_B', '$Alternativa_C', '$Alternativa_D', '$Alternativa_E')";
        $execute = mysqli_query($conexao, $sql);

        

    header("Location: Criar_Perguntas.php");