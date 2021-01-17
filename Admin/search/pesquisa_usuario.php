<?php	

	if (!isset($_SESSION)) session_start();

	 $idempresa      = $_SESSION['idempresa'];
	 $idusuario      = $_SESSION['idusuario'];
	 $idnivelusuario = $_SESSION['idnivelusuario'];	   

	if(!isset($_SESSION['usuario'])) {
   
	    header('Location: localhost/sistema/index.php');
	    exit();

	}

	if (isset($_POST['nomeusuario']) || isset($_POST['descrnivel'])) {

		include '../../conexao.php';
		
		if (!empty($_POST['nomeusuario'])) {
	    	$nomeusuario = mysqli_real_escape_string($conexao, $_POST['nomeusuario']);	
	    } else {
	    	$nomeusuario = "";
	    }

	    if (!empty($_POST['descrnivel'])) {
	    	$descrnivel = mysqli_real_escape_string($conexao, $_POST['descrnivel']);	
	    } else {
	    	$descrnivel = "";
	    }

		if (empty($nomeusuario) && empty($descrnivel)) {

			$result_encoded[] = array("msg" => 1);
			echo json_encode($result_encoded);
			exit();

		} else if (($idnivelusuario != 1)) {
			$sql = "SELECT 
			        usr.nomeusuario,
			        usr.login, 
			        niv.descrnivel,
			        usr.inativo,
			        usr.email,
			        usr.idempresa ,
			        usr.idnivelusuario,
			        usr.celular,
			        usr.telefone,
                    emp.razaosocial,
                    usr.idusuario
             FROM usuario usr,nivelusuario niv,empresa emp
			 WHERE usr.idnivelusuario = niv.idnivelusuario
			 and  usr.idempresa = emp.idempresa
			 and usr.idempresa  = '$idempresa'
			 and  niv.descrnivel LIKE '$descrnivel%' 
			 and usr.nomeusuario LIKE '$nomeusuario%'
			 order by usr.nomeusuario";
		} else if (($idnivelusuario == 1)) {
			$sql = "SELECT 
			        usr.nomeusuario,
			        usr.login, 
			        niv.descrnivel,
			        usr.inativo,
			        usr.email,
			        usr.idempresa ,
			        usr.idnivelusuario,
			        usr.celular,
			        usr.telefone,
                    emp.razaosocial,
                    usr.idusuario
             FROM usuario usr,nivelusuario niv,empresa emp
			 WHERE usr.idnivelusuario = niv.idnivelusuario
			 and  usr.idempresa = emp.idempresa
			 and  niv.descrnivel LIKE '$descrnivel%' 
			 and usr.nomeusuario LIKE '$nomeusuario%'
			 Order BY usr.nomeusuario";		
		} else {
			$sql = "";
		}	   
			
		//echo $sql ; exit();	
		$result = mysqli_query($conexao, $sql);
		$row = mysqli_num_rows($result);	
			
		if ($row > 0) {

			while ($row = mysqli_fetch_assoc($result)) {
		    	$result_encoded[] = array_map(null, $row); 
		    }

		} else {
			$result_encoded[] = array("msg" => 2);	
		}

		/* free result set */
	    mysqli_free_result($result);

		/* close connection */
		mysqli_close($conexao);

	} else {
		$result_encoded[] = array("msg" => 0);	
	}

	echo json_encode($result_encoded);
?>
