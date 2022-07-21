<?php	
	include '../../config/conecta.php';
		$sql="select max(idpedido) as maior from cd_pedido";
		$sql_result=mysqli_query($conexao,$sql)or die("Erro:".mysqli_error($conexao));		
		$row=mysqli_fetch_array($sql_result);
		$seq = $row['maior']+1;
?>
<!DOCTYPE html>
<html>
  <head lang="pt-br">
      <meta charset="UTF-8">
      <title>Estoque</title>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">			  
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	  <link rel="icon" href="images/favicon.ico" type="image/x-icon">
	  <script type="text/javascript" src="js/jquery-1.4.2.js"></script>	  
	  <script type='text/javascript' src="js/jquery.autocomplete.js"></script>
      <link rel="stylesheet" type="text/css" href="js/jquery.autocomplete.css" />	    
	  
	  <script type="text/javascript">
            $().ready(function() {
                $("#cliente").autocomplete("autoComplete.php", {
                    width: 300,
					fontSize: 16,
                    matchContains: true,
                    //mustMatch: true,
                    minChars: 3,
                    //multiple: true,
                    //highlight: false,
                    //multipleSeparator: ",",
                    selectFirst: false
                });
            });
      </script>	  
  </head>
	<body>
		<div class="container">
			<h2>Pedido</h2>
			<br>
			<form action="grava_venda.php" method="post">
				<div class="row">
					<div class="col-xs-4 col-sm-12 col-md-2 col-lg-2">
						<label>Pedido nº</label><br>
						<input name="codigo" class="form-control" type="text" id="codigo" placeholder="Código" readonly value="<?php echo $seq ?>"/>
					</div>			
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<label>Cliente*</label><br>
						<input name="cliente" class="form-control" type="text" id="cliente" autofocus required />
					</div>										
				</div>									
				<br></br>
				<div class="row">
					<div class="col-sm-12 col-md-6 col-lg-6">													 
						 <a class="btn btn-warning" href="lista_venda.php" role="button">Voltar</a>
						 <button type="submit" class="btn btn-success">Adicionar Produtos  <span class="glyphicon glyphicon-plus" aria-hidden="false"></button>
					</div>
				</div>				
			</form>
			<br />			
			<p><span>*</span>Campo de preenchimento obrigatório.</p>
		</div>				
	</body>
</html>