<?php 
	ob_start();
	require_once "config.php"; 
	require_once DBAPI; 
	include(HEADER_TEMPLATE);
	$db = open_database();
?>
<style>
.card, .card-body{
  background-color: #00B2C2;
}
.card-title{
  color: whitesmoke;
}

      #CimaCard{
        color:  #07295F;
        margin-right: 100px;
        font-size: 20px;
        font-weight: bold;
      }
      .card-img-top{
        height: 200px;
      }
     
</style>
<div class="row"style="margin-top: 20px;padding: 20px; border-radius: 50px; margin-top:20px" >
  
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


<div class="container text-center" style="margin-left: 50px;">

  <div class="row">
  <div class="col-md-12"style="padding-top: 20px; padding-right:850px">
  <p id="CimaCard"> CONHEÇA OS NOSSOS SERVIÇOS</p>
    </div>
    <div class="col-md-12"style=" padding-right:1050px; padding-bottom:10px">
 <img src="images/linha3.png" style="width:300px; ">
    </div>
    <div class="col-md-4"style="padding: 20px">
      <div class="card" style="width: 18rem;">
        <img src="images/petshop.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <a class="card-title"  href="<?php echo BASEURL;?>empresas" >Empresas</a>
        </div>
      </div>
    </div>
    <div class="col-md-4"style="padding: 20px">
      <div class="card" style="width: 18rem;">
          <img src="images/cachorroagenda.jpg" class="card-img-top" >
          <div class="card-body">
            <a class="card-title"href="<?php echo BASEURL;?>agendamento" >Agendamentos</a>
          </div>
      </div>
    </div>
    <div class="col-md-4"style="padding: 20px">
      <div class="card" style="width: 18rem;">
          <img src="images/ong.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <a class="card-title" href="<?php echo BASEURL;?>ongs">Ongs</a>
          </div>
      </div>
    </div>
    <div class="col-md-4"style="padding: 20px">
      <div class="card" style="width: 200rem;">
          
          <div class="card-body">
            
          </div>
      </div>
    </div>
  </div>
</div>
<?php 
        include(FOOTER_TEMPLATE); 
        ob_end_flush();
?>
