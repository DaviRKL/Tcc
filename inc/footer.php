
</main>

<footer id="footer" >
	<?php 
		$d = new DateTime("now");
		$d->format('Y');
	?>
	<div  style="background-color: rgba(0, 0, 0, 0.05);">
		<p style="color: #fff;">&copy;<?php echo $d->format('Y');?> TDEV </p>
	</div>
</footer>

	<script src="<?php echo BASEURL; ?>js/popper.min.js"></script>
    <script src="<?php echo BASEURL; ?>js/bootstrap/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="<?php echo BASEURL; ?>js/main.js"></script>
	<script src="https://www.google.com/recaptcha/api.js"></script>
	<script src='<?php echo BASEURL; ?>js/fullcalendar/index.global.min.js'></script>
	
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</body>
</html>