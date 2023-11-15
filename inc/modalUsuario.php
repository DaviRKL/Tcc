<!-- Modal de Delete-->


<div class="modal fade" id="usuarioModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
	<div class="modal-dialog modal-dialog-centered ">
		<div class="modal-content">
			<div class="modal-header">
				<h2> Bem vindo <?php echo $_SESSION['nome'];?></h2>
				<button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
			</div>
			<div class="modal-body">
				<div class="row">
						<?php
												if (!empty($_SESSION['foto'])) {
													echo "<img src=\"./usuarios/fotos/" . $_SESSION['foto'] . "\" class=\"usuario-img\">";
												} else {
													echo "<img src=\"./usuarios/fotos/sandro.jpg\" class=\"empresa-img\">";
												}
										
						?>
				</div>
				<p>Nome: <?php echo $_SESSION['nome'];?></p>
				<p>Email: <?php echo $_SESSION['email'];?></p>
				<div class="row">
					<a href="#" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#logoutmodal"><i class="fa-solid fa-right-from-bracket"></i> Sair</a>
				</div>
			</div>
		</div> <!-- /.modal -->
	</div>
</div>
<?php include('modalSair.php'); ?>
