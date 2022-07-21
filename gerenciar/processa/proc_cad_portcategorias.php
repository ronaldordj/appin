<?php	
	include '../config/conecta.php';
	
	$descricao			= $_POST['descricao'];	

	$queryInsercao = "INSERT INTO portfolio_categoria (Descricao, Ocultar) VALUES ('$descricao',1)";
	@mysqli_query($conexao,$queryInsercao) or die("Algo deu errado ao atualizar o registro. Tente novamente." .mysqli_error($conexao));	
	echo "<script>alert('Registro incluído com sucesso!'),location.href='../listas/portcategorias.php'</script>";
	
	
 ?>