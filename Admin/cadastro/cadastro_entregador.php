<?php  
	if (!isset($_SESSION)) session_start();

	include '../../conexao.php';
	include '../../valida_cpf.php';
	$idempresa = $_SESSION['idempresa'];

	$cpf  = mysqli_real_escape_string($conexao, $_POST['cpf']);

	if (validaCPF($cpf)) {

		$nomeentreg    		 = mysqli_real_escape_string($conexao, $_POST['nomeentreg']);
		//$idempresa    		 = mysqli_real_escape_string($conexao, $_POST['idempresa']);
		$sexo    		     = mysqli_real_escape_string($conexao, $_POST['sexo']);
		
		$dtnascimento        = mysqli_real_escape_string($conexao, $_POST['dtnascimento']);
		$nroidentidade 		 = mysqli_real_escape_string($conexao, $_POST['nroidentidade']);
		$orgexped      		 = mysqli_real_escape_string($conexao, $_POST['orgexped']);
		
		$nrocarteirahabilit  = mysqli_real_escape_string($conexao, $_POST['nrocarteirahabilit']);
		$datavalidadehabilit = mysqli_real_escape_string($conexao, $_POST['datavalidadehabilit']);
		$categoria 			 = mysqli_real_escape_string($conexao, $_POST['categoria']);	
		$endereco      		 = mysqli_real_escape_string($conexao, $_POST['endereco']);
		$nroend        		 = mysqli_real_escape_string($conexao, $_POST['nroend']);
		$bairro        		 = mysqli_real_escape_string($conexao, $_POST['bairro']);
		$complemento       	 = mysqli_real_escape_string($conexao, $_POST['complemento']);
		$cep            	 = mysqli_real_escape_string($conexao, $_POST['cep']);		
		$cidade        		 = mysqli_real_escape_string($conexao, $_POST['cidade']);
		$celular       		 = mysqli_real_escape_string($conexao, $_POST['celular']);
		$estado        		 = mysqli_real_escape_string($conexao, $_POST['estado']);
		
		if(!empty($inativo)) {
			$inativo = mysqli_real_escape_string($conexao, $_POST['inativo']);
		} else {
			$inativo = '';
		}

		/*Dta de nascimento */
		$replaced_data  = str_replace("/", "-", $dtnascimento);
	    $converted_data = date('Y-m-d', strtotime($replaced_data));
	    $dtnascimento   = $converted_data;

		/*Dta de validade da carteira de habilitação */
   		$replaced_datahabilit  = str_replace("/", "-", $datavalidadehabilit);
	    $converted_datahabilit = date('Y-m-d', strtotime($replaced_datahabilit));
	    $datavalidadehabilit   = $converted_datahabilit;
	    $tipopessoa = 'E';

		$sql = "
			INSERT INTO pessoa (nomepessoa,idempresa, sexo,dtnascimento,nroidentidade,orgexped,cpf,nrocarteirahabilit,
			datavalidadehabilit,categoria,endereco,nroend,idbairro,complemento,cep,cidade,celular,estado,inativo,tipopessoa) 
			VALUES ('$nomeentreg','$idempresa','$sexo', '$dtnascimento', '$nroidentidade','$orgexped','$cpf','$nrocarteirahabilit',
			'$datavalidadehabilit','$categoria','$endereco', '$nroend', '$bairro','$complemento','$cep' ,'$cidade', '$celular',
			 '$estado', '$inativo','$tipopessoa');
		";

		//echo($sql);

		if ($conexao->query($sql) === TRUE) {
			$result_encoded[] = array("msg" => 1);			
		} else {
			echo "Erro ao cadastrar o Entregador";
		}

	} else {
		$result_encoded[] = array("msg" => 0);

		/*echo "O CPF não foi informado<br>";
		echo '<a href="../index.php">Voltar</a>';*/
	}

	echo json_encode($result_encoded);

?>