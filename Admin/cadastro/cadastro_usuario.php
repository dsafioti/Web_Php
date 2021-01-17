<?php  
	if (!isset($_SESSION)) session_start();

	include '../../conexao.php';
	
	//$login  = mysqli_real_escape_string($conexao, $_POST['login']);

    
	if (empty($_POST['login'])) {
		$result_encoded[] = array("msg" => 3); //login vazio
	} else {

			$nomeusuario     = mysqli_real_escape_string($conexao, $_POST['nomeusuario']);
			$login           = mysqli_real_escape_string($conexao, $_POST['login']);
			$senha           = mysqli_real_escape_string($conexao, $_POST['senha']);
			$email           = mysqli_real_escape_string($conexao, $_POST['email']);
			$idnivelusuario  = mysqli_real_escape_string($conexao, $_POST['idnivelusuario']);
			$telefone        = mysqli_real_escape_string($conexao, $_POST['telefone']);
			$celular         = mysqli_real_escape_string($conexao, $_POST['celular']);
			$idempresa       = mysqli_real_escape_string($conexao, $_POST['empresa']);
			

			if(empty($_POST['inativo'])) {
				$inativo = 0;
			} else {
				$inativo = mysqli_real_escape_string($conexao, $_POST['inativo']);
			}

			$sql = "
				INSERT INTO usuario (nomeusuario, login, idempresa, senha, email, idnivelusuario, telefone, celular) 
				VALUES ('$nomeusuario', '$login', '$idempresa', MD5('$senha'), '$email', '$idnivelusuario','$telefone', '$celular');
			";

			//echo $sql; exit();

			if ($conexao->query($sql) === TRUE) {
				$result_encoded[] = array("msg" => 1);  //sucesso			
			} else {
				$result_encoded[] = array("msg" => 2);	
				//echo "Erro ao cadastrar a usuario";
			}		

	}

	echo json_encode($result_encoded);

?>