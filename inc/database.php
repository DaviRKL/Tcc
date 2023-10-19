<?php

/**
 *  Pesquisa um Registro pelo ID em uma Tabela
 */  
	
		date_default_timezone_set("America/Sao_Paulo");
	
	 function open_database() {
		try {
			$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			$conn -> set_charset ("utf8");
			return $conn;
		} catch (Exception $e) {
			echo "<h3>Ocorreu um erro:\n<br>".$e->getMessage(). "</h3>";
			return null;
		}
	}

	function close_database($conn) {
		try {
			mysqli_close($conn);
		} catch (Exception $e) {
			echo "<h3>Ocorreu um erro:\n<br>".$e->getMessage(). "</h3>";
		}
	}
	function avaliacao() {
		if (!empty($_POST['estrela'])) {
	
		// Receber os dados do formulário
		$estrela = filter_input(INPUT_POST, 'estrela', FILTER_DEFAULT);
		$mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_DEFAULT);
	
		// Criar a QUERY cadastrar no banco de dados
		$query_avaliacao = "INSERT INTO avaliacoes (qtd_estrela, mensagem, created) VALUES (:qtd_estrela, :mensagem, :created)";
		
		$conn = new PDO("mysql:host=".DB_HOST .";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
		$cad_avaliacao = $conn->prepare($query_avaliacao);
	
		// Substituir os links pelo valor
		$cad_avaliacao->bindParam(':qtd_estrela', $estrela, PDO::PARAM_INT);
		$cad_avaliacao->bindParam(':mensagem', $mensagem, PDO::PARAM_STR);
		$cad_avaliacao->bindParam(':created', date("Y-m-d H:i:s"));
	
		// Acessa o IF quando cadastrar corretamente
		if ($cad_avaliacao->execute()) {
	
			// Criar a mensagem de erro
			$_SESSION['msg'] = "<p style='color: green;'>Avaliação cadastrar com sucesso.</p>";
	
			// Redirecionar o usuário para a página inicial
			header("Location: index.php");
		} else {
	
			// Criar a mensagem de erro
			$_SESSION['msg'] = "<p style='color: #f00;'>Erro: Avaliação não cadastrar.</p>";
	
			// Redirecionar o usuário para a página inicial
			header("Location: index.php");
		}
	} else {
	
		// Criar a mensagem de erro
		$_SESSION['msg'] = "<p style='color: #f00;'>Erro: Necessário selecionar pelo menos 1 estrela.</p>";
	
		// Redirecionar o usuário para a página inicial
		header("Location: index.php");
	}
	}
	function get_pet_info($pet_id) {
		// Substitua as informações de conexão com o banco de dados com as suas
		$database = open_database();
		$found = null;
	
		// Consulta SQL para buscar o nome e a foto do pet pelo ID
		$sql = "SELECT nome, foto FROM pets WHERE id = $pet_id";
	
		// Execute a consulta
		$result = $database->query($sql);
	
		// Verifique se a consulta retornou resultados
		if ($result->num_rows > 0) {
			// Obtém o resultado da consulta
			$row = $result->fetch_assoc();
	
			// Crie um array associativo com o nome e a foto do pet
			$pet_info = [
				'nome' => $row["nome"],
				'foto' => $row["foto"]
			];
	
			// Retorna o array associativo
			return $pet_info;
		} else {
			// Se o pet não for encontrado, retorne uma mensagem de erro ou um valor padrão
			return ["nome" => "Pet não encontrado", "foto" => "caminho/para/foto/default.jpg"];
		}
	
		// Feche a conexão com o banco de dados
		close_database($database);
		return $found;
	}
	function get_tutor_name($id) {
		// Substitua as informações de conexão com o banco de dados com as suas
		$database = open_database();
		$found = null;
	
		// Consulta SQL para buscar o nome do pet pelo ID
		$sql = "SELECT nome FROM usuarios WHERE id = $id";
	
		// Execute a consulta
		$result = $database->query($sql);
	
		// Verifique se a consulta retornou resultados
		if ($result->num_rows > 0) {
			// Obtém o resultado da consulta
			$row = $result->fetch_assoc();
	
			// Retorna o nome do pet
			return $row["nome"];
		} else {
			// Se o pet não for encontrado, retorne uma mensagem de erro ou um valor padrão
			return "Pet não encontrado";
		}
	
		// Feche a conexão com o banco de dados
		close_database($database);
		return $found;
	}
	function get_empresa_name($cnpj) {
		// Substitua as informações de conexão com o banco de dados com as suas
		$database = open_database();
		$found = null;
	
		// Consulta SQL para buscar o nome do pet pelo ID
		$sql = "SELECT nome FROM empresas WHERE cnpj = $cnpj";
	
		// Execute a consulta
		$result = $database->query($sql);
	
		// Verifique se a consulta retornou resultados
		if ($result->num_rows > 0) {
			// Obtém o resultado da consulta
			$row = $result->fetch_assoc();
	
			// Retorna o nome do pet
			return $row["nome"];
		} else {
			// Se o pet não for encontrado, retorne uma mensagem de erro ou um valor padrão
			return "Empresa não encontrado";
		}
	
		// Feche a conexão com o banco de dados
		close_database($database);
		return $found;
	}
	function find1( $table = null, $id = null ) {
	  
		$database = open_database();
		$found = null;

		try {
		  if ($id) {
			$sql = "SELECT * FROM " . $table . " WHERE cnpj = " . $id;
			$result = $database->query($sql);
			if ($result->num_rows > 0) {
			  $found = $result->fetch_assoc();
			}
			
		  } else {
			
			$sql = "SELECT * FROM " . $table;
			$result = $database->query($sql);
			
			if ($result->num_rows > 0) {
			  //$found = $result->fetch_all(MYSQLI_ASSOC);
			
			// Metodo alternativo
			$found = array();
			while ($row = $result->fetch_assoc()) {
			  array_push($found, $row);
			} 
			}
		  }
		} catch (Exception $e) {
		  $_SESSION['message'] = $e->GetMessage();
		  $_SESSION['type'] = 'danger';
	  }
		
		close_database($database);
		return $found;
	}
	function find( $table = null, $id = null ) {
	  
		$database = open_database();
		$found = null;

		try {
		  if ($id) {
			$sql = "SELECT * FROM " . $table . " WHERE id_tutor = " . $id;
			$result = $database->query($sql);
			if ($result->num_rows > 0) {
			  $found = $result->fetch_assoc();
			}
			
		  } else {
			
			$sql = "SELECT * FROM " . $table;
			$result = $database->query($sql);
			
			if ($result->num_rows > 0) {
			  //$found = $result->fetch_all(MYSQLI_ASSOC);
			
			// Metodo alternativo
			$found = array();
			while ($row = $result->fetch_assoc()) {
			  array_push($found, $row);
			} 
			}
		  }
		} catch (Exception $e) {
		  $_SESSION['message'] = $e->GetMessage();
		  $_SESSION['type'] = 'danger';
	  }
		
		close_database($database);
		return $found;
	}
	function find2( $table = null, $id = null ) {
	  
		$database = open_database();
		$found = null;

		try {
		  if ($id) {
			$sql = "SELECT * FROM " . $table . " WHERE id = " . $id;
			$result = $database->query($sql);
			if ($result->num_rows > 0) {
			  $found = $result->fetch_assoc();
			}
			
		  } else {
			
			$sql = "SELECT * FROM " . $table;
			$result = $database->query($sql);
			
			if ($result->num_rows > 0) {
			  //$found = $result->fetch_all(MYSQLI_ASSOC);
			
			// Metodo alternativo
			$found = array();
			while ($row = $result->fetch_assoc()) {
			  array_push($found, $row);
			} 
			}
		  }
		} catch (Exception $e) {
		  $_SESSION['message'] = $e->GetMessage();
		  $_SESSION['type'] = 'danger';
	  }
		
		close_database($database);
		return $found;
	}
	function find_all( $table ) {
	  return find($table);
	}

	function save($table = null, $data = null) {

	  $database = open_database();
	  $columns = null;
	  $values = null;

	  //print_r($data);

	  foreach ($data as $key => $value) {
		$columns .= trim($key, "'") . ",";
		$values .= "'$value',";
	  }

	  // remove a ultima virgula
	  $columns = rtrim($columns, ',');
	  $values = rtrim($values, ',');
	  
	  $sql = "INSERT INTO " . $table . "($columns)" . " VALUES " . "($values);";

	  try {
		$database->query($sql);

		$_SESSION['message'] = 'Registro cadastrado com sucesso.';
		$_SESSION['type'] = 'success';
	  
	  } catch (Exception $e) { 
	  
		$_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
		$_SESSION['type'] = 'danger';
	  } 

	  close_database($database);
	}

	function update($table = null, $id = 0, $data = null) {

	  $database = open_database();

	  $items = null;

	  foreach ($data as $key => $value) {
		$items .= trim($key, "'") . "='$value',";
	  }

	  // remove a ultima virgula
	  $items = rtrim($items, ',');

	  $sql  = "UPDATE " . $table;
	  $sql .= " SET $items";
	  $sql .= " WHERE id=" . $id . ";";

	  try {
		$database->query($sql);

		$_SESSION['message'] = 'Registro atualizado com sucesso.';
		$_SESSION['type'] = 'success';

	  } catch (Exception $e) { 

		$_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
		$_SESSION['type'] = 'danger';
	  } 

	  close_database($database);
	}
	
	function remove( $table = null, $id = null ) {

  $database = open_database();
	
  try {
    if ($id) {

      $sql = "DELETE FROM " . $table . " WHERE id = " . $id;
      $result = $database->query($sql);

      if ($result = $database->query($sql)) {   	
        $_SESSION['message'] = "Registro Removido com Sucesso.";
        $_SESSION['type'] = 'success';
      }
    }
  } catch (Exception $e) { 

    $_SESSION['message'] = $e->GetMessage();
    $_SESSION['type'] = 'danger';
  }

  close_database($database);
}

function filter( $table = null, $p = null ) {

	$database = open_database();
	$found = null;
	  
	try {
	  if ($p) {
  
		$sql = "SELECT * FROM " . $table . " WHERE " . $p;
		$result = $database->query($sql);
		if ($result->num_rows> 0) {   	
		  $found = array();
		  while ($row = $result->fetch_assoc()) {
			array_push($found, $row);
		  }
		} else {
			throw new Exception ("Não foram encontrados registros de dados!");
		}
	  }
	} catch (Exception $e) { 
	  $_SESSION['message'] = "Ocorreu um erro: " . $e->GetMessage();
	  $_SESSION['type'] = 'danger';
	}
  
	close_database($database);
	return $found;
  }

  function filterPET(  $p = null ) {

	$database = open_database();
	$found = null;
	  
	try {
	  if ($p) {
  
		$sql = "SELECT nome FROM pets WHERE " . $p;
		$result = $database->query($sql);
		if ($result->num_rows> 0) {   	
		  $found = array();
		  while ($row = $result->fetch_assoc()) {
			array_push($found, $row);
		  }
		} else {
			throw new Exception ("Não foram encontrados registros de dados!");
		}
	  }
	} catch (Exception $e) { 
	  $_SESSION['message'] = "Ocorreu um erro: " . $e->GetMessage();
	  $_SESSION['type'] = 'danger';
	}
  
	close_database($database);
	return $found;
  }
  
  function clear_messages() {

		$_SESSION['type'] = "";
		$_SESSION['message'] = "";
	}
  
