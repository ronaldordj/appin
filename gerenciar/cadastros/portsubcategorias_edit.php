<?php
	include '../config/conecta.php';
	$id = base64_decode($_GET['date']);
	//Executa consulta
	$sql="SELECT ps.*, pc.Descricao as categoria FROM portfolio_subcategoria ps JOIN portfolio_categoria pc ON (pc.Id = ps.Idcategoria) WHERE ps.Id = $id";
	$sql_result=mysqli_query($conexao,$sql)or die("Erro:".mysqli_error($conexao)); 		 	 		 		
	$resultado=mysqli_fetch_array($sql_result);	
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Painel Admin - Eletrimax</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">
  <link href="../css/jquery-ui.css" rel="stylesheet"> 

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Cadastro de Categorias</div>
      <div class="card-body">
        <form action="../processa/proc_edit_portsubcategorias.php" method="post">
          <div class="form-group">
            <div class="form-row">
            <input type="hidden" id="id" name="id" value="<?php echo $id;?>">	
              <div class="col-xs-12 col-md-6 col-lg-6">
                <div class="form-label-group">
                  <input name="descricao" type="text" id="nome" class="form-control" required="required" maxlength="80" value="<?php echo $resultado['Descricao']?>" >
                  <label for="descricao">Subcategoria</label>
                </div>
              </div>              
        		</div>  
          </div>
          <div class="form-group">   
            <div class="form-row">
              <div class="col-xs-12 col-md-6 col-lg-6">
                <div class="form-label-group">
                  <input name="categoria" type="text" id="categoria" class="form-control" placeholder="Categoria Pai" required="required" maxlength="80" value="<?php echo $resultado['categoria']?>">
                  <input name="idcategoria" class="form-control" type="hidden" id="idcategoria" value="<?php echo $resultado['Idcategoria']?>" />
                  <label for="categoria">Categoria Pai</label>
                </div>
              </div>              
        		</div>  
          </div>	
          <div class="form-group">
            <div class="form-row">
              <div class="col-xs-2 col-md-2 col-lg-2">
                <div class="form-check">					  
                  <input name="ativo" class="form-check-input" type="radio" id="ativo" value="1" <?php if ($resultado['Ocultar'] == 1) {echo 'checked';} ?>>
                  <label class="form-check-label" for="ativo">
                  Mostrar
                  </label>
                </div>
              </div>
              <div class="col-xs-2 col-md-2 col-lg-2">
                <div class="form-check">					  
                  <input name="ativo" class="form-check-input" type="radio" id="ativo" value="0" <?php if ($resultado['Ocultar'] == 0) {echo 'checked';} ?>>
                  <label class="form-check-label" for="ativo">
                  Ocultar
                  </label>
                </div>
              </div>
            </div>  		
          </div>	            
		  <button type="submit" class="btn btn-success btn-block">Salvar</button>
        </form>        
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../vendor/jquery/jquery-ui.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <script>
        $(document).ready(function() {
            $("#categoria").autocomplete({
                source: "getcategorias.php",
                minLength: 2,
                select: function(event, ui) {
                    $("#idcategoria").val(ui.item.idcategoria);					
                }
            }).data("ui-autocomplete")._renderItem = function(ul, item) {
                return $("<li class='ui-autocomplete-row'></li>")
                    .data("item.autocomplete", item)
                    .append(item.label)
                    .appendTo(ul);
            };
        });
		</script>

</body>

</html>