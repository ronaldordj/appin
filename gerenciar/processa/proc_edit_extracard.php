<?php	
	include '../config/conecta.php';
	
	$id                 = $_POST['id'];
	$titulo                 = $_POST['titulo'];
	$descricao			= $_POST['descricao'];
	$ativo	            = $_POST['ativo'];

	$queryInsercao = "UPDATE extra_card SET Titulo = '$titulo', Descricao = '$descricao', Ocultar = $ativo WHERE Id = $id";
	@mysqli_query($conexao,$queryInsercao) or die("Algo deu errado ao atualizar o registro. Tente novamente." .mysqli_error($conexao));	
	echo "<script>alert('Registro atualizado com sucesso!'),location.href='../listas/extracorpo.php'</script>";
	
	
 ?>