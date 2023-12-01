$(document).ready(function () {
    $('#racaSelect').select2({
      language: {
        noResults: function () {
          return "Nenhuma opção encontrada"; // Modifique conforme necessário
        }
      }


    });

  })