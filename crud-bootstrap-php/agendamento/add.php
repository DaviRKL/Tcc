<?php 
ob_start();
include('../protect.php');
  require_once('functions.php'); 
  add();
?>

<?php include(HEADER_TEMPLATE); ?>


<div style="background-color: #00a4b4; border-radius: 15px; margin-top:20px">

<form action="add.php" enctype="multipart/form-data" method="post" style="padding: 20px">
<h2>Novo agendamento</h2>
<h5>*O pagamento deverá ser efetuado na loja, com dinheiro ou cartão*</h5>
  <div class="row">
    <div class="form-group col-md-6">
      <label for="modelo">Selecione o pet</label>
      <input type="text" class="form-control" name="agendamento['pet']">
    </div>
   <div class="form-group col-md-2">
      <label for="marca">Selecione a loja</label>
      <input type="text" class="form-control" name="agendamento['loja']">
    </div>

    <div class="form-group col-md-4">
      <label for="marca">Selecione os serviços</label>
      <input type="text" class="form-control" name="agendamento['servico']">
    </div>
  <div class="row">
    <div class="form-group col-md-3">
      <label for="datacad">Data</label>
      <input type="date" class="form-control" name="agendamento['data']">
    </div>
    <div class="form-group col-md-3">
      <label for="datacad">Horário </label>
      <input type="time" class="form-control" name="agendamento['horario']">
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