<!-- Tela de Login principal 
Parte visual da tela de Login -->

<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="./css/Login.css"/>
	</head>
	<body>
        <div class="BodyLogin"> <!-- Div para poder colocar a sombra no fundo -->
        <div class="BodySemConta"> <!-- Div para quem quer entrar sem conta -->
        <div class="TituloESub">
            <h1 class="TituloSemConta">BEM VINDO(A)!</h1>
            <p>Você tabém pode entrar sem uma conta.</p>
            <img class="teste" src="./css/imagens/Logo.png">
        </div>
        <form method="POST" action="./html/login/PHPLogin.php">
            <input class="btnSemConta" type="submit" name="btnSemConta" value="Entrar sem conta"> <!-- Botão sem conta -->
        </form>
        <p class="pMaisClaro">Caso não tenha uma conta desfrutará do site de maneira limitada.</p>
        </div>
        <h1 class="TituloLogin">LOGIN</h1>
            <form method="POST" action="./html/login/PHPLogin.php">
                <div class="box">
                    <div class="inputBox">
                        <input type="text" name="Email" autocomplete="off" required>
                        <label>Email</label>
                    </div>     

                    <div class="inputBox">
                        <input type="password" name="Senha" required>
                        <label>Senha</label>
                    </div>
                
                <br>
                    <a href="">Criar uma conta.</a> <!-- COLOCA AQUI, MIKE. Coloca ele ali na pasta de htm/cadastro-->
                    <br><br><br><br>
                    <input type="submit" name="btnLogin" value="ENTRAR">
            </div>
            </form>

            <div class="LoginErro"> <!-- Mensagem de Erro caso a pessoa erre o Login -->
                <?php
                    if(isset($_SESSION['LoginErro'])){
                        echo $_SESSION['LoginErro'];
                        unset($_SESSION['LoginErro']);
                    }
                ?>
        </div>

        </div>
	</body>
</html>