<?php

    define('host', 'localhost');
    define('usuario', 'root');
    define('senha', '1234');
    define('db', 'desespero');

    $conexao = mysqli_connect(host, usuario, senha, db) or die ("Não foi possivel conectar");
    $conexao -> set_charset("utf8");
?>

