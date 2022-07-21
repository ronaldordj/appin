<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Painel Admin - Eletrimax</title>
</head>

<body>
<?php
include '../config/conecta.php';
$id                 = $_POST['id'];
$ativo              = $_POST['ativo'];
$diretorio = 'gerenciar/imagens/institucional/'; 
// verifica se foi enviado um arquivo 
if(isset($_FILES['arquivo']['name']) && $_FILES["arquivo"]["error"] == 0)
{

	// echo "Você enviou o arquivo: <strong>" . $_FILES['arquivo']['name'] . "</strong><br />";
	// echo "Este arquivo é do tipo: <strong>" . $_FILES['arquivo']['type'] . "</strong><br />";
	// echo "Temporáriamente foi salvo em: <strong>" . $_FILES['arquivo']['tmp_name'] . "</strong><br />";
	// echo "Seu tamanho é: <strong>" . $_FILES['arquivo']['size'] . "</strong> Bytes<br /><br />";



	$arquivo_tmp = $_FILES['arquivo']['tmp_name'];
	$nome = $_FILES['arquivo']['name'];
	

	// Pega a extensao
	$extensao = strrchr($nome, '.');

	// Converte a extensao para mimusculo
	$extensao = strtolower($extensao);

	// Somente imagens, .jpg;.jpeg;.gif;.png
	// Aqui eu enfilero as extesões permitidas e separo por ';'
	// Isso server apenas para eu poder pesquisar dentro desta String
	if(strstr('.jpg;.jpeg;.png', $extensao))
	{
		// Cria um nome único para esta imagem
		// Evita que duplique as imagens no servidor.
		$novoNome = md5(microtime()) . '.' . $extensao;
		
		// Concatena a pasta com o nome
		$destino = '../imagens/institucional/' . $novoNome; 
		$caminho = $diretorio.$novoNome;
		
		// tenta mover o arquivo para o destino
		if( @move_uploaded_file( $arquivo_tmp, $destino  ))
		{
			//echo "Arquivo salvo com sucesso em : <strong>" . $destino . "</strong><br />";
			//echo "<img src=\"" . $destino . "\" />";
			$queryInsercao = "UPDATE sobrenos_imagens SET Nome = '$novoNome', Destino = '$caminho', Ordem = 1, Ocultar = $ativo WHERE Id = $id";
			@mysqli_query($conexao,$queryInsercao) or die("Algo deu errado ao atualizar o registro. Tente novamente." .mysqli_error($conexao));	
			echo "<script>alert('Registro atualizado com sucesso!'),location.href='../listas/sobrenosimagens.php'</script>";
		}
		else
			//echo "Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />";
			echo "<script>alert('Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita!'),location.href='../listas/sobrenosimagens.php'</script>";
	}
	else
		//echo "Você poderá enviar apenas arquivos \"*.jpg;*.jpeg;*.png\"<br />";
		echo "<script>alert('Você poderá enviar apenas arquivos *.jpg;*.jpeg;*.png'),location.href='../listas/sobrenosimagens.php'</script>";
}
else
{
	//echo "Você não enviou nenhum arquivo!";
	echo "<script>alert('Você não enviou nenhum arquivo!'),location.href='../listas/sobrenosimagens.php'</script>";
}
?>
</body>
</html>