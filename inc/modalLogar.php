<!-- Modal de Delete-->
<?php


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

<div class="modal fade" id="entrarmodal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
	<div class="modal-dialog modal-dialog-centered ">
		<div class="modal-content">
			<div class="modal-header">
				<h2> Faça o seu Login</h2>
				<button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
			</div>
			<div class="modal-body">
				<form method="post" action="./index.php" id="loga">
					<?php if (!empty($_SESSION['message'])): ?>
						<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
							<?php echo $_SESSION['message'];?>
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
						<?php clear_messages();?>
					<?php endif;?>
					<div class="row" style="display: flex;flex-direction: row;justify-content: center; align-items: center;margin-left: 120px;margin-right: 120px">
						<div class="form-group col-md-12">
							<label for="USER"> EMAIL</label>
							<input type="email" class="form-control" name="USER" id="USER" required>
						</div>
						<div class="form-group col-md-12">
							<label for="senha"> SENHA</label>
							<input type="password" class="form-control" name="senha" id="senha" required>

						</div>
						<div class="form-group col-md-12"
							style="display: flex;flex-direction: row;justify-content: center; align-items: center;margin-top: 20px;margin-left: 120px;margin-right: 120px">
							<div class="g-recaptcha" data-sitekey="6LdSZdEmAAAAAPzie5WGn96a_YHQ_cpoIZgq0iCz" required>
							</div>
						</div>
						<div class="form-group col-md-12"
							style="display: flex;flex-direction: row;justify-content: center; align-items: center;margin-top: 20px;margin-left: 120px;margin-right: 120px">
							<p>Ou</p>
						</div>
						<div class="form-group col-md-12"
							style="display: flex;flex-direction: row;justify-content: center; align-items: center;margin-left: 120px;margin-right: 120px; padding-bottom: 10px">
							<a href="<?php echo BASEURL; ?>usuarios/add.php">Cadastre-se na DearPetz!</a>
						</div>
						<div id="actions" class="row">
							<div class="col-md-12" style="display: flex;flex-direction: row;justify-content: center; align-items: center;">
								<button type="submit" class="btn btn-secondary" style="width: 800px">Continuar</button>
							</div>

						</div>
					</div>
				</form>



			</div>
		</div>
	</div>
</div>
