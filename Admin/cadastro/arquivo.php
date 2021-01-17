<?php  
	if (!isset($_SESSION)) session_start();

	if(!isset($_SESSION['usuario'])) {
   
	    header('Location: localhost/sistema/index.php');
	    exit();

	}

	include '../../conexao.php';

	$name1 = mysqli_real_escape_string($conexao, $_POST['name1']);
	$name2 = mysqli_real_escape_string($conexao, $_POST['name2']);
	$name3 = mysqli_real_escape_string($conexao, $_POST['name3']);
	$name4 = mysqli_real_escape_string($conexao, $_POST['name4']);
    
	$sql = "
		INSERT INTO tabela (coluna1, coluna2, coluna3, coluna4) VALUES ('$name1', '$name2', '$name3', '$name4');
	";

	if ($conexao->query($sql) === TRUE) {
		$response = array("msg" => "Dados cadastrados com sucesso");
		echo json_encode($response);
	} else {
		$response = array("msg" => "Erro ao cadastrar dados");
		echo json_encode($response);
	}

?>