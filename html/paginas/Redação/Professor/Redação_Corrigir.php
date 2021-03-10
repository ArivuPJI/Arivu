<?php 
session_start();
include_once("../../../../conexao.php");

if(!empty($_SESSION['id_usuario'])){
	$id_estudante = $_SESSION['id_usuario'];
?>
<!DOCTYPE HTML>
<html lang="pt-br">  
    <head>  
        <meta charset="utf-8">
        <title>Arivu</title>
        <link rel="stylesheet" type="text/css" href="Redação.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="icon" type="image/png" sizes="32x32" href="../../../../css/imagens/favicon-32x32.png">
        <style>
            .form-group{
                padding: 10px;
            }
        </style>
    </head>
    <body>
    <div class="LateralDireitaCriar">
	</div>
	<div class="NavegaçãoLateral"> <!--Navegação Lateral -->
	<img class="LogoLateral" src="../../../../css/imagens/Logo_Lateral.png"><h1>Desespero</h1>
	<div class="liLateral">
			<li><a href="../Feed/Feed_Eventos.php"><b>Feed</b></a></li>
			<li><a href="../Provas/Prova.php">Provas</a></li>
			<?php if($_SESSION['Email_pessoal'] != "Sem Conta"){ ?>
			<li><a href="">Agenda</a></li>
			<li><a href="">Perfil</a></li>
            <li class="LateralSelecionado"><a href="">Redação</a></li>
			<li><a href="../Criar/Resumos/Criar_Resumo.php">Criar</a></li>
			<?php } ?>
			<li><?php echo "<a href='../../login/Sair.php'>Sair</a>"; ?></li>
			
		</div>
    </div>
    
    <div class="BodyConteudo"> <!-- Corpo, onde fica todo  conteudo do site -->
	<div class="NavegaçãoSuperior">
	<!-- Pesquisa -->
		<div class="aSuperior">
		<a class="SuperiorSelecionado" href="Feed_Resumos"><b>Redações</b></a>
			<a href="Correções.php"><b>Correções</b></a>
		</div>
    </div>
    <div class="Publicações">
    <?php 
    $Id = $_GET['codigo'];
    $_SESSION['Id_Redação'] = $Id;

    $Tabela_Redações = "SELECT * from redacoes where Id_Redação = '$Id'"; //Teste
    $Query_Redações = mysqli_query($conexao, $Tabela_Redações) or die (mysqli_error($conexao));


    while($rows_redações = mysqli_fetch_assoc($Query_Redações)) 
    { 
        $_SESSION['Id_Professor'] = $rows_redações['Id_Professor'];
        ?>


        <span id="msg"></span>
        <form id="add-aula" method="POST" action="insert.php">


        <div class="Conteudo">
            <textarea name="Conteudo" id="Conteudo" require><?php echo $rows_redações['Redação'];?></textarea>
        </div>


<?php } ?>
<div class="Correções">
            <div id="formulario">
                <div class="form-group">
                <button type="button" id="add-campo"></button> 
                    <h2 class="h2">Correções</h2>
                    
                    <textarea name="titulo[]" placeholder="Adicionar correção" class="correção"></textarea>
                </div>
            </div>
            <div class="form-group">
            <div class="btnFiltrar">
			<input type="submit" value="Enviar" id="CadAulas">
			</div>
            </div>
            </div>
        


            

</form>


        <script>
            $(document).ready(function () {
                var cont = 1;
                //https://api.jquery.com/click/
                $('#add-campo').click(function () {
                    cont++;
                    //https://api.jquery.com/append/
                    $('#formulario').append('<div class="form-group" id="campo' + cont + '"><textarea name="titulo[]" placeholder="Adicionar correção" class="correção"></textarea><button type="button" id="' + cont + '" class="btn-apagar"></button> </div>');
                });

                $('form').on('click', '.btn-apagar', function () {
                    var button_id = $(this).attr("id");
                    $('#campo' + button_id + '').remove();
                });

                $("#CadAulas").click(function () {
                    //Receber os dados do formulário
                    var dados = $("#add-aula").serialize();
                    $.post("insert.php", dados, function (retorna) {
                        $("#msg").slideDown('slow').html(retorna);

                        //Limpar os campos
                        //$('#add-aula')[0].reset();

                        //Apresentar a mensagem leve
                        retirarMsg();
                    });
                });

                //Retirar a mensagem após 1700 milissegundos
                function retirarMsg() {
                    setTimeout(function () {
                        $("#msg").slideUp('slow', function () {});
                    }, 2700);
                }
            });
        </script>
        	<script src="../../ckeditor/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('Conteudo');
        </script>
            </div>
    </div>

	<div class="LateralDireita">
	</div>

    

    </body>

<?php
}else{
	header("Location: ../../index.php");	
}
?>

</html>



