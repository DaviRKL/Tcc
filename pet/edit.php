<?php
ob_start();
include('../protecao/protect.php');
  require_once('functions.php');
  edit();
  include_once(HEADER_TEMPLATE);
  
  function CriaData($data){
      $d = new DateTime ($data);
      return $d->format ("Y-m-d");  
  }  
  

?>
<style>
  .L, h2{
    color: #102447;
  }
</style>
<div style="padding-top: 20px; padding-left:30px">
  <h2>Atualizar pet</h2>
  <form action="edit.php?  id=<?php echo $pet['id']; ?>" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="form-group col-md-3">
        <label for="modelo" class="L">Nome do Pet</label>
        <input type="text" class="form-control" name="pet['nome']" value="<?php echo $pet['nome']; ?>">
      </div>
      <div class="form-group col-md-3">
          <label for="marca"  class="L">Tipo do pet</label>
          <input type="text" class="form-control" name="pet['tipo']" value="<?php echo $pet['tipo']; ?>">
        </div>
      <div class="form-group col-md-2">
          <label for="ano"  class="L">Sexo</label>
          <input type="text" class="form-control" name="pet['sexo']" value="<?php echo $pet['sexo']; ?>">
      </div>
      <div class="form-group col-md-2">
          <label for="ano"  class="L">Raça</label>
          <input type="text" class="form-control" name="pet['raca']" value="<?php echo $pet['raca']; ?>">
      </div>
      <div class="form-group col-md-4">
        <label for="datacad"  class="L">Data de nascimento</label>
        <input type="text" class="form-control" name="pet['datanasc']" value="<?php echo FormataData($pet['datanasc']); ?>" disabled>
      </div>
          <?php
              $foto = "";
              if (empty($pet['foto'])){
                $foto = 'SemImagem.png';
              }else{
                $foto = $pet['foto'];
              }
          ?>
        <div class="form-group col-md-4">
            <label for="campo1"  class="L">Foto</label>
            <input type="file" class="form-control" name="foto" id="foto" value="imagens/<?php echo $foto ?>">
        </div>
        <div class="form-group col-md-2">
            <label for="campo3"  class="L">Pré-visualização:</label>
            <img class="form-control shadow p-2 mb-2 bg-body rounded" id="imgPreview" src="imagens/<?php echo $foto ?>" alt="Foto do pet">
        </div>
      
    <div id="actions" class="row">
      <div class="col-md-12">
        <button type="submit" class="btn btn-secondary" style="width: 600px; padding-left: 20px; background-color:  #0ACCA7"><i class="fa-solid fa-user-pen"></i> Salvar</button>
        <a href="index.php" class="btn btn-default" style="width: 600px; padding-left: 20px;"><i class="fa-solid fa-rotate-left"></i>Cancelar</a>
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