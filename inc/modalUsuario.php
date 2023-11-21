<!-- Modal de Delete-->
<?php
$foto = "";
if (empty($_SESSION['foto'])) {
	$foto = 'SemImagem.png';
} else {
	$foto = $_SESSION['foto'];
}
?>

<div class="modal fade" id="usuarioModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
	<div class="modal-dialog modal-dialog-centered ">
		<div class="modal-content">
			<div class="modal-header">
				<div class="row" >
					<h2 style="margin-left:170px;">
						<?php echo $_SESSION['nome']; ?>
					</h2>
					<br>
					<p style="margin-bottom: -20px; margin-left:170px; ">Edite suas informações</p>
				</div>
				<div class="row">
					
<a href="#"  data-bs-toggle="modal" data-bs-target="#logoutmodal"><i class="fa-solid fa-right-from-bracket"></i></a>	
				</div>
				
				
			</div>
			<div class="modal-body">
				<div class="row">
					<img class="usuario-img" id="imgPreviewUser"
						src="<?php echo BASEURL ?>usuarios/fotos/<?php echo $foto ?>" alt="Foto do usuário">
				</div>
				<form action="<?php echo BASEURL ?>usuarios/edit.php?id=<?php echo $_SESSION['id']; ?>" method="post" enctype="multipart/form-data">
					<div>
						<div>
							<div>
								<label for="name">Nome</label>
								<input type="text" class="form-control" name="usuario['nome']"
									value="<?php echo $_SESSION['nome']; ?>">
							</div>
						</div>
						<div>
							<div>
								<label for="campo2">Email</label>
								<input type="text" class="form-control" name="usuario['user']"
									value="<?php echo $_SESSION['email']; ?>">
							</div>
						</div>
						<div>
							<div>
								<label for="campo3">Senha</label>
								<input type="password" class="form-control" name="usuario['password']"
									value="<?php echo $_SESSION['password']; ?>">
							</div>
						</div>
						<div>

							<div>
								<label for="campo1">Foto</label>
								<input type="file" class="form-control" name="foto" id="fotoUser"
									value="fotos/<?php echo $foto ?>">
							</div>

						</div>
					</div>
					<div id="actions" class="row">
						
							<button type="submit" class="btn btn-secondary">Salvar</button>
						
					</div>

				</form>
				
			</div>
		</div> <!-- /.modal -->
	</div>
</div>
<?php include('modalSair.php'); ?>
<script>

	$(document).ready(() => {
		$("#fotoUser").change(function () {
			const file = this.files[0];
			if (file) {
				let reader = new FileReader();
				reader.onload = function (event) {
					$("#imgPreviewUser").attr("src", event.target.result);
				};
				reader.readAsDataURL(file);

			}
		});
	});
</script>