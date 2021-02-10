<?php
session_start();
    include_once("../../../../conexao.php");
    $Titulo = mysqli_real_escape_string($conexao, $_POST['Titulo']);
    $Tema = ['Tema'];
    $Materia = $_POST['Materia'];
    $Estado = $_POST['Estado'];
    $Cidade = $_POST['Cidade'];
    $Referencia = $_POST['Referencia'];
    $Data = $_POST['Data'];
    $Horario = $_POST['Horario'];
    $Restricao = $_POST['Restricao'];
    $Descricao = $_POST['Descricao'];
    $Id_Quem_Postou = $_SESSION['id_usuario'];
    


    if(!empty($Titulo))
    {
        $sql = "Insert into feed (Titulo, Tema, Materia, Estado, Cidade, Referencia, Data, Horario, Restricao, Descricao, Topico, Id_Quem_Postou) values ('$Titulo', '$Tema', '$Materia', '$Estado', '$Cidade', '$Referencia', '$Data', '$Horario', '$Restricao', '$Descricao', 'Evento', '$Id_Quem_Postou')";
        $execute = mysqli_query($conexao, $sql);

        

    }header("Location: Criar_Evento.php");