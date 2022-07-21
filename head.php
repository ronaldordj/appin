<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    

    <title>INMES - Área do Distribuidor</title>
    <meta name="description" content="INMES - Área do Distribuidor">
    <meta name="author" content="DriftWeb">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="manifest.json" />
	
	<link rel="icon" href="http://server.infodataweb.com.br/~inmescom/wp-content/uploads/2019/12/cropped-favicon-inmes-32x32.png" sizes="32x32">
	<link rel="icon" href="http://server.infodataweb.com.br/~inmescom/wp-content/uploads/2019/12/cropped-favicon-inmes-192x192.png" sizes="192x192">
	<link rel="apple-touch-icon-precomposed" href="http://server.infodataweb.com.br/~inmescom/wp-content/uploads/2019/12/cropped-favicon-inmes-180x180.png">
	
    <link rel="stylesheet" href="public/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="public/css/bootstrapcustom.css">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/simple-sidebar.css">
	

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="public/js/bootstrap.bundle.min.js"></script>
    <script type="module">
		import 'https://cdn.jsdelivr.net/npm/@pwabuilder/pwaupdate';
		const el = document.createElement('pwa-update');
		document.body.appendChild(el);
	</script>

    <script>
      if ("serviceWorker" in navigator) {
        navigator.serviceWorker.register("/service-worker.js");
      }
    </script>
    <?php
    include("mobile_device_detect.php");
    $mobile = mobile_device_detect();

    if (!isset($_SESSION['usuarioId'])) {
        session_unset();
        session_destroy();
        
        if ($mobile == TRUE) {
            header('location:./mobile/login.php');
        }
        else {
            header('location:./view/login');
        }
        
    }

    

    ?>
	
</head>
