<?php
session_start();
	include_once("../../../conexao.php");
    $Tema = $_POST['Tema'];
    $Materia = $_SESSION['Materia'];
	$Ano = $_POST['Ano'];
    $Numero = $_POST['Numero'];
    

	$Query_Truncate = "TRUNCATE TABLE criar_provas";
	?>

<body>
        <section id="wrap-geral">
            <ul id="prova-lista">
            <?php
                $provas = $pdo->prepare("SELECT * FROM `provas` WHERE `status` = 1 ORDER BY `id` DESC");
                $provas->execute();

                while ($row = $provas->fetchObject()) {
            ?>
                <li class="open-prova" data-id="<?php echo $row->id;?>">
                    <a href="prova.php?prova=<?php echo $row->id;?>">
                        <?php echo $row->titulo;?>
                    </a>
                </li>
            <?php }?>
            </ul>


            <section id="wrap-prova">
                <div class="begin">
                    <button id="comecar" class="button azul">Iniciar Prova</button>
                </div>

                <h1></h1>

                <div class="questoes">
                
                </div>

                <button class="button" id="prev">Anterior</button>
                <button class="button" id="next">Próxima</button>
            </section>

            <div style="clear:both;"></div>
            <span class="timer">39:59</span>
        </section>
        

        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/timer.js"></script>
        <script type="text/javascript" src="js/functions.js"></script>
    </body>
</html>
