<?php	

	if (!isset($_SESSION)) session_start();

	if(!isset($_SESSION['usuario'])) {
   
	    header('Location: localhost/sistema/index.php');
	    exit();

	}

    $idempresa = $_SESSION['idempresa'];

	if (isset($_POST['nome_entregador']) || isset($_POST['cpf_entregador'])) {

		include '../../conexao.php';
		
		if (!empty($_POST['nome_entregador'])) {
	    	$nome_entregador = mysqli_real_escape_string($conexao, $_POST['nome_entregador']);	
	    } else {
	    	$nome_entregador = "";
	    }

	    if (!empty($_POST['cpf_entregador']))
	    	$cpf_entregador = mysqli_real_escape_string($conexao, $_POST['cpf_entregador']);	
	    else
	    	$cpf_entregador = "";

		if (empty($nome_entregador) && empty($cpf_entregador)) {

			$result_encoded[] = array("msg" => 1);
			echo json_encode($result_encoded);
			exit();

		} else if (empty($nome_entregador)) {
			$sql = "SELECT * 
					  FROM pessoa 
					 WHERE cpf LIKE '$cpf_entregador'
					 and tipopessoa = 'E'
					 and idempresa  = '$idempresa'
					 ORDER BY nomepessoa;";
		} else if (empty($cpf_entregador)) {
			$sql = "SELECT * 
					  FROM pessoa 
					 WHERE nomepessoa LIKE '$nome_entregador%'
					 and tipopessoa = 'E'
					 and idempresa  = '$idempresa'
					 ORDER BY nomepessoa;";	
		} else if (!empty($nome_entregador) && !empty($cpf_entregador)) {
			$sql = "SELECT * 
					FROM pessoa 
					WHERE cpf LIKE '$cpf_entregador' AND nomepessoa LIKE '$nome_entregador%'
					and tipopessoa = 'E'
					and idempresa  = '$idempresa'
					ORDER BY nomepessoa;";
		}
			
		$result = mysqli_query($conexao, $sql);
		$row = mysqli_num_rows($result);	
			
		if ($row > 0) {

			while ($row = mysqli_fetch_assoc($result)) {
		    	$result_encoded[] = array_map(null, $row); 
		    }

		} else {
			$result_encoded[] = array("msg" => 2);	
		}

		/* free result set */
	    mysqli_free_result($result);

		/* close connection */
		mysqli_close($conexao);

	} else {
		$result_encoded[] = array("msg" => 0);	
	}

	echo json_encode($result_encoded);
?>
