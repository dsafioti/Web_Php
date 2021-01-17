
<?php
	if (!isset($_SESSION)) session_start();
	include('../../conexao.php');
	include('../../valida_cpf.php');
	include('../../converte_data.php');
	
	$nome_cliente = mysqli_real_escape_string($conexao, trim($_POST['nomeCli']));
	$sexo = mysqli_real_escape_string($conexao, trim($_POST['sexoCli']));
	$cpf_cliente = mysqli_real_escape_string($conexao, trim($_POST['cpfCli']));
	$rg_cliente = mysqli_real_escape_string($conexao, trim($_POST['rgCli']));
    $nascimento_cliente = converteData(mysqli_real_escape_string($conexao, trim($_POST['nascimentoCli'])));	
	$telefone_cliente = mysqli_real_escape_string($conexao, trim($_POST['telefoneCli']));
	$celular_cliente = mysqli_real_escape_string($conexao, trim($_POST['celularCli']));

	$email_cliente = mysqli_real_escape_string($conexao, trim($_POST['emailCli']));
	$cep_cliente = mysqli_real_escape_string($conexao, trim($_POST['cepCli']));
	$logradouro_cliente = mysqli_real_escape_string($conexao, trim($_POST['logradouroCli']));
	$numero_logradouro_cliente = mysqli_real_escape_string($conexao, trim($_POST['numeroCli']));	
	$complemento_logradouro_cliente = mysqli_real_escape_string($conexao, trim($_POST['complementoCli']));
	$tipo_complemento_log_cli = mysqli_real_escape_string($conexao, trim($_POST['tipoComplementoCli']));
	
	$bairro_cliente = mysqli_real_escape_string($conexao, trim($_POST['bairroCli']));
	$cidade_cliente = mysqli_real_escape_string($conexao, trim($_POST['cidadeCli']));
	$estado_cliente = mysqli_real_escape_string($conexao, trim($_POST['estadoCli']));
	$nome_contato = mysqli_real_escape_string($conexao, trim($_POST['nomeContatoCli']));
	$cpf_contato = mysqli_real_escape_string($conexao, trim($_POST['cpfContatoCli']));
	$descricao_cliente = mysqli_real_escape_string($conexao, trim($_POST['descricaoCli']));

	/* Código para verificação de campos obrigatórios */
	$id_usuario = $_SESSION['id_usuario'];
	
	$sql = "SELECT required FROM required WHERE id_usuario = '$id_usuario';";
	$result = mysqli_query($conexao, $sql);
	$row = mysqli_num_rows($result);

	if ($row > 0) {
		while($row = $result->fetch_assoc()) {
	        $required_data = $row["required"];
	    }
	} else {
		$required_data = 1;
	}

	if ($required_data == 0) {
		
		/* campos não obrigatórios */

		if (empty($nome_cliente)) {
			$response = array("msg" => "Preencha o campo nome!");
		    echo json_encode($response);	
		} else {

			$nome_cliente = strtoupper($nome_cliente);
			$rg_cliente = strtoupper($rg_cliente);
			$email_cliente = strtoupper($email_cliente);
			$logradouro_cliente = strtoupper($logradouro_cliente);
			$tipo_complemento_log_cli = strtoupper($tipo_complemento_log_cli);
			$complemento_logradouro_cliente = strtoupper($complemento_logradouro_cliente);
			$bairro_cliente = strtoupper($bairro_cliente);
			$estado_cliente = strtoupper($estado_cliente);
			$cidade_cliente = strtoupper($cidade_cliente);
			$nome_contato = strtoupper($nome_contato);
			$descricao_cliente = strtoupper($descricao_cliente);
		
			$sql = "			
				INSERT INTO cliente (nome_cliente, sexo_cliente, cpf_cliente, rg_cliente, nascimento_cliente, email_cliente, telefone_cliente, celular_cliente, cep_cliente, logradouro_cliente, numero_logradouro_cliente, tipo_complemento_log_cli, complemento_logradouro_cliente, bairro_cliente, estado_cliente, cidade_cliente, nome_contato, cpf_contato, descricao_cliente, data_cadastro_cliente) VALUES ('$nome_cliente','$sexo', '$cpf_cliente','$rg_cliente','$nascimento_cliente','$email_cliente','$telefone_cliente','$celular_cliente','$cep_cliente','$logradouro_cliente','$numero_logradouro_cliente','$tipo_complemento_log_cli','$complemento_logradouro_cliente','$bairro_cliente','$estado_cliente','$cidade_cliente', '$nome_contato','$cpf_contato','$descricao_cliente',NOW());				
			";
			
			if ($conexao->query($sql) === TRUE) {
				$response = array("msg" => "Cliente cadastrado com sucesso");
	    		echo json_encode($response);
			} else {
				$response = array("msg" => "Erro ao cadastrar cliente");
	    		echo json_encode($response);
			}
		
		}

	} else {

		/* campos obrigatórios */

		if (empty($nome_cliente) || empty($cpf_cliente) || empty($celular_cliente) || empty($logradouro_cliente) || empty($numero_logradouro_cliente) || empty($bairro_cliente) || empty($estado_cliente) || empty($cidade_cliente) || empty($cep_cliente)) {
			$response = array("msg" => "Um ou mais campos obrigatórios não foram preenchidos");
		    echo json_encode($response);	
		} else {
		
			if (validaCPF($cpf_cliente)) {
				
				$sql1 = "SELECT COUNT(*) AS total_cli FROM cliente WHERE cpf_cliente = '$cpf_cliente';";
				
				$result1 = mysqli_query($conexao, $sql1);
				$row1 = mysqli_fetch_assoc($result1);
					
				if ($row1['total_cli'] >= 1) {
					$response = array("msg" => "Este cadastro já existe, informe outro e tente novamente");
		    		echo json_encode($response);
				} else {

					$nome_cliente = strtoupper($nome_cliente);
					$rg_cliente = strtoupper($rg_cliente);
					$email_cliente = strtoupper($email_cliente);
					$logradouro_cliente = strtoupper($logradouro_cliente);
					$tipo_complemento_log_cli = strtoupper($tipo_complemento_log_cli);
					$complemento_logradouro_cliente = strtoupper($complemento_logradouro_cliente);
					$bairro_cliente = strtoupper($bairro_cliente);
					$estado_cliente = strtoupper($estado_cliente);
					$cidade_cliente = strtoupper($cidade_cliente);
					$nome_contato = strtoupper($nome_contato);
					$descricao_cliente = strtoupper($descricao_cliente);
					
					$sql = "			
						INSERT INTO cliente (nome_cliente, sexo_cliente, cpf_cliente, rg_cliente, nascimento_cliente, email_cliente, telefone_cliente, celular_cliente, cep_cliente, logradouro_cliente, numero_logradouro_cliente, tipo_complemento_log_cli, complemento_logradouro_cliente, bairro_cliente, estado_cliente, cidade_cliente, nome_contato, cpf_contato, descricao_cliente, data_cadastro_cliente) VALUES ('$nome_cliente','$sexo', '$cpf_cliente','$rg_cliente','$nascimento_cliente','$email_cliente','$telefone_cliente','$celular_cliente','$cep_cliente','$logradouro_cliente','$numero_logradouro_cliente','$tipo_complemento_log_cli','$complemento_logradouro_cliente','$bairro_cliente','$estado_cliente','$cidade_cliente',$nome_contato','$cpf_contato','$descricao_cliente',NOW());						
					";
					
					if ($conexao->query($sql) === TRUE) {
						$response = array("msg" => "Cliente cadastrado com sucesso");
			    		echo json_encode($response);
					} else {
						$response = array("msg" => "Erro ao cadastrar cliente");
			    		echo json_encode($response);
					}
					
				}	
			
			} else {
				$response = array("msg" => "CPF inválido, informe outro e tente novamente");
		    	echo json_encode($response);
			}
		
		}

	}
	
	$conexao->close();
	exit();
	
?>

