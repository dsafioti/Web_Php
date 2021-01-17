<?php
	if (!isset($_SESSION)) session_start();
	
	include('../../conexao.php');
	
	if (isset($_POST['id'])) {
	    
		if (!empty($_POST['id'])) {
	    	$id = $_POST['id'];
	    } else {
	    	$id = "";
	    }
	    
	    /*SELECT DATE_FORMAT(dtnascimento, '%d/%m/%y %H:%i') AS data_formatada */

	    $sql1 = "
			 SELECT usr.idusuario,
			        usr.nomeusuario,
			        usr.login,
			        usr.senha, 
			        niv.descrnivel,
			        usr.inativo,
			        usr.email,
			        usr.idempresa ,
			        usr.idnivelusuario,
			        usr.celular,
			        usr.telefone,
                    emp.razaosocial
             FROM usuario usr,nivelusuario niv,empresa emp
			 WHERE usr.idnivelusuario = niv.idnivelusuario
			 and   usr.idempresa      = emp.idempresa
			 and   usr.idusuario = '$id';			
		";
       // echo $sql1;         exit();
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