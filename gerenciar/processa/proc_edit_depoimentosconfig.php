<?php	
	include '../config/conecta.php';
	
	$id                 = $_POST['id'];	
	$ativo	            = $_POST['ativo'];

	$queryInsercao = "UPDATE depoimento_config SET Ocultar = $ativo WHERE Id = $id";
	@mysqli_query($conexao,$queryInsercao) or die("Algo deu errado ao atualizar o registro. Tente novamente." .mysqli_error($conexao));	
	echo "<script>alert('Registro atualizado com sucesso!'),location.href='../listas/depoimentosconfig.php'</script>";
	
	
 ?>