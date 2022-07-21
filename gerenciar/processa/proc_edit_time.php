<?php	
	include '../config/conecta.php';
	
	$id             = $_POST['id'];
	$pessoa         = $_POST['pessoa'];
	$cargo			= $_POST['cargo'];
	$celular    	= $_POST['whats'];
	$linkedin    	= $_POST['linkedin'];
	$ativo	        = $_POST['ativo'];

	if(isset($_FILES['arquivo']['name']))
	{

		$arquivo_tmp = $_FILES['arquivo']['tmp_name'];		
		$nomearq     = $_FILES['arquivo']['name'];
		
	
		$extensao = strrchr($nomearq, '.');
	
		$extensao = strtolower($extensao);
		

		//strstr('.jpg;.jpeg;.png', $extensao);
		
		$novoNome = md5(microtime()) . $extensao;
						
		$destino  = '../imagens/time/' . $novoNome;		
		
		@move_uploaded_file($arquivo_tmp, $destino);		

		$queryInsercao = "UPDATE time SET 
						Pessoa        = '$pessoa',
						Cargo         = '$cargo',
						Celular       = '$celular', 
						Linkedin      = '$linkedin', 						
						Imagem        = '$novoNome',						
						Ocultar       =  $ativo
					WHERE 
						Id = $id";
		@mysqli_query($conexao,$queryInsercao) or die("Algo deu errado ao atualizar o registro. Tente novamente." .mysqli_error($conexao));	
		echo "<script>alert('Colaborador atualizado com sucesso!!'),location.href='../listas/nossotime.php'</script>";	
	}
	else {

		$queryInsercao = "UPDATE time SET 
						Pessoa        = '$pessoa',
						Cargo         = '$cargo',
						Celular       = '$celular', 
						Linkedin      = '$linkedin', 												
						Ocultar       =  $ativo
					WHERE 
						Id = $id";
		@mysqli_query($conexao,$queryInsercao) or die("Algo deu errado ao atualizar o registro. Tente novamente." .mysqli_error($conexao));	
		echo "<script>alert('Colaborador atualizado com sucesso!!'),location.href='../listas/nossotime.php'</script>";	
	}
	
	
 ?>