<?php  
	if (!isset($_SESSION)) session_start();

	include '../../conexao.php';
	$idempresa = $_SESSION['idempresa'];
	
	$nomebairro   = mysqli_real_escape_string($conexao, $_POST['nomebairro']);
	$setor        = mysqli_real_escape_string($conexao, $_POST['setor']);
	$kilometragem = mysqli_real_escape_string($conexao, $_POST['kilometragem']);

    if (empty($nomebairro)) {
		$result_encoded[] = array("msg" => 3);
	} else {

			$sql = "
				INSERT INTO bairro (nomebairro,idempresa,setor,kilometragem) 
				VALUES ('$nomebairro','$idempresa','$setor','$kilometragem');
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