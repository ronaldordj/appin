<?php
	include '../config/conecta.php';
		
        $email = $_POST['email'];
		$senha = md5($_POST['senha']);

		$sql="SELECT Id FROM cd_usuario where Email = '$email' and Senha = '$senha'";
		$sql_result=mysqli_query($conexao,$sql)or die("Erro:".mysqli_error($conexao));
		$row=mysqli_fetch_array($sql_result);	
		$id = $row[0];
		$key = md5($id);	
        
        session_start();
		$_SESSION['chave'] = $senha;		
        if (isset($senha)) {
			$sql = "SELECT * FROM cd_usuario WHERE Senha = '$senha' and Email = '$email'";
			$query= mysqli_query ($conexao, $sql);			
			
                if (mysqli_fetch_array($query)<=0){
                    echo"<script language='javascript' type='text/javascript'>alert('Usuário ou senha não conferem!');window.location.href='../index.php';</script>";
                    die();
                }else{
                    $_SESSION['inmesuser_ison'] = 1;
                    setcookie("chave",$senha);
                    header("Location:../inicio.php?ukey=$key");
                }
        }
?>