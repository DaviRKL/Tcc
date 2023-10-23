<?php 
    require_once ('../config.php'); 
        require_once DBAPI; 
    include(HEADER_TEMPLATE); 

    if (isset($_POST['submit'])) {
    $secret = "6LdSZdEmAAAAADcvsv17xA36Bg7cKEuWdpTxu35Tuu";
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
</style>  


<div style="background-color: #00a4b4; border-radius: 50px; margin-top:20px">
    <div style="padding-bottom: 20px">
        <form method="post" action="agenda.php" id="logaempresa">
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
					<label for="CNPJ"> CNPJ</label>
					<input type="number" class="form-control"name="CNPJ" id="CNPJ" required>
				</div>
				<div class="form-group col-md-12" style="width:200px;">
					<label for="email_empresa"> EMAIL</label>
					<input type="email" class="form-control" name="email_empresa" id="email_empresa"  required>
				</div>
				<div class="form-group col-md-12" style="width:200px;">
					<label for="senha"> SENHA</label>
					<input type="password" class="form-control"name="senha_empresa" id="senha_empresa" required>
                    
				</div>
                <div class="form-group col-md-12" style="display: flex;flex-direction: row;justify-content: center; align-items: center;margin-top: 20px;margin-left: 120px;margin-right: 120px" >
                    <div class="g-recaptcha" data-sitekey="6LdSZdEmAAAAAPzie5WGn96a_YHQ_cpoIZgq0iCz" required></div>
                </div>
				<div id="actions" class="row">
                    <div class="col-md-12" style="display: flex;flex-direction: row;justify-content: center; align-items: center;">
					<button type="submit" class="btn btn-secondary" style="width: 800px">Continuar</button>
				</div>
              
   
            </div>      
    </div>
</div>
<?php include(FOOTER_TEMPLATE);?>
