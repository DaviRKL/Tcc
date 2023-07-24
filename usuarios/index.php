<?php
ob_start();
	include('../protecao/protectAdmin.php');
    require_once('functions.php');
    index();
    include(HEADER_TEMPLATE); 
?>



<style>
#name{ 
border:4px solid #7914C7 ; width: 200px; 
}
</style>

	<header style="margin-top:10px;">
		<div class="row">
			<div class="col-sm-6">
				<h2>Usuários</h2>
			</div>
			<div class="col-sm-6 text-end h2">
				<a class="btn btn-secondary" href="add.php"><i class="fa fa-plus"></i> Novo Usuário</a>
				<a class="btn btn-default" href="index.php"><i class="fa fa-refresh"></i> Atualizar</a>
			</div>
		</div>
	</header>
		<form name = "filtro" method="post" action="index.php">
			<div class="row">
				<div class = "form-group col-md-4">
					<div class ="input-group mb-3">
						<input type="text" class="form-control" maxlength="80" name="users" required>
						<button type="submit" class="btn btn-secondary"><i class='fas fa-search'></i> Consultar</button>
					</div>
				</div>
			</div>
		</form>
		<?php if (!empty($_SESSION['message'])) : ?>
			<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
				<?php echo $_SESSION['message']; ?>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		<?php clear_messages(); ?>
		<?php endif; ?>

			<table class="table table-hover">
				<thead>
					<tr>
						<th width='40px'>ID</th>
						<th  width='110px'>Nome</th>
						<th  width='120px'>Usuario</th>
						<th width='100px'>Foto</th>
						<th width='150px'>Opções</th>
					</tr>
				</thead>
			<tbody>
		<?php if ($usuarios) : ?>
			<?php foreach ($usuarios as $usuario) : ?>
				<tr>
					<td><?php echo $usuario['id']; ?></td>
					<td><?php echo $usuario['nome']; ?></td>
					<td><?php echo $usuario['user']; ?></td>
					<td><?php
							if (!empty($usuario['foto'])){
								echo  "<img src=\"fotos/" . $usuario['foto'] . "\" class=\"shadow p-1 mb-1 bg-body rounded\" width=\"200px\" height=\"200px\">";
							}else{
								echo  "<img src=\"fotos/SemImagem.png\" class=\"shadow p-1 mb-1 bg-body rounded\" width=\"200px\" height=\"200px\">";
							}
						?>
					</td>
					<td class="actions text-start"> 
						<a href="view.php?id=<?php echo $usuario['id']; ?>" class="btn btn-sm btn-dark"><i class="fa fa-eye"></i> Visualizar</a>
						<a href="edit.php?id=<?php echo $usuario['id']; ?>" class="btn btn-sm btn-secondary"><i class="fa-solid fa-user-pen"></i> Editar</a>
						<a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#delete-user-modal" data-usuario="<?php echo $usuario['id']; ?>">
							<i class="fa fa-trash"></i> Excluir
						</a>
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
<?php include('modalusuarios.php'); ?>
<?php include(FOOTER_TEMPLATE);

ob_end_flush();
?>