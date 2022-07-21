<?php	
	include '../config/conecta.php';
	
	$id                 = $_POST['id'];
	$negocio			= $_POST['negocio'];
	$missao	            = $_POST['missao'];
	$visao	            = $_POST['visao'];
	$valores	        = $_POST['valores'];
	$ativo              = $_POST['ativo'];

	$queryInsercao = "UPDATE sobrenos_missao SET Negocio = '$negocio', Missao = '$missao', Visao = '$visao', Valores = '$valores', Ocultar = $ativo WHERE Id = $id";
	@mysqli_query($conexao,$queryInsercao) or die("Algo deu errado ao atualizar o registro. Tente novamente." .mysqli_error($conexao));	
	echo "<script>alert('Registro atualizado com sucesso!'),location.href='../listas/sobrenosmissao.php'</script>";
	
	
 ?>