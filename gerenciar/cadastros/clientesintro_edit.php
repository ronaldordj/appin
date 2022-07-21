<?php
	include '../config/conecta.php';
	$id = base64_decode($_GET['date']);
	//Executa consulta
	$sql="SELECT * FROM clientes_intro WHERE Id = $id";
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

</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Dados da Seção Clientes</div>	
      <div class="card-body">
		<form action="../processa/proc_edit_clientesintro.php" method="post" enctype="multipart/form-data">
		<input type="hidden" id="id" name="id" value="<?php echo $id;?>">
          <div class="form-group">
            <div class="form-row">
              <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="form-label-group">
                  <input name="titulo" type="text" id="titulo" class="form-control" placeholder="Título" required="required" value="<?php echo $resultado['Titulo'];?>" >
                  <label for="titulo">Título da Seção</label>
                </div>
              </div>  
            </div>
          </div> 
          <div class="form-group">
            <div class="form-row">
              <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="form-label-group">
                  <textarea name="descricao" type="text" id="descricao" class="form-control" placeholder="Descrição" required="required"><?php echo $resultado['Descricao'];?></textarea>                  
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
