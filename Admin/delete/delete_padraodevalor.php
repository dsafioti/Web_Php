<?php
	if (!isset($_SESSION)) session_start();
	
	include('../../conexao.php');
	
	if (isset($_POST['id'])) {
	    
		if (!empty($_POST['id'])) {
	    	$id = $_POST['id'];
	    } else {
	    	$id = "";
	    }
	    
	    
	    $sql1 = "
			
			DELETE 
			  FROM padraodevalor
			 WHERE idpadraodevalor  = '$id';
			
		";

		$result1 = mysqli_query($conexao, $sql1);

		$affected_rows = mysqli_affected_rows($conexao); // retorna a quantidade de linhas afetadas

		if ($affected_rows > 0) {
								
		   $result_encoded[] = array("msg" => 2); // Registro excluído com sucesso
		   
		} else {
			
			$result_encoded[] = array("msg" => 1); // Erro ao excluir registro
			
		}	

	} else {

		$result_encoded[] = array("msg" => 0); // Identificador não informado

	}		
	
	echo json_encode($result_encoded);	

?>