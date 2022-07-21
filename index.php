<?php
session_start(); 
ob_start();
require_once('mobile_device_detect.php');
$mobile = mobile_device_detect();
if($mobile==true){
  echo"<META HTTP-EQUIV=REFRESH CONTENT='0;URL=mobile/login.php'>";
}else{
	echo"<META HTTP-EQUIV=REFRESH CONTENT='0;URL=login.php'>";	
}
exit;

?>
  <script type="module">
		import 'https://cdn.jsdelivr.net/npm/@pwabuilder/pwaupdate';

		const el = document.createElement('pwa-update');
		document.body.appendChild(el);
	</script>