<?php
// definindo as constantes
define('HOST', '127.0.0.1');
define('LOGIN', 'root'); //usuario padrao do mysql
define('SENHA', '');//senha padrao do mysql
define('DB', 'dssoft');// nome da base de dados

$conexao = mysqli_connect(HOST, LOGIN, SENHA, DB) or die ('Acesso negado - entre em contato com a DSoft-(16)98827-3944 - Ribeirao Preto - SP');

?>