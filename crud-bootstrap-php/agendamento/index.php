<?php
ob_start();
    require_once('functions.php');
    index();
	function FormataData($data){
      $da = new DateTime ($data);
      return $da->format ("h:i");  
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
				<h2>Meus agendamentos</h2>		
				<?php if(isset($_SESSION['id'])):?> 
					<a class="btn btn-secondary" href="add.php" style="margin-left:20px"><i class="fa fa-plus"></i> Novo agendamento</a>
				<?php endif; ?>
			</div> 	
		</header>
		<?php if (!empty($_SESSION['message'])) : ?>
			<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				<?php echo $_SESSION['message']; ?>
			</div>
			<?php clear_messages(); ?>
		<?php endif; ?>
		<div class="container text-center">
  			<div class="row">       
				<?php if ($agendamentos) : ?>
					<?php foreach ($agendamentos as $agendamento) : ?>
						<div class="col-md-4"style="padding: 20px">		
							<div class="card" style="width: 20rem;">	 
								<div class="card-body" style="background-color: #0ACCA7;">
										<h4 class="card-title"style="color:#FFF; display: flex;flex-direction: row;justify-content: center; align-items: center;">Pet: <?php echo $agendamento['pet']; ?></h4>
								</div>
								<ul class="list-group list-group-flush" style: >
										<li class="list-group-item"style=" background-color: #0ACCA7"><H5>Local: <?php echo $agendamento['empresa']; ?></H5></li>
										<li class="list-group-item"style=" background-color: #0ACCA7"><H5>Serviço: <?php echo $agendamento['servico']; ?></H5></li>
										<li class="list-group-item"style=" background-color: #0ACCA7"><H5>Data: <?php echo $agendamento['data']; ?></H5></li>
										<?php $d = new Datetime($agendamento['horario']);?>
										<li class="list-group-item"style="background-color: #0ACCA7"><H5>Horário: <?php echo FormataData($agendamento['horario']); ?></H5></li>
								</ul>
								<div class="card-body"style="display: flex;flex-direction: row;justify-content: center; align-items: center;background-color: #0ACCA7;" >
										<?php if(isset($_SESSION['id'])):?> 
											<a href="edit.php?id=<?php echo $agendamento['id']; ?>" class="btn btn-sm btn-secondary"><i class="fa-solid fa-user-pen"></i> Editar</a>
											<a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#delete-pet-modal" data-pet="<?php echo $agendamento['id']; ?>"><i class="fa fa-trash"></i> Excluir</a>
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
</div>
 
				
<?php include('modal.php'); ?>
<?php include(FOOTER_TEMPLATE); 
ob_end_flush();?>