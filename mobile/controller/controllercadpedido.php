<?php	
	include '../../config/conecta.php';	
	
	$usuario        = $_POST['usuario'];
	$codigo         = $_POST['codigo'];	
	$idcliente	    = $_POST['idcliente'];	
	$condpagto      = $_POST['condpagto'];
	$observacao     = $_POST['observacao'];
	

	$date    = base64_encode($usuario);
	$key     =	base64_encode($idcliente);
	$pedido  =	base64_encode($codigo);
	
	$queryInsercao = "INSERT INTO cd_pedido (Idpedido, Idusuario, Idcliente, Datacadastro, Condicaopagto, Valor, Observacao, Statusemail, Status) 
	VALUES ($codigo, $usuario, $idcliente, now(), '$condpagto', 0.00, '$observacao', 1, 'A')";
	@mysqli_query($conexao,$queryInsercao) or die("Algo deu errado ao inserir o registro. Tente novamente." .mysqli_error($conexao));	
	echo "<script>location.href='../view/cadpedidoitem.php?date=$date&key=$key&pedido=$pedido'</script>";
	
 ?>