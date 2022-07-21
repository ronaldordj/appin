<?php	
	include '../../config/conecta.php';	
	
	$usuario        = $_POST['usuario'];
	$codigo         = $_POST['codigo'];	
	$idcliente	    = $_POST['idcliente'];	
	
	$idproduto      = $_POST['idproduto'];	    
	$quantidade     = $_POST['qtd'];	    
	$valoruni       = $_POST['valor'];	    
	
	//echo $usuario.'<br>'.$codigo.'<br>'.$idcliente;

	$date    = base64_encode($usuario);
	$key     =	base64_encode($idcliente);
	$pedido  =	base64_encode($codigo);
	
	$queryInsercao = "INSERT INTO cd_pedidoitem (Idpedido, Idproduto, Quantidade, ValorUni) 
	VALUES ($codigo, $idproduto, $quantidade, $valoruni)";
	@mysqli_query($conexao,$queryInsercao) or die("Algo deu errado ao inserir o registro. Tente novamente." .mysqli_error($conexao));	
	echo "<script>location.href='../view/cadpedidoitem.php?date=$date&key=$key&pedido=$pedido'</script>";
	
 ?>