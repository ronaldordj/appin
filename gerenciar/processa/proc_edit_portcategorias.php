<?php	
	include '../config/conecta.php';
	
	$id                 = $_POST['id'];
	$descricao			= $_POST['descricao'];
	$ativo	            = $_POST['ativo'];

	$queryInsercao = "UPDATE portfolio_categoria SET Descricao = '$descricao', Ocultar = $ativo WHERE Id = $id";
	@mysqli_query($conexao,$queryInsercao) or die("Algo deu errado ao atualizar o registro. Tente novamente." .mysqli_error($conexao));	
	echo "<script>alert('Registro atualizado com sucesso!'),location.href='../listas/portcategorias.php'</script>";
	
	
 ?>