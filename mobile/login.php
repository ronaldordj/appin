<!DOCTYPE html>
  <html lang="pt-br">
  <head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">  
		<meta name="theme-color" content="#dcdcdc">      
		<title>App In - Pedidos</title>
		
		<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
		<link rel="icon" href="images/favicon.ico" type="image/x-icon">	
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">		
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>		
		<link rel='manifest' href='manifest.json'>
		
		
		<style>
		body {
		  background-color: #dcdcdc;
		}
	</style>
		
  </head>
  <body>
	  <br>
	  <br>
  <div class="container">
		<div class="text-center">
		<center><img src="../images/logo-transp.png" class="rounded" alt="All In" width="100px" height="120px" ></center>
		</div>
	</div>
	<br>
	<br>
	<div class="container">		
        <br><br>		
		<form action="controller/valida.php" method="post" id="fmLogin" enctype='application/json' class="box">
			<div class="row">
				<div class="col-sm-12 col-md-6 col-lg-4">
					<label for="usuario">E-mail</label>
					<div class="input-group input-group-lg">
						<input type="email" class="form-control" id="email" name="email" placeholder="E-mail" maxlength="50" autocomplete="on">						
					</div>	
				</div>	
			</div>
			<div class="row">
				<div class="col-sm-12 col-md-6 col-lg-4">
					<label for="senha">Senha</label>
					<div class="input-group input-group-lg">
						<input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" maxlength="50">
					</div>	
				</div>	
			</div>						
			<br></br>
			<div class="row">	
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
					<button type="submit" class="btn btn-secondary btn-lg btn-block">Entrar</button>
				</div>
			</div>						
		</form>		
	</div>


	<script type="module">
		import 'https://cdn.jsdelivr.net/npm/@pwabuilder/pwaupdate';

		const el = document.createElement('pwa-update');
		document.body.appendChild(el);
	</script>
	
	
	
</html>		