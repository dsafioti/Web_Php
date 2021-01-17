
<?php  
	if (!isset($_SESSION)) session_start();

	include '../../conexao.php';

    $idhistoricopadrao  = mysqli_real_escape_string($conexao, $_POST['alt_name0']);
	$dtinicial	  		= mysqli_real_escape_string($conexao, $_POST['alt_name1']);
	$dtfinal		    = mysqli_real_escape_string($conexao, $_POST['alt_name2']);
	$valor  		    = mysqli_real_escape_string($conexao, $_POST['alt_name3']);

   //Data Inicial - conversao
    $replaced_dtinicial  = str_replace("/", "-", $dtinicial);
	$converted_dtinicial = date('Y-m-d', strtotime($replaced_dtinicial));

	//Data final - conversao
    $replaced_dtfinal  = str_replace("/", "-", $dtfinal);
	$converted_dtfinal = date('Y-m-d', strtotime($replaced_dtfinal));

	//valor
    $replaced_valor  = str_replace(",", ".", $valor);


	if (!empty($idhistoricopadrao)) {

		$_POST['alt_name4'] = (isset($_POST['alt_name4']) ) ? 1 : 0;
		$inativo = mysqli_real_escape_string($conexao, trim($_POST['alt_name4']));

		

	
		$sql = "
			UPDATE historicopadraodevalor 
			   SET dtinicial 	= '$converted_dtinicial',
			       dtfinal		= '$converted_dtfinal',
			       valor        = '$replaced_valor',
			       inativo	    = '$inativo'
			WHERE idhistoricopadrao  = '$idhistoricopadrao' ";	
		        
		//echo $sql;	
		//exit();

		$result = mysqli_query($conexao, $sql);

		if(mysqli_affected_rows($conexao) > 0) {

			$result_encoded[] = array("msg" => "3"); /* Historico alterado com sucesso */

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