
<?php
session_start();
include_once '../../../../conexao.php';
include_once 'conexao.php';

$titulos = $_POST["titulo"];
$Redação = $_POST['Conteudo'];
$Id_Professor = $_SESSION['Id_Professor'];
$Id_Redação = $_SESSION['Id_Redação'];



$cont_insert = false;

foreach ($titulos as $titulo) {
    $result_aula = "INSERT INTO correcao (titulo) VALUES (:titulo)";

    $insert_aula = $conn->prepare($result_aula);
    $insert_aula->bindParam(':titulo', $titulo);
    if ($insert_aula->execute()) {
        $cont_insert = true;
    } else {
        $cont_insert = false;
    }

}





$sql = "UPDATE correcao SET id_redacao = '$Id_Redação' WHERE id_redacao = 0";
  // Prepare statement
  $stmt = $conn->prepare($sql);
  // execute the query
  $stmt->execute();
  // echo a message to say the UPDATE succeeded


$sql = "UPDATE redacoes SET Correção = '$Redação', Estado ='Sim' WHERE Id_Redação = '$Id_Redação'";
if ($conexao->query($sql) === TRUE) {
    header("Location: Correções.php");
  } else {
    echo "Error updating record: " . $conexao->error;
  }