<?php 
ob_start();
include('../protect.php');
  require_once('functions.php'); 
  add();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Novo carro</h2>

<form action="add.php"  enctype="multipart/form-data" method="post">
  <hr />
  <div class="row">
    <div class="form-group col-md-7">
      <label for="modelo">Modelo</label>
      <input type="text" class="form-control" name="carro['modelo']">
    </div>



   <div class="form-group col-md-3">
      <label for="marca">Marca</label>
      <input type="text" class="form-control" name="carro['marca']">
    </div>



   <div class="form-group col-md-2">
	  
      <label for="ano">Ano</label>
      <input type="number" class="form-control" name="carro['ano']">
    </div>
  </div>
  <div class="row">
    <div class="form-group col-md-5">
      <label for="datacad">Data de Cadastro</label>
      <input type="date" class="form-control" name="carro['datacad']"disabled>
    </div>
	<div class="form-group col-md-5">
      <label for="foto">Foto</label>
      <input type="file" class="form-control" id="foto" name="foto">
    </div>
              <div class="form-group col-md-2">
                  <label for="pre">Pré-vizualização:</label>
                  <img class="form-control shadow p-2 mb-2 bg-body rounded" id="imgPreview" src="imagens/SemImagem.png" alt="pic">
              </div>
            </div>
  </div>
  <div id="actions" class="row">
		<div class="col-md-12">
		  <button type="submit" class="btn btn-secondary">Salvar</button>
		  <a href="index.php" class="btn btn-light">Cancelar</a>
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