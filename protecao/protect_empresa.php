<?php
require_once ('../config.php'); 
require_once DBAPI; 


if(!isset($_SESSION)) {
	session_start();
}

if (!isset($_SESSION['id_empresa'])) {
	include_once(HEADER_TEMPLATE);

	?><script src='<?php echo BASEURL; ?>js/popper.min.js'></script>
    <script src='<?php echo BASEURL; ?>js/bootstrap/bootstrap.min.js'></script>
    <script src='<?php echo BASEURL; ?>js/main.js'></script><?php

	die("
	<div style='font-family: Montserrat; letter-spacing: 0.3px; text-transform: uppercase; padding-top: 30px;display: flex; flex-direction: row; justify-content: center; align-items: center;'>
		<h1>Parece que você não está logado =(<br></h1>
	</div>
	<div style='display: flex;flex-direction: row;justify-content: center; align-items: center;'>
	<img src = \"../images/cachorroerro.jpg\"/>
	</div>
	
	<div style='font-family: Montserrat; letter-spacing: 0.3px; text-transform: uppercase; padding-top: 25px;display: flex; flex-direction: row; justify-content: center; align-items: center;'>
		<h1>Faça seu Login antes de acessar a página!<br></h1>
	</div>
	
</main>
<footer id='footer' >
	<div  style='background-color: rgba(0, 0, 0, 0.05);'>
		<p style='color: #fff;'>&copy; TDEV </p>
	</div>
</footer>
</body>
</html> " );


}


?>
