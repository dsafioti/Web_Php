<?php
	if (!isset($_SESSION)) session_start();
	include('../../conexao.php');
	
	$idusuario = mysqli_real_escape_string($conexao, trim($_POST['up_id_adm']));
	
	$sql = "";
	
	if(!empty($_POST['permissao_adm'])) {
		
		$sql .= "UPDATE nivelacesso SET permissao = '0' WHERE idusuario = '$idusuario';";
		
		foreach($_POST['permissao_adm'] as $idpagina) {
	        
			$sql .= "UPDATE nivelacesso SET permissao = '1' WHERE idusuario = '$idusuario' AND idpagina = '$idpagina';";
			
	    }	
	}
	
	$update = mysqli_multi_query($conexao, $sql);
	
	if(mysqli_affected_rows($conexao) >= 0) {
		$response = array("msg" => "Permissões alteradas com sucesso");
	} else {
		$response = array("msg" => "Erro ao alterar permissões");
	}

	echo json_encode($response);
	$conexao->close();
	exit();
	
?>