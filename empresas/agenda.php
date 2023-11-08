<?php
ob_start();
include('../protecao/protect_empresa.php');
require_once('functions.php');


include(HEADER_TEMPLATE);
?>
<?php
// Inclua seu arquivo de configuração de banco de dados aqui


// Conecte-se ao seu banco de dados (substitua com suas próprias credenciais)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tcc";

$con = new mysqli($servername, $username, $password, $dbname);
if ($con->connect_error) {
  die("Erro na conexão: " . $con->connect_error);
}
$id_empresa = $_SESSION['id_empresa'];
$fetch_event = mysqli_query($con, "SELECT DISTINCT id, servico as title, data as start, horario as startTime, eventColor FROM agendamentos WHERE id_empresa = '$id_empresa '");

$empresa_name = get_empresa_name($id_empresa);
?>

<style>
  h2 {
    color: #102447;
  }

  .calendar {
    z-index: -1;
  }
</style>

<div style=" margin-top:30px">
  <div style="padding: 5px">
    <div class="row">
      <header>
        <div class="col-md-11 mx-auto">
          <h1 class="text-center">
            <?php echo $empresa_name ?>
          </h1>
        </div>
        <div class="col-md-11 mx-auto">
          <h3 class="text-center">Agendamentos marcados <a class="btn btn-secondary" href="addFuncionarios.php"><i
                class="fa fa-plus"></i> Adicionar funcionário</a></h3>
        </div>
      </header>
      <div id='calendar'></div>
    </div>
  </div>
</div>
<?php include('modal.php'); ?>
<?php include(FOOTER_TEMPLATE);
ob_end_flush(); ?>

<!-- <script src="../js/fullcalendar/calendar.js">  -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      themeSystem: 'bootstrap5',
      locale: 'pt-br',
      buttonText: {
        today: "Hoje",
        month: "Mês",
        week: "Semana",
        day: "Dia"
      },
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      hiddenDays: [0],
      //initialDate: '2023-01-12',
      navLinks: true, // can click day/week names to navigate views
      selectable: true,
      selectMirror: true,
      // select: function(arg) {
      //   var title = prompt('Event Title:');
      //   if (title) {
      //     calendar.addEvent({
      //       title: title,
      //       start: arg.start,
      //       end: arg.end,
      //       allDay: arg.allDay
      //     })
      //   }
      //   calendar.unselect()
      // },
      eventClick: function (info) {
        // Ao clicar em um evento, obtenha o ID do evento
        var eventId = info.event.id;

        // Redirecione para o edit.php com o ID do evento como parâmetro
        window.location.href = '../agendamento/view.php?id=' + eventId;
      },
      editable: false,
      dayMaxEvents: true, // allow "more" link when too many events

      events: [

        <?php
        while ($result = mysqli_fetch_array($fetch_event)) {
          $start = $result['start'];

          // Calcular o valor de end adicionando uma hora ao start
          $end = date('Y-m-d H:i:s', strtotime($start . ' +1 hour'));
          $startTime = $result['startTime'];

          // Adicionar uma hora ao startTime para calcular o endTime
          $endTime = date('Y-m-d H:i:s', strtotime($startTime . ' +1 hour'));
          ?>
 
          {
            id: '<?php echo $result['id']; ?>',
            title: '<?php echo $result['title']; ?>',
            start: '<?php echo $start; ?>',
            end: '<?php echo $end; ?>',
            endTime: '<?php echo $endTime; ?>',
            color: '<?php echo $result['eventColor']; ?>'
          },
        <?php } ?>
      ]
    });

    calendar.render();
  });
</script>