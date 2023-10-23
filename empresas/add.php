<?php 
ob_start();
// include('../protecao/protect.php');
  require_once('functions.php'); 
  add();
?>

<?php include(HEADER_TEMPLATE); ?>


<div style="background-color: #00a4b4; border-radius: 15px; margin-top:35px">
  <form action="add.php" enctype="multipart/form-data" method="post" style="padding: 20px">
    <h2>Novo Pet Shop</h2>
    <div class="row">
      <div class="form-group col-md-6">
        <label for="modelo">Nome da empresa</label>
        <input type="text" class="form-control" name="empresa['nome']">
      </div>
      <div class="form-group col-md-2">
        <label for="marca">Telefone</label>
        <input type="text" class="form-control" name="empresa['Telefone']">
      </div>
      <div class="form-group col-md-2">
        <label for="marca">Endereço</label>
        <input type="text" class="form-control" name="empresa['endereço']">
      </div>
      <div class="form-group col-md-2">
        <label for="ano">Preço do banho</label>
        <input type="number" class="form-control" name="empresa['precoBanho']">
      </div>
      <div class="form-group col-md-3">
        <label for="datacad">Preço Tosa</label>
        <input type="number" class="form-control" name="empresa['precoTosa]">
      </div>
      <div class="form-group col-md-3">
        <label for="datacad">Sobre o PetShop</label>
        <input type="text" style="width:500px;height:100px;" class="form-control" name="empresa['sobre']"  max="100" >
        
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
        <a href="<?php echo BASEURL; ?>" class="btn btn-light">Cancelar</a>
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