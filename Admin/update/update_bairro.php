
<?php  
	if (!isset($_SESSION)) session_start();

	include '../../conexao.php';

	$bairro	  		= mysqli_real_escape_string($conexao, $_POST['alt_name1']);
	$setor	  		= mysqli_real_escape_string($conexao, $_POST['alt_name2']);
	$kilometragem	= mysqli_real_escape_string($conexao, $_POST['alt_name3']);
	

	if (!empty($bairro)) {

		$idbairro = mysqli_real_escape_string($conexao, $_POST['alt_name0']);   
	
		$sql = "
			UPDATE bairro 
			   SET nomebairro 	= '$bairro',
			       setor 	  	= '$setor',
			       kilometragem = '$kilometragem'
			 WHERE idbairro   = '$idbairro' ";	
		        


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