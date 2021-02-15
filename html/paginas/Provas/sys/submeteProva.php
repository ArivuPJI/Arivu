<?php
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '../config.php';
    include_once('../../../../conexao.php');

    $provaId = (int)$_POST['prova'];
    $respostas = $_POST['respostas'];
    $id_usuario = $_SESSION['id_usuario'];

    $insereHistorico = $pdo->prepare("INSERT INTO `historico` SET `id_aluno` = ?, `id_prova` = ?");
    $insereHistorico->execute([
        $id_usuario,
        $provaId
    ]);
    $lastId = $pdo->lastInsertId();



    foreach ($respostas as $idQuestao => $resposta) {
        if ($resposta != '') {
            $insert = [$lastId, $idQuestao, $resposta];
            $insertRespostas = $pdo->prepare("INSERT INTO `respostas` SET `id_historico` = ?,
                `id_questao` = ?, `resposta` = ?, resposta_pessoa = ''");
            $insertRespostas->execute($insert);
        
    

    $id1 = $pdo->prepare("SELECT * FROM `opcoes`");
    $id1->execute();
    while ($row = $id1->fetchObject()) {
        $id_questao = $row->id_questao;
        $id = $row->id;
        
        $id2 = $pdo->prepare("SELECT * FROM `respostas`");
        $id2->execute();
        while ($row2 = $id2->fetchObject()) {
            $id_questao_resposta = $row2->id_questao;
            $resposta = $row2->resposta;
            $id_historico = $row2->id_historico;
            $id_resposta = $row2->id;

        $id3 = $pdo->prepare("SELECT * FROM `opcoes` where id_questao='$id_questao_resposta' and id = '$resposta'");
        $id3->execute();
        while ($row3 = $id3->fetchObject()) {
            $id_questao_resposta1 = $row3->correta;



            $adicionando_C = $pdo->prepare ("update respostas SET resposta_pessoa='$id_questao_resposta1' where id_historico = '$id_historico' and id='$id_resposta'");
            $adicionando_C ->execute();
            
            }
            }
    }
}
    }
    $_SESSION['id_historico'] = $id_historico;
}