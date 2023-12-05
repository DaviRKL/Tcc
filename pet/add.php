<?php
ob_start();
include('../protecao/protect.php');
require_once('functions.php');
add();
?>

<?php include_once(HEADER_TEMPLATE); ?>





<section class="formulario">
  <div class="linhas">
    <section class="pets2">
      <h2 class="titulo">Adicionar novo pet</h2>
    </section>
    <form action="add.php" enctype="multipart/form-data" method="post" style="padding: 20px">
      <div class="row">
        <div class="form-group col-md-4">
          <label class="texto1" for="modelo">Nome do pet</label>
          <input type="text" class="form-control" name="pet['nome']">
        </div>
        <div class="form-group col-md-3">
          <label class="texto7" for="marca">Tipo do pet</label>
          <input class="form-check-input" type="radio" id="dog" name="pet['tipo']" value="Cachorro"
            onclick="atualizarRacas()"> Cachorro</input>
          <input class="form-check-input" style="margin-left: 20px;" type="radio" id="cat" name="pet['tipo']"
            value="Gato" onclick="atualizarRacas()"> Gato</input>
        </div>
        <div class="form-group col-md-2">
          <label class="texto2" for="ano">Raça</label>
          <select class="form-select" name="pet['raca']" id="racaSelect"></select>
        </div>
        <div class="form-group col-md-2">
          <label class="texto3" for="marca">Sexo</label>
          <select class="form-select" name="pet['sexo']">
            <option value="Macho">Macho</option>
            <option value="Femea">Fêmea</option>
          </select>
        </div>
        <div class="form-group col-md-3">
          <label class="texto4" for="datacad">Data de nascimento</label>
          <input type="date" class="form-control" name="pet['datanasc']">
        </div>
        <div class="form-group col-md-7">
          <label class="texto5" for="foto">Foto</label>
          <input type="file" class="form-control" id="foto" name="foto">
        </div>
        <div class="form-group col-md-2">
          <label class="texto6" for="pre">Pré-vizualização:</label>
          <img class="form-control shadow p-2 mb-2 bg-body rounded" id="imgPreview" src="imagens/SemImagem.png"
            alt="pic">
        </div>
      </div>
      <div id="actions" class="row">
        <div class="col-md-12" style="padding-bottom:50px;">
          <button type="submit" class="btn btn-secondary">Salvar</button>
          <a href="index.php" class="btn btn-light">Cancelar</a>
        </div>
      </div>
  </div>
  </form>
</section>



<?php include(FOOTER_TEMPLATE);
ob_end_flush(); ?>
<script src="<?php echo BASEURL?>js/Preview/Previewfoto.js"></script>
<script src="<?php echo BASEURL?>js/pet/select2.js"></script>
<script src="<?php echo BASEURL?>js/pet/PreencheRacas.js"></script>