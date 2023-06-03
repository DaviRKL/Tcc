<?php 
ob_start();

  require_once('functions.php'); 
  add();
  include(HEADER_TEMPLATE);
?>
     
    
   
      <?php if (!empty($_SESSION['message'])) : ?>
        <div class =" alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert"> 
            <?php echo $_SESSION['message']; ?>
            <button type = "button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php clear_messages();?>
      <?php endif; ?>
      <div style="background-color: #00a4b4; border-radius: 15px; margin-top:50px">
      <h2>  Novo Usuário</h2>
      <form action="add.php" method="post" enctype="multipart/form-data" style="padding: 20px">
        <!-- area de campos do form -->
   
          <div class="row">
              <div class="form-group col-md-4">
                  <label for="name">Nome</label>
                  <input type="text" class="form-control" name="usuario[nome]">
              </div>

              <div class="form-group col-md-4">
                  <label for="campo2">Usuário (Login)</label>
                  <input type="text" class="form-control" name="usuario[user]">
              </div>

              <div class="form-group col-md-4">
                  <label for="campo3">Senha</label>
                  <input type="password" class="form-control" name="usuario['password']">
              </div>
          </div>
          
          <div class="row">
              <div class="form-group col-md-4">
                  <label for="campo1">Foto</label>
                  <input type="file" class="form-control" id="foto" name="foto">
              </div>

              <div class="form-group col-md-2">
                  <label for="pre">Pré-vizualização:</label>
                  <img class="form-control shadow p-2 mb-2 bg-body rounded" id="imgPreview" src="fotos/semImagem.png" alt="pic">
              </div>
            </div>
            
            <div id="actions" class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-secondary" href="<?php echo BASEURL; ?>index.php">Salvar</button>
                    <a href="index.php" class="btn btn-light">Cancelar</a>
                </div>
          </div>
          </div>
      </form>
</div>
<?php include(FOOTER_TEMPLATE); 
ob_end_flush();?>

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