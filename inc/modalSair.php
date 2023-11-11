<!-- Modal de Delete-->
<div class="modal fade" id="logoutmodal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
		  <div class="modal-dialog modal-dialog-centered ">
				<div class="modal-content">
					<div class="modal-header">
						<h2 class="modal-title" id="modalLabel">Sair</h2>
						<button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
					</div>
					<div class="modal-body">
						<p>Deseja realmente sair?</p>
					</div>
					<div class="modal-footer">
							<a id="confirm" class="btn btn-dark" href="<?php echo BASEURL; ?>logins/logout.php"><i class="fa-solid fa-right-from-bracket"></i></i> Sim</a>
							<a id="cancel" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i> Não</a>
					</div>
				</div>
		  	</div>
</div> <!-- /.modal -->
<!-- Modal de Delete-->