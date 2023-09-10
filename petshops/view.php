<?php 
ob_start();
	require_once('functions.php'); 
	view($_GET['cnpj']);
?>
<style>
	dt, h2{
   color: #242e8c;
	}
</style>
<?php include(HEADER_TEMPLATE); ?>
<div class="container">
	<div class="row">
		<div style="background-color: #00a4b4; border-radius: 50px; margin-top:30px">
			<div style="padding: 20px">
				<div class="col-md-4">
					<div class="card" style="width: 18rem;">
						<?php
							if (!empty($empresa['foto'])){
								echo  "<img src=\"imagens/" . $empresa['foto'] . "\" class=\"card-img-top\" width=\"300px\">";
							}else{
								echo  "<img src=\"imagens/SemImagem.png\" class\"card-img-top\" width=\"300px\">";
							}
						?>
					</div>	
					
				</div>
				<div class="col-4">	
					<h2 style=" color: #242e8c;">empresa <?php echo $empresa['nome']; ?></h2>
				</div>
				<dl class="dl-horizontal">
					<dt>Endereço:</dt>
					<dd><?php echo $empresa['endereço']; ?></dd>

					<dt>Sobre a empresa:</dt>
					<dd><?php echo $empresa['sobre']; ?></dd>
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29312.52826906888!2d-51.382072466369415!3d-23.313362812372212!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94eca79579d8070b%3A0x86c186f3adc758ae!2sRol%C3%A2ndia%2C%20PR%2C%2086600-000!5e0!3m2!1spt-BR!2sbr!4v1693692215635!5m2!1spt-BR!2sbr" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				</dl>
				<div id="actions" class="row">
					<div class="col-md-12">
					<a href="<?php echo BASEURL; ?>agendamento/add.php?id=<?php echo $empresa['cnpj']; ?>" style="width: 100px;  background: rgb(0,163,180);
    background: linear-gradient(90deg, rgba(0,163,180,1) 0%, rgba(7,41,95,1) 76%); border: none;" class="btn btn-secondary">Agende já</a>
					<a href="index.php" class="btn btn-default"><i class="fa-solid fa-rotate-left"></i> Voltar</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include(FOOTER_TEMPLATE); 
ob_end_flush();?>