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
    navLinks: true, 
    selectable: true,
    selectMirror: true,
    
    eventClick: function (info) {
      var eventId = info.event.id;
      window.location.href = '../agendamento/view.php?id=' + eventId;
    },
    editable: false,
    dayMaxEvents: true,

    events: [

      <?php
      while ($result = mysqli_fetch_array($fetch_event)) {
        $start = $result['start'];

     
        $end = date('Y-m-d H:i:s', strtotime($start . ' +1 hour'));
        $startTime = $result['startTime'];
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