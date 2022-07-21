<?php	
	include '../config/conecta.php';
	
	$id             = $_POST['id'];
	$descricao      = $_POST['descricao'];	
	$ativo	        = $_POST['ativo'];

	if(isset($_FILES['arquivo']['name']))
	{

		$arquivo_tmp = $_FILES['arquivo']['tmp_name'];		
		$nomearq     = $_FILES['arquivo']['name'];
		
	
		$extensao = strrchr($nomearq, '.');
	
		$extensao = strtolower($extensao);
		

		//strstr('.jpg;.jpeg;.png', $extensao);
		
		$novoNome = md5(microtime()) . $extensao;
						
		$destino  = '../imagens/topo/' . $novoNome;		
		
		@move_uploaded_file($arquivo_tmp, $destino);		

		$queryInsercao = "UPDATE topo_cabecalho SET 
						Descricao     = '$descricao',						
						Imagem        = '$novoNome',						
						Ocultar       =  $ativo
					WHERE 
						Id = $id";
		@mysqli_query($conexao,$queryInsercao) or die("Algo deu errado ao atualizar o registro. Tente novamente." .mysqli_error($conexao));	
		echo "<script>alert('Topo atualizado com sucesso!!'),location.href='../listas/topo.php'</script>";	
	}
	else {

		$queryInsercao = "UPDATE depoimento SET 
						Descricao     = '$descricao',												
						Ocultar       =  $ativo
					WHERE 
						Id = $id";
		@mysqli_query($conexao,$queryInsercao) or die("Algo deu errado ao atualizar o registro. Tente novamente." .mysqli_error($conexao));	
		echo "<script>alert('Topo atualizado com sucesso!!'),location.href='../listas/topo.php'</script>";	
	}
	
	
 ?>