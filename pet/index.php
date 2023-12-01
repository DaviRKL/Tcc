<?php
ob_start();
include('../protecao/protect.php');
require_once('functions.php');
index();
include_once(HEADER_TEMPLATE);
?>
<section class="empresas" style="margin-bottom: 50px">
	<h2 class="titulo">Meus Pets</h2>
	<?php if (isset($_SESSION['id'])): ?>
		<a href="add.php"><button type="button" id="novo-pet"><i class="fa fa-plus"></i> novo pet</button></a>
	<?php endif; ?>

	<ul class="pets">
		<div class="container text-center">
			<div class="row">
				<?php if ($pets): ?>
					<?php foreach ($pets as $pet): ?>
						<div class="col-md-4" style='padding: 0; padding-bottom: 0px;'>
							<a href="edit.php?id=<?php echo $pet['id']; ?>">
								<li class="pet">
									<?php
									if (!empty($pet['foto'])) {
										echo "<img src=\"imagens/" . $pet['foto'] . "\"  width=\"350px\"height=\"250px\" border-radius=\"70px\">";
									} else {
										echo "<img src=\"imagens/SemImagem.png\" class=\"card-img-top\" width=\"200px\"height=\"200px\">";
									}
									$id = base64_encode($pet['id']);
									?>
									<br>
									<h4>
										<div style="font-size: 20px;" > <?php echo $pet['nome']; ?> </div>
									</h4>
								</li>
							</a>
						</div>
					<?php endforeach; ?>
				<?php else: ?>
					<p>Você ainda não possui Pets</p>
				<?php endif; ?>
			</div>
		</div>
	</ul>
</section>


<?php
include('modal.php');
include(FOOTER_TEMPLATE);
ob_end_flush();
?>