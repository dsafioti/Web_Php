
<?php  
	if (!isset($_SESSION)) session_start();

	include '../../conexao.php';

	$nomepadrao	  		= mysqli_real_escape_string($conexao, $_POST['alt_name1']);
	$nomenclatura		= mysqli_real_escape_string($conexao, $_POST['alt_name2']);
	
	

	if (!empty($nomepadrao)) {

		$idpadraodevalor = mysqli_real_escape_string($conexao, $_POST['alt_name0']);   
	
		$sql = "
			UPDATE padraodevalor 
			   SET nomepadrao 	= '$nomepadrao',
			       nomenclatura	= '$nomenclatura'
			WHERE idpadraodevalor    = '$idpadraodevalor' ";	
		        


		$result = mysqli_query($conexao, $sql);

		if(mysqli_affected_rows($conexao) > 0) {

			$result_encoded[] = array("msg" => "3"); /* Bairro alterado com sucesso */

		} else if (mysqli_affected_rows($conexao) == 0) {				
		  	$result_encoded[] = array("msg" => "2"); /* Nenhum dado foi alterado */
		} else { 
			$result_encoded[] = array("msg" => "1"); /* Erro ao atualizar dados */
		}

	} else {

		$result_encoded[] = array("msg" => 0);	// "O Bairro não foi informado"
		
	}

	// fecha conexão

	echo json_encode($result_encoded);



?>