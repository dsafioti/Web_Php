<?php  
	if (!isset($_SESSION)) session_start();

	if(!isset($_SESSION['usuario'])) {
   
	    header('Location: localhost/sistema/index.php');
	    exit();

	}

	include '../../conexao.php';

	$firstname = mysqli_real_escape_string($conexao, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conexao, $_POST['lastname']);
    /* virão os outros names dos inputs */
    
	$sql = "
		INSERT INTO cliente (nome, sobrenome) VALUES ('$firstname', '$lastname');
	";

	if ($conexao->query($sql) === TRUE) {
		$response = array("msg" => "Cliente cadastrado com sucesso");
		echo json_encode($response);
	} else {
		$response = array("msg" => "Erro ao cadastrar cliente");
		echo json_encode($response);
	}

?>