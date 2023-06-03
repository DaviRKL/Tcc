<?php 




require_once "config.php"; 
	require_once DBAPI; 
include(HEADER_TEMPLATE); ?>

<style>
    form {
  padding-top: 25px;
}
</style>  

<form method="post" action="index.php">
<?php if (!empty($_SESSION['message'])) : ?>
			<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
				<?php echo $_SESSION['message']; ?>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		<?php clear_messages(); ?>
		<?php endif; ?>
<div class="row">
<h3> Faça o seu Login</h3>
<div class="form-group col-md-4">
    
                  <label for="campo2">Login</label>
                  <input type="text" class="form-control" name="USER" id="USER"  required>
              </div>
              <div class="form-group col-md-4">
                  <label for="campo3">Senha</label>
                  <input type="password" class="form-control"name="senha" id="senha"  required>
              </div>
			  <div id="actions" class="row">
                <div class="col-md-12">
				<button type="submit" class="btn btn-secondary">Continuar</button>
				</div>
		  
                </div>
</div>
				</form>
                <?php 
        include(FOOTER_TEMPLATE); 
     
		
?>