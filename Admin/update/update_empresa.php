
<?php  
	if (!isset($_SESSION)) session_start();

	include '../../conexao.php';
	include '../../valida_cnpj.php';

	$cnpj	  = mysqli_real_escape_string($conexao, $_POST['alt_name3']);
	$cnpj_database = $cnpj;
	//$cnpj = '71.320.915/0001-22';

	$cnpj = str_replace(".", "", $cnpj);
	$cnpj = str_replace("/", "", $cnpj);
	$cnpj = str_replace("-", "", $cnpj);


	if (isCnpjValid($cnpj)) {

		$idempresa = mysqli_real_escape_string($conexao, $_POST['alt_name0']);
		$razaosocial   = mysqli_real_escape_string($conexao, $_POST['alt_name1']);
		$nomefantasia 		  = mysqli_real_escape_string($conexao,$_POST['alt_name2']);
		$inscrestadual  	  = mysqli_real_escape_string($conexao,$_POST['alt_name4']);
		$endereco = mysqli_real_escape_string($conexao,$_POST['alt_name5']);
		$nroend 	  = mysqli_real_escape_string($conexao,$_POST['alt_name6']);
		$complemento = mysqli_real_escape_string($conexao,$_POST['alt_name7']);
		$bairro = mysqli_real_escape_string($conexao,$_POST['alt_name8']);
		$cidade = mysqli_real_escape_string($conexao,$_POST['alt_name9']);
		$cep  = mysqli_real_escape_string($conexao,$_POST['alt_name10']);
		$estado    = mysqli_real_escape_string($conexao,$_POST['alt_name11']);
		$telefone    = mysqli_real_escape_string($conexao,$_POST['alt_name12']);
		$celular = mysqli_real_escape_string($conexao,$_POST['alt_name13']);
		$email		 = mysqli_real_escape_string($conexao,$_POST['alt_name14']);
		$site		 = mysqli_real_escape_string($conexao,$_POST['alt_name15']);
		$slogan		 = mysqli_real_escape_string($conexao,$_POST['alt_name16']);
		//$datacadastro	 = mysqli_real_escape_string($conexao,$_POST['alt_name17']);

        //$inativo     = 0;

        $_POST['alt_name18'] = ( isset($_POST['alt_name18']) ) ? 1 : 0;
		$inativo = mysqli_real_escape_string($conexao, trim($_POST['alt_name18']));
	    
	
		$sql = "
			UPDATE empresa 
			   SET razaosocial    		= '$razaosocial',
			       nomefantasia    		= '$nomefantasia',
			       cnpj           		= '$cnpj_database',
			       inscrestadual  		= '$inscrestadual',
			       endereco 		    = '$endereco',
			       nroend 		 		= '$nroend',
			       complemento     	    = '$complemento',
			       bairro               = '$bairro',
			       cidade       		= '$cidade',
			       cep        		    = '$cep',
			       estado        		= '$estado',
			       telefone		 		= '$telefone',
			       celular	 		    = '$celular',
			       email           		= '$email',
			       site 		 		= '$site',
			       slogan		 		= '$slogan',
			       inativo		 		= '$inativo'
			 WHERE idempresa    		= '$idempresa';		
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

		$result_encoded[] = array("msg" => 0);	// "O CNPJ não foi informado"
		
	}

	// fecha conexão

	echo json_encode($result_encoded);



?>