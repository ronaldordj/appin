<?php	
	include '../config/conecta.php';	
	
	$nome           = $_POST['nome'];

	$arquivo_tmp = $_FILES['arquivo']['tmp_name'];
	$nomearq = $_FILES['arquivo']['name'];
	

	// Pega a extensao
	$extensao = strrchr($nomearq, '.');

	// Converte a extensao para mimusculo
	$extensao = strtolower($extensao);

	// Somente imagens, .jpg;.jpeg;.gif;.png
	// Aqui eu enfilero as extesões permitidas e separo por ';'
	// Isso server apenas para eu poder pesquisar dentro desta String
		strstr('.jpg;.jpeg;.png', $extensao);
	
		// Cria um nome único para esta imagem
		// Evita que duplique as imagens no servidor.
		$novoNome = md5(microtime()) . $extensao;
		
		// Concatena a pasta com o nome
		$destino = '../imagens/fornecedores/' . $novoNome;		
		
		// tenta mover o arquivo para o destino
		@move_uploaded_file($arquivo_tmp, $destino);
	
	
	$sql="select max(Id) as maior from fornecedor";
	$sql_result=mysqli_query($conexao,$sql)or die("Erro:".mysqli_error($conexao));
	$row=mysqli_fetch_array($sql_result);		
	$id = $row['maior']+1;	
	
	$queryInsercao = "INSERT INTO fornecedor (Id, Nome, Imagem, Ocultar) 
	VALUES ($id, '$nome', '$novoNome', 1)";
	@mysqli_query($conexao,$queryInsercao) or die("Algo deu errado ao inserir o registro. Tente novamente." .mysqli_error($conexao));	
	echo "<script>alert('Fornecedor cadastrado com sucesso!'),location.href='../listas/fornecedores.php'</script>";
	
 ?>