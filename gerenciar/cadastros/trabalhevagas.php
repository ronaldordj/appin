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

</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Cadastro de Vagas de Emprego</div>	
      <div class="card-body">
		<form action="../processa/proc_cad_trabalhevagas.php" method="post" enctype="multipart/form-data">		
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
                  <textarea name="descricao" id="descricao" class="form-control" placeholder="Descrição sobre a vaga" required="required"></textarea>                                    
                </div>
              </div>			                
            </div>
          </div>            
          <div class="form-group">
            <div class="form-row">  
                <div class="col-xs-12 col-md-10 col-lg-10">
                  <div class="form-label-group">
                    <input name="pretensao" type="text" id="pretensao" class="form-control" placeholder="Pretensão Salarial" required="required"  >
                    <label for="pretensao">Pretensão Salarial</label>
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

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
