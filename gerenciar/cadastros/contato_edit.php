<?php
	include '../config/conecta.php';
	$id = base64_decode($_GET['date']);
	//Executa consulta
	$sql="SELECT * FROM contato WHERE Id = $id";
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

</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Dados de Contato</div>	
      <div class="card-body">
		<form action="../processa/proc_edit_contato.php" method="post">
		<input type="hidden" id="id" name="id" value="<?php echo $id;?>">
          <div class="form-group">
            <div class="form-row">
              <div class="col-xs-10 col-md-10 col-lg-10">
                <div class="form-label-group">                  
                  <input type="text" name="endereco" id="endereco" class="form-control" placeholder="Endereço" required="required" value="<?php echo $resultado['Endereco'];?>">
                  <label for="endereco">Endereço</label>
                </div>
              </div>			  
              <div class="col-xs-2 col-md-2 col-lg-2">
                <div class="form-label-group">                  
                  <input type="text" name="numero" id="numero" class="form-control" placeholder="Número" required="required" value="<?php echo $resultado['Numero'];?>">
                  <label for="numero">Número</label>
                </div>
              </div>			  
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-xs-6 col-md-6 col-lg-6">
                <div class="form-label-group">                  
                  <input type="text" name="bairro" id="bairro" class="form-control" placeholder="Bairro" required="required" value="<?php echo $resultado['Bairro'];?>">
                  <label for="bairro">Bairro</label>
                </div>
              </div>			                
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
            <div class="col-xs-6 col-md-6 col-lg-6">
                <div class="form-label-group">                  
                  <input type="text" name="cidade" id="cidade" class="form-control" placeholder="Cidade" required="required" value="<?php echo $resultado['Cidade'];?>">
                  <label for="cidade">Cidade</label>
                </div>
              </div>			  
              <div class="col-xs-2 col-md-2 col-lg-2">
                <div class="form-label-group">                  
                  <input type="text" name="uf" id="uf" class="form-control" placeholder="UF" required="required" value="<?php echo $resultado['UF'];?>">
                  <label for="uf">UF</label>
                </div>
              </div>			  
              <div class="col-xs-4 col-md-4 col-lg-4">
                <div class="form-label-group">                  
                  <input type="text" name="cep" id="cep" class="form-control" placeholder="CEP" required="required" value="<?php echo $resultado['CEP'];?>">
                  <label for="cep">CEP</label>
                </div>
              </div>			  
            </div>
          </div> 
          <div class="form-group">
            <div class="form-row">
              <div class="col-xs-4 col-md-4 col-lg-4">
                <div class="form-label-group">                  
                  <input type="text" name="telefone" id="telefone" class="form-control" placeholder="Telefone" required="required" value="<?php echo $resultado['Telefone'];?>">
                  <label for="telefone">Telefone</label>
                </div>
              </div>			  
              <div class="col-xs-6 col-md-6 col-lg-6">
                <div class="form-label-group">                  
                  <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" required="required" value="<?php echo $resultado['Email'];?>">
                  <label for="email">E-mail</label>
                </div>
              </div>			  
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-xs-10 col-md-10 col-lg-10">
                <div class="form-label-group">                  
                  <input type="text" name="mapa" id="mapa" class="form-control" placeholder="URL Mapa Google" required="required" value="<?php echo $resultado['Mapa'];?>">
                  <label for="mapa">URL Mapa</label>
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

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
