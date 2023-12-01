<?php
ob_start();
include('../protecao/protect.php');
  require_once('functions.php');
  edit();
  include_once(HEADER_TEMPLATE);    
?>


<header>
   <h2>Atualizar Usuário</h2>
</header>


<form id="editForm" action="<?php echo BASEURL ?>usuarios/edit.php?id=<?php echo $_SESSION['id']; ?>" method="post" enctype="multipart/form-data">
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
								<input type="text" class="form-control" name="usuario['email']"
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

<?php include(FOOTER_TEMPLATE); 

ob_end_flush();

?>

<script src="<?php echo BASEURL?>js/Preview/Previewfoto.js"></script>