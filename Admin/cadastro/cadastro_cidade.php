<?php  
	if (!isset($_SESSION)) session_start();

	include '../../conexao.php';
	//$idempresa = $_SESSION['idempresa'];
	
	$nomecidade  = mysqli_real_escape_string($conexao, $_POST['nomecidade']);
	$uf          = mysqli_real_escape_string($conexao, $_POST['estado']);

    if (empty($nomecidade)) {
		$result_encoded[] = array("msg" => 3);
	} else {

			$sql = "
				INSERT INTO cidade (cidade,uf) 
				VALUES ('$nomecidade','$uf');
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