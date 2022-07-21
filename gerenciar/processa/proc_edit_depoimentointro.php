<?php	
	include '../config/conecta.php';
	
	$id             = $_POST['id'];
	$descricao      = $_POST['descricao'];		

	if($_FILES['arquivo']['name'] != "")
	{

		$arquivo_tmp = $_FILES['arquivo']['tmp_name'];		
		$nomearq     = $_FILES['arquivo']['name'];
		
	
		$extensao = strrchr($nomearq, '.');
	
		$extensao = strtolower($extensao);
		

		//strstr('.jpg;.jpeg;.png', $extensao);
		
		$novoNome = md5(microtime()) . $extensao;
						
		$destino  = '../imagens/depoimentos/' . $novoNome;		
		
		@move_uploaded_file($arquivo_tmp, $destino);		

		$queryInsercao = "UPDATE depoimento_intro SET 						
						Imagem        = '$novoNome'												
					WHERE 
						Id = $id";
		@mysqli_query($conexao,$queryInsercao) or die("Algo deu errado ao atualizar o registro. Tente novamente." .mysqli_error($conexao));	
		echo "<script>alert('Imagem atualizada com sucesso!!'),location.href='../listas/depoimentointro.php'</script>";	
	}
	else {

		echo "<script>alert('Você não atualizou a imagem!!'),location.href='../listas/depoimentointro.php'</script>";	
	}
	
	
 ?>