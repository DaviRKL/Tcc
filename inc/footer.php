
	</main> <!-- /container -->
	<style>



</style>
<footer  id="footer">
	<?php 
		$d = new DateTime("now");
		$d->format('Y');
	?>
	<div class="p-4" style="background-color: rgba(0, 0, 0, 0.05);">
		<p>&copy;<?php echo $d->format('Y');?> TDEV </p>
	</div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="<?php echo BASEURL; ?>js/popper.min.js"></script>
    <script src="<?php echo BASEURL; ?>js/bootstrap/bootstrap.min.js"></script>
	<script src="<?php echo BASEURL; ?>js/awesome/all.min.js"></script>
    <script src="<?php echo BASEURL; ?>js/main.js"></script>
	<script src="https://www.google.com/recaptcha/api.js"></script>
	
</body>
</html>