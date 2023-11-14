<?php 
ob_start();
include('../protecao/protect.php');
  require_once('functions.php'); 
  add();
?>

<?php include_once(HEADER_TEMPLATE); ?>


<div style="background-color: #00a4b4; border-radius: 15px; margin-top:35px">
  <form action="add.php" enctype="multipart/form-data" method="post" style="padding: 20px">
    <h2>Novo pet</h2>
    <div class="row">
      <div class="form-group col-md-6">
        <label for="modelo">Nome do pet</label>
        <input type="text" class="form-control" name="pet['nome']">
      </div>
      <div class="form-group col-md-2">
      <label for="marca">Tipo do pet</label>
        <select  class="form-control" name="pet['tipo']">
          <option value="Cachorro">Cachorro</option>
          <option value="Gato">Gato</option>
        </select>
      </div>
      <div class="form-group col-md-2">
        <label for="marca">Sexo</label>
        <select  class="form-control" name="pet['sexo']">
          <option value="Macho">Macho</option>
          <option value="Femea">Fêmea</option>
        </select>
      </div>
      <div class="form-group col-md-2">
        <label for="ano">Raça</label>
        <input type="text" class="form-control" name="pet['raca']">
      </div>
      <div class="form-group col-md-3">
        <label for="datacad">Data de nascimento</label>
        <input type="date" class="form-control" name="pet['datanasc']">
      </div>
      <div class="form-group col-md-7">
        <label for="foto">Foto</label>
        <input type="file" class="form-control" id="foto" name="foto">
      </div>
      <div class="form-group col-md-2">
          <label for="pre">Pré-vizualização:</label>
          <img class="form-control shadow p-2 mb-2 bg-body rounded" id="imgPreview" src="imagens/SemImagem.png" alt="pic">
      </div>
    </div>
    <div id="actions" class="row">
      <div class="col-md-12">
        <button type="submit" class="btn btn-secondary">Salvar</button>
        <a href="index.php" class="btn btn-light">Cancelar</a>
      </div>
    </div>
  </form>
</div>   
<?php include(FOOTER_TEMPLATE); 
ob_end_flush();?>
<script>
  $(document).ready(() =>{
  $("#foto").change(function () {
    const file = this.files[0];
    if (file) {
      let reader = new FileReader();
      reader.onload = function (event) {
        $("#imgPreview").attr("src", event.target.result);
      };
      reader.readAsDataURL(file);
  
    }
  });
});
</script>