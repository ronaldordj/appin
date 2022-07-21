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

  <title>Painel Admin - Eletrimax</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Time - Colaboradores</div>	
      <div class="card-body">
		<form action="../processa/proc_cad_time.php" method="post" enctype="multipart/form-data">		
          <div class="form-group">
            <div class="form-row">
              <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="form-label-group">
                  <input name="pessoa" type="text" id="pessoa" class="form-control" placeholder="Pessoa" required="required" >
                  <label for="pessoa">Colaborador</label>
                </div>
              </div>  
            </div>
          </div>  
          <div class="form-group">  
            <div class="form-row">  
              <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="form-label-group">
                  <input name="cargo" type="text" id="cargo" class="form-control" placeholder="Cargo" required="required" >
                  <label for="cargo">Cargo</label>
                </div>
              </div>			                
            </div>
          </div>  
          <div class="form-group">  
            <div class="form-row">  
              <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="form-label-group">
                  <input name="whats" type="text" id="whats" class="form-control" placeholder="Whatsapp Ex: 48900000000" maxlength="11" >
                  <label for="whats">Whatsapp</label>
                </div>
              </div>			                
            </div>
          </div>  
          <div class="form-group">  
            <div class="form-row">  
              <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="form-label-group">
                  <input name="linkedin" type="text" id="linkedin" class="form-control" placeholder="Linkedin"  >
                  <label for="linkedin">Linkedin</label>
                </div>
              </div>			                
            </div>
          </div> 
          <div class="form-group" >
            <div class="form-row">
              <div class="col-xs-12 col-md6 col-lg-6">
                <div class="form-label-group">
                  <input name="arquivo" type="file" id="arquivo" class="form-control" placeholder="Imagem" >
                  <label for="arquivo">Imagem</label>
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
