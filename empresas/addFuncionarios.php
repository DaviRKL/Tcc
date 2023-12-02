<?php
ob_start();
require_once('functions.php');
addfuncionario();
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
<?php if (!empty($_SESSION['message'])): ?>
  <div class=" alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
    <?php echo $_SESSION['message']; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <?php clear_messages(); ?>
<?php endif; ?>
<section class="empresas">
        <h2 class="titulo">Cadastrar novo funcionário</h2>
      </section>

      <section class="formulario">
        <div class="linhas">
          <form action="add.php" enctype="multipart/form-data" method="post" style="padding: 20px">
            <div class="row">
              <div class="form-group col-md-6">
                <label class="campo-funcionario" for="modelo">Nome do funcionário</label>
                <input type="text" class="form-control" name="usuario['nome']">
              </div>

              <div class="form-group col-md-6">
                <label class="campo2" for="modelo">Email</label>
                <input type="text" class="form-control" name="usuario['email']">
              </div>

              <div class="form-group col-md-3">
                <label class= "campo3" for="campo3">Senha</label>
                <input type="password" class="form-control" name="usuario['password']">
              </div>
              
              <div class="form-group col-md-7">
                <label class="campo4" for="foto">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto">
              </div>

              <div class="form-group col-md-2">
                <label class="campo5" for="pre">Pré-vizualização:</label>
                <img class="form-control shadow p-2 mb-2 bg-body rounded" id="imgPreview" src="imagens/SemImagem.png"
                  alt="pic">
              </div>

            </div>
            <div id="actions" class="row">
              <div class="col-md-12" style="padding-bottom: 50px;">
                <button type="submit" class="btn btn-secondary">Salvar</button>
                <a href="index.php" class="btn btn-light">Cancelar</a>
              </div>
            </div>
        </div>
        </form>
      </section>
<?php include(FOOTER_TEMPLATE);?>
 <script src="<?php echo BASEURL?>js/Preview/Previewfoto.js"></script>

