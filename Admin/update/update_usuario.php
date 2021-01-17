
<?php  
	if (!isset($_SESSION)) session_start();

	include '../../conexao.php';
	include '../../valida_cnpj.php';

    $idusuario        = mysqli_real_escape_string($conexao, $_POST['alt_name0']);
    $nomeusuario	  = mysqli_real_escape_string($conexao, $_POST['alt_name1']);
    $login	          = mysqli_real_escape_string($conexao, $_POST['alt_name2']);
    $senha	          = mysqli_real_escape_string($conexao, $_POST['alt_name3']);
    $senhac           = mysqli_real_escape_string($conexao, $_POST['alt_name4']);
    $email            = mysqli_real_escape_string($conexao, $_POST['alt_name5']);
    $idnivelusuario	  = mysqli_real_escape_string($conexao, $_POST['alt_name6']);
	$idempresa	      = mysqli_real_escape_string($conexao, $_POST['alt_name7']);
	$telefone	      = mysqli_real_escape_string($conexao, $_POST['alt_name8']);
	$celular	      = mysqli_real_escape_string($conexao, $_POST['alt_name9']);
	
	

 	if(empty($nomeusuario)){
    	$result_encoded[] = array("msg" => 5);	// "Nome usuario "
    	echo json_encode($result_encoded);
    	exit();
    }

    if(empty($login)){
    	$result_encoded[] = array("msg" => 6);	// "Login "
    	echo json_encode($result_encoded);
    	exit();
    }

    if(empty($idnivelusuario)){
    	$result_encoded[] = array("msg" => 7);	// "Nivel usuario "
    	echo json_encode($result_encoded);
    	exit();
    }

    if(empty($idempresa)){
    	$result_encoded[] = array("msg" => 8);	// "Empresa "
    	echo json_encode($result_encoded);
    	exit();
    }	

    If ($senha <> $senhac){
    	$result_encoded[] = array("msg" => 9);	// "Senha difere"
    	echo json_encode($result_encoded);
    	exit();
    }
    
    

	if(!empty($senha)){

        $_POST['alt_name10'] = (isset($_POST['alt_name10']) ) ? 1 : 0;
		$inativo = mysqli_real_escape_string($conexao, trim($_POST['alt_name10']));
	    
	    $senha = MD5($senha);

		$sql = "
			UPDATE usuario 
			   SET nomeusuario    		= '$nomeusuario',
			       login    			= '$login',
			       senha           		= '$senha',
			       email  			    = '$email',
			       idnivelusuario	    = '$idnivelusuario',
			       idempresa   		    = '$idempresa',
			       telefone     	    = '$telefone',
			       celular              = '$celular',
			       inativo		 		= '$inativo'
			 WHERE idusuario    		= '$idusuario';		
		";

		$result = mysqli_query($conexao, $sql);

		if(mysqli_affected_rows($conexao) > 0) {

			$result_encoded[] = array("msg" => "3"); /* Empresa alterado com sucesso */

		} else if (mysqli_affected_rows($conexao) == 0) {				
		  	$result_encoded[] = array("msg" => "2"); /* Nenhum dado foi alterado */
		} else { 
			$result_encoded[] = array("msg" => "1"); /* Erro ao atualizar dados */
		}

	} else {

		$result_encoded[] = array("msg" => 4);	// "Senha não foi informado"
		
	}

	// fecha conexão

	echo json_encode($result_encoded);



?>