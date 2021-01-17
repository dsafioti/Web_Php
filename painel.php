<?php

if(!isset($_SESSION)) { 
	session_start(); 
}

include('verifica_login.php');
include('conexao.php');

?>

<h2>Olá, <?php echo $_SESSION['usuario'];?></h2>

<?php
$query = "select * from usuario";
//execução da query
//$result = mysqli_query($conexao, $query);
//numero de linhas afetadas 
//caso eu queira printar o numero de linhas afetdas ...echo @row;exit;
//$row = mysqli_num_rows($result);

if ($result = mysqli_query($conexao, $query)) {
    echo '<table style = "border: solid 1px"> <th>Login</th><th> Nome Usuario </th> ';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>'.$row['login'].'</td>';
        echo '<td>'.$row['nomeusuario'].'</td>';
        echo '</tr>';
	}
	echo '</table>';
}


?>



<h2><a href="logout.php">Sair</a></h2>