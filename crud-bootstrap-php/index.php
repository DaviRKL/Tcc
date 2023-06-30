<?php 
	ob_start();
	require_once "config.php"; 
	require_once DBAPI; 
	include(HEADER_TEMPLATE);
	$db = open_database();
?>

	<div class="row"style="margin-top: 20px;background-color: #00a4b4; border-radius: 50px; margin-top:20px" >
	<div style="padding: 20px">
	<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/ban.jpg" style="height:500px;border-radius: 50px;"class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images/ca.jpg" style="height:500px;border-radius: 50px;"class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images/banban.jpg" style="height:500px;border-radius: 50px;" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
	</div>
  </div>
  </div>




	
<?php 
        include(FOOTER_TEMPLATE); 
        ob_end_flush();
?>
