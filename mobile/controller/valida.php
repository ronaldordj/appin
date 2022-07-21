<?php
	include '../../config/conecta.php';
		
        $email = $_POST['email'];
		$senha = md5($_POST['senha']);

		$sql="SELECT Id FROM cd_usuario where Email = '$email' and Senha = '$senha'";
		$sql_result=mysqli_query($conexao,$sql)or die("Erro:".mysqli_error($conexao));
		$row=mysqli_fetch_array($sql_result);	
        $id  = base64_encode($row[0]);	                
        
        
        if ($row<=0){
            echo"<script language='javascript' type='text/javascript'>alert('Usuário ou senha não conferem!');window.location.href='../login.php';</script>";
            die();
        }else{                    
            header("Location:../index.php?date=$id");
        }
        
?>