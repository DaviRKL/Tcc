<?php
ob_start();
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
	border:4px solid #7914C7 ; width: 200px; 
	}
	label{
		align: left
	}


</style>
<div style="background-color: #00a4b4; border-radius: 50px; margin-top:30px">
	<div style="padding: 20px">
		<header style="margin-top:10px;">
			<div style="display: flex;flex-direction: row;justify-content: center; align-items: center;margin-left: 120px">
				<h2>MEUS PETS</h2>		
				<?php if(isset($_SESSION['id'])):?> 
					<a class="btn btn-secondary" href="add.php" style="margin-left:20px"><i class="fa fa-plus"></i> Novo pet</a>
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
			<?php if ($pets) : ?>
				<?php foreach ($pets as $pet) : ?>
					
							<div class="col-md-4"style="padding: 20px">		
								<div class="card" style="width: 20rem;">
									<?php
										if (!empty($pet['foto'])){
											echo  "<img src=\"imagens/" . $pet['foto'] . "\" class=\"card-img-top\" width=\"200px\"height=\"200px\">";
										}else{
											echo  "<img src=\"imagens/SemImagem.png\" class=\"card-img-top\" width=\"200px\"height=\"200px\">";
										}
										$id = base64_encode($pet['id']);
									?>
									<div class="card-body">
										<h4 class="card-title"style=" display: flex;flex-direction: row;justify-content: center; align-items: center;"><?php echo $pet['nome']; ?></h5>
									</div>
									<ul class="list-group list-group-flush">
										<li class="list-group-item"style=" background-color: #0ACCA7">Tipo: <?php echo $pet['tipo']; ?></li>
										<li class="list-group-item"style=" background-color: #0ACCA7">Sexo: <?php echo $pet['sexo']; ?></li>
										<li class="list-group-item"style=" background-color: #0ACCA7">Raça: <?php echo $pet['raca']; ?></li>
										<li class="list-group-item"style=" background-color: #0ACCA7">Data de nascimento: <?php $d = new Datetime($pet['datanasc']); echo FormataData($pet['datanasc']);?></li>
									</ul>
									<div class="card-body"style=" display: flex;flex-direction: row;justify-content: center; align-items: center;" >
										<?php if(isset($_SESSION['id'])):?> 
											<a href="edit.php?id=<?php echo $pet['id']; ?>" class="btn btn-sm btn-secondary"><i class="fa-solid fa-user-pen"></i> Editar</a>
											<a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#delete-pet-modal" data-pet="<?php echo $pet['id']; ?>"><i class="fa fa-trash"></i> Excluir</a>
										<?php endif; ?>
									</div>
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