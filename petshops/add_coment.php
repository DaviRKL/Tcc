<?php

session_start(); 
// Iniciar a sessão

require_once('functions.php'); 
view($_GET['cnpj']);
processa($_GET['cnpj']);


$cnpj = $_GET['cnpj'];
include_once(HEADER_TEMPLATE);
?>

<body>   
    <div class="container">
        <div class="sistema-avaliacao">
            <div class="avaliacao-box" >
                <h2 class="titulo-avaliacao">Avalie a <?php echo $empresa['nome']; ?></h2>
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
                        <textarea name="mensagem" rows="4" cols="70" placeholder=" Digite o seu comentário..."></textarea><br>
                
                        <div id="actions" class="botao">
                            <input type="submit" style="width: 100px;  border: none; background: var(--Gradiente, linear-gradient(90deg, #00A3B4 3.36%, rgba(7, 41, 95, 0.96) 62.36%));" class="btn btn-secondary" value="Enviar">
                        </div>
                </form>
            </div>
        </div>
    </div>

</body>
<?php include(FOOTER_TEMPLATE); 
ob_end_flush();
?>