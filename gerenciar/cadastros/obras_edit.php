<?php
	include '../config/conecta.php';
	$id = base64_decode($_GET['date']);
	//Executa consulta
	$sql="SELECT * FROM obras WHERE Id = $id";
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
      <div class="card-header">Editando dados da Obra</div>	
      <div class="card-body">
		<form action="../processa/proc_edit_obras.php" method="post" enctype="multipart/form-data">
		<input type="hidden" id="id" name="id" value="<?php echo $id;?>">
    <div class="form-group">
            <div class="form-row">
              <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="form-label-group">
                  <input name="titulo" type="text" id="titulo" class="form-control" placeholder="Título" required="required" value="<?php echo $resultado['Titulo'] ?>" >
                  <label for="titulo">Título</label>
                </div>
              </div>  
            </div>
          </div>  
          <div class="form-group">  
            <div class="form-row">  
              <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="form-label-group">
                  <textarea name="descricao" id="descricao" class="form-control" placeholder="Descrição" required="required"><?php echo $resultado['Descricao'] ?></textarea>                                    
                </div>
              </div>			                
            </div>
          </div>  
          <div class="form-group">  
            <div class="form-row">  
              <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="form-label-group">
                  <input name="cliente" type="text" id="cliente" class="form-control" placeholder="Cliente" required="required"  value="<?php echo $resultado['Cliente'] ?>" >
                  <label for="cliente">Cliente</label>
                </div>
              </div>			                
            </div>
          </div> 
          <div class="form-group">
            <div class="form-row">  
                <div class="col-xs-12 col-md-10 col-lg-10">
                  <div class="form-label-group">
                    <input name="cidade" type="text" id="cidade" class="form-control" placeholder="Cidade" required="required" value="<?php echo $resultado['Cidade'] ?>" >
                    <label for="cidade">Cidade</label>
                  </div>
                </div> 
                <div class="col-xs-12 col-md-2 col-lg-2">
                  <div class="form-label-group">
                    <input name="uf" type="text" id="uf" class="form-control" placeholder="UF" required="required" maxlength="2" value="<?php echo $resultado['Uf'] ?>" >
                    <label for="uf">UF</label>
                  </div>
                </div>    
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">  
                <div class="col-xs-12 col-md-6 col-lg-6">
                  <div class="form-label-group">
                    <input name="dataini" type="date" id="dataini" class="form-control" placeholder="Data Início" required="required" value="<?php echo $resultado['Datainicio'] ?>" >
                    <label for="dataini">Data Início</label>
                  </div>
                </div> 
                <div class="col-xs-12 col-md-6 col-lg-6">
                  <div class="form-label-group">
                    <input name="datafim" type="date" id="datafim" class="form-control" placeholder="Data Fim" value="<?php echo $resultado['Datafinal'] ?>" >
                    <label for="datafim">Data Fim</label>
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
                  </input>
                  <label for="arquivo">Imagem de capa</label>
                </div>
              </div>  
					</div> 

          <div class="form-group">
            <div class="form-row">
              <div class="col-xs-2 col-md-2 col-lg-2">
                <div class="form-check">					  
                  <input name="status" class="form-check-input" type="radio" id="status" value="1" <?php if ($resultado['Status'] == 1) {echo 'checked';} ?>>
                  <label class="form-check-label" for="status">
                  Concluída
                  </label>
                </div>
              </div>      
              <div class="col-xs-2 col-md-2 col-lg-2">
                <div class="form-check">					  
                  <input name="status" class="form-check-input" type="radio" id="status" value="0" <?php if ($resultado['Status'] == 0) {echo 'checked';} ?>>
                  <label class="form-check-label" for="status">
                  Em andamento
                  </label>
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
