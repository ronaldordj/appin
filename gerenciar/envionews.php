<?php

include 'config/conecta.php';

$Email         = $_POST['email'];

$sql="SELECT * FROM cd_emailenvio";
$sql_result=mysqli_query($conexao,$sql)or die("Erro:".mysqli_error($conexao)); 		 	 		 		
$resultado=mysqli_fetch_array($sql_result);
$Remetente    = $resultado['Email']; 
$smtp         = $resultado['Smtp']; 
$porta        = $resultado['Porta'];
$seguranca    = $resultado['Seguranca'];
$senha        = $resultado['Senha'];


include("phpmailer/class.phpmailer.php");
include("phpmailer/class.smtp.php"); // note, this is optional - gets called from main class if not already loaded

$mail  = new PHPMailer();

//$body             = file_get_contents('contents.php');
$body = '
	<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>	
	<body style="margin: 10px;">
		<div style="width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 16px;">
		Pessoa mostrou interesse em receber nossas ofertas e promoções por e-mail, segue o contato:<br>
		<b>E-mail: '.$Email.'</b>
	</body>		
	';	

$mail->IsSMTP();
$mail->SMTPAuth   = true;            // enable SMTP authentication
$mail->SMTPSecure = $seguranca;      // sets the prefix to the servier
$mail->Host       = $smtp;           // sets GMAIL as the SMTP server
$mail->Port       = $porta;          // set the SMTP port

$mail->Username   = $Remetente;  // GMAIL username
$mail->Password   = base64_decode($senha);// GMAIL password

$mail->From       = $Remetente;
$mail->FromName   = utf8_decode("Interesse em receber ofertas e promoções");
$mail->Subject    = utf8_decode("Cadastro via site");
//$mail->AltBody    = utf8_decode($Mensagem); //Text Body
$mail->WordWrap   = 50; // set word wrap

$mail->MsgHTML(utf8_decode($body));

$mail->AddReplyTo($Remetente,utf8_decode("Interesse em receber ofertas e promoções"));

$sqlD="SELECT * FROM cd_emailrecebe WHERE Tipo = 'N' AND Ativo = 1";
$sql_resultD=mysqli_query($conexao,$sqlD)or die("Erro:".mysqli_error($conexao)); 		 	 		 		
while($resultadoD=mysqli_fetch_array($sql_resultD)) {
	$Destinatario    = $resultadoD['Email']; 
	$mail->AddAddress($Destinatario);
}

$mail->IsHTML(true); // send as HTML

if(!$mail->Send()) {
  echo "Erro no envio: " . $mail->ErrorInfo;
}
else {
    echo "<script>alert('Cadastro de e-mail realizado com sucesso!'),location.href='../index.php'</script>";
}


?>