<?php
ob_start();
require_once "config.php";
require_once DBAPI;
$db = open_database();
require_once('./functions.php');
index();
$tabela = 'avaliacoes';
$coluna = 'qtd_estrela';
include_once(HEADER_TEMPLATE);
?>
<style>
	td,
	th {
		color: #FFF;
	}

	label {
		align: left
	}

	.card {
		background-color: transparent;
	}

	h2 {
		color: #07295F;
	}
</style>

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

        <img
          class="person"
          src="<?php echo BASEURL?>images/person.png"
          alt="Mulher com cachorro"
        />
      </section>
      <section class="empresas">
        <h2 class="titulo">Conheça nossos petshops</h2>
		<form name="Filtro" method="post" action="index.php">
				<div class="row">
					<div class="form-group col-md-3">
						<label for="cidade">Estado</label>
						<select id="estadoSelect" class="form-select" maxlength="80" name="estado"
							onclick="atualizarCidades()" required>
							<option value="São Paulo">São Paulo</option>
							<option value="Rio de Janeiro">Rio de janeiro</option>
						</select>
					</div>
					<div class="form-group col-md-3">
						<label for="cidade">Cidade</label>
						<select id="cidadeSelect" class="form-select" maxlength="80" name="cidade"
							onclick="atualizarBairros()"></select>
					</div>
					<div class="form-group col-md-3">
						<label for="cidade">Bairro</label>
						<select id="bairroSelect" class="form-select" maxlength="80" name="bairro"></select>
						
					</div>
					<div class="form-group col-md-3" style="margin-top: 44px;">
						<button type="submit" class="btn btn-secondary"><i class='fas fa-search'></i> Filtrar</button>
					</div>
				</div>
			</form>
        <ul class="container-empresas">
			
		  <?php if ($empresas): ?>
					<?php foreach ($empresas as $empresa): ?>

						
							<a href="./petshops/view.php?cnpj=<?php echo $empresa['cnpj']; ?>">
								<li class="empresa-info">
							
									<?php
									if (!empty($empresa['foto'])) {
										echo "<img src=\"./petshops/imagens/" . $empresa['foto'] . "\" class=\"empresa-img\">";
									} else {
										echo "<img src=\"./petshops/imagens/SemImagem.png\" class=\"empresa-img\">";
									}
									$cnpj = base64_encode($empresa['cnpj']);
									?>
									<div class="data">
										<span class="nome-empresa"><?php echo $empresa['nome']; ?></span>
										<div class="info-nota">
											<img src="<?php echo BASEURL?>images/icons/star.svg" alt="" />
											<?php
												$cnpj = $empresa['cnpj'];
												$media = calcularMedia(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, $tabela, $coluna, $cnpj);
											?>
											<span class="nota"><?php echo $media ?></span>
										</div>
									</div>
								</li>
							</a>
						
					<?php endforeach; ?>
				<?php else: ?>
					<p>TEM nada KKKKKKKKKKKKKK</p>
				<?php endif; ?>
       
        </ul>
      </section>
      
    </main>

<?php
include(FOOTER_TEMPLATE);
// ob_end_flush();
?>
<script>
	function atualizarCidades() {
		var cidadeSelect = document.getElementById('cidadeSelect');
		var estadoSelecionado = document.getElementById('estadoSelect').value;

		// Limpar todas as opções do select
		cidadeSelect.innerHTML = '';

		if (estadoSelecionado === 'São Paulo') {
			// Adicionar opções de raça para cachorro
			var cidadesSP = ['Sorocaba', 'Votorantim'];
			for (var i = 0; i < cidadesSP.length; i++) {
				var option = document.createElement('option');
				option.value = cidadesSP[i];
				option.text = cidadesSP[i];
				cidadeSelect.appendChild(option);
			}
		} else if (estadoSelecionado === 'Rio de Janeiro') {
			var bairrosVO = ['Rio de Janeiro'];
			for (var i = 0; i < bairrosVO.length; i++) {
				var option = document.createElement('option');
				option.value = bairrosVO[i];
				option.text = bairrosVO[i];
				cidadeSelect.appendChild(option);
			}
		}
	}
	function atualizarBairros() {
		var bairroSelect = document.getElementById('bairroSelect');
		var cidadeSelecionada = document.getElementById('cidadeSelect').value;
		var EstadoSelecionado = document.getElementById('estadoSelect').value;
		// Limpar todas as opções do select
		bairroSelect.innerHTML = '';


		if (EstadoSelecionado === 'São Paulo') {
			if (cidadeSelecionada === 'Sorocaba') {
				// Adicionar opções de raça para cachorro
				var bairrosSO = ['Campolim', 'São Bento'];
				for (var i = 0; i < bairrosSO.length; i++) {
					var option = document.createElement('option');
					option.value = bairrosSO[i];
					option.text = bairrosSO[i];
					bairroSelect.appendChild(option);
				}
			}
			else if (cidadeSelecionada === 'Votorantim') {
				var bairrosVO = ['Avenida Principal'];
				for (var i = 0; i < bairrosVO.length; i++) {
					var option = document.createElement('option');
					option.value = bairrosVO[i];
					option.text = bairrosVO[i];
					bairroSelect.appendChild(option);
				}
			}
		} else if (EstadoSelecionado === 'Rio de Janeiro') {
			if (cidadeSelecionada === 'Rio de Janeiro') {
				// Adicionar opções de raça para cachorro
				var bairrosRJ = ['Copacabana', 'Rocinha'];
				for (var i = 0; i < bairrosRJ.length; i++) {
					var option = document.createElement('option');
					option.value = bairrosRJ[i];
					option.text = bairrosRJ[i];
					bairroSelect.appendChild(option);
				}
			}
		}
	}
</script>