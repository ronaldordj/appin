<?php
  include '../config/conecta.php';
    $idvendedor = $_GET['date'];
    $idcliente  = base64_decode($_GET['key']);
    $idpedido   = base64_decode($_GET['pedido']);

    
    $sql="SELECT Id, Razaosocial FROM cd_cliente WHERE Id = $idcliente";
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
        <div class="col-4">
          <a class="btn btn-success btn-lg btn-block" href="pedidos.php?date=<?php echo $idvendedor?>" role="button">Finalizar</a>
        </div>        
      </div>
    </div>
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Cadastro de Itens do Pedido</div>
      <div class="card-body">
        <?php 
            $sqlA="SELECT count(Idpedidoitem) as inf FROM cd_pedidoitem WHERE Idpedido = $idpedido";
            $sql_resultA=mysqli_query($conexao,$sqlA)or die("Erro:".mysqli_error($conexao));		
            $row=mysqli_fetch_array($sql_resultA);          
        ?>
          <div class="row">  
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                  <label><?php echo 'Você já inseriu <b>'. $rowA['inf']. '</b> item(s) neste pedido.' ?></label>
              </div>
          </div>

        <form action="../controller/controllercadpedidoitem.php" method="post">
          <input name="usuario" class="form-control" type="hidden" id="usuario" value="<?php echo base64_decode($idvendedor); ?>"/>
          <div class="row">
            <div class="col-xs-4 col-sm-12 col-md-2 col-lg-2">
              <label>Pedido nº</label><br>
              <input name="codigo" class="form-control" type="text" id="codigo" readonly value="<?php echo $idpedido; ?>"/>
            </div>			
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
              <label>Cliente</label><br>
              <input name="cliente" class="form-control" type="text" id="cliente" readonly value="<?php echo $row['Razaosocial']?>" />
              <input name="idcliente" class="form-control" type="hidden" id="idcliente" value="<?php echo $idcliente ?>" />
            </div>										
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
              <label>Produto</label><br>
              <input name="produto" class="form-control" type="text" id="produto" />
              <input name="idproduto" class="form-control" type="hidden" id="idproduto" />
            </div>
            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
              <label>Quantidade*</label><br>
              <input class="form-control" type="number" id="qtd" name="qtd" min="1" max="100" required >
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
              <label>Valor Unitário</label><br>
              <input name="valor" class="form-control" type="text" id="valor" />              
            </div>										
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
              <label>Valor Total</label><br>
              <input name="valortotal" class="form-control" type="text" id="valortotal" readonly />              
            </div>										
          </div>
          <br>
          <div class="row">  
            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">	
              <button type="submit" class="btn btn-success btn-block">Adicionar Produtos<span class="glyphicon glyphicon-plus" aria-hidden="false"></button>                            
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
            $("#produto").autocomplete({
                source: "getProduto.php",
                minLength: 3,
                select: function(event, ui) {
                    $("#idproduto").val(ui.item.idproduto);
                    $("#valor").val(ui.item.valor);
                }
            }).data("ui-autocomplete")._renderItem = function(ul, item) {
                return $("<li class='ui-autocomplete-row'></li>")
                    .data("item.autocomplete", item)
                    .append(item.label)
                    .appendTo(ul);
            };
        });
		</script>

    <script type="text/javascript">
        $(document).ready(function() {
        $("#qtd").change(function() {
          var qtd = $(this).val();
          var valor = $("#valor").val();
          var calculo = qtd * valor;
          $("#valortotal").val(calculo);

          });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
        $("#valor").change(function() {
          var valor = $(this).val();
          var qtd = $("#qtd").val();
          var calculo = qtd * valor;
          $("#valortotal").val(calculo);

          });
        });
    </script>

</body>

</html>
