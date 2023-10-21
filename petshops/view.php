<?php 
ob_start();
	require_once('functions.php'); 
	view($_GET['cnpj']);
	$cnpj = $_GET['cnpj'];
?>
<style>
	dt, h2{
   color: #242e8c;
	}
	/* Criar as variaveis com as cores */


</style>
<?php include(HEADER_TEMPLATE); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="custom.css">
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
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d58560.58861304238!2d-47.488434897546384!3d-23.4591374604475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c5f51a01916eaf%3A0x95fb7a34d2c347e9!2sTauste%20Itavuvu!5e0!3m2!1spt-BR!2sbr!4v1695825087492!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				</dl>
           

				<div id="actions" class="row">
					<div class="col-md-12">
						<a href="<?php echo BASEURL; ?>agendamento/add.php?id=<?php echo $empresa['cnpj']; ?>" style="width: 100px;  background: rgb(0,163,180);background: linear-gradient(90deg, rgba(0,163,180,1) 0%, rgba(7,41,95,1) 76%); border: none;" class="btn btn-secondary">Agende já</a>
						<a href="add_coment.php?cnpj=<?php echo $empresa['cnpj']; ?>" class="btn btn-default"><i class="fa-regular fa-comment"></i> Avalie esta empresa</a>
						<a href="index.php" class="btn btn-default"><i class="fa-solid fa-rotate-left"></i> Voltar</a>
					</div>
				</div>
				<h1>Avaliações dos Usuários</h1>

<?php

// Recuperar as avaliações do banco de dados
$query_avaliacoes = "SELECT id, qtd_estrela, mensagem 
					FROM avaliacoes
					WHERE id_empresa = $cnpj 
					ORDER BY created DESC";
// Preparar a QUERY
$conn = new pdo("mysql:host=" .DB_HOST .";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
$result_avaliacoes = $conn->prepare($query_avaliacoes);

// Executar a QUERY
$result_avaliacoes->execute();

// Percorrer a lista de registros recuperada do banco de dados
while ($row_avaliacao = $result_avaliacoes->fetch(PDO::FETCH_ASSOC)) {
	//var_dump($row_avaliacao);

	// Extrair o array para imprimir pelo nome do elemento do array
	extract($row_avaliacao);

	echo "<p>Avaliação: $id</p>";

	// Criar o for para percorrer as 5 estrelas
	for ($i = 1; $i <= 5; $i++) {

		// Acessa o IF quando a quantidade de estrelas selecionadas é menor a quantidade de estrela percorrida e imprime a estrela preenchida
		if ($i <= $qtd_estrela) {
			echo '<i class="estrela-preenchida fa-solid fa-star"></i>';
		} else {
			echo '<i class="estrela-vazia fa-solid fa-star"></i>';
		}
	}

	echo "<p> $mensagem</p><hr>";
}
?>
			</div>
		</div>
	</div>
</div>

<?php include(FOOTER_TEMPLATE); 
ob_end_flush();?>