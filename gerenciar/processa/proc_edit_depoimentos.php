<?php	
	include '../config/conecta.php';
	
	$id             = $_POST['id'];
	$pessoa         = $_POST['pessoa'];
	$cargo			= $_POST['cargo'];
	$cliente    	= $_POST['cliente'];
	$depoimento 	= $_POST['depoimento'];
	$ativo	        = $_POST['ativo'];

	if(isset($_FILES['arquivo']['name']))
	{

		$arquivo_tmp = $_FILES['arquivo']['tmp_name'];		
		$nomearq     = $_FILES['arquivo']['name'];
		
	
		$extensao = strrchr($nomearq, '.');
	
		$extensao = strtolower($extensao);
		

		//strstr('.jpg;.jpeg;.png', $extensao);
		
		$novoNome = md5(microtime()) . $extensao;
						
		$destino  = '../imagens/depoimentos/' . $novoNome;		
		
		@move_uploaded_file($arquivo_tmp, $destino);		

		$queryInsercao = "UPDATE depoimento SET 
						Pessoa        = '$pessoa',
						Cargo         = '$cargo',
						Cliente       = '$cliente', 
						Depoimento    = '$depoimento', 						
						Imagem        = '$novoNome',						
						Ocultar       =  $ativo
					WHERE 
						Id = $id";
		@mysqli_query($conexao,$queryInsercao) or die("Algo deu errado ao atualizar o registro. Tente novamente." .mysqli_error($conexao));	
		echo "<script>alert('Depoimento atualizado com sucesso!!'),location.href='../listas/depoimentos.php'</script>";	
	}
	else {

		$queryInsercao = "UPDATE depoimento SET 
						Pessoa        = '$pessoa',
						Cargo         = '$cargo',
						Cliente       = '$cliente', 
						Depoimento    = '$depoimento', 												
						Ocultar       =  $ativo
					WHERE 
						Id = $id";
		@mysqli_query($conexao,$queryInsercao) or die("Algo deu errado ao atualizar o registro. Tente novamente." .mysqli_error($conexao));	
		echo "<script>alert('Depoimento atualizado com sucesso!!'),location.href='../listas/depoimentos.php'</script>";	
	}
	
	
 ?>