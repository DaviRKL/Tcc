<?php
ob_start();
require_once "config.php";
require_once DBAPI;
$db = open_database();
require_once('./functions.php');
require_once('./conexao.php');
index();
$tabela = 'avaliacoes';
$coluna = 'qtd_estrela';
include_once(HEADER_TEMPLATE);
?>


<body>

	<section class="bem-vindo">
		<div class="conteudo">
			<p class="mensagem-bem-vindo">Seja bem vindo, aqui você conhece</p>
			<h1 class="titulo">As melhores opções para o seu pet</h1>
			<p class="descricao">
				Nós reunimos os melhores Petshops da sua região para você ter maior
				facilidade de agendar o banho e tosa de seu pet. Basta cadastrar seu
				pet e agendar em uma das empresas abaixo.
			</p>
		</div>

		<img class="person" src="<?php echo BASEURL ?>images/person.png" alt="Mulher com cachorro" />
	</section>

	<section class="empresas" style="margin-bottom:50px">
		<h2 class="titulo">Conheça nossos petshops</h2>
		<form name="Filtro" method="post" action="index.php">
			<div class="row">
				<div class="form-group col-md-3">
					<label for="cidade" style="max-width: 55px">Estado</label>
					<select id="estadoSelect" class="form-select" maxlength="80" name="estado"
						onclick="atualizarCidades()" required>
						
						
						<option value="Acre ">Acre</option>
						<option value="Alagoas ">Alagoas</option>
						<option value="Amapá ">Amapá</option>
						<option value="Amazonas">Amazonas</option>
						<option value="Bahia">Bahia </option>
						<option value="Ceará">Ceará </option>
						<option value="Distrito Federal">Distrito Federal</option>
						<option value="Espírito Santo">Espírito Santo</option>
						<option value="Goiás">Goiás</option>
						<option value="Maranhão">Maranhão</option>
						<option value="Mato Grosso">Mato Grosso</option>
						<option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
						<option value="Minas Gerais">Minas Gerais</option>
						<option value="Pará">Pará</option>
						<option value="Paraíba">Paraíba</option>
						<option value="Paraná">Paraná</option>
						<option value="Pernambuco">Pernambuco</option>
						<option value="Piauí">Piauí</option>
						<option value="Rio de Janeiro">Rio de janeiro</option>
						<option value="Rio Grande do Norte">Rio Grande do Norte</option>
						<option value="Rio Grande do Sul">Rio Grande do Sul</option>
						<option value="Rondônia">Rondônia</option>
						<option value="Roraima">Roraima</option>
						<option value="Santa Catarina">Santa Catarina</option>
						<option value="São Paulo">São Paulo</option>
						<option value="Sergipe">Sergipe</option>
						<option value="Tocantins">Tocantins</option>
					</select>
				</div>
				<div class="form-group col-md-3">
					<label for="cidade" style="max-width: 60px">Cidade</label>
					<select id="cidadeSelect" class="form-select" maxlength="80" name="cidade"
						onclick="atualizarBairros()"></select>
				</div>
				<div class="form-group col-md-3">
					<label for="cidade" style="max-width: 40px">Bairro</label>
					<select id="bairroSelect" class="form-select" maxlength="80" name="bairro"></select>

				</div>
				<div class="form-group col-md-3" style="margin-top: 44px;">
					<button type="submit" class="btn btn-secondary"
						style="background: var(--Gradiente, linear-gradient(90deg, #00A3B4 3.36%, rgba(7, 41, 95, 0.96) 62.36%)); margin-bottom:50px" ><i
							class='fas fa-search'></i> Filtrar</button>
				</div>
			</div>
		</form>
		<ul id="id-ce" class="container-empresas">

			<?php if ($empresas): ?>
				<?php foreach ($empresas as $empresa): ?>


					<a href="./petshops/view.php?cnpj=<?php echo $empresa['cnpj']; ?>">
						<li class="empresa-info">
							<?php
							if (!empty($empresa['foto'])) {
								echo "<img src=\"./petshops/imagens/" . $empresa['foto'] . "\" class=\"empresa-img\">";
							} else {
								echo "<img src=\"./petshops/imagens/triste-capa.svg\" class=\"empresa-img\">";
							}
							$cnpj = base64_encode($empresa['cnpj']);
							?>
							<div class="data">
								<span class="nome-empresa">
									<?php echo $empresa['nome']; ?>
								</span>
								<div class="info-nota">
									<img src="<?php echo BASEURL ?>images/icons/star.svg" alt="" />
									<?php
									$cnpj = $empresa['cnpj'];
									$media = calcularMedia(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, $tabela, $coluna, $cnpj);
									?>
									<span class="nota">
										<?php echo $media ?>
									</span>
								</div>
							</div>
						</li>
					</a>

				<?php endforeach; ?>
			<?php else: ?>
				<p>Ainda não há Petshops para este endereço =(</p>
			<?php endif; ?>

		</ul>
	</section>
	<?php
	include(FOOTER_TEMPLATE);
	// ob_end_flush();
	?>
	<script src="./js/preenchefiltro.js"></script>

	