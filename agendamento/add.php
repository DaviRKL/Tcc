<?php
ob_start();
include('../protecao/protect.php');
require_once('functions.php');
add();
get_pet();
get_empresa();
?>

<?php include_once(HEADER_TEMPLATE); ?>


<section class="agendamentos">
  <div class="formulario">
    <form action="add.php" enctype="multipart/form-data" id="agendamentoForm" method="post" style="padding: 20px">
      <h2 class="titulo">Novo agendamento</h2>
      <p class="observacao">*O pagamento deverá ser efetuado na loja, com dinheiro ou cartão*</p>

      <div class="row">
        <div class="form-group col-lg-6">
          <label class="texto" for="modelo">Selecione o pet</label>
          <select class="form-select" name="agendamento['id_pet']" id="petSelect">
            <?php if ($pets): ?>
              <?php foreach ($pets as $pet): ?>
                <option value="<?php echo $pet['id'] ?>" data-image="../pet/imagens/<?php echo $pet['foto']; ?>">
                  <?php echo $pet['nome']; ?>
                </option>
              <?php endforeach; ?>
            <?php else: ?>
              <p>TEM nada KKKKKKKKKKKKKK</p>
            <?php endif; ?>
          </select>
        </div>
        <div class="form-group col-lg-2">
          <label class="texto1" for="marca">Selecione a loja</label>
          <select class="form-select" name="agendamento['id_empresa']" id="empresaSelect">
            <?php if ($empresas): ?>
              <?php foreach ($empresas as $empresa): ?>
                <option value="<?php echo $empresa['cnpj'] ?>"
                  data-image="../petshops/imagens/<?php echo $empresa['foto']; ?>">
                  <?php echo $empresa['nome']; ?>
                </option>
              <?php endforeach; ?>
            <?php else: ?>
              <p>TEM nada KKKKKKKKKKKKKK</p>
            <?php endif; ?>
          </select>
        </div>
        <div class="form-group col-lg-4">
          <label class="texto2" for="marca">Selecione os serviços</label>

          <select class="form-select" name="agendamento['servico']">
            <option value="Banho e Tosa">Banho e Tosa</option>
            <option value="Banho">Banho</option>
          </select>
        </div>
        <div class="row">
          <div class="form-group col-lg-3">
            <label class="texto3" for="datacad">Data</label>
            <input type="date" class="form-control" name="agendamento['data']" id="data">
          </div>
          <div class="form-group col-lg-3">
            <label class="texto4" for="datacad">Horário </label>
            <select type="time" class="form-select" name="agendamento['horario']" id="horario">


            </select>
            <span id="disponibilidade"></span>
          </div>
          <div id="actions" class="row" style="margin-top: 10px">
            <div class="col-lg-12">
              <button type="submit" class="btn btn-secondary" id="salvar" value="Agendar" disabled>Salvar</button>
              <a href="index.php" class="btn btn-light">Cancelar</a>
            </div>
          </div>
    </form>
  </div>
  <?php include(FOOTER_TEMPLATE);
  ob_end_flush(); ?>

  <script src="<?php echo BASEURL ?>js/Preview/Previewfoto.js"></script>
  <script src="<?php echo BASEURL ?>js/agendamento/select2.js"></script>
  <script src="<?php echo BASEURL ?>js/agendamento/BuscaHoras.js"></script>
  <script src="<?php echo BASEURL ?>js/agendamento/DesabilitaDatas.js"></script>