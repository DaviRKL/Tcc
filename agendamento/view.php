<?php
ob_start();
require_once('functions.php');
concluir();
view($_GET['id']);
$pet_id = $agendamento['id_pet'];
$pet_info = get_pet_info($pet_id);
$pet_name = $pet_info['nome'];
$pet_raca = $pet_info['raca'];
$pet_foto = $pet_info['foto'];
$id = $agendamento['id_tutor'];
$tutor_name = get_tutor_name($id);

?>

<?php include_once(HEADER_TEMPLATE); ?>

<!-- <div class="row">
	<div class="form-group col-md-6">
		<label class="texto1" for="modelo">Nome do pet</label>
		<input type="text" class="form-control" name="pet['nome']" value="<?php echo $pet['nome']; ?>">
	</div>
	<div class="form-group col-md-2">
		<label class="texto7" for="marca">Tipo do pet</label>
		<input type="text" class="form-control" name="pet['tipo']" value="<?php echo $pet['tipo']; ?>">
	</div>
	<div class="form-group col-md-2">
		<label class="texto2" for="ano">Raça</label>
		<input type="text" class="form-control" name="pet['raca']" value="<?php echo $pet['raca']; ?>">
	</div>
	<div class="form-group col-md-2">
		<label class="texto3" for="marca">Sexo</label>
		<input type="text" class="form-control" name="pet['sexo']" value="<?php echo $pet['sexo']; ?>">
	</div>
	<div class="form-group col-md-3">
		<label class="texto4" for="datacad">Data de nascimento</label>
		<input type="text" class="form-control" name="pet['datanasc']"
			value="<?php echo FormataData($pet['datanasc']); ?>" disabled>
	</div>
	
	<div class="form-group col-md-7">
		<label class="texto5" for="foto">Foto</label>
		<input type="file" class="form-control" name="foto" id="foto" value="imagens/<?php echo $foto ?>">
	</div>
	<div class="form-group col-md-2">
		<label class="texto6" for="pre">Pré-vizualização:</label>
		<img class="form-control shadow p-2 mb-2 bg-body rounded" id="imgPreview" src="imagens/<?php echo $foto ?>"
			alt="Foto do pet">
	</div>
</div>
<div id="actions" class="row">
	<div class="col-md-12" style="padding-bottom:50px;">
		<button type="submit" class="btn btn-secondary">Salvar</button>
		<a href="index.php" class="btn btn-light">Cancelar</a>
	</div>
</div>
</div>
</form> -->

<section class="formulario">
	<div class="linhas">
		<section class="pets2" style="margin-left: -1px; margin-bottom: 20px;">
			<h2 class="titulo">Concluir Agendamento
				<?php echo $agendamento['id']; ?>
			</h2>
		</section>
		<div class="row" style="margin-top: 50px;">

			<div class="form-group col-md-4">
				<dt>Nome do Pet</dt>
				<dd>
					<?php echo $pet_name; ?>
				</dd>
			</div>
			<div class="form-group col-md-4">
				<dt>Nome do Tutor</dt>
				<dd>
					<?php echo $tutor_name ?>
				</dd>
			</div>
			<div class="form-group col-md-4">
				<dt>Tipo</dt>
				<dd>
					<?php echo $agendamento['servico']; ?>
				</dd>
			</div>
			<div class="form-group col-md-4">
				<dt>Raça</dt>
				<dd>
					<?php echo $pet_raca ?>
				</dd>
			</div>
			<div class="form-group col-md-4">
				<dt>Data de nascimento</dt>
				<dd>
					<?php echo FormataData($agendamento['data']) ?>
				</dd>
			</div>
			<div class="form-group col-md-4">
				<dt>Foto</dt>
				<dd>
					<?php
					if (!empty($pet_foto)) {
						echo "<img src=\"../pet/imagens/" . $pet_foto . "\" class=\"shadow p-1 mb-1 bg-body rounded\" width=\"300px\">";
					} else {
						echo "<img src=\"imagens/SemImagem.png\" class\"shadow p-1 mb-1 bg-body rounded\" width=\"300px\">";
					}
					?>
				</dd>
			</div>
			<div id="actions" class="row">
				<div class="col-md-12">
					<a href="#" class="btn btn-secondary" style="border-radius: 15px; background: var(--Gradiente, linear-gradient(90deg, #00A3B4 3.36%, rgba(7, 41, 95, 0.96) 62.36%));"
						data-bs-toggle="modal" data-bs-target="#concluir-agendamento-modal"
						data-concluir="<?php echo $agendamento['id']; ?>"><i class="fa-solid fa-circle-check"></i>
						Concluir atendimento</a>
					<a href="<?php echo BASEURL; ?>empresas/index.php" class="btn btn-default" style="border-radius: 15px; "><i
							class="fa-solid fa-rotate-left"></i> Voltar</a>
				</div>
			</div>
		</div>
</section>

<?php
include('modal_concluir.php');
include(FOOTER_TEMPLATE);
ob_end_flush(); ?>