<?php
session_start();
include_once("../../../../conexao.php");
    $Nome_Autor = $_SESSION['Nome_Completo'];
    $Titulo = $_POST['Titulo'];
    $Tema = $_SESSION['Tema'];
    $Conteudo = $_POST['Conteudo'];
    $Id_Autor = $_SESSION['id_usuario'];
    

    //Pegando os dados da redação e inserindo a redação no banco de dados
    echo $Titulo;
    if(!empty($Titulo))
    {
        $sql = "INSERT INTO redacoes (`Tema`, `Título`, `Redação`, `Nome_Aluno`, `Id_Aluno`, `Estado`, `Data`, Id_Professor, Nome_Professor) VALUES ('$Tema', '$Titulo', '$Conteudo', '$Nome_Autor', '$Id_Autor', 'Não', NOW(), 0, '')";
        $execute = mysqli_query($conexao, $sql);
    }
    
    //Enviando para um professor aleatório do sistema
    $Query_Limite = "SELECT id_usuario from login order by id_usuario desc limit 1";
	$Limita1 = mysqli_query($conexao, $Query_Limite) or die (mysqli_error($conexao));


	$Limita = mysqli_query($conexao, $Query_Limite) or die (mysqli_error($conexao));
	while($rows_limite = mysqli_fetch_assoc($Limita)) 
	{
		$Limite = $rows_limite['id_usuario'];
	}
		
		
    for($x = 0; $x<1; $x = $x){
    $random = rand(1, $Limite);
	$Query_Teste = "SELECT Nome_Completo, Restricao, id_usuario from login where id_usuario = '$random' && Restricao = 'Professor'"; //Teste
	$Limita1 = mysqli_query($conexao, $Query_Teste) or die (mysqli_error($conexao));

    
	while($rows_limite1 = mysqli_fetch_assoc($Limita1)) 
	{
        if($rows_limite1['Restricao'] == "Professor")
        {
        $Nome_Professor =  $rows_limite1['Nome_Completo'];
        $Id_Professor = $rows_limite1['id_usuario'];
        echo $Id_Professor;
        
        $sql = "UPDATE redacoes SET Id_Professor = '$Id_Professor', Nome_Professor = '$Nome_Professor' WHERE Id_Professor = 0";
        if ($conexao->query($sql) === TRUE) {
            header("Location: Minhas_Redações.php");
          } else {
            echo "Error updating record: " . $conexao->error;
          }

        $x = 2;
        }else
        {
            $x = $x;
        }
    }
    
}