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
      .espaco-topo{
        margin-top: 30px;
      }
     
</style>
<div class="espaco-topo">
                  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                    <ol class="carousel-indicators">
                      <?php
                    
                        $conn = mysqli_connect("localhost","root","","tcc");
                        $controle_ativo = 2;		
                        $controle_num_slide = 1;
                        $result_carousel = "SELECT * FROM carrouses ORDER BY id ASC";
                        $resultado_carousel = mysqli_query($conn, $result_carousel);
                        while($row_carousel = mysqli_fetch_assoc($resultado_carousel)){ 
                          if($controle_ativo == 2){ ?>
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li><?php
                            $controle_ativo = 1;
                          }else{ ?>
                            <li data-target="#carousel-example-generic" data-slide-to="<?php echo $controle_num_slide; ?>"></li><?php
                            $controle_num_slide++;
                          }
                        }
                      ?>						
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                      <?php
                        $controle_ativo = 2;						
                        $result_carousel = "SELECT * FROM carrouses ORDER BY id ASC";
                        $resultado_carousel = mysqli_query($conn, $result_carousel);
                        while($row_carousel = mysqli_fetch_assoc($resultado_carousel)){ 
                          if($controle_ativo == 2){ ?>
                            <div class="item active">
                              <img src="images/carousel/<?php echo $row_carousel['imagen_carousel']; ?>" alt="<?php echo $row_carousel['nome']; ?>">
                            </div><?php
                            $controle_ativo = 1;
                          }else{ ?>
                            <div class="item">
                              <img src="images/carousel/<?php echo $row_carousel['imagen_carousel']; ?>" alt="<?php echo $row_carousel['nome']; ?>">
                            </div> <?php
                          }
                        }
                      ?>					
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                </div>
          
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
                <!-- Include all compiled plugins (below), or include individual files as needed -->
                
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
  </div>
</div>
<?php 
        include(FOOTER_TEMPLATE); 
        ob_end_flush();
?>