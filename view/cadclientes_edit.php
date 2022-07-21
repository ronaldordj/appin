<?php
  include '../config/conecta.php';
  $idcliente = base64_decode($_GET['date']);

  $sql="SELECT cli.*, est.Id as Idestado, est.Nome as Estado 
        FROM cd_cliente cli 
        LEFT OUTER JOIN cd_estado est ON (est.Id = cli.Idestado) 
        WHERE cli.Id = $idcliente";
  $sql_result=mysqli_query($conexao,$sql)or die("Erro:".mysqli_error($conexao));
  $row=mysqli_fetch_array($sql_result);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>AppIn - Movel In</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
  <br>
    <div class="container-fluid">
      <div class="row justify-content-between">
        <div class="col-4">
          <a class="btn btn-primary btn-lg btn-block" href="clientes.php?date=<?php echo base64_encode($row['Iddistribuidor'])?>" role="button">Voltar</a>
        </div>        
      </div>
    </div>
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Cadastro de Cliente</div>
      <div class="card-body">
        <form action="../controller/controllereditcliente.php" method="post">
        <input name="vendedor" type="hidden" id="vendedor" class="form-control" value="<?php echo $row['Iddistribuidor']?>">        
        <input name="cliente" type="hidden" id="cliente" class="form-control" value="<?php echo $idcliente?>">        
          <div class="form-group">
            <div class="form-row">
              <div class="col-xs-12 col-md-6 col-lg-6">
                <div class="form-label-group">
                  <input name="fantasia" type="text" id="fantasia" class="form-control" placeholder="Empresa" required="required" autofocus="autofocus" maxlength="60" value="<?php echo $row['Nomefantasia']?>">
                  <label for="fantasia">Empresa/Cliente</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">    
              <div class="col-xs-12 col-md-6 col-lg-6">
                <div class="form-label-group">
                  <input name="razao" type="text" id="razao" class="form-control" placeholder="Razão Social" required="required" maxlength="60" value="<?php echo $row['Razaosocial']?>">
                  <label for="razao">Razão Social</label>
                </div>
              </div>
            </div>
          </div> 

		      <div class="form-group">
            <div class="form-row">
              <div class="col-xs-12 col-md-6 col-lg-6">
                <div class="form-label-group">
                  <input name="cnpjcpf" type="text" id="cnpjcpf" class="form-control" placeholder="CNP/CPF" required="required" maxlength="14" value="<?php echo $row['Cnpjcpf']?>">
                  <label for="cnpjcpf">CNPJ/CPF</label>
                </div>
              </div>
            </div>
          </div>  

          <div class="form-group">
            <div class="form-row">  
              <div class="col-xs-12 col-md-6 col-lg-6">
                <div class="form-label-group">
                  <input name="ie" type="text" id="ie" class="form-control" placeholder="Insc. Estadual" required="required" maxlength="20" value="<?php echo $row['Inscestadual']?>">
                  <label for="ie">Inscrição Estadual</label>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-xs-12 col-md-6 col-lg-6">
                <div class="form-label-group">
                  <input name="email" type="email" id="email" class="form-control" placeholder="E-mail" required="required" maxlength="50" value="<?php echo $row['Email']?>">
                  <label for="email">E-mail</label>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-xs-12 col-md-6 col-lg-6">
                <div class="form-label-group">
                  <input name="repitaEmail" type="email" id="repitaEmail" class="form-control" placeholder="Repetir e-mail" required="required" maxlength="50" value="<?php echo $row['Emailvalida']?>">
                  <label for="repitaEmail">Repetir e-mail</label>
                </div>
              </div>
            </div>
          </div>

		      <div class="form-group">
            <div class="form-row">
              <div class="col-xs-12 col-md-6 col-lg-6">
                <div class="form-label-group">
                  <input name="telefone" type="text" id="telefone" class="form-control" placeholder="Telefone" required="required" maxlength="10" value="<?php echo $row['Telefone']?>">
                  <label for="telefone">Telefone</label>
                </div>
              </div>
            </div>
          </div>  

          <div class="form-group">
            <div class="form-row">
              <div class="col-xs-12 col-md-6 col-lg-6">
                <div class="form-label-group">
                  <input name="celular" type="text" id="celular" class="form-control" placeholder="Celular" required="required" maxlength="11" value="<?php echo $row['Celular']?>">
                  <label for="celular">Celular</label>
                </div>
              </div>
            </div>
          </div>

		      <div class="form-group">
            <div class="form-row">
              <div class="col-xs-12 col-md-6 col-lg-6">
                <div class="form-label-group">
                  <input name="endereco" type="text" id="endereco" class="form-control" placeholder="Endereço" required="required" maxlength="60" value="<?php echo $row['Endereco']?>">
                  <label for="endereco">Endereço</label>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-xs-12 col-md-6 col-lg-6">
                <div class="form-label-group">
                    <input name="bairro" type="text" id="bairro" class="form-control" placeholder="Bairro" required="required" maxlength="30" value="<?php echo $row['Bairro']?>">
                    <label for="bairro">Bairro</label>
                </div>
              </div>
			      </div>
          </div>  

		  
		      <div class="form-group">
            <div class="form-row">
              <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="form-label-group">
                  <input name="complemento" type="text" id="complemento" class="form-control" placeholder="Complemento" required="required" maxlength="60" value="<?php echo $row['Complemento']?>">
                  <label for="complemento">Complemento</label>
                </div>
              </div>
			      </div> 
          </div>   		
		  
		      <div class="form-group">
            <div class="form-row">
              <div class="col-xs-12 col-md-6 col-lg-6">
                <div class="form-label-group">
                  <input name="cidade" type="text" id="cidade" class="form-control" placeholder="Cidade" required="required" maxlength="60" value="<?php echo $row['Cidade']?>">
                  <label for="cidade">Cidade</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">    			
              <div class="col-xs-12 col-md-6 col-lg-6">
                <div class="form-label-group">
                    <input name="cep" type="text" id="cep" class="form-control" placeholder="CEP" required="required" maxlength="8" value="<?php echo $row['Cep']?>">
                    <label for="cep">CEP</label>
                </div>
              </div>
			      </div>
          </div>  

		      <div class="form-group">
			      <div class="form-row">
				      <div class="col-xs-12 col-md-6 col-lg-6">
					      <div class="form-label-group">
                  <select name="estado" id="estado" class="form-control" required="required">
                  <option value="<?php echo $row['Idestado'];?>"><?php echo utf8_encode($row['Estado']);?></option>
                    <?php
                        $sqlE="select id,nome from cd_estado order by nome";
                        $sql_resultE=mysqli_query($conexao,$sqlE)or die("Erro:".mysqli_error($conexao));
                        while($rowE=mysqli_fetch_array($sql_resultE)){
                    ?>
                        <option value="<?php echo $rowE[0];?>"><?php echo utf8_encode($rowE[1]);?></option>	
                    <?php		
                        }								
                    ?>
                  </select>						
					      </div>
				      </div>				
			      </div>
		      </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-xs-12 col-md-6 col-lg-6">
                <div class="form-label-group">
                  <input name="contato" type="text" id="contato" class="form-control" placeholder="Pessoa de Contato" required="required" maxlength="60" value="<?php echo $row['NomeContato']?>">
                  <label for="contato">Pessoa de Contato</label>
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
  
  <script>
		var vemail = document.getElementById("email"), vconfirma = document.getElementById("repitaEmail");

		function validateEmail(){
		  if(vemail.value != vconfirma.value) {
			vconfirma.setCustomValidity("Os e-mail's estão diferentes!");
		  } else {
			vconfirma.setCustomValidity('');
		  }
		}

		vemail.onchange = validateEmail;
		vconfirma.onkeyup = validateEmail;
	</script>

</body>

</html>
