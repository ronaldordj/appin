<?php
	require('admsite/conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Moneretto Luz</title>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no"/>
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">	
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/isotope.css"/>
    <script src="js/jquery.js"></script>
    <script src="js/jquery-migrate-1.2.1.js"></script>
    <script src="js/jquery.equalheights.js"></script>
    <script src='js/isotope.min.js'></script>
    <!--[if lt IE 9]>
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
            <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0"
                 height="42" width="820"
                 alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."/>
        </a>
    </div>
    <script src="js/html5shiv.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="css/ie.css">
    <![endif]-->
</head>
<body>
<div class="page">
<!--========================================================
                          HEADER
=========================================================-->
<header id="header">
    <div id="stuck_container">
        <div class="container">
            <div class="row">
                <div class="grid_12">
                    <div class="brand put-left">
                        <h1>
                            <a href="index.php">
                                <img src="images/logo.jpg" alt="Logo"/>
                            </a>
                        </h1>
                    </div>
                    <nav class="nav put-right">
                        <ul class="sf-menu">
                            <li><a href="index.php">Home</a></li>                            
                            <li class="current"><a href="servicos.php">Serviços</a></li>
                            <li><a href="obras.php">Obras</a></li>
							<li><a href="eventos/noticias.php">Notícias</a></li>
                            <li><a href="contatos.php">Contatos</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!--========================================================
                          CONTENT
=========================================================-->
<section id="content">
    <div class="container">
        <div class="row wrap_11 wrap_20">
            <div class="grid_12">
                <div class="text_7 color_2">
                    Categorias:
                    <ul id="filters">
                        <li><a href="#" data-filter="*">Todos</a></li>
                        <li><a href="#" data-filter="c1">Projetos</a></li>
                        <li><a href="#" data-filter="c2">Manutenção</a></li>
                        <li><a href="#" data-filter="c3">Laudos</a></li>
						<li><a href="#" data-filter="c4">Engenharia</a></li>
						<li><a href="#" data-filter="c5">Outros</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="bg_1 wrap_17">
        <div class="container">
            <div class="row">
                <div class="grid_13">
                    <div class="isotope row">
						<?php						
						$sql="SELECT * FROM imagens where tipo = 'S' and situacao = 1";
						$sql_result=mysql_query($sql)or die("Erro:".mysql_error());
						while($row=mysql_fetch_array($sql_result)){
							$codigo = $row['id'];
							$titulo = $row['nome'];	
							$descricao = $row['descricao'];							
						?>
						<?php
							  $categ = $row['categoria'];
							  switch ($categ){
								case 'P':
								  echo '<div class="element-item grid_3 c1">';
								  break;
								case 'M':
								  echo '<div class="element-item grid_3 c2">';
								  break;
								case 'L':
								  echo '<div class="element-item grid_3 c3">';
								  break;
								case 'E':
								  echo '<div class="element-item grid_3 c4">';
								  break;
								case 'O':
								  echo '<div class="element-item grid_3 c5">';
								  break;
							  }
						?>	                        
							<div class="box_7">
                                <div class="img-wrap">
                                    <img src="admsite/ver_imagens.php?codigo=<?php echo $codigo;?>" width="270" height="180" />
                                </div>
                                <div class="caption">
                                    <h3 class="text_2 color_2"><?php echo $titulo;?></h3>
                                    <p class="text_3">
                                        <?php echo $descricao;?>
                                    </p>
								</div>		
                            </div>							
						</div>		
						<?php } ?>								
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>    
</div>
<!--========================================================
                          FOOTER
=========================================================-->
<footer id="footer" class="color_9">
    <div class="container">
        <div class="row">
            <div class="grid_6">
                <p class="info text_4 color_4">
                    © <span id="copyright-year"></span> | <a href="#">Política de Privacidade</a> <br/>
                    Desenvolvido por <a href="http://consultoriar1.com.br" rel="nofollow">Consultoria R1</a>
                </p>
            </div>
			<div class="grid_6">
				<p class="info text_4 color_4">
					Associado à:<br />
					<img src="images/associados.jpg" alt="Logo"/>
				</p>	
			</div>
        </div>
    </div>
</footer>
<script src="js/script.js"></script>
</body>
</html>