<?php 
    require_once "config.php"; 
        require_once DBAPI; 
    include(HEADER_TEMPLATE); 

    if (isset($_POST['submit'])) {
    $secret = "6LdSZdEmAAAAADcvsv17xA36Bg7cKEuWdpTxu35T";
    $response = $_POST['g-recaptcha-response'];
    $remoteip = $_SERVER['REMOTE_ADDR'];
    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip";
    $data = file_get_contents($url);
    $row = json_decode($data, true);

    if ($row['success'] == "true") {
        echo "<script>alert('Wow you are not a robot 😲');</script>";
    } else {
        echo "<script>alert('Oops you are a robot 😡');</script>";
    }
    }



?>

<style>
    #loga {
  padding-top: 25px;
}

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


<div style="background-color: #00a4b4; border-radius: 50px; margin-top:20px">
    <div style="padding-bottom: 20px">
        <form method="post" action="index.php" id="loga">
            <?php if (!empty($_SESSION['message'])) : ?>
                <div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
                    <?php echo $_SESSION['message']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php clear_messages(); ?>
            <?php endif; ?>
            <div class="row" style="display: flex;flex-direction: row;justify-content: center; align-items: center;margin-left: 120px;margin-right: 120px">
                <div class="form-group col-md-12" style="display: flex;flex-direction: row;justify-content: center; align-items: center;margin-left: 120px;margin-right: 120px" >
                <h2> Faça o seu Login</h2>
                </div>
				<div class="form-group col-md-12" style="width:200px;">
					<label for="USER"> LOGIN</label>
					<input type="text" class="form-control" name="USER" id="USER"  required>
				</div>
				<div class="form-group col-md-12" style="width:200px;">
					<label for="senha"> SENHA</label>
					<input type="password" class="form-control"name="senha" id="senha" required>
                    
				</div>
                <div class="form-group col-md-12" style="display: flex;flex-direction: row;justify-content: center; align-items: center;margin-top: 20px;margin-left: 120px;margin-right: 120px" >
                    <p>Ou faça login utilizando</p>
                </div>
                <div class="form-group col-md-12" style="display: flex;flex-direction: row;justify-content: center; align-items: center;margin-left: 120px;margin-right: 120px" >
                <a style="margin-right: 5px" href="https://instagram.com/" target="_blank"><img src="https://img.shields.io/badge/Facebook-1877F2?style=for-the-badge&logo=facebook&logoColor=white" target="_blank"></a>
                <a  href="https://instagram.com/" target="_blank"><img src="https://img.shields.io/badge/google-4285F4?style=for-the-badge&logo=google&logoColor=white" target="_blank"></a>
                </div>
                <div class="form-group col-md-12" style="display: flex;flex-direction: row;justify-content: center; align-items: center;margin-top: 20px;margin-left: 120px;margin-right: 120px" >
                    <div class="g-recaptcha" data-sitekey="6LdSZdEmAAAAAPzie5WGn96a_YHQ_cpoIZgq0iCz"></div>
                </div>
               
               
                
                

				<div id="actions" class="row">
					<div class="col-md-12">
					<button type="submit" class="btn btn-secondary" style="width: 1005px">Continuar</button>
				</div>
              
   
            </div>      
 
    </div>
</div>

	<footer  id="footer">
	
		<?php 
		$d = new DateTime("now");
		$d->format('Y');
	?>
	 <div class="p-4" style="background-color: rgba(0, 0, 0, 0.05);">
		<p>&copy;<?php echo $d->format('Y');?> TDEV 
		
		<a style="align: right" href="https://instagram.com/" target="_blank"><img src="https://img.shields.io/badge/-Instagram-%23E4405F?style=for-the-badge&logo=instagram&logoColor=white" target="_blank"></a>
			<a href = "mailto: davirkl07@gmail.com"><img src="https://img.shields.io/badge/-Gmail-%23333?style=for-the-badge&logo=gmail&logoColor=white" target="_blank"></a>
			<a href = "https://github.com/DaviRKL/Tcc"><img src="https://img.shields.io/badge/GitHub-100000?style=for-the-badge&logo=github&logoColor=white" target="_blank"></a>	
		</p>
		
	 </div>
	
	</footer>
<script src="<?php echo BASEURL; ?>js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo BASEURL; ?>js/bootstrap/bootstrap.min.js"></script>
	<script src="<?php echo BASEURL; ?>js/awesome/all.min.js"></script>
    <script src="<?php echo BASEURL; ?>js/main.js"></script>
	<script src="https://www.google.com/recaptcha/api.js"></script>
