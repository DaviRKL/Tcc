<?php
ob_start();

include('../protecao/protect.php');
    require_once('functions.php');
	include(HEADER_TEMPLATE);
    index();
	

	
	
	
?>
<style>

td,th{
	color: #FFF;
}
h5{
	color: #102447;
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

		<div class="container text-center" style=" margin-top:40px; margin-bottom: 20px">
  			<div class="row">       
				<?php 
					if ($agendamentos) : 
						foreach ($agendamentos as $agendamento) : 
							$pet_id = $agendamento['id_pet'];
							$pet_info = get_pet_info($pet_id);
							$pet_name = $pet_info['nome'];
							$cnpj= $agendamento['id_empresa'];
							$empresa_name = get_empresa_name($cnpj);
				?>
							<div class="col-lg-4"style="margin-bottom: 40px">		
								<div class="card">	 
									<div class="card-body" >
										<h4 class="card-title"style="display: flex;flex-direction: row;justify-content: center; align-items: center;">
										Pet: <?php echo $pet_name; ?></h4>
									</div>
									<ul class="list-group list-group-flush" style: >
											<li class="list-group-item"><H5>Local: <?php echo $empresa_name; ?></H5></li>
											<li class="list-group-item"><H5>Serviço: <?php echo $agendamento['servico']; ?></H5></li>
											<li class="list-group-item"><H5>Data: <?php  echo FormataData($agendamento['data']);?></H5></li>
											<li class="list-group-item"><H5>Horário: <?php echo FormataHora($agendamento['horario']); ?></H5></li>
									</ul>
									<div class="card-body"style="display: flex;flex-direction: row;justify-content: center; align-items: center;" >
											<?php if(isset($_SESSION['id'])):?> 
												<a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#delete-agendamento-modal" data-agendamento="<?php echo $agendamento['id']; ?>"><i class="fa-solid fa-ban"></i> Cancelar</a>
											<?php endif; ?>
									</div>
								</div>
							</div>
					<?php endforeach; ?>
				<?php else : ?>
					<p>Você ainda não possui nenhum agendamento</p>	
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>			
<?php include('modal.php'); ?>
<?php include(FOOTER_TEMPLATE); 
ob_end_flush();?>