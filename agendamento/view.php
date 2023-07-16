<?php 
ob_start();
	require_once('functions.php'); 
	view($_GET['id']);
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Carro <?php echo $carro['id']; ?></h2>
<hr>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
<?php endif; ?>

<dl class="dl-horizontal">
	<dt>Modelo:</dt>
	<dd><?php echo $carro['modelo']; ?></dd>

	<dt>Marca:</dt>
	<dd><?php echo $carro['marca']; ?></dd>

	<dt>Ano:</dt>
	<dd><?php echo $carro['ano']; ?></dd>

	<dt>Data de Cadastro:</dt>
	<dd><?php echo $carro['datacad']; ?></dd>
    <dt>Foto:</dt>
				<dd><?php
					if (!empty($carro['foto'])){
						echo  "<img src=\"imagens/" . $carro['foto'] . "\" class=\"shadow p-1 mb-1 bg-body rounded\" width=\"300px\">";
					}else{
						echo  "<img src=\"imagens/SemImagem.png\" class\"shadow p-1 mb-1 bg-body rounded\" width=\"300px\">";
					}
					?>
				</dd>
</dl>
<div id="actions" class="row">
	<div class="col-md-12">
	  <a href="edit.php?id=<?php echo $carro['id']; ?>" class="btn btn-secondary"><i class="fa-solid fa-user-pen"></i> Editar</a>
	  <a href="index.php" class="btn btn-default"><i class="fa-solid fa-rotate-left"></i> Voltar</a>
	</div>
</div>

<?php include(FOOTER_TEMPLATE); 
ob_end_flush();?>