<?php	

	if (!isset($_SESSION)) session_start();
	$idempresa  = $_SESSION['idempresa'];

	if(!isset($_SESSION['usuario'])) {
   
	    header('Location: localhost/sistema/index.php');
	    exit();

	}

	if (isset($_POST['nomebairro'])) {

		include '../../conexao.php';
		
		if (!empty($_POST['nomebairro'])) {
	    	$nomebairro = mysqli_real_escape_string($conexao, $_POST['nomebairro']);	
	    } else {
	    	$nomebairro = "";
	    }

	    if (empty($nomebairro)) {

			$sql = "SELECT * 
					  FROM bairro 
					 WHERE idempresa = $idempresa
					 ORDER BY nomebairro;";

		} else if (!empty($nomebairro) ) {
			$sql = "SELECT * 
					  FROM bairro 
					 WHERE nomebairro LIKE '$nomebairro%'
					 and idempresa = $idempresa
					 ORDER BY nomebairro;";
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
