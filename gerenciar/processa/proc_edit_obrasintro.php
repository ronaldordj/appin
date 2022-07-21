<?php	
	include '../config/conecta.php';
	
	$id             = $_POST['id'];
	$descricao      = $_POST['descricao'];		

	if(isset($_FILES['arquivo']['name']))
	{

		$arquivo_tmp = $_FILES['arquivo']['tmp_name'];		
		$nomearq     = $_FILES['arquivo']['name'];
		
	
		$extensao = strrchr($nomearq, '.');
	
		$extensao = strtolower($extensao);
		

		//strstr('.jpg;.jpeg;.png', $extensao);
		
		$novoNome = md5(microtime()) . $extensao;
						
		$destino  = '../imagens/obras/' . $novoNome;		
		
		@move_uploaded_file($arquivo_tmp, $destino);		

		$queryInsercao = "UPDATE obras_intro SET 
						Descricao     = '$descricao',						
						Imagem        = '$novoNome'												
					WHERE 
						Id = $id";
		@mysqli_query($conexao,$queryInsercao) or die("Algo deu errado ao atualizar o registro. Tente novamente." .mysqli_error($conexao));	
		echo "<script>alert('Dados atualizados com sucesso!!'),location.href='../listas/obrasintro.php'</script>";	
	}
	else {

		$queryInsercao = "UPDATE obras_intro SET 
						Descricao     = '$descricao'						
					WHERE 
						Id = $id";
		@mysqli_query($conexao,$queryInsercao) or die("Algo deu errado ao atualizar o registro. Tente novamente." .mysqli_error($conexao));	
		echo "<script>alert('Dados atualizados com sucesso!!'),location.href='../listas/obrasintro.php'</script>";	
	}
	
	
 ?>