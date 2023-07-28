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

 th{
	background-color: #0ACCA7;
 }
</style>

<div style="background-color: #00a4b4; border-radius: 50px; margin-top:30px">
	<div style="padding: 10px">
		<div class="row">
			<header >
				<div class="col-md-11 mx-auto">
					<h2 class="text-center">Agendamentos marcados</h2>
				</div>
			</header>
			<div class="col-md-11 text-center" style="display: flex;flex-direction: row;justify-content: center; align-items: center;margin-left: 70px">
			<form name = "filtro" method="post" action="index.php">
					<div class = "form-group col-md-11">
						<div class ="input-group mb-3">
							<input type="text" class="form-control" maxlength="80" name="cars" placeholder="nome" required>
							<button type="submit" class="btn btn-secondary"><i class='fas fa-search'></i> Consultar</button>
						</div>
					</div>
			</div>
		</form>		
		</div>
		<?php 
		if (!empty($_SESSION['message'])) : ?>
			<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				<?php echo $_SESSION['message']; ?>
			</div>
			<?php clear_messages(); ?>
		<?php endif; ?>
		<div class="table-responsive-md">
			<table class="table table-hover table-sm align-middle table-borderless " style="background-color: #0ACCA7; --webkit-box-shadow: 5px -3px 5px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 5px -3px 5px 0px rgba(0,0,0,0.75);
box-shadow: 5px -3px 5px 0px rgba(0,0,0,0.75);" >
				<thead style="background-color: #0ACCA7">
					<tr>
						<tr>
							<th width='100px' style="background-color: #0ACCA7; color:#FFF">Data</th>
							<th width='80px'style="background-color: #0ACCA7; color:#FFF">Horário</th>
							<th width='120px'style="background-color: #0ACCA7; color:#FFF">Serviço</th>
							<th width='120px'style="background-color: #0ACCA7; color:#FFF">Nome do Tutor</th>
							<th width='120px'style="background-color: #0ACCA7; color:#FFF">Nome do Pet</th>
							<th width='200px'style="background-color: #0ACCA7; color:#FFF">Foto do Pet</th>
							<th width='100px'style="background-color: #0ACCA7; color:#FFF">Opções</th>
						</tr>
					</tr>
				</thead>
				<tbody >
					<?php if ($carros) : ?>
						<?php foreach ($carros as $carro) : ?>
							<tr style="background-color: #00a4b4;">
								<td style="background-color: #0ACCA7; color:#FFF"><?php echo $carro['id']; ?></td>
								<td style="background-color: #0ACCA7; color:#FFF"><?php echo $carro['modelo']; ?></td>
								<td style="background-color: #0ACCA7; color:#FFF"><?php echo $carro['marca']; ?></td>
								<td style="background-color: #0ACCA7; color:#FFF"><?php echo $carro['ano']; ?></td>
								<?php $d = new Datetime($carro['datacad']);?>
								<td style="background-color: #0ACCA7; color:#FFF"><?php echo FormataData($carro['datacad']);?></td>
								<td style="background-color: #0ACCA7; color:#FFF"><?php
								if (!empty($carro['foto'])){
									echo  "<img src=\"imagens/" . $carro['foto'] . "\" class=\"shadow p-1 mb-1 bg-body rounded\" width=\"200px\">";
								}else{
									echo  "<img src=\"imagens/SemImagem.png\" class=\"shadow p-1 mb-1 bg-body rounded\" width=\"200px\">";
								}
								$id = base64_encode($carro['id']);
								?></td>
								<td style="background-color: #0ACCA7; color:#FFF" class="actions text-start"> 
									<?php if(isset($_SESSION['id'])):?> 
											<a href="view.php?id=<?php echo $carro['id']; ?>" style="width: 150px"class="btn btn-dark"><i class="fa fa-eye"></i> Ver Pet</a>
											<a href="#" class="btn btn-dark" style="width: 150px"data-bs-toggle="modal" data-bs-target="#delete-carro-modal" data-carro="<?php echo $carro['id']; ?>" ><i class="fa-solid fa-circle-check"></i>  Concluir</a>
									<?php endif; ?>
								</td>
							</tr>
						<?php endforeach; ?>
					<?php else : ?>
						<tr>
							<td colspan="6">Nenhum registro encontrado.</td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include('modal.php'); ?>
<?php include(FOOTER_TEMPLATE); 
ob_end_flush();?>