<?php 
	ob_start();
	require_once "config.php"; 
	require_once DBAPI; 
	include(HEADER_TEMPLATE);
	$db = open_database();
?>

  
        <body>
            <main>
              
            <div class="showcase-area">
              <div class="container">
                <div class="left">
                  <p class="text">
                    Seja bem vindo, aqui você conhece
                  </p>
                  <div class="big-title">
                    <h1>As melhores opções para o seu pet</h1>
                  </div>
                  <p class="text">
                  Nós oferecemos as melhores empresas de petshop da sua região para você ter maior segurança de agendar o seu pet. 
                  Basta conhecer as empresas abaixo e agendar na sua de preferência.
                  </p>
                </div>

                <div class="right">
                  <img src="images/apresentacao.png" alt="Person Image" class="person" />
                </div>
              </div>
            </div>
           </main>
              
                <div class="row">
                  <div class="col-md-12"style="padding-top: 20px; padding-right:850px">
                    <p id="CimaCard"> Conheça nossos serviços</p>
                  </div>

                 

                
            </div>
        </div>

       
<div class="container text-center" style="margin-left: 50px;">

  <div class="row">
 
    <div class="col-md-12"style=" padding-right:1050px; padding-bottom:10px">

    </div>
    <div class="col-md-4"style="padding: 20px">
      <div class="card" style="width: 18rem;">
        <img src="images/petshop.jpg" class="card-img-top" width="20px"; height="200px";>
        <div class="card-body">
          <a class="card-title"  href="<?php echo BASEURL;?>empresas" >Pethsops</a>
        </div>
      </div>
    </div>
    <div class="col-md-4"style="padding: 20px">
      <div class="card" style="width: 18rem;">
          <img src="images/gatochorro.jpg" class="card-img-top" width="20px"; height="200px";>
          <div class="card-body">      
            <a class="card-title" href="<?php echo BASEURL;?>ongs">Cadastrar Pet</a>
            
          </div>
      </div>
    </div>
    <div class="col-md-4"style="padding: 20px">
      <div class="card" style="width: 18rem;">
          <img src="images/cachorroagenda.jpg" class="card-img-top" width="20px"; height="200px";>
          <div class="card-body">
            <a class="card-title"href="<?php echo BASEURL;?>agendamento" >Agendar</a>
          </div>
      </div>
    </div>
  </div>

  </body>

<?php 
        include(FOOTER_TEMPLATE); 
        // ob_end_flush();
?>