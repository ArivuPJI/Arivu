<?php

session_start();
require_once('../../../conexao.php');

$Temas = $_SESSION['Temas'];
$Id = $_SESSION["Id"];
?>

<form action="teste2.php" method="post">
    <h1>Seu Id é: </h1>
    <input type="text" name="Temas" value="<?php echo $_SESSION['Temas'] ?>">
    
    <input type="hidden" name="ação" value="Filtrar">
	<input type="submit" value="Criar">
</form>

