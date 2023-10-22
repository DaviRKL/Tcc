<?php
ob_start();
include('../protecao/protect.php');
    require_once('functions.php');
    index();
	$tabela = 'avaliacoes';
	$coluna = 'qtd_estrela';
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
	border:4px solcnpj #7914C7 ; wcnpjth: 200px; 
	}
	label{
		align: left
	}
	.card{
		background-color: transparent;
	}
	
	
</style>
<div style="margin-top:30px">
	<div style="padding: 20px">
		<header style="margin-top:10px;">
			<div style="display: flex;flex-direction: row;justify-content: center; align-items: center;margin-left: 120px">
				<h2>Conheça nossos Petshops</h2>		
				<?php if(isset($_SESSION['cnpj'])):?> 
					<a class="btn btn-secondary" href="add.php" style="margin-left:20px"><i class="fa fa-plus"></i> Conheça nossos Petshops</a>
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
	<div class="container text-center fluid">
  		<div class="row">
			<?php if ($empresas) : ?>
				<?php foreach ($empresas as $empresa) : ?>
					
							<div class="col-xl-4"style="padding: 20px">		
								<div class="card" >
									<?php
										if (!empty($empresa['foto'])){
											echo  "<img src=\"imagens/" . $empresa['foto'] . "\" class=\"card-img-top\" width=\"200px\"height=\"200px\">";
										}else{
											echo  "<img src=\"imagens/SemImagem.png\" class=\"card-img-top\" width=\"200px\"height=\"200px\">";
										}
										$cnpj = base64_encode($empresa['cnpj']);
									?>
									 <div class="card-body">
									<div class="col-xl-12">
									 <a href="view.php?cnpj=<?php echo $empresa['cnpj']; ?>" class="card-title"style="margin-right: 160px"><?php echo $empresa['nome']; ?></a>
									 <?php 
									 	   $cnpj = $empresa['cnpj'];
									 	   $media = calcularMedia(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, $tabela, $coluna, $cnpj);
								          // Criar o for para percorrer as 5 estrelas
					 for ($i = 1; $i <= 5; $i++) {
 
						// Acessa o IF quando a quantidade de estrelas selecionadas é menor a quantidade de estrela percorrida e imprime a estrela preenchida
						if ($i <= $media) {
							echo '<i class="estrela-preenchida fa-solid fa-star"></i>';
						} else {
							echo '<i class="estrela-vazia fa-solid fa-star"></i>';
						}
					}

									 ?>
									</div>
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