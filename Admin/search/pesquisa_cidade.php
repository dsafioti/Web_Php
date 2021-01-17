<?php	

	if (!isset($_SESSION)) session_start();
	

	if(!isset($_SESSION['usuario'])) {
   
	    header('Location: localhost/sistema/index.php');
	    exit();

	}

	if (isset($_POST['nomecidade'])) {

		include '../../conexao.php';
		
		if (!empty($_POST['nomecidade'])) {
	    	$omecidade = mysqli_real_escape_string($conexao, $_POST['nomecidade']);	
	    } else {
	    	$nomecidade = "";
	    }

	    if (empty($nomecidade)) {

			$sql = "SELECT * 
					  FROM cidade 
					  ORDER BY cidade;";

		} else if (!empty($nomebairro) ) {
			$sql = "SELECT * 
					  FROM cidade
					 WHERE cidade LIKE '$nomecidade%'
					 ORDER BY cidade;";
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
