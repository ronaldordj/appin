<?php	
	include '../../config/conecta.php';	
	
	$fantasia        = $_POST['fantasia'];
	$razao           = $_POST['razao'];	
	$cnpjcpf	     = $_POST['cnpjcpf'];
	$inscestadual    = $_POST['ie'];
	$email           = $_POST['email'];
	$emailvalida     = $_POST['repitaEmail'];
	$telefone        = $_POST['telefone'];
	$celular         = $_POST['celular'];	
	$endereco        = $_POST['endereco'];
	$cep             = $_POST['cep'];
	$bairro          = $_POST['bairro'];
	$complemento     = $_POST['complemento'];
	$cidade          = $_POST['cidade'];
	$idestado        = $_POST['estado'];		
	$idvendedor      = $_POST['vendedor'];
	$contato         = $_POST['contato'];

	$date = base64_encode($idvendedor);
	
	$sql="select max(id) as maior from cd_cliente";
	$sql_result=mysqli_query($conexao,$sql)or die("Erro:".mysqli_error($conexao));
	$row=mysqli_fetch_array($sql_result);		
	$id = $row['maior']+1;	
	
	$queryInsercao = "INSERT INTO cd_cliente (Id, Nomefantasia, Razaosocial, Cnpjcpf, Inscestadual, Email, Emailvalida, Telefone,  Celular, Endereco, Cep, Bairro, Complemento, Cidade, idEstado, idPais, iddistribuidor, Ativo, NomeContato) 
	VALUES ($id, '$fantasia', '$razao', '$cnpjcpf', '$inscestadual', '$email', '$emailvalida', '$telefone', '$celular', '$endereco', '$cep', '$bairro', '$complemento', '$cidade', $idestado, 4, $idvendedor, 1, '$contato')";
	@mysqli_query($conexao,$queryInsercao) or die("Algo deu errado ao inserir o registro. Tente novamente." .mysqli_error($conexao));	
	echo "<script>alert('Cliente cadastrado com sucesso!'),location.href='../view/clientes.php?date=$date'</script>";
	
 ?>