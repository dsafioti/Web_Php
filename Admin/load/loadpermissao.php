<?php
	if (!isset($_SESSION)) session_start();
	include('../../conexao.php');
	
	$id = $_POST['id'];
	
	$sql1 = "SELECT NA.idpagina,
				    NA.idusuario,
				    U.nomeusuario,
				    U.email
			   FROM pagina P 
			  INNER JOIN nivelacesso NA ON P.idpagina = NA.idpagina
			  INNER JOIN usuario U ON U.idusuario = NA.idusuario
			  WHERE U.idusuario = '$id';";
	
	$result1 = mysqli_query($conexao, $sql1);

	//echo $sql1; exit();

	if ($result1 = mysqli_query($conexao, $sql1)) {
									
	    while ($row1 = mysqli_fetch_assoc($result1)) {
	    	$result_encoded['usuario'][] = array_map(null, $row1); 
	    }
	   
	} else {
		
		$result[] = 'Erro ao localizar nível de acesso';
		
	}
	
	$sql2 = "SELECT * FROM pagina;";
	
	if ($result2 = mysqli_query($conexao, $sql2)) {
								
	    while ($row2 = mysqli_fetch_assoc($result2)) {
	    	$result_encoded['pagina'][] = array_map(null, $row2); 
	    }
	   
	} else {
		
		$result[] = 'Erro ao localizar página de acesso';
		
	}
	
	$sql3 = "SELECT idpagina, permissao FROM nivelacesso WHERE idusuario = '$id' ORDER BY idpagina;";
	
	if ($result3 = mysqli_query($conexao, $sql3)) {
								
	    while ($row3 = mysqli_fetch_assoc($result3)) {
	    	$result_encoded['nivel'][] = array_map(null, $row3); 
	    }
	   
	} else {
		
		$result[] = 'Erro ao localizar nível de acesso';
		
	}

	echo json_encode($result_encoded);

?>