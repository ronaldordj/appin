<?php	
	include '../config/conecta.php';
	
	$descricao			= $_POST['descricao'];	

	$queryInsercao = "INSERT INTO noticias_categoria (Descricao, Ocultar) VALUES ('$descricao',1)";
	@mysqli_query($conexao,$queryInsercao) or die("Algo deu errado ao atualizar o registro. Tente novamente." .mysqli_error($conexao));	
	echo "<script>alert('Categoria cadastrada com sucesso!'),location.href='../listas/noticiascateg.php'</script>";
	
	
 ?>