<?php
	if (!isset($_SESSION)) session_start();
	include('../../conexao.php');
	
	$requestData = $_REQUEST;
	
	$columns = array(
				
		array('0' => 'nome_peca'),
		array('1' => 'id_peca_plano'),
		array('2' => 'id_peca_plano'),
		array('3' => 'id_peca_plano'),
		array('4' => 'ativo')

	);
	
	$sql1 = "SELECT id_peca_plano, nome_peca, ativo FROM peca_plano ORDER BY nome_peca;";
	
	$dados = array();
	
	if ($result1 = mysqli_query($conexao, $sql1)) {
		
		$tuplas = mysqli_num_rows($result1);
								
	    while ($row1 = mysqli_fetch_assoc($result1)) {
	    	
			$dado = array();
						
			$dado[] = $row1['nome_peca'];
			
			$id = $row1['id_peca_plano'];
			
			$dado[] = '<button type="button" class="btn btn-primary btn-sm" onclick="openModalVisualizarPecaPlano('.$id.')"><i class="fa fa-search"></i></button>';
			$dado[] =  '<button type="button" class="btn btn-success btn-sm" onclick="openModalAlterarPecaPlano('.$id.')"><i class="fa fa-edit"></i></button>';
			$dado[] =  '<button type="button" class="btn btn-danger btn-sm" onclick="inativarPecaPlano('.$id.')"><i class="fa fa-edit"></i></button>';			
			
			$dado[] = $row1['ativo'];
			
			$dados[] = $dado;
			    
	    }
	    
	    $json_data = array(
		
			"draw" => intval($requestData['draw']),
			"recordsTotal" => intval($tuplas),
			"recordsFiltered" => intval($tuplas),
			"data" => $dados
		
		);
	
	    /* free result set */
	    mysqli_free_result($result1);
		
		echo json_encode($json_data);
		
	}

?>