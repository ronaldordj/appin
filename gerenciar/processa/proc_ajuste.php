<?php	
	include '../config/conecta.php';

	$id     = $_GET['id'];
	$ordem  = $_GET['ordem'];
	
	$queryInsercao = "UPDATE sobrenos_imagens SET 
	             			 Ordem     =  $ordem
					WHERE 
						Id = $id";
		@mysqli_query($conexao,$queryInsercao) or die("Algo deu errado ao atualizar o registro. Tente novamente." .mysqli_error($conexao));	
		echo "<script>alert('Topo atualizado com sucesso!!');</script>";	
	
	
	
 ?>