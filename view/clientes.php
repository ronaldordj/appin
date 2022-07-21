<?php
  include '../config/conecta.php';
  $idvendedor = base64_decode($_GET['date']);
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
            <a class="btn btn-primary btn-lg btn-block" href="../menu.php?date=<?php echo base64_encode($idvendedor)?>" role="button">Menu</a>
          </div>
          <div class="col-4">  
            <a class="btn btn-success btn-lg btn-block" href="cadclientes.php?date=<?php echo base64_encode($idvendedor)?>" role="button">Novo</a>
          </div>        
        </div>  
      
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Lista de Clientes</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>                    
                    <th>Cód</th>
                    <th>Nome</th>                   
					        </tr>
                </thead>
                <tfoot>
                  <tr>                    
                    <th>Cód</th>
                    <th>Nome</th>                                        
                  </tr>
                </tfoot>
                <tbody>
					<?php
						$sql="SELECT * FROM cd_cliente WHERE Ativo = 1 AND Iddistribuidor = $idvendedor";
						$sql_result=mysqli_query($conexao,$sql)or die("Erro:".mysqli_error($conexao));
						while($row=mysqli_fetch_array($sql_result)){								
          ?>                  
          <tr>
            <td><a href='clientes_detalhes.php?key=<?php echo md5(microtime()); ?>&date=<?php echo base64_encode($row['Id'])?>&mic=<?php echo base64_encode($idvendedor)?>'><?php echo $row['Id'];?></a></td>        
            <td><a href='clientes_detalhes.php?key=<?php echo md5(microtime()); ?>&date=<?php echo base64_encode($row['Id'])?>&mic=<?php echo base64_encode($idvendedor)?>'><?php echo $row['Razaosocial'];?></a></td>                                            
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
      

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  

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
