<!-- Modal de Delete-->


<div class="modal fade" id="usuarioModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
	<div class="modal-dialog modal-dialog-centered ">
		<div class="modal-content">
			<div class="modal-header">
				<h2> Bem vindo <?php echo $_SESSION['email'];?></h2>
				<button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
			</div>
			<div class="modal-body">
			<?php
									if (!empty($empresa['foto'])) {
										echo "<img src=\"../usuarios/imagens/" . $_SESSION['foto'] . "\" class=\"empresa-img\">";
									} else {
										echo "<img src=\"./petshops/imagens/SemImagem.png\" class=\"empresa-img\">";
									}
							
									?>
			
			<?php echo $_SESSION['id'];?>
			<?php echo $_SESSION['nome'];?>
			<?php echo $_SESSION['email'];?>
		

<a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#logoutmodal"><i
						class="fa-solid fa-right-from-bracket"></i> Sair</a>
			</div>
		</div> <!-- /.modal -->
	</div>
</div>
<?php include('modalSair.php'); ?>
