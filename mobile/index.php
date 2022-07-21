<?php
//session_start();
$idvendedor = $_GET['date'];
?>
<!doctype html>

<html lang="pt-br" xmlns="http://www.w3.org/1999/html">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    

    <title>AppIn - Pedidos</title>

    <meta name="description" content="Movel In">
    <meta name="author" content="DriftWeb">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#dcdcdc">      

    <link rel='manifest' href='manifest.json'>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">		

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <?php
    // include("../mobile_device_detect.php");
    // $mobile = mobile_device_detect();

    // if (!isset($_SESSION['usuarioId'])) {
    //     session_unset();
    //     session_destroy();

    //     if ($mobile == TRUE) {
    //         header('location:./login.php');
    //     } else {
    //         header('location:../view/login');
    //     }
    // }
    ?>
	
	<style>
		body {
		  background-color: #dcdcdc;
		}
	</style>
	
</head>

<body>	
    <div class="container">		
    <br>
	  <br>
  <div class="container">
		<div class="text-center">
		  <center><img src="../images/logo-transp.png" class="rounded" alt="All In" width="70px" height="90px"></center>
		</div>
    </div>
    <br><br>        
        <div class="row">
            <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
                <button class="btn btn-secondary btn-lg btn-block">
                    <div class="float-left">
                        <a href="view/clientes.php?date=<?php echo $idvendedor?>" class="btn btn-secondary btn-lg btn-block" role="button"> 
                        <img src="../images/clientes.png" alt="Clientes" height="40px" class="img-rounded">                           
                            Clientes
                        </a>
                    </div>
                </button>
            </div>
        </div>
		<br>        
		<div class="row">
            <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
                <button class="btn btn-secondary btn-lg btn-block">
                    <div class="float-left">                        
                        <a href="view/produtos.php?date=<?php echo $idvendedor?>" class="btn btn-secondary btn-lg btn-block" role="button"> 
                        <img src="../images/produtos.png" alt="Produtos" height="40px" class="img-rounded">                           
                            Produtos
                        </a>
                    </div>
                </button>
            </div>
        </div>
        <br>		
        <div class="row">
            <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
                <button class="btn btn-secondary btn-lg btn-block">
                    <div class="float-left">
                        <a href="view/pedidos.php?date=<?php echo $idvendedor?>" style="display:block;width: 100%;" class="btn btn-secondary btn-lg btn-block" role="button">                            
                        <img src="../images/pedidos.png" alt="Pedidos" height="40px" class="img-rounded">
                            Pedidos
                        </a>
                    </div>
                </button>
            </div>
        </div>        
		<br>		
		<div class="row">
			<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
				<button class="btn btn-secondary btn-lg btn-block">
					<div class="float-left">
						<a href="view/usuario_detalhes.php?date=<?php echo $idvendedor?>" class="btn btn-secondary btn-lg btn-block" role="button">
                        <img src="../images/meusdados.png" alt="Meus Dados" height="40px" class="img-rounded">							
							Meus Dados
						</a>
					</div>
				</button>
			</div>
		</div>
		<br>
		<div class="row">
            <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
                <button class="btn btn-secondary btn-lg btn-block">
                    <div class="float-left">
                        <a href="logout.php" class="btn btn-secondary btn-lg btn-block" role="button">  
                        <img src="../images/sair.png" alt="Sair" height="40px" class="img-rounded">                          
                            Sair
                        </a>
                    </div>
                </button>
            </div>
        </div>		        
    </div>
    <br>

    </div>


    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
    <?php //include("footer.php"); 
    ?>
</body>

</html>