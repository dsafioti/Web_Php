<?php  
	if (!isset($_SESSION)) session_start();

	include '../../conexao.php';
	include '../../valida_cpf.php';

	$idempresa = $_SESSION['idempresa'];

	$cpf  = mysqli_real_escape_string($conexao, $_POST['alt_name3']);

	if (validaCPF($cpf)) {
		/*
		$('#alt_name2').val(sexo);
		$('#alt_name3').val(data[0].cpf);
		$('#alt_name4').val(datanasc);
		$('#alt_name5').val(data[0].nroidentidade);
		$('#alt_name6').val(data[0].orgexped);
		$('#alt_name7').val(data[0].nrocarteirahabilit);
		$('#alt_name8').val(datavalidade);     
		$('#alt_name9').val(data[0].categoria);
		$('#alt_name10').val(data[0].endereco);
		$('#alt_name11').val(data[0].nroend);
		$('#alt_name12').val(data[0].bairro); 
		$('#alt_name13').val(data[0].complemento); 
		$('#alt_name14').val(data[0].cep);
		$('#alt_name15').val(data[0].cidade);
		$('#alt_name16').val(data[0].estado);        
		$('#alt_name17').val(data[0].celular);
*/


		$identregador = mysqli_real_escape_string($conexao, $_POST['alt_name0']);

		$nomeentreg   = mysqli_real_escape_string($conexao, $_POST['alt_name1']);

		$sexo 		  = mysqli_real_escape_string($conexao,$_POST['alt_name2']);
		
		$datanasc  	  = mysqli_real_escape_string($conexao,$_POST['alt_name4']);

		$nroidentidade = mysqli_real_escape_string($conexao,$_POST['alt_name5']);

		$orgexped 	  = mysqli_real_escape_string($conexao,$_POST['alt_name6']);

		$nrocarteirahabilit = mysqli_real_escape_string($conexao,$_POST['alt_name7']);

		$datavalidadehabilit = mysqli_real_escape_string($conexao,$_POST['alt_name8']);

		$categoria = mysqli_real_escape_string($conexao,$_POST['alt_name9']);

		$endereco  = mysqli_real_escape_string($conexao,$_POST['alt_name10']);

		$nroend    = mysqli_real_escape_string($conexao,$_POST['alt_name11']);

		$bairro    = mysqli_real_escape_string($conexao,$_POST['alt_name12']);

		$complemento = mysqli_real_escape_string($conexao,$_POST['alt_name13']);

		$cep		 = mysqli_real_escape_string($conexao,$_POST['alt_name14']);

		$cidade		 = mysqli_real_escape_string($conexao,$_POST['alt_name15']);

		$estado		 = mysqli_real_escape_string($conexao,$_POST['alt_name16']);

		$celular	 = mysqli_real_escape_string($conexao,$_POST['alt_name17']);
		$tipopessoa  = 'E';

        //$inativo     = 0;

        $_POST['alt_name18'] = ( isset($_POST['alt_name18']) ) ? 1 : 0;
		$inativo = mysqli_real_escape_string($conexao, trim($_POST['alt_name18']));
	

		/*
		$dtnascimento        = mysqli_real_escape_string($conexao, $_POST['alt_name4']);

		$nroidentidade 		 = mysqli_real_escape_string($conexao, $_POST['nroidentidade']);
		$orgexped      		 = mysqli_real_escape_string($conexao, $_POST['orgexped']);
		
		$nrocarteirahabilit  = mysqli_real_escape_string($conexao, $_POST['nrocarteirahabilit']);
		$datavalidadehabilit = mysqli_real_escape_string($conexao, $_POST['datavalidadehabilit']);
		$categoria 			 = mysqli_real_escape_string($conexao, $_POST['categoria']);	
		$endereco      		 = mysqli_real_escape_string($conexao, $_POST['endereco']);
		$nroend        		 = mysqli_real_escape_string($conexao, $_POST['nroend']);
		$bairro        		 = mysqli_real_escape_string($conexao, $_POST['bairro']);
		$cidade        		 = mysqli_real_escape_string($conexao, $_POST['cidade']);
		$celular       		 = mysqli_real_escape_string($conexao, $_POST['celular']);
		$estado        		 = mysqli_real_escape_string($conexao, $_POST['estado']);
		
		if(!empty($inativo)) {
			$inativo = mysqli_real_escape_string($conexao, $_POST['alt_name18']);
		} else {
			$inativo = '';
		}

		$replaced_data = str_replace("/", "-", $dtnascimento);
	    $converted_data = date('Y-m-d', strtotime($replaced_data));

	    $dtnascimento = $converted_data;


		$sql = "
			UPDATE entregador 
			   SET nomeentreg = '$nomeentreg'
			   	   dtnascimento = '$dtnascimento',
			   	   nroidentidade = '$nroidentidade',
			   	   orgexped = '$orgexped',
			   	   cpf = '$cpf',
			   	   nrocarteirahabilit = '$nrocarteirahabilit',
			   	   datavalidadehabilit = '$datavalidadehabilit',
			   	   categoria = '$categoria',
			   	   endereco = '$endereco',
			   	   nroend = '$nroend',
			   	   bairro = '$bairro',
			   	   cidade = '$cidade',
			   	   celular = '$celular',
			   	   estado = '$estado',
			   	   inativo = '$inativo'
			 WHERE identregador = '$identregador';		
		";

		*/

		/*Dta de nascimento */
		$replaced_data  = str_replace("/", "-", $datanasc);
	    $converted_data = date('Y-m-d', strtotime($replaced_data));
	    $dtnascimento   = $converted_data;

	    /*Dta de validade da carteira de habilitação */
   		$replaced_datahabilit  = str_replace("/", "-",$datavalidadehabilit);
	    $converted_datahabilit = date('Y-m-d', strtotime($replaced_datahabilit));
	    $datavalidadehabilit   = $converted_datahabilit;

		$sql = "
			UPDATE pessoa 
			   SET nomepessoa    		= '$nomeentreg',
			       sexo          		= '$sexo',
			       cpf           		= '$cpf',
			       dtnascimento  		= '$dtnascimento',
			       nroidentidade 		= '$nroidentidade',
			       orgexped		 		= '$orgexped',
			       nrocarteirahabilit 	= '$nrocarteirahabilit',
			       datavalidadehabilit  = '$datavalidadehabilit',
			       categoria     		= '$categoria',
			       endereco      		= '$endereco',
			       nroend        		= '$nroend',
			       idbairro		 		= '$bairro',
			       complemento	 		= '$complemento',
			       cep           		= '$cep',
			       cidade 		 		= '$cidade',
			       estado		 		= '$estado',
			       celular		 		= '$celular',
			       inativo		 		= '$inativo',
			       tipopessoa           = '$tipopessoa',
			       idempresa            = '$idempresa'
			 WHERE idpessoa  		    = '$identregador';		
		";
        
        //echo($sql);
        //exit();
		$result = mysqli_query($conexao, $sql);

		if(mysqli_affected_rows($conexao) > 0) {

			$result_encoded[] = array("msg" => "3"); /* Entregador alterado com sucesso */

		} else if (mysqli_affected_rows($conexao) == 0) {				
		  	$result_encoded[] = array("msg" => "2"); /* Nenhum dado foi alterado */
		} else { 
			$result_encoded[] = array("msg" => "1"); /* Erro ao atualizar dados */
		}

	} else {

		$result_encoded[] = array("msg" => 0);	// "O CPF não foi informado"
		
	}

	// fecha conexão

	echo json_encode($result_encoded);



?>