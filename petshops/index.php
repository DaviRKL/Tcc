<?php
ob_start();
include('../protecao/protect.php');
    require_once('functions.php');
    index();
	
	function FormataData($data){
      $da = new DateTime ($data);
      return $da->format ("d-m-Y");  
	}
	include(HEADER_TEMPLATE);
?>
<style>
	td,th{
		color: #FFF;
	}
	#cars{ 
	border:4px solcnpj #7914C7 ; wcnpjth: 200px; 
	}
	label{
		align: left
	}
	.card{
		background-color: transparent;
	}
</style>
<div style="background-color: #00a4b4; border-radius: 50px; margin-top:30px">
	<div style="padding: 20px">
		<header style="margin-top:10px;">
			<div style="display: flex;flex-direction: row;justify-content: center; align-items: center;margin-left: 120px">
				<h2>Conheça nossos Petshops</h2>		
				<?php if(isset($_SESSION['cnpj'])):?> 
					<a class="btn btn-secondary" href="add.php" style="margin-left:20px"><i class="fa fa-plus"></i> Conheça nossos Petshops</a>
				<?php endif; ?>
			</div> 
		</header>
	</div>
	<?php if (!empty($_SESSION['message'])) : ?>
		<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			<?php echo $_SESSION['message']; ?>
		</div>
		<?php clear_messages(); ?>
	<?php endif; ?>
	<div class="container text-center">
  		<div class="row">
			<?php if ($empresas) : ?>
				<?php foreach ($empresas as $empresa) : ?>
							<div class="col-md-4"style="padding: 20px">		
								<div class="card" style="wcnpjth: 20rem;">
									<?php
										if (!empty($empresa['foto'])){
											echo  "<img src=\"imagens/" . $empresa['foto'] . "\" class=\"card-img-top\" wcnpjth=\"200px\"height=\"200px\">";
										}else{
											echo  "<img src=\"imagens/SemImagem.png\" class=\"card-img-top\" wcnpjth=\"200px\"height=\"200px\">";
										}
										$cnpj = base64_encode($empresa['cnpj']);
									?>
									 <div class="card-body">
										<h4 class="card-title"style=" display: flex;flex-direction: row;justify-content: center; align-items: center; color:white;"><?php echo $empresa['nome']; ?></h5>
									</div>
									<div class="card-body"style=" display: flex;flex-direction: row;justify-content: center; align-items: center;" >
										<?php if(isset($_SESSION['cnpj'])):?> 
											<a href="edit.php?cnpj=<?php echo $empresa['cnpj']; ?>" class="btn btn-sm btn-secondary"><i class="fa-solcnpj fa-user-pen"></i> Editar</a>
											<a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#delete-empresa-modal" data-empresa="<?php echo $empresa['cnpj']; ?>"><i class="fa fa-trash"></i> Excluir</a>
										<?php endif; ?>
									</div> 
									<a href="view.php?cnpj=<?php echo $empresa['cnpj']; ?>" class="card-title"style=" display: flex;flex-direction: row;justify-content: center; align-items: center; color:white;" ><?php echo $empresa['nome']; ?></a>
									
								</div>				
							</div>	
				<?php endforeach; ?>
			<?php else : ?>
				<p>TEM nada KKKKKKKKKKKKKK</p>	
			<?php endif; ?>
		</div>	
	</div>	
</div>
<?php 
	include('modal.php'); 
	include(FOOTER_TEMPLATE); 
	ob_end_flush();
?>