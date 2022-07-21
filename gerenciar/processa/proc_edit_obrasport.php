<?php	
	include '../config/conecta.php';
	
	$id             = $_POST['id'];
	$idobra         = $_POST['idobra'];
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
						
		$destino  = '../imagens/obras/' . $novoNome;		
		
		@move_uploaded_file($arquivo_tmp, $destino);		

		$queryInsercao = "UPDATE obras_portfolio SET 
						Idobra 		= '$idobra',
						Descricao 	= '$descricao',						
						Imagem      = '$novoNome',						
						Ocultar     =  $ativo
					WHERE 
						Id = $id";
		@mysqli_query($conexao,$queryInsercao) or die("Algo deu errado ao atualizar o registro. Tente novamente." .mysqli_error($conexao));	
		echo "<script>alert('Porfólio atualizado com sucesso!'),location.href='../listas/obrasport.php'</script>";	
	}
	else {

		$queryInsercao = "UPDATE obras_portfolio SET 
						Idobra 		= '$idobra',
						Descricao 	= '$descricao',												
						Ocultar     =  $ativo
					WHERE 
						Id = $id";
		@mysqli_query($conexao,$queryInsercao) or die("Algo deu errado ao atualizar o registro. Tente novamente." .mysqli_error($conexao));	
		echo "<script>alert('Portfólio atualizado com sucesso!!'),location.href='../listas/obrasport.php'</script>";	
	}
	
	
 ?>