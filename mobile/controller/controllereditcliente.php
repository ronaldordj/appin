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
	$idcliente       = $_POST['cliente'];

	$date = base64_encode($idvendedor);

	$queryInsercao = "UPDATE cd_cliente SET 
						nomefantasia = '$fantasia', 
						razaosocial = '$razao', 
						cnpjcpf = '$cnpj', 
						inscestadual = '$inscestadual', 
						email = '$email', 
						emailvalida = '$emailvalida', 
						telefone = '$telefone',						
						celular = '$celular', 
						endereco = '$endereco', 
						bairro = '$bairro', 
						complemento = '$complemento', 
						cidade = '$cidade', 
						cep = '$cep', 
						idestado = $idestado, 						
						iddistribuidor = $idvendedor						
					WHERE 
						id = $idcliente";
	@mysqli_query($conexao,$queryInsercao) or die("Algo deu errado ao atualizar o registro. Tente novamente." .mysqli_error($conexao));	
	echo "<script>alert('Cliente atualizado com sucesso!'),location.href='../view/clientes.php?date=$date'</script>";
	
	
 ?>