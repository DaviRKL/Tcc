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
<p>*O 78pagamento deverá ser efetuado na loja, com dinheiro ou cartão*</p>
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
      <input type="time" class="form-control" name="agendamento['horario']" id="horario">
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
document.getElementById('horario').addEventListener('input', function() {
    var horarioSelecionado = this.value;
    var dataSelecionada = document.getElementById('data').value; // Obtenha a data selecionada
    // Crie um objeto XMLHttpRequest para fazer a solicitação AJAX
    var xhr = new XMLHttpRequest();

    // Defina o método e a URL da solicitação
    xhr.open('POST', 'verificar_data.php', true);

    // Configura a função de callback para lidar com a resposta
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Exibe a resposta no elemento de disponibilidade
            var disponibilidade = document.getElementById('disponibilidade');
            disponibilidade.textContent = xhr.responseText;

            // Habilita ou desabilita o botão de envio com base na disponibilidade
            var submitButton = document.querySelector('button[type="submit"]');
            submitButton.disabled = xhr.responseText.includes("indisponível");
        }
    };

    // Defina o cabeçalho da solicitação
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    // Envie a solicitação com o horário como parâmetro
    xhr.send('data=' + dataSelecionada + '&horario=' + horarioSelecionado);
});

// Adicione um ouvinte de evento para o formulário para validar antes de enviar
document.getElementById('agendamentoForm').addEventListener('submit', function(event) {
    var disponibilidade = document.getElementById('disponibilidade');
    
    // Verifique se o horário está indisponível antes de enviar o formulário
    if (disponibilidade.textContent.includes("indisponível")) {
        event.preventDefault(); // Impede o envio do formulário se o horário estiver indisponível
        alert("O horário selecionado não está disponível para agendamento.");
    }
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