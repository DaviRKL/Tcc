<?php 
	ob_start();
	require_once "config.php"; 
	require_once DBAPI; 
	include(HEADER_TEMPLATE);
	$db = open_database();

?>


<?php if ($db) : ?>
	<?php if(isset($_SESSION['id'])):?> 
	<div class="row"style="margin-top: 20px" >
		<div class="col-xl-2 col-sm-3 col-md-2">
			<a href="customers/add.php" class="btn btn-secondary">
				<div class="row">
					<div class="col-xs-12 text-center">
						<i class="fa fa-plus fa-solid fa-user-plus fa-5x"></i>
					</div>
					<div class="col-xs-12 text-center">
						<p>Novo Cliente</p>
					</div>
				</div>
			</a>
		</div>
		<?php endif; ?>
		<div class="col-xl-2 col-sm-3 col-md-2">
			<a href="customers" class="btn btn-light">
				<div class="row">
					<div class="col-xs-12 text-center">
						<i class="fa fa-user fa-5x"></i>
					</div>
					<div class="col-xs-12 text-center">
						<p>Clientes</p>
					</div>
				</div>
			</a>
		</div>
		<?php if(isset($_SESSION['id'])):?> 
		<div class="col-xl-2 col-sm-3 col-md-2">
			<a href="carro/add.php" class="btn btn-secondary">
				<div class="row">
					<div class="col-xs-12 text-center">
						<i class="fa-solid fa-car-on fa-5x"></i>
					</div>
					<div class="col-xs-12 text-center">
						<p>Novo carro</p>
					</div>
				</div>
			</a>
		</div>
		<?php endif; ?>
		<div class="col-xl-2 col-sm-3 col-md-2">
			<a href="carro" class="btn btn-light">
				<div class="row">
					<div class="col-xs-12 text-center">
						<i class="fa-solid fa-car fa-5x"></i>
					</div>
					<div class="col-xs-12 text-center">
						<p>Carros</p>
					</div>
				</div>
			</a>
		</div>
		<?php if(isset($_SESSION['id'])):?> 
			<?php if ($_SESSION['user']=="admin"):?>
				<div class="col-xl-2 col-sm-3 col-md-2">
					<a href="usuarios/add.php" class="btn btn-secondary">
						<div class="row">
							<div class="col-xs-12 text-center">
								<i class="fa-solid fa-user-plus fa-5x"></i>
							</div>
							<div class="col-xs-12 text-center">
								<p>Novo usuário</p>
							</div>
						</div>
					</a>
				</div>
				
				<div class="col-xl-2 col-sm-3 col-md-2">
					<a href="usuarios" class="btn btn-light">
						<div class="row">
							<div class="col-xs-12 text-center">
								<i class="fa-solid fa-users fa-5x"></i>
							</div>
							<div class="col-xs-12 text-center">
								<p>Usuários</p>
							</div>
						</div>
					</a>
				</div>
			<?php endif; ?>
		<?php endif; ?>
	</div>
<hr>



	<?php else : ?>
	<div class="alert alert-danger" role="alert">
		<p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>
	</div>

<?php endif; ?>



<?php 
        include(FOOTER_TEMPLATE); 
        ob_end_flush();
		
?>
