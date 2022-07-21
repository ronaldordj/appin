<?php	
	include '../config/conecta.php';	
	
	$titulo         = $_POST['titulo'];
	$descricao	    = $_POST['descricao'];
	$pretensao    	= $_POST['pretensao'];		
	
	
	$queryInsercao = "INSERT INTO trabalhe_vagas (Titulo, Descricao, Pretensao, Ocultar) 
	VALUES ('$titulo', '$descricao', '$pretensao', 1)";
	@mysqli_query($conexao,$queryInsercao) or die("Algo deu errado ao inserir o registro. Tente novamente." .mysqli_error($conexao));	
	echo "<script>alert('Vaga cadastrada com sucesso!'),location.href='../listas/trabalhevagas.php'</script>";
	
 ?>