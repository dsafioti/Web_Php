<?php  
	if (!isset($_SESSION)) session_start();

	include '../../conexao.php';
	
	$idpadraodevalor = mysqli_real_escape_string($conexao, $_POST['ger_name0']);
	$dtinicial 	 	 = mysqli_real_escape_string($conexao, $_POST['ger_name1']);
	$dtfinal 	 	 = mysqli_real_escape_string($conexao, $_POST['ger_name2']);
	$valor 	 	     = mysqli_real_escape_string($conexao, $_POST['ger_name3']);


    //Data Inicial - conversao
    $replaced_dtinicial  = str_replace("/", "-", $dtinicial);
	$converted_dtinicial = date('Y-m-d', strtotime($replaced_dtinicial));
	
    //Data final - conversao
    $replaced_dtfinal  = str_replace("/", "-", $dtfinal);
	$converted_dtfinal = date('Y-m-d', strtotime($replaced_dtfinal));
    //valor
    $replaced_valor  = str_replace(",", ".", $valor);

	if(empty($_POST['inativo'])) {
				$inativo = 0;
			} else {
				$inativo = mysqli_real_escape_string($conexao, $_POST['inativo']);
			}
	
    //validar  

    if (empty($idpadraodevalor)) {
		$result_encoded[] = array("msg" => 3);
	} else {

			//validar se nao tem algum histório de padrao ainda ativo
    		$sql0 = "
			SELECT *
			FROM historicopadraodevalor
			WHERE idpadraodevalor = '$idpadraodevalor'
			and inativo = 0;
			       ";
			//echo $sql0;
			//exit();			       

			if ($result0 = mysqli_query($conexao, $sql0)) {		
				$row = mysqli_num_rows($result0);
				if ($row > 0) {
					   $result_encoded[] = array("msg" =>4);					
				}else{

					  $sql = "
						INSERT INTO  historicopadraodevalor (idpadraodevalor,dtinicial,dtfinal,valor,inativo) 
						VALUES ('$idpadraodevalor','$converted_dtinicial','$converted_dtfinal','$replaced_valor','$inativo');
							";
						//echo $sql;
						//exit();

						if ($conexao->query($sql) === TRUE) {
							$result_encoded[] = array("msg" => 0);			
						} else {
							$result_encoded[] = array("msg" => 1);	
						//echo "Erro ao cadastrar o Bairro";
						}		

				   }
			}		   

	}

	echo json_encode($result_encoded);
