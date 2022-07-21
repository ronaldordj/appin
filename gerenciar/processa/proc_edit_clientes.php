<?php	
	include '../config/conecta.php';
	
	$id             = $_POST['id'];
	$nome           = $_POST['nome'];	
	$ativo	        = $_POST['ativo'];

	if($_FILES['arquivo']['name'] != "")
	{

		$arquivo_tmp = $_FILES['arquivo']['tmp_name'];		
		$nomearq     = $_FILES['arquivo']['name'];
		
	
		$extensao = strrchr($nomearq, '.');
	
		$extensao = strtolower($extensao);
		

		//strstr('.jpg;.jpeg;.png', $extensao);
		
		$novoNome = md5(microtime()) . $extensao;
						
		$destino  = '../imagens/clientes/' . $novoNome;		
		
		@move_uploaded_file($arquivo_tmp, $destino);		

		$queryInsercao = "UPDATE clientes SET 
						Nome          = '$nome',						
						Imagem        = '$novoNome',						
						Ocultar       =  $ativo
					WHERE 
						Id = $id";
		@mysqli_query($conexao,$queryInsercao) or die("Algo deu errado ao atualizar o registro. Tente novamente." .mysqli_error($conexao));	
		echo "<script>alert('Cliente atualizado com sucesso!!'),location.href='../listas/clientes.php'</script>";	
	}
	else {

		$queryInsercao = "UPDATE clientes SET 
						Nome          = '$nome', 												
						Ocultar       =  $ativo
					WHERE 
						Id = $id";
		@mysqli_query($conexao,$queryInsercao) or die("Algo deu errado ao atualizar o registro. Tente novamente." .mysqli_error($conexao));	
		echo "<script>alert('Cliente atualizado com sucesso!!'),location.href='../listas/clientes.php'</script>";	
	}
	
	
 ?>