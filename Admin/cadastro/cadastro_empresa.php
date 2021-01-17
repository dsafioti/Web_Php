<?php  
	if (!isset($_SESSION)) session_start();

	include '../../conexao.php';
	include '../../valida_cnpj.php';

	$cnpj  = mysqli_real_escape_string($conexao, $_POST['cnpj']);

    //preservo a digitacao
	$cnpj_database = $cnpj;

	//$cnpj = '71.320.915/0001-22';

	$cnpj = str_replace(".", "", $cnpj);
	$cnpj = str_replace("/", "", $cnpj);
	$cnpj = str_replace("-", "", $cnpj);

	if (empty($cnpj)) {
		$result_encoded[] = array("msg" => 3);
	} else {

		if (isCnpjValid($cnpj)) {

			$razaosocial   		 = mysqli_real_escape_string($conexao, $_POST['razaosocial']);
			$nomefantasia        = mysqli_real_escape_string($conexao, $_POST['nomefantasia']);
			$inscrestadual       = mysqli_real_escape_string($conexao, $_POST['inscrestadual']);
			$endereco      		 = mysqli_real_escape_string($conexao, $_POST['endereco']);
			$nroend        		 = mysqli_real_escape_string($conexao, $_POST['nroend']);
			$complemento       	 = mysqli_real_escape_string($conexao, $_POST['complemento']);
	        $cep            	 = mysqli_real_escape_string($conexao, $_POST['cep']);
	        $bairro        		 = mysqli_real_escape_string($conexao, $_POST['bairro']);
			$cidade        		 = mysqli_real_escape_string($conexao, $_POST['cidade']);
			$estado        		 = mysqli_real_escape_string($conexao, $_POST['estado']);	
			$telefone 		     = mysqli_real_escape_string($conexao, $_POST['telefone']);
			$celular      		 = mysqli_real_escape_string($conexao, $_POST['celular']);
			$email				 = mysqli_real_escape_string($conexao, $_POST['email']);
			$site 				 = mysqli_real_escape_string($conexao, $_POST['site']);
			$slogan 			 = mysqli_real_escape_string($conexao, $_POST['slogan']);

			if(empty($_POST['inativo'])) {
				$inativo = 0;
			} else {
				$inativo = mysqli_real_escape_string($conexao, $_POST['inativo']);
			}

			$sql = "
				INSERT INTO empresa (razaosocial,nomefantasia,cnpj,inscrestadual,endereco,nroend,complemento,
				cep,bairro,cidade,estado,telefone,celular,email,site,slogan,inativo) 
				VALUES ('$razaosocial','$nomefantasia', '$cnpj_database', '$inscrestadual', '$endereco','$nroend','$complemento',
				'$cep','$bairro','$cidade', '$estado', '$telefone','$celular','$email' , '$site', '$slogan', '$inativo'
				);
			";

			if ($conexao->query($sql) === TRUE) {
				$result_encoded[] = array("msg" => 1);			
			} else {
				$result_encoded[] = array("msg" => 2);	
				//echo "Erro ao cadastrar a Empresa";
			}

		} else {
			$result_encoded[] = array("msg" => 0);

			/*echo "O CNPJ não é válido";
			echo '<a href="../index.php">Voltar</a>';*/
		}

	}

	echo json_encode($result_encoded);

?>