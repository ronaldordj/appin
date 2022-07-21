<?php	
	include 'db/conecta.php';
	$idpedido  = $_GET['p'];	
	$idCliente = $_GET['c'];	
		
	$sql="select razao from cd_cliente where idcliente = $idCliente";
	$sql_result=mysqli_query($conexao,$sql)or die("Erro:".mysqli_error($conexao));		
	$row=mysqli_fetch_array($sql_result);	
?>
<!DOCTYPE html>
<html>
  <head lang="pt-br">
      <meta charset="UTF-8">
      <title>Estoque</title>
	  <link href="css/bootstrap.css" rel="stylesheet">
	  <!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	  <link rel="icon" href="images/favicon.ico" type="image/x-icon">
	  <!--<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>-->
	  <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
	  <script type='text/javascript' src="js/jquery-ui.js"></script>
      <link rel="stylesheet" type="text/css" href="css/jquery-ui.css" />	    	  
	  
	</head>
	<body>
		<div class="container">
			<h2>Pedido - Produtos</h2>
			<br>
			<form action="" method="post">
				<div class="row">
					<div class="col-xs-4 col-sm-12 col-md-2 col-lg-2">
						<label>Pedido nº</label><br>
						<input name="codigo" class="form-control" type="text" id="codigo" readonly value="<?php echo $idpedido; ?>"/>
					</div>			
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<label>Cliente</label><br>
						<input name="cliente" class="form-control" type="text" id="cliente" readonly value="<?php echo $row[0];?>" />
						<input name="idcliente" class="form-control" type="hidden" id="idcliente" value="<?php echo $idCliente;?>" />
					</div>										
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<label>Produto(s)*</label><br>
						<input name="produto" class="form-control" type="text" id="produto" readonly />
						<input name="idproduto" class="form-control" type="hidden" id="idproduto" />
					</div>
					<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
						<label>Quantidade*</label><br>
						<input name="qtd" class="form-control" type="text" id="qtd" readonly />
					</div>
					<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">	
						<label></label><br>					
						<button type="submit" class="btn btn-success" disabled><span class="glyphicon glyphicon-plus" aria-hidden="false"></button>
					</div>	
				</div>	
				<br></br>				
			</form>			
			<br>
			
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr>						
								<th width=5%><center>Código</center></th>
								<th width=5%><center>Referência</center></th>
								<th><center>Descricao</center></th>						
								<th width=5%><center>Quantidade</center></th>
								<th width=8%><center>Vl. Unit.</center></th>
								<th width=8%><center>Vl. Total</center></th>
								<th width=3%><center>***</center></th>
							</tr>
						</thead>
					<?php
						$sqlP="SELECT pd.idproduto, p.referencia, p.descricao, pd.quantidade, p.valorvenda, (pd.quantidade * p.valorvenda) as total, pd.idpedidoprod, g.descricao 
								FROM co_pedidoprod pd
								JOIN es_produto p on (p.idproduto = pd.idproduto) 
								JOIN es_grupo g on (g.idgrupo = p.idgrupo)
								WHERE pd.idpedido = $idpedido";
						$sql_resultP=mysqli_query($conexao,$sqlP)or die("Erro:".mysqli_error($conexao));
						while($rowP=mysqli_fetch_array($sql_resultP)){						
					?>	
							 
						<tr>					
							<td width=5%><center><?php echo $rowP[0];?></center></td>
							<td width=5%><center><?php echo $rowP[1];?></center></td>
							<td><center><?php echo $rowP[7]." - ".$rowP[2];?></center></td>
							<td width=5%><center><?php echo $rowP[3];?></center></td>
							<td width=8%><center><?php echo number_format($rowP[4], 2, ',', '.');?></center></td>
							<td width=8%><center><?php echo number_format($rowP[5], 2, ',', '.');?></center></td>
							<td width=3%><center><a href='#'><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></center></td>
						</tr>
					<?php
						}
					?>
					</table>			
				</div>					
					<?php
						$sqlT="SELECT sum((po.quantidade * p.valorvenda)) as tot
						FROM co_pedidoprod po
						JOIN es_produto p on (p.idproduto = po.idproduto) where po.idpedido = $idpedido";
						$sql_resultT=mysqli_query($conexao,$sqlT)or die("Erro:".mysqli_error($conexao));
						$rowT=mysqli_fetch_array($sql_resultT)
					?>
						<h2><p align="right"><b>Total: R$ <?php echo number_format($rowT[0], 2, ',', '.');?></p></h2>	
			
			<br>
			<form action="" method="post">		
				<div class="row">					
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
						<input name="idpedido" class="form-control" type="hidden" id="idpedido" value="<?php echo $idpedido; ?>"/>
						<label>Tipo de Pagamento</label><br>
						<select name="tipopagto" id="tipopagto" class="form-control" readonly >							
							<?php
									$sql="select * from cd_tipopgto";
									$sql_result=mysqli_query($conexao,$sql)or die("Erro:".mysqli_error($conexao)); 		 	 		 		
									
									while($row=mysqli_fetch_array($sql_result)){
							?>
									<option value="<?php echo $row['idtipopagto'];?>"><?php echo $row['descricao'];?></option>	
							<?php		
									}								
							?>			
						</select>
					</div>
				</div>				
				<div class="row">
					<!-- <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
						<label>Qtde. Parcelas</label><br>
						<input name="qtdparcela" class="form-control" type="number" min="1" value="1" id="qtdparcela" maxlength = "3" readonly />
					</div> -->
					<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
						<label>Data Vencimento</label><br>
						<input name="dtvencimento" class="form-control" type="date" id="dtvencimento" readonly value="<?php echo date('Y-m-d', strtotime('+1 month'));?>" />
					</div>
				</div>	
				<br></br>			

				<div class="row">
					<div class="col-sm-12 col-md-6 col-lg-6">													 						 
						
					</div>
				</div>
			</form>	
			<div class="row">
					<div class="col-sm-12 col-md-6 col-lg-6">													 						 						
						 <a class="btn btn-warning btn-lg" href="imprimir_pedido.php?p=<?php echo $idpedido;?>" target="_blank" role="button">Imprimir</a>			
						 <a class="btn btn-danger btn-lg" href="faturar_pedido.php?p=<?php echo $idpedido;?>&c=<?php echo $idCliente;?>" role="button">Faturar</a>
						 <a class="btn btn-primary btn-lg" href="lista_comercial.php" role="button">Sair</a>
					</div>
				</div>
		</div>
		<script>
        $(document).ready(function() {
            $("#produto").autocomplete({
                source: "getprodutos.php",
                minLength: 2,
                select: function(event, ui) {
                    $("#idproduto").val(ui.item.idproduto);					
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