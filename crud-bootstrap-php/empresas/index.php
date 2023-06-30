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

 th{
	background-color: #0ACCA7;
 }
</style>

<div style="background-color: #00a4b4; border-radius: 50px; margin-top:30px">
	<div style="padding: 20px">
		<div class="row">
			<header style="margin-top:10px;">
				<div class="col-md-11" style="display: flex;flex-direction: row;justify-content: center; align-items: center;margin-left: 100px">
					<h2>Agendamentos marcados</h2>
				</div>
			</header>
			<div class="col-md-11" style="display: flex;flex-direction: row;justify-content: center; align-items: center;margin-left: 120px">
					
				
			<form name = "filtro" method="post" action="index.php">
					<div class = "form-group col-md-11">
					<div class ="input-group mb-3">
					<input type="text" class="form-control" maxlength="80" name="cars" placeholder="nome"required>
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
		<table class="table table-hover" style="background-color: #0ACCA7;border-radius: 50px; " >
			<thead style="background-color: #0ACCA7">
				<tr>
					<tr>
						<th width='40px' style="background-color: #0ACCA7; color:#FFF">Id</th>
						<th width='120px'style="background-color: #0ACCA7; color:#FFF">Modelo</th>
						<th width='120px'style="background-color: #0ACCA7; color:#FFF">Marca</th>
						<th width='100px'style="background-color: #0ACCA7; color:#FFF">Ano</th>
						<th width='80px'style="background-color: #0ACCA7; color:#FFF">Data de cadastro</th>
						<th width='250px'style="background-color: #0ACCA7; color:#FFF">Foto</th>
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
									<a href="#" class="btn btn-sm btn-dark"  style="display: flex;flex-direction: row;justify-content: center; align-items: center;margin-top: 40px" data-bs-toggle="modal" data-bs-target="#delete-carro-modal" data-carro="<?php echo $carro['id']; ?>" ><i class="fa-solid fa-circle-check"></i>  Concluir</a>
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
<?php include('modal.php'); ?>
<?php include(FOOTER_TEMPLATE); 
ob_end_flush();?>