<?php
	include 'config/conecta.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>	
	<link rel="stylesheet" type="text/css" href="slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
</head>
<body>
	<div class="container">
		<div class="carousel">			
			<?php
				$sql="SELECT p.id, p.descricao, pl.descricao, pm.descricao, p.ativo
				FROM al_produto p
				JOIN al_prodlinha pl  ON (pl.id = p.idlinha)
				JOIN al_prodmodelo pm ON (pm.id = p.idmodelo)";
				$sql_result=mysqli_query($conexao,$sql)or die("Erro:".mysqli_error($conexao));
				while($row=mysqli_fetch_array($sql_result)){
					echo '
						<div>
							<img src="cadastros/ver_imagem.php?id='.$row[0].'">
						</div>';
				}	
			?>			
		</div>
	</div>
		<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script type="text/javascript" src="slick/slick.min.js"></script>	
		<script>	
			$(document).ready(function(){
				$('.carousel').slick({
					dots: true,
					  infinite: false,
					  speed: 300,
					  slidesToShow: 2,
					  slidesToScroll: 2,
					  responsive: [
						{
						  breakpoint: 1024,
						  settings: {
							slidesToShow: 2,
							slidesToScroll: 2,
							infinite: true,
							dots: true
						  }
						},
						{
						  breakpoint: 600,
						  settings: {
							slidesToShow: 2,
							slidesToScroll: 2
						  }
						},
						{
						  breakpoint: 480,
						  settings: {
							slidesToShow: 1,
							slidesToScroll: 1
						  }
						}						
					  ]
				});
			});	
		</script>	
</body> 