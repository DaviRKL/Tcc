<?php
ob_start();

include('../protecao/protect.php');
    require_once('functions.php');
	include(HEADER_TEMPLATE);
    index();
	
	function FormataData($data){
      $da = new DateTime ($data);
      return $da->format ("h:i");  
	}
	
	
	
?>
<form id="dataForm" method="post">
    <label for="data">Data:</label>
    <input type="date" id="data" name="data">
    <span id="disponibilidade"></span>
    <input type="submit" value="Agendar" disabled>
</form>

<script>
document.getElementById('data').addEventListener('input', function() {
    var dataSelecionada = this.value;

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
            var submitButton = document.querySelector('input[type="submit"]');
            submitButton.disabled = xhr.responseText.includes("indisponível");
        }
    };

    // Defina o cabeçalho da solicitação
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    // Envie a solicitação com a data como parâmetro
    xhr.send('data=' + dataSelecionada);
});
</script>
<?php include('modal.php'); ?>
<?php include(FOOTER_TEMPLATE); 
ob_end_flush();?>
