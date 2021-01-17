<?php
	
	if(!isset($_SESSION)) { 
        session_start(); //função session_start é para mencionar q queremos trabalhar com sessao 
    } 

	include('conexao.php');

	//funçao empty(vazia) vinda por post e senha por post
	// já de inicio vai direcionar para a pagina index.php 
	if (empty($_POST['idempresa']) || empty($_POST['usuario']) || empty($_POST['senha'])) {
		header('Location: index.php'); //redireciona para a pagina index
		exit();
	}

	//criação de variávies...
	//funcao "mysqli_real_escape_string" evitar conflitos com caracteres especiais 
	//a variável $conexao(string de conexão) vem da conexao.php e login /senha , vindo do formulario
	$idempresa = mysqli_real_escape_string($conexao, $_POST['idempresa']);
	$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
	$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
	$senha = MD5($senha);
   // Echo MD5($senha);exit();
	
	//apenas monto a expressao de consulta
	$query = "select idusuario,login,idempresa,idnivelusuario from usuario where login = '{$usuario}' and senha = '{$senha}' and idempresa = '{$idempresa}'";

	//execução da query
	
	$result = mysqli_query($conexao, $query);

	//numero de linhas afetadas 
	//caso eu queira printar o numero de linhas afetdas ...echo @row;exit;
	$row = mysqli_num_rows($result);


	if($row == 1) {
		//variavel se sessao $_SESSION
		$_SESSION['usuario']   = $usuario;

		while ($row_query = mysqli_fetch_assoc($result)) { 
                      
          $_SESSION['idusuario']      = $row_query['idusuario'];
		  $_SESSION['idempresa']      = $row_query['idempresa'];
		  $_SESSION['idnivelusuario'] = $row_query['idnivelusuario'];
		  
                                       
        }
		
		header('Location:Admin/index.php');
		exit();
	} else {
		$_SESSION['nao_autenticado'] = true;
		header('Location: index.php');
		exit();
	}

?>	