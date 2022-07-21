<?php
	include '../config/conecta.php';	
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
      <div class="card-header">Cadastro de Notícia</div>	
      <div class="card-body">
		<form action="../processa/proc_cad_noticias.php" method="post" enctype="multipart/form-data">		
          <div class="form-group">
            <div class="form-row">
              <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="form-label-group">
                  <input name="titulo" type="text" id="titulo" class="form-control" placeholder="Título" required="required" >
                  <label for="titulo">Título</label>
                </div>
              </div>  
            </div>
          </div>  
          <div class="form-group">  
            <div class="form-row">  
              <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="form-label-group">
                  <textarea name="descricao" id="descricao" class="form-control" placeholder="Descrição" required="required"></textarea>                                    
                </div>
              </div>			                
            </div>
          </div>            
          <div class="form-group">
            <div class="form-row">
              <div class="col-xs-12 col-md-6 col-lg-6">
                <div class="form-label-group">
                  <input name="idcategoria" type="hidden" id="idcategoria" class="form-control" >
                  <input name="categoria" id="categoria" class="form-control" placeholder="Categoria" required="required">
                  <label for="categoria">Digite a iniciais da categoria</label>
                </div>
              </div>			                  
                <div class="col-xs-12 col-md-6 col-lg-6">
                  <div class="form-label-group">
                    <input name="dataini" type="date" id="dataini" class="form-control" placeholder="Data" required="required"  >
                    <label for="dataini">Data</label>
                  </div>
                </div>                 
            </div>
          </div>          
          <div class="form-group" >
            <div class="form-row">
              <div class="col-xs-12 col-md6 col-lg-6">
                <div class="form-label-group">
                  <input name="arquivo" type="file" id="arquivo" class="form-control" placeholder="Imagem" >
                  <label for="arquivo">Imagem de capa</label>
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
                source: "getcategoriasnoticia.php",
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
