
/**
 * Passa os dados do cliente para o Modal, e atualiza o link para exclusão
 */
$('#delete-modal').on('show.bs.modal', function (event) {
  
  var button = $(event.relatedTarget);
  var id = button.data('customer');
  
  var modal = $(this);
  modal.find('.modal-title').text('Excluir Cliente #' + id);
  modal.find('#confirm').attr('href', 'delete.php?id=' + id);
});

/**
 * Passa os dados do cliente para o Modal, e atualiza o link para exclusão
 */
$('#delete-user-modal').on('show.bs.modal', function (event) {
  
  var button = $(event.relatedTarget);
  var id = button.data('usuario');
  
  var modal = $(this);
  modal.find('.modal-title').text('Excluir Usuario #' + id);
  modal.find('#confirm').attr('href', 'delete.php?id=' + id);
});

$('#delete-carro-modal').on('show.bs.modal', function (event) {
  
  var button = $(event.relatedTarget);
  var id = button.data('carro');
  
  var modal = $(this);
  modal.find('.modal-title').text('Excluir Carro #' + id);
  modal.find('#confirm').attr('href', 'delete.php?id=' + id);
});

$('#delete-pet-modal').on('show.bs.modal', function (event) {
  
  var button = $(event.relatedTarget);
  var id = button.data('pet');
  
  var modal = $(this);
  modal.find('.modal-title').text('Excluir Pet #' + id);
  modal.find('#confirm').attr('href', 'delete.php?id=' + id);
});
$('#delete-agendamento-modal').on('show.bs.modal', function (event) {
  
  var button = $(event.relatedTarget);
  var id = button.data('agendamento');
  var modal = $(this);
  modal.find('.modal-title').text('Cancelar agendamento #'   + id);
  modal.find('#confirm').attr('href', 'delete.php?id=' + id);
});

$('#concluir-agendamento-modal').on('show.bs.modal', function (event) {
  
  var button = $(event.relatedTarget);
  var id = button.data('concluir');
  var modal = $(this);
  modal.find('.modal-title').text('Concluir agendamento #' + id);
  modal.find('#confirm').attr('href', 'conclui.php?id=' + id);
});



