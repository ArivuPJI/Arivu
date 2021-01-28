<!-- Essa tela serve apenas para o botão "Sair" do site. Funciona para limpar os dados
que foram inseridos, fazendo assim o deslogamento da conta -->

<?php
session_start();
unset($_SESSION['id_estudante'], $_SESSION['Email_academico']);

$_SESSION['LoginErro'] = "Deslogado com sucesso";
header("Location: ../../Login.php");

?>