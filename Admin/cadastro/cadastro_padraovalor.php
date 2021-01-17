<?php  
	if (!isset($_SESSION)) session_start();

	include '../../conexao.php';
	$idempresa = $_SESSION['idempresa'];
	$nomepadrao   = mysqli_real_escape_string($conexao, $_POST['nomepadrao']);
	$nomenclatura = mysqli_real_escape_string($conexao, $_POST['nomenclatura']);
	

    if (empty($nomepadrao)) {
		$result_encoded[] = array("msg" => 3);
	} else {

			$sql = "
				INSERT INTO  padraodevalor (nomepadrao,nomenclatura,idempresa) 
				VALUES ('$nomepadrao','$nomenclatura','$idempresa');
			";

			if ($conexao->query($sql) === TRUE) {
				$result_encoded[] = array("msg" => 0);			
			} else {
				$result_encoded[] = array("msg" => 1);	
				//echo "Erro ao cadastrar o Bairro";
			}		

	}

	echo json_encode($result_encoded);
