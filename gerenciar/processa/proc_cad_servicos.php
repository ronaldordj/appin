<?php	
	include '../config/conecta.php';	
	
	$titulo         = $_POST['titulo'];
	$descricao	    = $_POST['descricao'];	

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
		$destino = '../imagens/servicos/' . $novoNome;		
		
		// tenta mover o arquivo para o destino
		@move_uploaded_file($arquivo_tmp, $destino);	
	
	
	$queryInsercao = "INSERT INTO servicos (Titulo, Descricao, Imagem, Ocultar) 
	VALUES ('$titulo', '$descricao', '$novoNome', 1)";
	@mysqli_query($conexao,$queryInsercao) or die("Algo deu errado ao inserir o registro. Tente novamente." .mysqli_error($conexao));	
	echo "<script>alert('Serviço cadastrado com sucesso!'),location.href='../listas/servicos.php'</script>";
	
 ?>