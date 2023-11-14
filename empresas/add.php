<?php 
ob_start();
// include('../protecao/protect.php');
  require_once('functions.php'); 
  add();
?>

<?php include_once(HEADER_TEMPLATE); ?>


<div style=" margin-top:35px">
  <form action="add.php" enctype="multipart/form-data" method="post" style="padding: 20px">
    <h2  style="padding-left: 800px">Novo Pet Shop</h2>
    <div class="row">
    <div class="form-group col-md-12" style="width:200px;">
					<label for="CNPJ"> CNPJ</label>
					<input type="text" class="form-control"name="empresa['cnpj']" id="CNPJ" oninput="formatCNPJ(this)" maxlength="18" required>
				</div>
      <div class="form-group col-md-6">
        <label for="modelo">Nome da empresa</label>
        <input type="text" class="form-control" name="empresa['nome']">
      </div>
      <div class="form-group col-md-4">
        <label for="marca">Telefone</label>
        <input type="text" class="form-control" oninput="formatTelefone(this)" maxlength="14"  name="empresa['Telefone']" required>
      </div>
      <div class="form-group col-md-2">
        <label for="marca">Estado</label>
        <input type="text" class="form-control" name="empresa['estado']">
      </div>
      <div class="form-group col-md-2">
        <label for="marca">Cidade</label>
        <input type="text" class="form-control" name="empresa['cidade']">
      </div>
      <div class="form-group col-md-2">
        <label for="marca">Bairro</label>
        <input type="text" class="form-control" name="empresa['bairro']">
      </div>
      <div class="form-group col-md-2">
        <label for="marca">Endereço</label>
        <input type="text" class="form-control" name="empresa['endereço']">
      </div>
      <div class="form-group col-md-2">
        <label for="ano">Preço do banho</label>
        <input type="text" class="form-control" oninput="formatDinheiro(this)" name="empresa['precoBanho']" maxlength="5">
      </div>
      <div class="form-group col-md-3">
        <label for="datacad">Preço Tosa</label>
        <input type="text" class="form-control" oninput="formatDinheiro(this)" name="empresa['precoTosa]" maxlength="5">
      </div>
      <div class="form-group col-md-4">
        <label for="datacad">Sobre o PetShop</label>
        <input type="text" style="width:500px;height:100px;" class="form-control" name="empresa['sobre']"  max="100" > 
      </div>
      <div class="form-group col-md-4">
        <label for="foto">Foto</label>
        <input type="file" class="form-control" id="foto" name="foto">
      </div>
      <div class="form-group col-md-1">
          <label for="pre">Pré-vizualização:</label>
          <img class="form-control shadow p-2 mb-2 bg-body rounded" id="imgPreview" src="imagens/SemImagem.png" alt="pic">
      </div>
    </div>
    <div id="actions" class="row">
      <div class="col-md-12" style="padding-left: 650px">
        <button type="submit" class="btn btn-secondary" style="width: 640px;">Salvar</button>
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

    function formatCNPJ(input) {
      // Remove todos os caracteres não numéricos
      let value = input.value.replace(/\D/g, "");
      
      // Adiciona a máscara
      if (value.length >= 2) {
        value = value.substring(0, 2) + "." + value.substring(2);
      }
      if (value.length >= 6) {
        value = value.substring(0, 6) + "." + value.substring(6);
      }
      if (value.length >= 10) {
        value = value.substring(0, 10) + "/" + value.substring(10);
      }
      if (value.length >= 15) {
        value = value.substring(0, 15) + "-" + value.substring(15);
      }

      // Define o valor formatado no input
      input.value = value;
    }

    function formatDinheiro(input) {
      // Remove todos os caracteres não numéricos
      let value = input.value.replace(/\D/g, "");
      let formattedValue = "";

      // Adiciona a máscara
      if (value.length >= 0) {
       
        formattedValue = "R$" + value;
      } 

  

      // Define o valor formatado no input
      input.value =  formattedValue;
    }
    
    function formatTelefone(input) {
      let value = input.value.replace(/\D/g, ""); // Remove todos os caracteres não numéricos
      let formattedValue = "";

      if (value.length <= 2) {
        formattedValue = "(" + value;
      } else if (value.length <= 6) {
        formattedValue = "(" + value.substring(0, 2) + ") " + value.substring(2);
      } else if (value.length <= 10) {
        formattedValue = "(" + value.substring(0, 2) + ") " + value.substring(2, 6) + "-" + value.substring(6);
      } else {
        formattedValue = "(" + value.substring(0, 2) + ") " + value.substring(2, 6) + "-" + value.substring(6, 10);
      }

      // Define o valor formatado no input
      input.value = formattedValue;
    }
</script>