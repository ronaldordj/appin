<?php	
	include '../config/conecta.php';
	
	$id             = $_POST['id'];
	$ativo          = $_POST['ativo'];	

	if($_FILES['arquivo']['name'] != "")
	{

		$arquivo_tmp = $_FILES['arquivo']['tmp_name'];		
		$nomearq     = $_FILES['arquivo']['name'];
		
	
		$extensao = strrchr($nomearq, '.');
	
		$extensao = strtolower($extensao);
		

		//strstr('.jpg;.jpeg;.png', $extensao);
		
		$novoNome = md5(microtime()) . $extensao;
						
		$destino  = '../imagens/carrossel/' . $novoNome;		
		
		@move_uploaded_file($arquivo_tmp, $destino);		

		$queryInsercao = "UPDATE topo_carrossel SET 						
						Imagem        = '$novoNome',
						Ocultar       =  $ativo												
					WHERE 
						Id = $id";
		@mysqli_query($conexao,$queryInsercao) or die("Algo deu errado ao atualizar o registro. Tente novamente." .mysqli_error($conexao));	
		echo "<script>alert('Imagem atualizada com sucesso!!'),location.href='../listas/topocarrossel.php'</script>";	
	}
	else {

		$queryInsercao = "UPDATE topo_carrossel SET 												
						Ocultar       =  $ativo												
					WHERE 
						Id = $id";
		@mysqli_query($conexao,$queryInsercao) or die("Algo deu errado ao atualizar o registro. Tente novamente." .mysqli_error($conexao));	
		echo "<script>alert('Registro Atualizado!!'),location.href='../listas/topocarrossel.php'</script>";	
	}
	
	
 ?>