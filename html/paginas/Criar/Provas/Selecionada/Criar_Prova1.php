

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Criar prova</title>
  <link rel="stylesheet" type="text/css" href="../../../../../css/Teste.css"/>
	<link rel="stylesheet" type="text/css" href="../Criar_Prova.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link rel="icon" type="image/png" sizes="32x32" href="../../../../../css/imagens/favicon-32x32.png">
</head>
  <body>
      <div class="result">
        <!--- Display record here --->
      </div>
      <div class="Publicações">
      <button type="button" class="btn btn-success btn-md" style="
      margin-bottom: 100px; z-index: 100; position:absolute; background: transparent;
                border: none;
                outline: none;
                color: white;
                background-color: #a28bba;
                padding: 10px 30px;
                cursor: pointer;
                right: 453px;
                ">Selecionar</button><br> 
      </div>
      <div class="LateralDireita">
      </div>


  </body>
</html>

<!---jQuery ajax live search --->
<script type="text/javascript">
    $(document).ready(function(){
        // fetch data from table without reload/refresh page
        loadData();
        function loadData(query){
          $.ajax({
            url : "display.php",
            type: "POST",
            chache :false,
            data:{query:query},
            success:function(response){
              $(".result").html(response);
            }
          });  
        }
        // Delete multiple record 
        $(".btn-success").click(function(){
          
          var id = [];
          $(".delete-id:checked").each(function(){
              id.push($(this).val());
              element = this;
          });
          
          if (id.length > 0) {
              if (confirm("Tem certeza que deseja selecionar essas questões?")) {
                $.ajax({
                    url : "delete.php",
                    type: "POST",
                    cache:false,
                    data:{deleteId:id},
                    success:function(response){
                      if (response==1) {
                          alert("Questões selecionadas com sucesso!");
                          loadData();
                      }else{
                          alert("Erro ao selecionar as questões");
                      }
                    }
                });
              }
          }else{
            alert("Por favor selecione alguma checkbox");
          }
        });
    });
</script>