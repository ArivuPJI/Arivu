<?php
session_start();
include_once("../../../../conexao.php");
    $Titulo = mysqli_real_escape_string($conexao, $_POST['Titulo']);
    $Tema = $_POST['Tema'];
    $Materia = $_POST['Materia'];
    $Restricao = $_POST['Restricao'];
    $Descricao = $_POST['Descricao'];
    $Conteudo = $_POST['Conteudo'];
    $Id_Quem_Postou = $_SESSION['id_usuario'];
    


    if(!empty($Titulo))
    {
        $sql = "Insert into feed (Titulo, Tema, Materia ,  Restricao, Descricao, Topico, Id_Quem_Postou) values ('$Titulo', '$Tema', '$Materia', '$Restricao', '$Descricao', 'Resumo', '$Id_Quem_Postou')";
        $execute = mysqli_query($conexao, $sql);

        

    }header("Location: Criar_Resumo.php");