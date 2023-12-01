<?php
ob_start();
// include('../protecao/protect.php');
require_once('functions.php');
add();
?>

<?php include_once(HEADER_TEMPLATE); ?>

<section class="cadastro">
  <h2 class="titulo">Cadastre sua empresa</h2>
</section>

<section class="formulario">
  <div class="linhas">
    <form action="add.php" enctype="multipart/form-data" method="post" style="padding: 20px">
      <div class="row">
        <div class="form-group col-md-3">
          <label class="campo-empresa" for="modelo">Nome da empresa</label>
          <input type="text" class="form-control" name="empresa['nome']">
        </div>

        <div class="form-group col-md-2" style="width:200px;">
          <label class="campo-cnpj" for="campo1"> CNPJ</label>
          <input type="text" class="form-control" name="empresa[cnpj]" id="CNPJ" oninput="formatCNPJ(this)"
            maxlength="18" required>
        </div>

        <div class="form-group col-md-2">
          <label class="campo-telefone" for="marca">Telefone</label>
          <input type="text" class="form-control" oninput="formatTelefone(this)" maxlength="14"
            name="empresa['telefone']" required>
        </div>

        <div class="form-group col-md-4">
          <label class="campo-endereco" for="marca">Endereço</label>
          <input type="text" class="form-control" name="empresa['endereço']">
        </div>

        <div class="form-group col-md-1">
          <label class="campo-estado" for="marca">Estado</label>
          <input type="text" class="form-control" name="empresa['estado']">
        </div>

        <div class="form-group col-md-3">
          <label class="campo-cidade" for="marca">Cidade</label>
          <input type="text" class="form-control" name="empresa['cidade']">
        </div>

        <div class="form-group col-md-5">
          <label class="campo-bairro" for="marca">Bairro</label>
          <input type="text" class="form-control" name="empresa['bairro']">
        </div>

        <div class="form-group col-md-2">
          <label class="campo-precobanho" for="ano">Preço do banho</label>
          <input type="text" class="form-control" oninput="formatDinheiro(this)" name="empresa['precoBanho']"
            maxlength="5">
        </div>

        <div class="form-group col-md-2">
          <label class="campo-precotoca" for="datacad">Preço Tosa</label>
          <input type="text" class="form-control" oninput="formatDinheiro(this)" name="empresa['precoTosa]"
            maxlength="5">
        </div>

        <div class="form-group col-md-4">
          <label class="campo-sobre" for="datacad">Sobre o PetShop</label>
          <input type="text" class="form-control" name="empresa['sobre']" max="100">
        </div>

        <div class="form-group col-md-3">
          <label class="campo-foto" for="foto">Foto</label>
          <input type="file" class="form-control" id="foto" name="foto">
        </div>

        <div class="form-group col-md-2">
          <label class="campo-previzu" for="pre">Pré-vizualização:</label>
          <img class="form-control shadow p-2 mb-2 bg-body rounded" id="imgPreview" alt="pic">
        </div>

      </div>
      <div id="actions" class="row">
        <div class="col-md-12"
          style="display: flex;flex-direction: row;justify-content: center; align-items: center; padding-top: 15px">
          <button type="submit" class="btn btn-secondary" href="<?php echo BASEURL; ?>index.php"
            style="width: 300px; border-radius: 15px; background: var(--Gradiente, linear-gradient(90deg, #00A3B4 3.36%, rgba(7, 41, 95, 0.96) 62.36%)); ">Salvar</button>
        </div>
      </div>
    </form>
  </div>
</section>

<?php include(FOOTER_TEMPLATE);
ob_end_flush(); ?>
<script src="<?php echo BASEURL ?>js/Preview/Previewfoto.js"></script>
<script src="<?php echo BASEURL ?>js/empresas/FormataCampos.js"></script>