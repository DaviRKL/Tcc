<?php
ob_start();
include('../protecao/protect.php');
    require_once('functions.php');
	include_once(HEADER_TEMPLATE);
?>

<style>

  body {
    margin: 40px 10px;
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }

</style>


  <div id='calendar'></div>



<?php include(FOOTER_TEMPLATE); 
ob_end_flush();?>
<script src="../js/fullcalendar/calendar.js"> </script>