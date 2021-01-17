<?php	

	if (!isset($_SESSION)) session_start();

	 $idempresa      = $_SESSION['idempresa'];
	 $idusuario      = $_SESSION['idusuario'];
	 $idnivelusuario = $_SESSION['idnivelusuario'];	   

	if(!isset($_SESSION['usuario'])) {
   
	    header('Location: localhost/sistema/index.php');
	    exit();

	}

	if (isset($_POST['razao_social']) || isset($_POST['cnpj'])) {

		include '../../conexao.php';
		
		if (!empty($_POST['razao_social'])) {
	    	$razao_social = mysqli_real_escape_string($conexao, $_POST['razao_social']);	
	    } else {
	    	$razao_social = "";
	    }

	    if (!empty($_POST['cnpj']))
	    	$cnpj = mysqli_real_escape_string($conexao, $_POST['cnpj']);	
	    else
	    	$cnpj = "";

		if (empty($razao_social) && empty($cnpj)) {

			$result_encoded[] = array("msg" => 1);
			echo json_encode($result_encoded);
			exit();

		} else if (($idnivelusuario != 1)) {
			$sql = "SELECT * 
					  FROM empresa 
					 WHERE idempresa  = '$idempresa'
			 		 and cnpj LIKE '$cnpj%' AND razaosocial LIKE '$razao_social%'
					 ORDER BY razaosocial;";
		} else if (($idnivelusuario == 1)) {
			$sql = "SELECT * 
					  FROM empresa 
					 WHERE cnpj LIKE '$cnpj%' AND razaosocial LIKE '$razao_social%'
					 ORDER BY razaosocial;";	
		} else {
			$sql = "";
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
