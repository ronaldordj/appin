<?php	 
  $conexao = mysqli_connect("localhost:3306", "root", "");  
   
  if($conexao)
  {
  $baseSelecionada = mysqli_select_db($conexao,"desenvolvimento_aapin");
  
  if (!$baseSelecionada) {
      die ('Não foi possível conectar a base de dados: ' . mysqli_error());
  } } else {
      die('Não conectado : ' . mysqli_error());
  }
?>