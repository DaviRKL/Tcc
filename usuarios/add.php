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

<style>

  #footer {
      position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
  background-color: #00a4b8;
    color: white;
    text-align: center;
    height:  55px;
    -webkit-box-shadow: inset -5px 6px 13px -8px rgba(0,0,0,0.75);
  -moz-box-shadow: inset -5px 6px 13px -8px rgba(0,0,0,0.75);
  box-shadow: inset -5px 6px 13px -8px rgba(0,0,0,0.75);
  }

</style>      
<?php if (!empty($_SESSION['message'])) : ?>
  <div class =" alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert"> 
      <?php echo $_SESSION['message']; ?>
      <button type = "button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <?php clear_messages();?>
<?php endif; ?>

  <div style="padding-top: 40px; display: flex;flex-direction: row;justify-content: center; align-items: center;margin-left: 120px;margin-right: 120px">
    <h2> Cadastre-se</h2>
  </div>
  <form action="add.php" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="form-group col-md-12" style="padding-left: 400px; padding-right:400px;">
        <label for="name">Nome</label>
        <input type="text" class="form-control" name="usuario[nome]">
      </div>
      <div class="form-group col-md-12" style="padding-left: 400px; padding-right:400px;">
        <label for="campo2">Email</label>
        <input type="email" class="form-control" name="usuario[email]">
      </div>
      <div class="form-group col-md-12" style="padding-left: 400px; padding-right:400px;">
        <label for="campo3">Senha</label>
        <input type="password" class="form-control" name="usuario['password']">
      </div>
      <div class="form-group col-md-12" style="padding-left: 400px; padding-right:400px;">
        <label for="campo1">Foto</label>
        <input type="file" class="form-control" id="foto" name="foto">
      </div>
      <div class="form-group col-md-12" style="padding-left: 400px; padding-right:400px;">
        <label for="pre">Pré-vizualização:</label>
        <img class="form-control shadow p-2 mb-2 bg-body rounded" id="imgPreview" src="fotos/semImagem.png" alt="pic" style="height:  150px;">
      </div>
      <div class="form-group col-md-12" style="display: flex;flex-direction: row;justify-content: center; align-items: center;margin-top: 20px;" >
        <div class="g-recaptcha" data-sitekey="6LdSZdEmAAAAAPzie5WGn96a_YHQ_cpoIZgq0iCz"></div>
      </div>
      <div class="form-group col-md-12" style="display: flex;flex-direction: row;justify-content: center; align-items: center;margin-top: 20px;" >
        <p>Ou</p>
      </div>
      <div class="form-group col-md-12" style="display: flex;flex-direction: row;justify-content: center; align-items: center;" >
        <a href="../empresas/add.php">Cadastre-se como uma empresa</a>
      </div>
      <div id="actions" class="row">
      <div class="col-md-12"style="padding-left: 20px; padding-bottom:20px; padding-left: 650px;  ">
        <button type="submit" class="btn btn-secondary" href="<?php echo BASEURL; ?>index.php" style="width: 640px; padding-left: 20px;">Salvar</button>
      </div>
    </div>
    </div>
  </form>

<?php include(FOOTER_TEMPLATE);?>

<script>
$(document).ready(() =>{
$("#foto").change(function () {
const file = this.files[0];
if (file) {
let reader = new FileReader();
reader.onload = function (event) {
$("#imgPreview").attr("src", event.target.result);
};
reader.readAsDataURL(file);

}
});
});
</script>