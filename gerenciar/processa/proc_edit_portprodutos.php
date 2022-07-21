<?php	
	include '../config/conecta.php';
	
	$id             = $_POST['id'];
	$produto        = $_POST['descricao'];
	$categoria		= $_POST['idcategoria'];
	$subcategoria 	= $_POST['idsubcategoria'];	
	$ativo	        = $_POST['ativo'];

	if(isset($_FILES['arquivo']['name']))
	{

		$arquivo_tmp = $_FILES['arquivo']['tmp_name'];		
		$nomearq     = $_FILES['arquivo']['name'];
		
	
		$extensao = strrchr($nomearq, '.');
	
		$extensao = strtolower($extensao);
		

		//strstr('.jpg;.jpeg;.png', $extensao);
		
		$novoNome = md5(microtime()) . $extensao;
						
		$destino  = '../imagens/produtos/' . $novoNome;		
		
		@move_uploaded_file($arquivo_tmp, $destino);		

		$queryInsercao = "UPDATE portfolio_produto SET 
						Descricao        = '$produto',
						Idcategoria      =  $categoria,
						Idsubcategoria   =  $subcategoria, 						
						Imagem           = '$novoNome',						
						Ocultar          =  $ativo
					WHERE 
						Id = $id";
		@mysqli_query($conexao,$queryInsercao) or die("Algo deu errado ao atualizar o registro. Tente novamente." .mysqli_error($conexao));	
		echo "<script>alert('Produto atualizado com sucesso!!'),location.href='../listas/portprodutos.php'</script>";	
	}
	else {

		$queryInsercao = "UPDATE portfolio_produto SET 
						Descricao        = '$produto',
						Idcategoria      =  $categoria,
						Idsubcategoria   =  $subcategoria, 												
						Ocultar          =  $ativo
					WHERE 
						Id = $id";
		@mysqli_query($conexao,$queryInsercao) or die("Algo deu errado ao atualizar o registro. Tente novamente." .mysqli_error($conexao));	
		echo "<script>alert('Produto atualizado com sucesso!!'),location.href='../listas/portprodutos.php'</script>";	
	}
	
	
 ?>