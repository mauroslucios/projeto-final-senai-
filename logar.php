<?php
// Verifica se houve POST e se o usu�rio ou a senha �(s�o) vazio(s)
if (!empty($_POST) AND (empty($_POST['nome']) OR empty($_POST['senha']))) {
	header("Location: entrar.php"); exit;
}
//$con = mysql_connect("localhost","u416966957_senai","qY0YxhrATW");
//$db = mysql_select_db("u416966957_vagas");	
		
// Tenta se conectar ao servidor MySQL
$con = mysql_connect("localhost","root","mlpsilv@30111969ec031103");
// Tenta se conectar a um banco de dados MySQL
$db = mysql_select_db("projetofinalsenai");	
 // Se a sess�o n�o existir, inicia uma
session_start();
// Tenta se conectar a um banco de dados MySQL
//$con = mysql_connect("localhost","u416966957_senai","qY0YxhrATW");
// Tenta se conectar a um banco de dados MySQL
//$db = mysql_select_db("u416966957_senai");
		mysql_query("SET NAMES'utf8'");
		mysql_query('SET character_set_connection=utf8');
		mysql_query('SET character_set_client=utf8');
		mysql_query('SET character_set_results=utf8');
 

$nome  = mysql_real_escape_string($_POST['nome']);
$senha = sha1($_POST['senha']);

// Valida��o do usu�rio/senha digitados

$sql = "SELECT  `nome` ,  `senha` FROM  `login` WHERE nome =  '$nome' AND senha ='$senha' LIMIT 1";

//$sql = "SELECT `nome`, `senha` FROM `login` WHERE nome ='$nome' AND senha ='$senha';";
$query = mysql_query($sql);


if (mysql_num_rows($query) != 1) {
	// Mensagem de erro quando os dados s�o inv�lidos e/ou o usu�rio n�o foi encontrado
	
	header("Location: entrar.php");
	
} else {
	// Salva os dados encontados na vari�vel $resultado
	$resultado = mysql_fetch_assoc($query);

	

	// Salva os dados encontrados na sess�o
	$_SESSION['UsuarioNome']   = $resultado['nome'];
	$_SESSION['UsuarioSenha']  = $resultado['senha'];
	
	

	
	
	// Redireciona o visitante	
	header("Location: home.php"); 
	exit;
	
}

?>