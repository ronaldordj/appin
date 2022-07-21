<?php	
	include '../config/conecta.php';
	
	$id             = $_POST['id'];
	$titulo      	= $_POST['titulo'];
	$descricao      = $_POST['descricao'];		

	
	$queryInsercao = "UPDATE clientes_intro SET 
					Titulo        = '$titulo',
					Descricao     = '$descricao'						
				WHERE 
					Id = $id";
	@mysqli_query($conexao,$queryInsercao) or die("Algo deu errado ao atualizar o registro. Tente novamente." .mysqli_error($conexao));	
	echo "<script>alert('Dados atualizados com sucesso!!'),location.href='../listas/clientesintro.php'</script>";	
	
 ?>