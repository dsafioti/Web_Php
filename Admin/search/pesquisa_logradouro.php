<?php	

	if (!isset($_SESSION)) session_start();
	$idempresa  = $_SESSION['idempresa'];

	if(!isset($_SESSION['usuario'])) {
   
	    header('Location: localhost/sistema/index.php');
	    exit();

	}

	if (isset($_POST['nomepadrao'])) {

		include '../../conexao.php';
		
		if (!empty($_POST['nomepadrao'])) {
	    	$nomepadrao = mysqli_real_escape_string($conexao, $_POST['nomepadrao']);	
	    } else {
	    	$nomepadrao = "";
	    }

	    if (empty($nomepadrao)) {

			$sql = "SELECT 
			           p.nomepadrao,
			           p.nomenclatura,
			           h.dtinicial,
			           h.dtfinal,
			           h.valor,
			           h.inativo,
			           p.idpadraodevalor,
			           h.idhistoricopadrao
					  FROM padraodevalor p ,historicopadraodevalor h
					 WHERE p.idempresa = $idempresa
					 and p.idpadraodevalor = h.idpadraodevalor
					 ORDER BY p.nomepadrao;";

		} else if (!empty($nomepadrao) ) {
			$sql = "SELECT 
			           p.nomepadrao,
			           p.nomenclatura,
			           h.dtinicial,
			           h.dtfinal,
			           h.valor,
			           h.inativo,
			           p.idpadraodevalor,
			           h.idhistoricopadrao 
					  FROM padraodevalor p ,historicopadraodevalor h
					 WHERE p.nomepadrao LIKE '$nomepadrao%'
					 and p.idempresa = $idempresa
					 ORDER BY p.nomepadrao;";
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
