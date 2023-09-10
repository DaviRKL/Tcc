<?php 
ob_start();
	require_once('functions.php'); 
	view($_GET['id']);
	$pet_id = $agendamento['id_pet'];
						$pet_info = get_pet_info($pet_id);
						$pet_name = $pet_info['nome'];
$pet_foto = $pet_info['foto'];
						$cnpj= $agendamento['id_empresa'];
						$empresa_name = get_empresa_name($cnpj);
						$id=$agendamento['id_tutor'];
						$tutor_name = get_tutor_name($id);
?>

<?php include(HEADER_TEMPLATE); ?>

<div style="background-color: #00a4b4; border-radius: 50px; margin-top:30px">
	<div style="padding: 20px;">
		<div style="display: flex;flex-direction: row;justify-content: center; align-items: center;">
			<h2>Agendamento <?php echo $agendamento['id']; ?></h2>
		</div>
		<hr style="color:#FFF">
		<div style="display: flex;flex-direction: row;justify-content: center; align-items: center;">
			
			<dl class="dl-horizontal">
				<dt>Nome do Pet</dt>
				<dd><?php echo $pet_name; ?></dd>

				<dt>Nome do Tutor:</dt>
				<dd><?php echo $tutor_name ?></dd>

				<dt>Tipo:</dt>
				<dd><?php echo $agendamento['servico']; ?></dd>

				<dt>Raça:</dt>
				<dd><?php echo $agendamento['data']; ?></dd>

				<dt>Data de nascimento:</dt>
				<dd><?php echo $agendamento['horario']; ?></dd>
				<dt>Foto:</dt>
					<dd><?php
						if (!empty($pet_foto)){
							echo  "<img src=\"../pet/imagens/" . $pet_foto . "\" class=\"shadow p-1 mb-1 bg-body rounded\" width=\"300px\">";
						}else{
							echo  "<img src=\"imagens/SemImagem.png\" class\"shadow p-1 mb-1 bg-body rounded\" width=\"300px\">";
						}
						?>
					</dd>
			</dl>
			
		</div>
		<div id="actions" class="row">
			<div class="col-md-12" style="padding-left: 20px; display: flex;flex-direction: row;justify-content: center; align-items: center;">
			<a href="#" class="btn btn-dark"  style="width: 500px; padding-left: 20px; background-color:  #0ACCA7"  data-bs-toggle="modal" data-bs-target="#delete-agendamento-modal" data-agendamento="<?php echo $agendamento['id']; ?>" ><i class="fa-solid fa-circle-check"></i>  Concluir atendimento</a>
				<a href="index.php" class="btn btn-default" style="width: 500px"><i class="fa-solid fa-rotate-left"></i> Voltar</a>
			</div>
		</div>
	</div>
</div>

<?php include(FOOTER_TEMPLATE); 
ob_end_flush();?>