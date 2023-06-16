
	</main> <!-- /container -->
	<style>
#footer {
    position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
 background-color: #00a4b8;
  color: white;
  text-align: center;
  height:  55px;
  -webkit-box-shadow: inset -5px 6px 13px -8px rgba(0,0,0,0.75);
-moz-box-shadow: inset -5px 6px 13px -8px rgba(0,0,0,0.75);
box-shadow: inset -5px 6px 13px -8px rgba(0,0,0,0.75);
}


</style>
	<footer  id="footer">
	
		<?php 
		$d = new DateTime("now");
		$d->format('Y');
	?>
	 <div class="p-4" style="background-color: rgba(0, 0, 0, 0.05);">
		<p>&copy;<?php echo $d->format('Y');?> TDEV 
		
		<a style="align: right" href="https://instagram.com/davirkl67" target="_blank"><img src="https://img.shields.io/badge/-Instagram-%23E4405F?style=for-the-badge&logo=instagram&logoColor=white" target="_blank"></a>
			<a href = "mailto: davirkl07@gmail.com"><img src="https://img.shields.io/badge/-Gmail-%23333?style=for-the-badge&logo=gmail&logoColor=white" target="_blank"></a>
			<a href = "https://github.com/DaviRKL"><img src="https://img.shields.io/badge/GitHub-100000?style=for-the-badge&logo=github&logoColor=white" target="_blank"></a>	
		</p>
		
	 </div>
	
	</footer>

	<script src="<?php echo BASEURL; ?>js/jquery-3.6.0.min.js"></script>
	 <script src="<?php echo BASEURL; ?>js/popper.min.js"></script>
    <script src="<?php echo BASEURL; ?>js/bootstrap/bootstrap.min.js"></script>
	<script src="<?php echo BASEURL; ?>js/awesome/all.min.js"></script>
    <script src="<?php echo BASEURL; ?>js/main.js"></script>

</body>
</html>