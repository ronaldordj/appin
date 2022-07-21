<?php

include 'config/conecta.php';

$Nome         = $_POST['nome'];
$Email         = $_POST['email'];
$Mensagem	  = $_POST['mensagem'];


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
		Mensagem vinda através do formulário do site:<br><br>
		<p>'.$Mensagem.'</p><br>
		<b>Contato: '.$Nome.'<br>
		E-mail: '.$Email.'</b>
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
$mail->FromName   = utf8_decode("Contato via formulário do site");
$mail->Subject    = utf8_decode("Contato via site");
$mail->AltBody    = utf8_decode($Mensagem); //Text Body
$mail->WordWrap   = 50; // set word wrap

$mail->MsgHTML(utf8_decode($body));

$mail->AddReplyTo($Remetente,utf8_decode("Contato via formulário do site"));

$sqlD="SELECT * FROM cd_emailrecebe WHERE Tipo = 'F' AND Ativo = 1";
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
    echo "Sua mensagem foi enviada. Em breve lhe retornaremos.";
}


?>