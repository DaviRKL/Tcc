<?php 




require_once "config.php"; 
	require_once DBAPI; 
include(HEADER_TEMPLATE); ?>

<style>
    #loga {
  padding-top: 25px;
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
                <div class="form-group col-md-3">
                <h2> Faça o seu Login</h2>
                </div>
                
                <div class="form-group col-md-12">
                    <label for="campo2">Login</label>
                    <input type="text" class="form-control" name="USER" id="USER" value="User" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="campo3">Senha</label>
                    <input type="password" class="form-control"name="senha" id="senha" required>
                </div>
                <div id="actions" class="row">
                    <div class="col-md-12">
                    <button type="submit" class="btn btn-secondary" style="width: 1005px">Continuar</button>
                </div>
            </div>      
        </form>
    </div>
</div>
<?php 
    include(FOOTER_TEMPLATE); 	
?>