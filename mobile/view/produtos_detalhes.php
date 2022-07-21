<?php
  include '../../config/conecta.php';
  $idcliente = base64_decode($_GET['date']);
  $idvendedor = $_GET['mic'];
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

  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  

  <div id="wrapper">

    <!-- Sidebar -->
    

    <div id="content-wrapper">

      <div class="container-fluid">       
        <div class="row justify-content-between">
          <div class="col-4">
            <a class="btn btn-primary btn-lg btn-block" href="produtos.php?date=<?php echo $idvendedor?>" role="button">Lista</a>
          </div>          
        </div>  

          <?php
						$sql="SELECT *
                  FROM cd_produto";
						$sql_result=mysqli_query($conexao,$sql)or die("Erro:".mysqli_error($conexao));
						$row=mysqli_fetch_array($sql_result);
          ?> 
      
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-user"></i>
            Detalhes do Produto</div>
          <div class="card-body">
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Código: <?php echo $row['Idproduto']?></li>
              <li class="list-group-item">Referência: <?php echo $row['Referencia']?></li>
              <li class="list-group-item">Descrição: <?php echo $row['Descricao']?></li>
              <li class="list-group-item">Valor: <?php echo $row['Valor']?></li>              
            </ul>            
          </div>          
        </div>
        <a class="btn btn-secondary btn-lg btn-block" href="pedido.php" role="button">Novo Pedido</a>
      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <?php include '../footer.php'; ?>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="../vendor/datatables/jquery.dataTables.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="../js/demo/datatables-demo.js"></script>

</body>

</html>
