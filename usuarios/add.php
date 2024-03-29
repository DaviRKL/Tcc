<?php 
  ob_start();
  require_once('functions.php'); 
  add();
  include_once(HEADER_TEMPLATE);
  if (isset($_POST['submit'])) {
  $secret = "6LdSZdEmAAAAADcvsv17xA36Bg7cKEuWdpTxu35T";
  $response = $_POST['g-recaptcha-response'];
  $remoteip = $_SERVER['REMOTE_ADDR'];
  $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip";
  $data = file_get_contents($url);
  $row = json_decode($data, true);

  if ($row['success'] == "true") {
      echo "<script>alert('Wow you are not a robot 😲');</script>";
  } else {
      echo "<script>alert('Oops you are a robot 😡');</script>";
  }
  }
?>
 
<?php if (!empty($_SESSION['message'])) : ?>
  <div class =" alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert"> 
      <?php echo $_SESSION['message']; ?>
      <button type = "button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <?php clear_messages();?>
<?php endif; ?>

<section class="cadastro">
      <h2 class="titulo">Faça seu cadastro</h2>
    </section>

    <section class="formulario">
        <div class="linhas">
          <form action="add.php" enctype="multipart/form-data" method="post" style="padding: 20px">
            <div class="row">
              <div class="form-group col-md-6">
                <label class="campo1" for="modelo">Nome</label>
                <input type="text" class="form-control" name="usuario['nome']" required>
              </div>

              <div class="form-group col-md-6">
                <label class="campo2" for="modelo">Email</label>
                <input type="text" class="form-control" name="usuario['email']" required>
              </div>

              <div class="form-group col-md-3">
                <label class= "campo3" for="campo3">Senha</label>
                <input type="password" class="form-control" name="usuario['password']"required>
              </div>
              
              <div class="form-group col-md-7">
                <label class="campo4" for="foto">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto">
              </div>

              <div class="form-group col-md-2">
                <label class="campo5" for="pre">Pré-vizualização:</label>
                <img class="form-control shadow p-2 mb-2 bg-body rounded" id="imgPreview"
                  alt="pic">
              </div>
            </div>

          <div id="actions" class="row" style="padding-bottom: 50px;">
            <div class="col-md-12"style="display: flex;flex-direction: row;justify-content: center; align-items: center; padding-top: 15px">
              <button type="submit" class="btn btn-secondary" style="width: 300px; border-radius: 15px; background: var(--Gradiente, linear-gradient(90deg, #00A3B4 3.36%, rgba(7, 41, 95, 0.96) 62.36%)); ">Salvar</button>
            </div>
          </div>
        </div>
        </form>
      </section>
<?php include(FOOTER_TEMPLATE);?>
<script src="<?php echo BASEURL?>js/Preview/Previewfoto.js"></script>