<?php	
	include '../config/conecta.php';
	
	$id             = $_POST['id'];
	$idnoticia      = $_POST['idnoticia'];
	$descricao  	= $_POST['descricao'];	
	$ativo	        = $_POST['ativo'];

	

	if($_FILES['arquivo']['name'] != "")
	{

		$arquivo_tmp = $_FILES['arquivo']['tmp_name'];		
		$nomearq     = $_FILES['arquivo']['name'];
		
	
		$extensao = strrchr($nomearq, '.');
	
		$extensao = strtolower($extensao);
		

		//strstr('.jpg;.jpeg;.png', $extensao);
		
		$novoNome = md5(microtime()) . $extensao;
						
		$destino  = '../imagens/noticias/' . $novoNome;		
		
		@move_uploaded_file($arquivo_tmp, $destino);		

		$queryInsercao = "UPDATE noticias_portfolio SET 
						Idnoticia	= '$idnoticia',
						Descricao 	= '$descricao',						
						Imagem      = '$novoNome',						
						Ocultar     =  $ativo
					WHERE 
						Id = $id";
		@mysqli_query($conexao,$queryInsercao) or die("Algo deu errado ao atualizar o registro. Tente novamente." .mysqli_error($conexao));	
		echo "<script>alert('Porfólio atualizado com sucesso!'),location.href='../listas/noticiasport.php'</script>";	
	}
	else {

		$queryInsercao = "UPDATE noticias_portfolio SET 
							Idnoticia	= '$idnoticia',
							Descricao 	= '$descricao',												
							Ocultar     =  $ativo
						WHERE 
							Id = $id";
		@mysqli_query($conexao,$queryInsercao) or die("Algo deu errado ao atualizar o registro. Tente novamente." .mysqli_error($conexao));	
		echo "<script>alert('Portfólio atualizado com sucesso!!'),location.href='../listas/noticiasport.php'</script>";	
	}
	
	
 ?>