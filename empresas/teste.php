<!DOCTYPE html>
<html>
<head>
  <title>Máscara de CNPJ</title>
  <script>
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
  </script>
</head>
<body>
  <label for="cnpj">CNPJ:</label>
  <input type="text" id="cnpj" oninput="formatCNPJ(this)" maxlength="18">
</body>
</html>
