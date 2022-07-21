<?php	
	include '../config/conecta.php';
	
	$id                 = $_POST['id'];
	$endereco			= $_POST['endereco'];
	$numero   			= $_POST['numero'];
	$bairro  			= $_POST['bairro'];
	$cidade 			= $_POST['cidade'];
	$uf     			= $_POST['uf'];
	$cep    			= $_POST['cep'];
	$telefone			= $_POST['telefone'];
	$email  			= $_POST['email'];
	$mapa   			= $_POST['mapa'];
	$ativo	            = $_POST['ativo'];

	$queryInsercao = "UPDATE contato SET Endereco = '$endereco', Numero = '$numero', Bairro = '$bairro', Cidade = '$cidade', UF = '$uf', CEP = '$cep', Telefone = '$telefone',
	Email = '$email', Mapa = '$mapa', Ocultar = $ativo WHERE Id = $id";
	@mysqli_query($conexao,$queryInsercao) or die("Algo deu errado ao atualizar o registro. Tente novamente." .mysqli_error($conexao));	
	echo "<script>alert('Registro atualizado com sucesso!'),location.href='../listas/contato.php'</script>";
	
	
 ?>