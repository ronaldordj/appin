<?php
  include '../../config/conecta.php';
    $idvendedor = $_GET['date'];
    $sql="select max(idpedido) as maior from cd_pedido";
		$sql_result=mysqli_query($conexao,$sql)or die("Erro:".mysqli_error($conexao));		
		$row=mysqli_fetch_array($sql_result);
    $seq = $row['maior']+1;
    
    $idcliente  = base64_decode($_GET['key']);
    
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
  <link href="../css/jquery-ui.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
  <br>
    <div class="container-fluid">
      <div class="row justify-content-between">
        <div class="col-4">
          <a class="btn btn-primary btn-lg btn-block" href="pedidos.php?date=<?php echo $idvendedor?>" role="button">Voltar</a>
        </div>        
      </div>
    </div>
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Cadastro de Pedido</div>
      <div class="card-body">
        <form action="../controller/controllercadpedido.php" method="post">
        <input name="usuario" type="hidden" id="usuario" class="form-control" value="<?php echo base64_decode($idvendedor)?>">        
          <div class="row">
            <div class="col-xs-4 col-sm-12 col-md-2 col-lg-2">
              <label>Pedido nº</label><br>
              <input name="codigo" class="form-control" type="text" id="codigo" placeholder="Código" readonly value="<?php echo $seq ?>"/>
            </div>			
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
              <label>Cliente</label><br>
              <input name="idcliente" class="form-control" type="hidden" id="idcliente" />
              <input name="cliente" class="form-control" type="text" id="cliente" autofocus required autocomplete="off"/>
            </div>										
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
              <label>Condição de Pagamento</label><br>              
              <input name="condpagto" class="form-control" type="text" id="condpagto"/>
            </div>										
          </div>									          
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
              <label>Observação</label><br>              
              <textarea name="observacao" class="form-control" type="text" id="observacao"></textarea>
            </div>										
          </div>									
          <br></br>
          <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">													               
              <button type="submit" class="btn btn-success btn-block">Itens<span class="glyphicon glyphicon-plus" aria-hidden="false"></button>
            </div>
          </div>
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
            $("#cliente").autocomplete({
                source: "getCliente.php",
                minLength: 3,
                select: function(event, ui) {
                    $("#idcliente").val(ui.item.idcliente);					
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
