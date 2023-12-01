<?php
ob_start();
include('../protecao/protect_empresa.php');
require_once('functions.php');
require_once('../conexao.php');

include_once(HEADER_TEMPLATE);
?>
<?php

if ($conn->connect_error) {
  die("Erro na conexão: " . $conn->connect_error);
}
$id_empresa = $_SESSION['id_empresa'];
$fetch_event = mysqli_query($conn, "SELECT DISTINCT id, servico as title, data as start, horario as startTime, eventColor FROM agendamentos WHERE id_empresa = '$id_empresa '");
$empresa_name = get_empresa_name($id_empresa);
?>
<section class="empresas">
  <h2 class="titulo">Agendamentos Marcados de <?php echo $empresa_name?></h2>
  <?php if (isset($_SESSION['id'])): ?>
    <a href="./addFuncionarios.php"><button type="button" id="novo-pet"><i class="fa fa-plus"></i>novo funcionário</button></a>
  <?php endif; ?>
</section>

<div style='max-width: var(--largura-da-pagina); width: 100%; padding: 30px 100px 100px;' id='calendar'></div>
<?php include('modal.php'); ?>
<?php include(FOOTER_TEMPLATE);
ob_end_flush();
include('../js/fullcalendar/calendar.php'); ?>