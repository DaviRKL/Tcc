<?php 
	ob_start();
	require_once "config.php"; 
	require_once DBAPI; 
	include(HEADER_TEMPLATE);
	$db = open_database();
?>
<style>
.card{
  background-color: #00B2C2;
}
.card{
  -webkit-box-shadow: 5px 12px 13px 11px rgba(0,0,0,0.75);
-moz-box-shadow: 5px 12px 13px 11px rgba(0,0,0,0.75);
box-shadow: 5px 12px 13px 11px rgba(0,0,0,0.75);
			}
</style>
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
<div class="container text-center">
  <div class="row">
  
    <div class="col-md-3"style="padding: 20px">
     <div class="card" style="width: 18rem;">
        <img src="images/pawww.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary"style="background-color: #0ACCA7; color: #FFF; border: 0px;box-shadow: 2px 3px 5px 1px rgba(0,0,0,0.68);-webkit-box-shadow: 2px 3px 5px 1px rgba(0,0,0,0.68);-moz-box-shadow: 2px 3px 5px 1px rgba(0,0,0,0.68);"">Go somewhere</a>
        </div>
      </div>
    </div>
    <div class="col-md-3"style="padding: 20px">
    <div class="card" style="width: 18rem;">
          <img src="images/pawww.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary"style="background-color: #0ACCA7; color: #FFF; border: 0px;box-shadow: 2px 3px 5px 1px rgba(0,0,0,0.68);-webkit-box-shadow: 2px 3px 5px 1px rgba(0,0,0,0.68);-moz-box-shadow: 2px 3px 5px 1px rgba(0,0,0,0.68);"">Go somewhere</a>
          </div>
          </div>
    </div>
    <div class="col-md-3"style="padding: 20px">
    <div class="card" style="width: 18rem;">
          <img src="images/pawww.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary"style="background-color: #0ACCA7; color: #FFF; border: 0px;box-shadow: 2px 3px 5px 1px rgba(0,0,0,0.68);-webkit-box-shadow: 2px 3px 5px 1px rgba(0,0,0,0.68);-moz-box-shadow: 2px 3px 5px 1px rgba(0,0,0,0.68);"">Go somewhere</a>
          </div>
          </div>
    </div>
    <div class="col-3"style="padding: 20px">
    <div class="card" style="width: 18rem;">
          <img src="images/pawww.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary"style="background-color: #0ACCA7; color: #FFF; border: 0px;box-shadow: 2px 3px 5px 1px rgba(0,0,0,0.68);-webkit-box-shadow: 2px 3px 5px 1px rgba(0,0,0,0.68);-moz-box-shadow: 2px 3px 5px 1px rgba(0,0,0,0.68);"">Go somewhere</a>
          </div>
          </div>
    </div>
  </div>
  </div>
<?php 
        include(FOOTER_TEMPLATE); 
        ob_end_flush();
?>
