<?php
	//Incluir a conexão com banco de dados
	include_once('../../../conexao.php');
	
	//Recuperar o valor da palavra
        $cursos = $_POST['palavra'];
	
	//Pesquisar no banco de dados nome do curso referente a palavra digitada pelo usuário
	$cursos = "SELECT * FROM feed WHERE Titulo LIKE '%$cursos%'";
        $resultado_cursos = mysqli_query($conexao, $cursos);
	
	if(mysqli_num_rows($resultado_cursos) <= 0){
		echo "Nenhum evento encontrado...";
	}else{
                //Evento
                while($rows = mysqli_fetch_assoc($resultado_cursos))
                {
                if ($rows['Topico'] == "Resumo")
                {
                ?>
                <div class="PublicaçõesResumo">
					
                 <p class="DescriçãoResumo"><?php echo $rows['Descricao'];?><br></p>
                <div  class="TituloResumo">
                <h2><?php echo $rows['Titulo'];?><br></h2></div>
<?php  
        
}}
        }
?>