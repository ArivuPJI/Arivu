<!-- Está página é a que recebe os dados da tela de Login
 e faz todo o sistema PHP para confirmações de conta -->

 <?php
session_start();
include_once("../../conexao.php");
$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);
$btnSemConta = filter_input(INPUT_POST, 'btnSemConta', FILTER_SANITIZE_STRING);

if($btnLogin){
    //Pegando dados da Página de Login.
	$Email_pessoal = filter_input(INPUT_POST, 'Email', FILTER_SANITIZE_STRING);
	$Senha = filter_input(INPUT_POST, 'Senha', FILTER_SANITIZE_STRING);
	
	if((!empty($Email_pessoal)) AND (!empty($Senha))){
		//Gerar a senha criptografa
		//echo password_hash($senha, PASSWORD_DEFAULT);
		//Pesquisar o usuário no BD
		$result_usuario = "SELECT id_usuario, Sexo, Email_academico, Email_pessoal, Restricao, Senha FROM login WHERE Email_pessoal ='$Email_pessoal' LIMIT 1";
		$resultado_usuario = mysqli_query($conexao, $result_usuario);
		if($resultado_usuario){
			$row_usuario = mysqli_fetch_assoc($resultado_usuario);
			if(password_verify($Senha, $row_usuario['Senha'])){
                //Talvez precise pegar mais dados daqui. 
                //Caso precise de mais algum dado adicione mais uma váriavel global e insira no código SQL acima.
				$_SESSION['id_usuario'] = $row_usuario['id_usuario'];
                $_SESSION['Sexo'] = $row_usuario['Sexo'];
				$_SESSION['Email_academico'] = $row_usuario['Email_academico'];
				$_SESSION['Email_pessoal'] = $row_usuario['Email_pessoal'];
				$_SESSION['Restricao'] = $row_usuario['Restricao'];
                $_SESSION['Senha'] = $row_usuario['Senha'];
                header("Location: ../paginas/Feed/Feed_Eventos.php");
			}else{
				$_SESSION['LoginErro'] = "Login ou senha incorretos!";
				header("Location: ../../Login.php");
			}
		}
	}else{
		$_SESSION['LoginErro'] = "Login ou senha incorretos!";
		header("Location: ../../Login.php");
	}
}else{
	$_SESSION['LoginErro'] = "Página não encontrada";
	header("Location: ../../Login.php");
}






/* Pessoa entrando sem conta.
Foi feito uma conta no banco de dados para essas pessoas.
Ou seja, quando alguém entra sem conta ela na verdade está entrando
em uma conta no banco de dados que possui limitaçõess. */

if($btnSemConta){
	$Email_pessoal = "Sem Conta";
	$Senha = "123";
		//Gerar a senha criptografa
		//echo password_hash($senha, PASSWORD_DEFAULT);
		//Pesquisar o usuário no BD
		$result_usuario = "SELECT id_usuario, Sexo, Email_academico, Email_pessoal, Restricao, Senha FROM login WHERE Email_pessoal ='$Email_pessoal' LIMIT 1";
		$resultado_usuario = mysqli_query($conexao, $result_usuario);
		if($resultado_usuario){
			$row_usuario = mysqli_fetch_assoc($resultado_usuario);
			if(password_verify($Senha, $row_usuario['Senha'])){
                //Talvez precise pegar mais dados daqui. 
                //Caso precise de mais algum dado adicione mais uma váriavel global e insira no código SQL acima.
				$_SESSION['id_usuario'] = $row_usuario['id_usuario'];
                $_SESSION['Sexo'] = $row_usuario['Sexo'];
				$_SESSION['Email_academico'] = $row_usuario['Email_academico'];
				$_SESSION['Email_pessoal'] = $row_usuario['Email_pessoal'];
				$_SESSION['Restricao'] = $row_usuario['Restricao'];
                $_SESSION['Senha'] = $row_usuario['Senha'];
                header("Location: ../paginas/Feed/Feed_Eventos.php");
					}
				}
			}




?>
