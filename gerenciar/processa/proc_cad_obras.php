<?php	
	include '../config/conecta.php';	
	
	$titulo         = $_POST['titulo'];
	$descricao	    = $_POST['descricao'];
	$cliente    	= $_POST['cliente'];
	$cidade      	= $_POST['cidade'];
	$uf             = $_POST['uf'];
	$dataini        = $_POST['dataini'];
	$datafim        = $_POST['datafim'];
	$status         = $_POST['status'];

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
		$destino = '../imagens/obras/' . $novoNome;		
		
		// tenta mover o arquivo para o destino
		@move_uploaded_file($arquivo_tmp, $destino);	
	
	
	$queryInsercao = "INSERT INTO obras (Titulo, Descricao, Cliente, Cidade, Uf, Imagem, Datainicio, Datafinal, Status, Ocultar) 
	VALUES ('$titulo', '$descricao', '$cliente', '$cidade', '$uf', '$novoNome', '$dataini', '$datafim', $status, 1)";
	@mysqli_query($conexao,$queryInsercao) or die("Algo deu errado ao inserir o registro. Tente novamente." .mysqli_error($conexao));	
	echo "<script>alert('Obra cadastrada com sucesso!'),location.href='../listas/obras.php'</script>";
	
 ?>