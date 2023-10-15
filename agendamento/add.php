<?php 
ob_start();
include('../protecao/protect.php');
  require_once('functions.php'); 
  add();
  get_pet();
  get_empresa();
?>

<?php include(HEADER_TEMPLATE); ?>


<div style="background-color: #00a4b4; border-radius: 15px; margin-top:30px">

<form action="add.php" enctype="multipart/form-data" id="agendamentoForm" method="post" style="padding: 20px">
<h2>Novo agendamento</h2>
<p>*O pagamento deverá ser efetuado na loja, com dinheiro ou cartão*</p>
  <div class="row">
    <div class="form-group col-md-6">
      <label for="modelo">Selecione o pet</label>
      <select  class="form-control" name="agendamento['id_pet']">
        <?php if ($pets) : ?>
          <?php foreach ($pets as $pet) : ?>
            <option value="<?php echo $pet['id']?>"><?php echo $pet['nome'];?></option>
          <?php endforeach; ?>
        <?php else : ?>
          <p>TEM nada KKKKKKKKKKKKKK</p>	
        <?php endif; ?>
      </select>
    </div>
   <div class="form-group col-md-2">
      <label for="marca">Selecione a loja</label>
      <select  class="form-control" name="agendamento['id_empresa']">
      <?php if ($empresas) : ?>
				<?php foreach ($empresas as $empresa) : ?>
            <option value="<?php echo $empresa['cnpj']?>"><?php echo $empresa['nome'];?></option>
          <?php endforeach; ?>
        <?php else : ?>
          <p>TEM nada KKKKKKKKKKKKKK</p>	
        <?php endif; ?>
      </select>
   </div>
    <div class="form-group col-md-4">
      <label for="marca">Selecione os serviços</label>
        <select class="form-control" name="agendamento['servico']">
          <option value="Banho e Tosa">Banho e Tosa</option>
          <option value="Banho">Banho</option>
        </select>
    </div>
  <div class="row">
    <div class="form-group col-md-3">
      <label for="datacad">Data</label>
      <input type="date" class="form-control" name="agendamento['data']" id="data" >
    </div>
    <div class="form-group col-md-3">
      <label for="datacad">Horário </label>
      <select type="time" class="form-control" name="agendamento['horario']" id="horario">
        <option value="09:00">09:00</option>
        <option value="09:30">09:30</option>
        <option value="10:00">10:00</option>
        <option value="10:30">10:30</option>
        <option value="11:00">11:00</option>
        <option value="11:30">11:30</option>
        <option value="12:00">12:00</option>
        <option value="12:30">12:30</option>
        <option value="13:00">13:00</option>
        <option value="13:30">13:30</option>
        <option value="14:00">14:00</option>
        <option value="14:30">14:30</option>
        <option value="15:00">15:00</option>
        <option value="15:30">15:30</option>
        <option value="16:00">16:00</option>
        <option value="16:30">16:30</option>
        <option value="17:00">17:00</option>
        <option value="17:30">17:30</option>
        
      </select>
      <span id="disponibilidade"></span>
    </div>
  <div id="actions" class="row">
		<div class="col-md-12">
    <button type="submit" class="btn btn-secondary" value="Agendar" disabled>Salvar</button>
		  <a href="index.php" class="btn btn-light">Cancelar</a>
		</div>
  </div>
</form>
</div>   
<?php include(FOOTER_TEMPLATE); 
ob_end_flush();?>


<script>
document.addEventListener("DOMContentLoaded", function () {
  const horarioSelect = document.getElementById("horario");
  const salvarButton = document.querySelector('button[type="submit"]');
  const disponibilidadeSpan = document.getElementById("disponibilidade");

  horarioSelect.addEventListener("change", function () {
    const selectedDate = document.getElementById("data").value;
    const selectedHorario = this.value;

    // Fazer a solicitação AJAX
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "verificar_agendamentos.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
      if (xhr.status === 200) {
        const response = JSON.parse(xhr.responseText);
        if (response) {
          salvarButton.disabled = true;
          disponibilidadeSpan.innerText = "Horário indisponível.";
        } else {
          salvarButton.disabled = false;
          disponibilidadeSpan.innerText = "";
        }
      }
    };

    xhr.send(`data=${selectedDate}&horario=${selectedHorario}`);
  });
});

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