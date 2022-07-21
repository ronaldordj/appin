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

  <title>Painel Admin - AppIn</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <?php include '../header.php'; ?>

  <div id="wrapper">

    <!-- Sidebar -->
    <?php include 'menulista.php'; ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Seção</li>
          <li class="breadcrumb-item active">Pedidos</li>
        </ol>	
        <a class="btn btn-success" href="../cadastros/clientes.php" role="button"><span>+</span>Novo</a>	<br><br>		
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Realizados</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>#</th>					          
                    <th>Id</th>
                    <th>Data</th>
                    <th>Cliente</th>
                    <th>Valor Total</th>
					        </tr>
                </thead>
                <tfoot>
                  <tr>
                  <th>#</th>					          
                    <th>Id</th>
                    <th>Data</th>
                    <th>Cliente</th>
                    <th>Valor Total</th>                  		
                  </tr>
                </tfoot>
                <tbody>
					<?php
						$sql="SELECT pd.Idpedido, pd.Datacadastro, cli.Razaosocial, sum(pdi.ValorUni*pdi.Quantidade) as VlTotal
                  FROM cd_pedido pd
                  JOIN cd_pedidoitem pdi ON (pdi.Idpedido = pd.Idpedido)
                  JOIN cd_cliente cli ON (cli.Id = pd.Idcliente)
                  GROUP BY (pd.Idpedido)";
						$sql_result=mysqli_query($conexao,$sql)or die("Erro:".mysqli_error($conexao));
						while($row=mysqli_fetch_array($sql_result)){								
          ?>                  
          <tr>
            <td><a href='../cadastros/clientes_edit.php?key=<?php echo md5(microtime()); ?>&date=<?php echo base64_encode($row['Id']); ?>'><i class="far fa-edit"></i></a></td>    
            <td><?php echo $row['Idpedido'];?></td>        
            <td><?php echo date('d-m-Y', strtotime($row['Datacadastro']));?></td>        
            <td><?php echo $row['Razaosocial'];?></td>                    
            <td><?php echo number_format($row['VlTotal'], 2, ',', '.');?></td></td>                    
          </tr>
					<?php
						}
					?>                  
                </tbody>
              </table>
            </div>
          </div>          
        </div>
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

  <!-- Logout Modal-->
  <?php include 'modallista.php'; ?>

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
