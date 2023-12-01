document.addEventListener("DOMContentLoaded", function() {
    
    $('#empresaSelect').select2({
      templateResult: formatEmpresa,
      templateSelection: formatEmpresa,
      language: {
        noResults: function () {
          return "Nenhuma opção encontrada"; 
        }
      }
    });
    $('#petSelect').select2({
      templateResult: formatEmpresa,
      templateSelection: formatEmpresa,
      language: {
        noResults: function () {
          return "Nenhuma opção encontrada";
        }
      }
    });
  });
  function formatEmpresa(empresa) {
    if (!empresa.id) {
      return empresa.text;
    }

    var imageUrl = $(empresa.element).data('image');
    if (!imageUrl) {
      return empresa.text;
    }

    var $empresa = $(
      '<span><img src="' + imageUrl + '" class="img-empresa" style="width: 20px; height: 20px;" /> ' + empresa.text + '</span>'
    );

    return $empresa;
  }
