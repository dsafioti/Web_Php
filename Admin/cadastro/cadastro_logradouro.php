<?php  
	if (!isset($_SESSION)) session_start();

	include '../../conexao.php';
	$idempresa = $_SESSION['idempresa'];
	
	$logradouro   = mysqli_real_escape_string($conexao, $_POST['logradouro']);
	$idcidade     = mysqli_real_escape_string($conexao, $_POST['idcidade']);
	$idbairro     = mysqli_real_escape_string($conexao, $_POST['idbairro']);

    if (empty($logradouro)) {
		$result_encoded[] = array("msg" => 3);
	} else {

			$sql = "
				INSERT INTO logradouro (logradouro,idcidade,idbairro) 
				VALUES ('$logradouro','$idcidade','$idbairro');
			";

			if ($conexao->query($sql) === TRUE) {
				$result_encoded[] = array("msg" => 0);			
			} else {
				$result_encoded[] = array("msg" => 1);	
				//echo "Erro ao cadastrar o Bairro";
			}		

	}

	echo json_encode($result_encoded);

?>