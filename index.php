<?php 
	ob_start();
	require_once "config.php"; 
	require_once DBAPI; 
	include(HEADER_TEMPLATE);
	$db = open_database();
  require_once('./functions.php');
    index();
    $tabela = 'avaliacoes';
	$coluna = 'qtd_estrela';
	include(HEADER_TEMPLATE);
?>
 <style>
	td,th{
		color: #FFF;
	}
	
	label{
		align: left
	}
	.card{
		background-color: transparent;
	}
	h2{
		color: #07295F;
	}
	
	
</style>
  
        <body>
            <main>
              
            <div class="showcase-area">
              <div class="container">
                <div class="left">
                  <p class="text">
                    Seja bem vindo, aqui você conhece
                  </p>
                  <div class="big-title">
                    <h1>As melhores opções para o seu pet</h1>
                  </div>
                  <p class="text">
                  Nós reunimos os melhores Petshops da sua região para você ter maior facilidade de agendar o banho e tosa de seu pet. 
                  Basta cadastrar seu pet e agendar em uma das empresas abaixo.
                  </p>
                </div>

                <div class="right">
                  <img src="images/apresentacao.png" alt="Person Image" class="person" />
                </div>
              </div>
            </div>
           </main>
              
                <div class="row">
                  <div class="col-md-12"style="padding-top: 20px; padding-left:250px">
                    <p id="CimaCard"> Conheça nossos Petshops</p>
                  </div>
            </div>
        </div>

 
<div style="margin-top:30px">
	
	
	<div class="container text-center fluid">
  		<div class="row">
			<?php if ($empresas) : ?>
				<?php foreach ($empresas as $empresa) : ?>
					
							<div class="col-xl-4"style="padding: 20px">		
              <a href="./petshops/view.php?cnpj=<?php echo $empresa['cnpj']; ?>" class="card-title">
								<div class="card" >
									<?php
										if (!empty($empresa['foto'])){
											echo  "<img src=\"./petshops/imagens/" . $empresa['foto'] . "\" class=\"card-img-top\" width=\"200px\"height=\"200px\">";
										}else{
											echo  "<img src=\"./petshops/imagens/SemImagem.png\" class=\"card-img-top\" width=\"200px\"height=\"200px\">";
										}
										$cnpj = base64_encode($empresa['cnpj']);
									?>
									<div class="card-body">
										<div class="col-xl-12">
											<p><?php echo $empresa['nome']; ?></p>
										</div>
										<div class="col-xl-12">
											<?php 
												$cnpj = $empresa['cnpj'];
												$media = calcularMedia(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, $tabela, $coluna, $cnpj);
												// Criar o for para percorrer as 5 estrelas
												
												for ($i = 1; $i <= 5; $i++) {
													// Acessa o IF quando a quantidade de estrelas selecionadas é menor a quantidade de estrela percorrida e imprime a estrela preenchida
													if ($i <= $media) {
														echo '    <i class="estrela-preenchida fa-solid fa-star"></i>';
													} else {
														echo '   <i class="estrela-vazia fa-solid fa-star"></i>';
													}
												}
												
											?>
										</div>
									</div>
								</div>	
                </a>			
							</div>	
				<?php endforeach; ?>
			<?php else : ?>
				<p>TEM nada KKKKKKKKKKKKKK</p>	
			<?php endif; ?>
		</div>	
	</div>	
</div>

  </body>

<?php 
        include(FOOTER_TEMPLATE); 
        // ob_end_flush();
?>