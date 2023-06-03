<?php
ob_start();
include('../protect.php');
  require_once('functions.php');
  edit();
  include(HEADER_TEMPLATE);
  
  function CriaData($data){
      $d = new DateTime ($data);
      return $d->format ("Y-m-d");  
  }  
  
  function FormataData($data){
      $da = new DateTime ($data);
      return $da->format ("d-m-Y"); 
      }
?>



<h2>Atualizar pet</h2>



<form action="edit.php?  id=<?php echo $pet['id']; ?>" method="post" enctype="multipart/form-data">
  <hr />
  <div class="row">
    <div class="form-group col-md-7">
      <label for="modelo">Modelo</label>
      <input type="text" class="form-control" name="pet['nome']" value="<?php echo $pet['nome']; ?>">
    </div>



   <div class="form-group col-md-3">
      <label for="marca">Marca</label>
      <input type="text" class="form-control" name="pet['tipo']" value="<?php echo $pet['tipo']; ?>">
    </div>



   <div class="form-group col-md-2">
      <label for="ano">Ano</label>
      <input type="text" class="form-control" name="pet['sexo']" value="<?php echo $pet['sexo']; ?>">
    </div>
  </div>
  <div class="form-group col-md-2">
      <label for="ano">Ano</label>
      <input type="text" class="form-control" name="pet['raca']" value="<?php echo $pet['sexo']; ?>">
    </div>
  </div>
  <div class="row">
    <div class="form-group col-md-5">
      <label for="datacad">Data de Cadastro</label>
      <input type="text" class="form-control" name="pet['datanasc']" value="<?php echo FormataData($pet['datanasc']); ?>" disabled>
     
    </div>
    <div class="row">
        <?php
            $foto = "";
            if (empty($pet['foto'])){
              $foto = 'SemImagem.png';
            }else{
              $foto = $pet['foto'];
            }
        ?>
      <div class="form-group col-md-4">
          <label for="campo1">Foto</label>
          <input type="file" class="form-control" name="foto" id="foto" value="imagens/<?php echo $foto ?>">
      </div>
      <div class="form-group col-md-2">
          <label for="campo3">Pré-visualização:</label>
          <img class="form-control shadow p-2 mb-2 bg-body rounded" id="imgPreview" src="imagens/<?php echo $foto ?>" alt="Foto do pet">
      </div>
    </div>
  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-secondary"><i class="fa-solid fa-user-pen"></i> Salvar</button>
      <a href="index.php" class="btn btn-default"><i class="fa-solid fa-rotate-left"></i>Cancelar</a>
    </div>
  </div>
</form>

  


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