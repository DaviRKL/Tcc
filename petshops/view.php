<?php
ob_start();
require_once('functions.php');
view($_GET['cnpj']);
$cnpj = $_GET['cnpj'];
?>
<?php include_once(HEADER_TEMPLATE); ?>
<section class="meus-pets center">

</section>

<div class="container">
	<div class="row">
		<div class="empresa-selecionada">
		
				<?php
				if (!empty($empresa['foto'])) {
					echo "<img src=\"imagens/" . $empresa['foto'] . "\"  width=\"300px\"  height=\"300px\">";
				} else {
					echo "<img src=\"imagens/SemImagem.png\" class\"card-img-top\" width=\"300px\"  height=\"300px\">";
				}
				?>
			

			<div class="col-4">
				<h2 style=" color: #242e8c;">empresa
					<?php echo $empresa['nome']; ?>
				</h2>
			</div>

			<dl class="dl-horizontal">
				<dt>Endereço:</dt>
				<dd>
					<?php echo $empresa['endereço']; ?>
				</dd>

				<dt>Sobre a empresa:</dt>
				<dd>
					<?php echo $empresa['sobre']; ?>
				</dd>

			</dl>

			<div id="actions" class="row">
				<div class="col-md-12">
					<a href="<?php echo BASEURL; ?>agendamento/add.php?id=<?php echo $empresa['cnpj']; ?>"
						style="width: 150px;  background: rgb(0,163,180);background: linear-gradient(90deg, rgba(0,163,180,1) 0%, rgba(7,41,95,1) 76%); border: none;"
						class="btn btn-secondary">Agende já</a>
					<?php if (isset($_SESSION['id'])): ?>
						<a href="add_coment.php?cnpj=<?php echo $empresa['cnpj']; ?>" class="btn btn-default"><i
								class="fa-regular fa-comment"></i> Avalie esta empresa</a>
					<?php endif; ?>
					<a href="<?php echo BASEURL ?>index.php" class="btn btn-default"><i
							class="fa-solid fa-rotate-left"></i> Voltar</a>
				</div>
			</div>
			<h1>Avaliações dos Usuários</h1>
			<?php

			// Recuperar as avaliações do banco de dados
			$query_avaliacoes = "SELECT id, qtd_estrela, mensagem, id_usuario , created
										FROM avaliacoes
										WHERE id_empresa = '$cnpj' 
										ORDER BY created DESC";
			// Preparar a QUERY
			$conn = new pdo("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
			$result_avaliacoes = $conn->prepare($query_avaliacoes);

			// Executar a QUERY
			$result_avaliacoes->execute();

			// Percorrer a lista de registros recuperada do banco de dados
			while ($row_avaliacao = $result_avaliacoes->fetch(PDO::FETCH_ASSOC)) {
				//var_dump($row_avaliacao);
			
				// Extrair o array para imprimir pelo nome do elemento do array
				extract($row_avaliacao);
				$id = $row_avaliacao['id_usuario'];
				$name = get_tutor_name($id);
				echo "<p>Usuário: $name</p>";

				// Criar o for para percorrer as 5 estrelas
				for ($i = 1; $i <= 5; $i++) {

					// Acessa o IF quando a quantidade de estrelas selecionadas é menor a quantidade de estrela percorrida e imprime a estrela preenchida
					if ($i <= $qtd_estrela) {
						echo '<i class="estrela-preenchida fa-solid fa-star"></i>';
					} else {
						echo '<i class="estrela-vazia fa-solid fa-star"></i>';
					}
				}

				echo "<p> $mensagem</p>";
				$d = new Datetime($created);
				?>
				<p>Comentado em:
					<?php echo FormataData($created); ?>
				</p>
				<hr>
			<?php } ?>
		</div>
	</div>
</div>

<?php include(FOOTER_TEMPLATE);
ob_end_flush(); ?>