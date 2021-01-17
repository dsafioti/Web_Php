<?php
	if (!isset($_SESSION)) session_start();
	
	include('../../conexao.php');
	$idempresa = $_SESSION['idempresa'];
	
	if (isset($_POST['id'])) {
	    
		if (!empty($_POST['id'])) {
	    	$id = $_POST['id'];
	    } else {
	    	$id = "";
	    }
	    
	    /*SELECT DATE_FORMAT(dtnascimento, '%d/%m/%y %H:%i') AS data_formatada */
	  

	    $sql1 = "			
			SELECT 
            P.idpessoa,
			P.tipopessoa,
			P.nomepessoa,
			P.sexo,
			P.nroidentidade,
			P.orgexped,
			P.dataexped,
			P.endereco,
			P.nroend,
			P.complemento,
			P.cep,
			P.cidade,
			P.celular,
			P.estado,
			P.inativo,
			P.cpf,
			P.dtnascimento,
			P.nrocarteirahabilit,
			P.datavalidadehabilit,
			P.categoria,
			P.idempresa,
			B.idbairro,
			B.Nomebairro
			FROM pessoa P,bairro B,empresa emp
            where p.idbairro = B.idbairro
            and  p.idempresa = emp.idempresa
            and  P.idpessoa  = '$id';
			
		";

		if ($result1 = mysqli_query($conexao, $sql1)) {
								
		    while ($row1 = mysqli_fetch_assoc($result1)) {

		    		/*
		    		imprimindo o array
		    	   	var_dump(array_map(null, $row1));		    			
		    	   	*/

		    	$result_encoded[] = array_map(null, $row1); 
		    	
		    }
		   
		} else {
			
			$result_encoded[] = array("msg" => 1);
			
		}	

	} else {

		$result_encoded[] = array("msg" => 0);

	}		
	
	echo json_encode($result_encoded);	

?>