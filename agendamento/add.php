<?php 
ob_start();
include('../protecao/protect.php');
  require_once('functions.php'); 
  add();
  get_pet();
  get_empresa();
?>

<?php include_once(HEADER_TEMPLATE); ?>


<div style="background-color: #00a4b4; border-radius: 15px; margin-top:30px">

<form action="add.php" enctype="multipart/form-data" id="agendamentoForm" method="post" style="padding: 20px">
<h2>Novo agendamento</h2>
<p>*O pagamento deverá ser efetuado na loja, com dinheiro ou cartão*</p>
  <div class="row">
    <div class="form-group col-lg-6">
      <label for="modelo">Selecione o pet</label>
      <select  class="form-select" name="agendamento['id_pet']">
        <?php if ($pets) : ?>
          <?php foreach ($pets as $pet) : ?>
            <option value="<?php echo $pet['id']?>"><?php echo $pet['nome'];?></option>
          <?php endforeach; ?>
        <?php else : ?>
          <p>TEM nada KKKKKKKKKKKKKK</p>	
        <?php endif; ?>
      </select>
    </div>
   <div class="form-group col-lg-2">
      <label for="marca">Selecione a loja</label>
      <select  class="form-select" name="agendamento['id_empresa']">
      <?php if ($empresas) : ?>
				<?php foreach ($empresas as $empresa) : ?>
            <option value="<?php echo $empresa['cnpj']?>"><?php echo $empresa['nome'];?></option>
          <?php endforeach; ?>
        <?php else : ?>
          <p>TEM nada KKKKKKKKKKKKKK</p>	uu
        <?php endif; ?>
      </select>
   </div>
    <div class="form-group col-lg-4">
      <label for="marca">Selecione os serviços</label>
   
        <select class="form-select" name="agendamento['servico']">
          <option value="Banho e Tosa">Banho e Tosa</option>
          <option value="Banho">Banho</option>
        </select>
    </div>
  <div class="row">
    <div class="form-group col-lg-3">
      <label for="datacad">Data</label>
      <input type="date" class="form-control" name="agendamento['data']" id="data" >
    </div>
    <div class="form-group col-lg-3">
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
		<div class="col-lg-12">
    <button type="submit" class="btn btn-secondary" id="salvar" value="Agendar" disabled>Salvar</button>
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
  const salvarButton = document.getElementById('salvar');
  const disponibilidadeSpan = document.getElementById("disponibilidade");

  horarioSelect.addEventListener("change", function () {
    const selectedDate = document.getElementById("data").value;
    const selectedHorario = this.value;

    console.log("Selected Date:", selectedDate);
    console.log("Selected Horario:", selectedHorario);

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "verificar_agendamentos.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
      console.log("XHR Status:", xhr.status);
      
      if (xhr.status === 200) {
        const response = JSON.parse(xhr.responseText);
        console.log("Server Response:", response);

        if (response) {
          salvarButton.disabled = true;
          disponibilidadeSpan.innerText = "Horário indisponível.";
        } else {
          salvarButton.disabled = false;
          disponibilidadeSpan.innerText = "";
        }
      }
    };

    xhr.onerror = function () {
      console.error("Error in XHR");
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

document.addEventListener('DOMContentLoaded', function() {
            const dataInput = document.getElementById('data');

            // Obter a data atual no formato "YYYY-MM-DD"
            const dataAtual = new Date().toISOString().split('T')[0];

            // Adicionar 2 semanas à data atual
            let dataMaxima = new Date();
            dataMaxima.setDate(dataMaxima.getDate() + 14);
            dataMaxima = dataMaxima.toISOString().split('T')[0];

            // Criar um array de datas desabilitadas que inclui todas as condições
            const datasDesabilitadas = criarDatasDesabilitadas(dataAtual, dataMaxima);

            dataInput.min = dataAtual;
            dataInput.max = dataMaxima;

            dataInput.addEventListener('input', function() {
                const dataSelecionada = dataInput.value;

                // Verificar se a data selecionada está na lista de datas desabilitadas
                if (datasDesabilitadas.includes(dataSelecionada)) {
                    dataInput.setCustomValidity('Esta data está desabilitada.');
                } else {
                    dataInput.setCustomValidity('');
                }
            });
        });

        function criarDatasDesabilitadas(dataAtual, dataMaxima) {
            const datasDesabilitadas = [];
            const dataAtualObj = new Date(dataAtual);
            const dataMaximaObj = new Date(dataMaxima);

            // Adicionar datas antes de dataAtual
            const umDiaEmMilissegundos = 24 * 60 * 60 * 1000;
            for (let data = new Date(dataAtualObj); data >= new Date('1970-01-01'); data.setTime(data.getTime() - umDiaEmMilissegundos)) {
                datasDesabilitadas.push(data.toISOString().split('T')[0]);
            }

            // Adicionar datas depois de dataMaxima
            for (let data = new Date(dataMaximaObj); data <= new Date('2100-12-31'); data.setTime(data.getTime() + umDiaEmMilissegundos)) {
                datasDesabilitadas.push(data.toISOString().split('T')[0]);
            }

            // Adicionar domingos no intervalo de datas
          
            return datasDesabilitadas;
        }
</script>