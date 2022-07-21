<?php	
	include '../config/conecta.php';
	
	$id             = $_POST['id'];
	$titulo         = $_POST['titulo'];
	$descricao  	= $_POST['descricao'];
	$cliente    	= $_POST['cliente'];
	$cidade     	= $_POST['cidade'];
	$uf         	= $_POST['uf'];
	$dataini     	= $_POST['dataini'];
	$datafim     	= $_POST['datafim'];
	$status     	= $_POST['status'];
	$ativo	        = $_POST['ativo'];

	

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

		$queryInsercao = "UPDATE obras SET 
						Titulo 		= '$titulo',
						Descricao 	= '$descricao',
						Cliente 	= '$cliente',
						Cidade 		= '$cidade',
						Uf  		= '$uf',
						Imagem      = '$novoNome',
						Datainicio  = '$dataini',
						Datafinal   = '$datafim',
						Status      = '$status',
						Ocultar       =  $ativo
					WHERE 
						Id = $id";
		@mysqli_query($conexao,$queryInsercao) or die("Algo deu errado ao atualizar o registro. Tente novamente." .mysqli_error($conexao));	
		echo "<script>alert('Obra atualizada com sucesso!'),location.href='../listas/obras.php'</script>";	
	}
	else {

		$queryInsercao = "UPDATE obras SET 
						Titulo 		= '$titulo',
						Descricao 	= '$descricao',
						Cliente 	= '$cliente',
						Cidade 		= '$cidade',
						Uf  		= '$uf',						
						Datainicio  = '$dataini',
						Datafinal   = '$datafim',
						Status      = '$status',
						Ocultar       =  $ativo
					WHERE 
						Id = $id";
		@mysqli_query($conexao,$queryInsercao) or die("Algo deu errado ao atualizar o registro. Tente novamente." .mysqli_error($conexao));	
		echo "<script>alert('Obra atualizada com sucesso!!'),location.href='../listas/obras.php'</script>";	
	}
	
	
 ?>