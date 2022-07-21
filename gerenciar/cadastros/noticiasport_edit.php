<?php
  include '../config/conecta.php';
  $id = base64_decode($_GET['date']);
  //Executa consulta
	$sql="SELECT np.Id, np.Idnoticia, np.Descricao, np.Imagem, np.Ocultar, n.Titulo
        FROM noticias_portfolio np 
        JOIN noticias n ON (n.Id = np.Idnoticia) 
        WHERE np.Id = $id";
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

  <title>Painel Admin - Moneretto Luz Engenharia Elétrica</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">
  <link href="../css/jquery-ui.css" rel="stylesheet"> 

</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Cadastro de Portfólio da Notícia</div>	
      <div class="card-body">
		<form action="../processa/proc_edit_noticiasport.php" method="post" enctype="multipart/form-data">		
          <input type="hidden" id="id" name="id" value="<?php echo $id;?>">
          <div class="form-group">
            <div class="form-row">
              <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="form-label-group">
                  <input name="idnoticia" type="hidden" id="idnoticia" class="form-control" value="<?php echo $resultado['Idnoticia']; ?>" >
                  <input name="noticia" type="text" id="noticia" class="form-control" placeholder="Notícia" required="required" value="<?php echo $resultado['Titulo']; ?>">
                  <label for="obra">Digite as iniciais do título da Notícia</label>
                </div>
              </div>  
            </div>
          </div>  
          <div class="form-group">  
            <div class="form-row">  
              <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="form-label-group">
                  <textarea name="descricao" id="descricao" class="form-control" placeholder="Descrição" required="required"><?php echo $resultado['Descricao']; ?></textarea>                                    
                </div>
              </div>			                
            </div>
          </div>   
          <div class="form-group" >
            <div class="form-row">
              <div class="col-xs-12 col-md6 col-lg-6">
                <div class="form-label-group">
                <input name="arquivo" type="file" id="arquivo" class="form-control" placeholder="Imagem">
                    <?php if($resultado['Imagem'] != '') {echo 'Possui imagem cadastrada.'; } else {echo 'Não possui imagem cadastrada.';} ?>
                  <label for="arquivo">Imagem de capa</label>
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
            $("#noticia").autocomplete({
                source: "getnoticias.php",
                minLength: 2,
                select: function(event, ui) {
                    $("#idnoticia").val(ui.item.idnoticia);					
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
