<?php

session_start(); // Iniciar a sessão
require_once('functions.php'); 
view($_GET['cnpj']);
require_once('processa.php');
processa($_GET['cnpj']);
?>
<?php include(HEADER_TEMPLATE); ?>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="custom.css">


<body>

<?php $cnpj = $_GET['cnpj']; ?>

    
<div class="container">
	<div class="row"  style="display: flex;flex-direction: row;justify-content: center; align-items: center;margin-left: 120px;margin-right: 120px">
		<div style="background-color: #00a4b4; border-radius: 50px; margin-top:30px">
			<div style="padding: 20px">
				<div class="col-md-4" >
                     <h2>Avalie a <?php echo $empresa['nome']; ?></h2>
                    <?php
                    // Imprimir a mensagem de erro ou sucesso salvo na sessão
                    if(isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                    ?>    
                    <!-- Inicio do formulário -->
                    <form method="POST" action="add_coment.php?cnpj=<?php echo $cnpj ?>">
                    
                        <div class="estrelas">
                            <!-- Carrega o formulário definindo nenhuma estrela selecionada -->
                            <input type="radio" name="estrela" id="vazio" value="" checked>

                            <!-- Opção para selecionar 1 estrela -->
                            <label for="estrela_um"><i class="opcao fa"></i></label>
                            <input type="radio" name="estrela" id="estrela_um" id="vazio" value="1">

                            <!-- Opção para selecionar 2 estrela -->
                            <label for="estrela_dois"><i class="opcao fa"></i></label>
                            <input type="radio" name="estrela" id="estrela_dois" id="vazio" value="2">

                            <!-- Opção para selecionar 3 estrela -->
                            <label for="estrela_tres"><i class="opcao fa"></i></label>
                            <input type="radio" name="estrela" id="estrela_tres" id="vazio" value="3">

                            <!-- Opção para selecionar 4 estrela -->
                            <label for="estrela_quatro"><i class="opcao fa"></i></label>
                            <input type="radio" name="estrela" id="estrela_quatro" id="vazio" value="4">

                            <!-- Opção para selecionar 5 estrela -->
                            <label for="estrela_cinco"><i class="opcao fa"></i></label>
                            <input type="radio" name="estrela" id="estrela_cinco" id="vazio" value="5"><br><br>
                        </div>
                            <!-- Campo para enviar a mensagem -->
                            <textarea name="mensagem" rows="4" cols="30" placeholder="Digite o seu comentário..."></textarea><br>

                            <!-- Botão para enviar os dados do formulário -->
                            
                            <div id="actions" class="row">
                                    <div class="col-md-12">
                                    <input type="submit" style="width: 100px;  border: none;" class="btn btn-secondary" value="Cadastrar">
                                    <a href="index.php" class="btn btn-default"><i class="fa-solid fa-rotate-left"></i> Voltar</a>
                                    </div>
                                </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Fim do formulário -->
   
</body>
<?php include(FOOTER_TEMPLATE); 
ob_end_flush();?>