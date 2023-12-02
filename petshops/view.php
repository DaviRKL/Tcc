<?php
ob_start();
require_once('functions.php');
view($_GET['cnpj']);
$cnpj = $_GET['cnpj'];
$tabela = 'avaliacoes';
$coluna = 'qtd_estrela';
?>
<?php include_once(HEADER_TEMPLATE); ?>
<section class="meus-pets center">

</section>

<div class="container" style="padding-bottom:20px">
	<div class="empresa-selecionada">
		<div class="lalala">
			<div class="empresa-foto">
				<?php
				if (!empty($empresa['foto'])) {
					echo "<img src=\"imagens/" . $empresa['foto'] . "\"  width=\"300px\"  height=\"300px\">";
				} else {
					echo "<img src=\"imagens/SemImagem.png\" class\"card-img-top\" width=\"300px\"  height=\"300px\">";
				}
				?>
			</div>

			<div class="empresa-info-lateral">
				<div class="col-4">
					<h2 class="empresa-nome">
						<?php echo $empresa['nome']; ?>
					</h2>
				</div>

				<div class="empresa-star">
					<div class="estrela">
						<img src="<?php echo BASEURL ?>images/icons/star.svg" alt="" />
					</div>
					<?php
					$cnpj = $empresa['cnpj'];
					$media = calcularMedia(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, $tabela, $coluna, $cnpj);
					?>
					<p class="nota-empresa"><?php echo $media?></p>
				</div>

				<div class="empresa-telefone">
					<div class="telefone">
						<img src="<?php echo BASEURL ?>images/icons/telefone.svg" alt="" />
					</div>

					<p class="telefone-info">
						<?php echo $empresa['telefone']; ?>
					</p>
				</div>

				<dl class="endereco">
					<div class="endereco-icone">
						<img src="<?php echo BASEURL ?>images/icons/localizacao.svg" alt="" />
					</div>

					<div class="endereco-escrito">
						<p class="rua">Endereço:</p>
						<dd class="endereco-banco">
							<?php echo $empresa['endereço']; ?>
						</dd>
					</div>
				</dl>

				<div id="actions" class="botao">
					<a href="<?php echo BASEURL; ?>agendamento/add.php?id=<?php echo $empresa['cnpj']; ?>"
						style="background: rgb(0,163,180); background: linear-gradient(90deg, rgba(0,163,180,1) 0%, rgba(7,41,95,1) 76%); width: 210px; border: none;border-radius: 15px;"
						class="btn btn-secondary">Agende já</a>
					<?php if (isset($_SESSION['id'])): ?>

						<a href="add_coment.php?cnpj=<?php echo $empresa['cnpj']; ?>"
							style="background: rgb(0,163,180);
								background: linear-gradient(90deg, rgba(0,163,180,1) 0%, rgba(7,41,95,1) 76%);border: none; width: 230px; border-radius: 15px;" class="btn btn-default">Avalie essa
							empresa</a>
					<?php endif; ?>
				</div>

			</div>

		</div>
	</div>

	<div class="parte-inferior">
		<div class="empresa-info-abaixo">
			<div class="sobre-empresa">
				<p class="titulo-sobre">Sobre</p>
				<p class="sobre-info">
					<?php echo $empresa['sobre']; ?>
				</p>



				<h1 class="avaliacao-titulo">Avaliações</h1>
			</div>

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