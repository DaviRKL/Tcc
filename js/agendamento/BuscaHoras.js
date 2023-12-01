document.addEventListener("DOMContentLoaded", function() {
    $('#data').change(function () {
      // Obtém a data selecionada
      var dataSelecionada = $(this).val();
      var empresaId = $('#empresaSelect').val();

      // Faz a requisição AJAX para obter os horários disponíveis
      $.ajax({
        type: 'POST',
        url: 'verificar_agendamentos.php',
        data: { data: dataSelecionada, empresaId: empresaId },
        dataType: 'json',
        success: function (response) {
          if (response.success) {
            // Limpa o select
            $('#horario').empty();

            // Adiciona os horários disponíveis ao select
            $.each(response.horarios, function (index, horario) {
              var horarioFormatado = formatarHorario(horario);
              $('#horario').append('<option value="' + horario + '">' + horarioFormatado + '</option>');
            });

            function formatarHorario(horario) {
              var partes = horario.split(':');
              var horas = partes[0];
              var minutos = partes[1];
              return horas + ':' + minutos;
            }

            // Habilita o botão de salvar
            $('#salvar').prop('disabled', false);
          } else {
            alert('Erro: ' + response.message);
          }
        },
        error: function () {
          alert('Erro na requisição AJAX.');
        }
      });
    });
  });