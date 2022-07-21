<?php	
	include '../config/conecta.php';
	
	$id             = $_POST['id'];
	$titulo         = $_POST['titulo'];
	$descricao  	= $_POST['descricao'];
	$pretensao    	= $_POST['pretensao'];	
	$ativo	        = $_POST['ativo'];

		$queryInsercao = "UPDATE trabalhe_vagas SET 
					Titulo 		= '$titulo',
					Descricao 	= '$descricao',
					Pretensao 	= '$pretensao',					
					Ocultar       =  $ativo
				WHERE 
					Id = $id";
	@mysqli_query($conexao,$queryInsercao) or die("Algo deu errado ao atualizar o registro. Tente novamente." .mysqli_error($conexao));	
	echo "<script>alert('Vaga atualizada com sucesso!!'),location.href='../listas/trabalhevagas.php'</script>";	
	
	
	
 ?>