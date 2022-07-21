<?php	
	include '../config/conecta.php';	
	
	$titulo         = $_POST['titulo'];
	$descricao	    = $_POST['descricao'];	
	$categoria      = $_POST['idcategoria'];	
	$dataini        = $_POST['dataini'];		

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
		$destino = '../imagens/noticias/' . $novoNome;		
		
		// tenta mover o arquivo para o destino
		@move_uploaded_file($arquivo_tmp, $destino);	
	
	
	$queryInsercao = "INSERT INTO noticias (Titulo, Descricao, Imagem, Idcategoria, Data, Ocultar) 
	VALUES ('$titulo', '$descricao', '$novoNome', $categoria, '$dataini', 1)";
	@mysqli_query($conexao,$queryInsercao) or die("Algo deu errado ao inserir o registro. Tente novamente." .mysqli_error($conexao));	
	echo "<script>alert('Notícia cadastrada com sucesso!'),location.href='../listas/noticias.php'</script>";
	
 ?>