<?php
ob_start();
include('../protecao/protect.php');
  require_once('functions.php');
  edit();
  include_once(HEADER_TEMPLATE);
  
  function CriaData($data){
      $d = new DateTime ($data);
      return $d->format ("Y-m-d");  
  }  
  

?>
 

    <section class="formulario">
   
      <div class="linhas">
        <form action="edit.php?  id=<?php echo $pet['id']; ?>" method="post" enctype="multipart/form-data" style="padding: 20px">
        <section class="pets2" style="margin-left: -1px; margin-bottom: 20px;">
      <h2 class="titulo">Editar Pet</h2>
    </section>
          <div class="row">
            <div class="form-group col-md-6">
              <label class="texto1" for="modelo">Nome do pet</label>
              <input type="text" class="form-control" name="pet['nome']" value="<?php echo $pet['nome']; ?>">
            </div>
            <div class="form-group col-md-2">
              <label class="texto7" for="marca">Tipo do pet</label>
              <input type="text" class="form-control" name="pet['tipo']" value="<?php echo $pet['tipo']; ?>">
            </div>
            <div class="form-group col-md-2">
              <label class="texto2" for="ano">Raça</label>
              <input type="text" class="form-control" name="pet['raca']" value="<?php echo $pet['raca']; ?>">
            </div>
            <div class="form-group col-md-2">
              <label class="texto3" for="marca">Sexo</label>
              <input type="text" class="form-control" name="pet['sexo']" value="<?php echo $pet['sexo']; ?>">
            </div>
            <div class="form-group col-md-3">
              <label class="texto4" for="datacad">Data de nascimento</label>
              <input type="text" class="form-control" name="pet['datanasc']" value="<?php echo FormataData($pet['datanasc']); ?>" disabled>
            </div>
            <?php
                        $foto = "";
                        if (empty($pet['foto'])){
                          $foto = 'SemImagem.png';
                        }else{
                          $foto = $pet['foto'];
                        }
            ?>     
            <div class="form-group col-md-7">
              <label class="texto5" for="foto">Foto</label>
              <input type="file" class="form-control" name="foto" id="foto" value="imagens/<?php echo $foto ?>">
            </div>
            <div class="form-group col-md-2">
              <label class="texto6" for="pre">Pré-vizualização:</label>
              <img class="form-control shadow p-2 mb-2 bg-body rounded" id="imgPreview" src="imagens/<?php echo $foto ?>" alt="Foto do pet">
            </div>
          </div>
          <div id="actions" class="row">
            <div class="col-md-12" style="padding-bottom:50px;">
              <button type="submit" class="btn btn-secondary">Salvar</button>
              <a href="index.php" class="btn btn-light">Cancelar</a>
            </div>
          </div>
      </div>
      </form>
    </section>
<?php include(FOOTER_TEMPLATE);
ob_end_flush();?>
<script src="<?php echo BASEURL?>js/Preview/Previewfoto.js"></script>