<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Projeto Final Curso Programador Web Senai - Busca de Empregos - Lembrar Senha</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
<section id="container">
<!--linha superior do site-->
<nav id="linha"></nav>
<!--menu superior do site-->
<nav id="menuSuperior">
<figure id="logo"><img src="imagens/logoSenaiFinal.JPG" width="193" height="142"></figure>
</nav>
</nav>
</header>
<form action="#" method="POST" enctype="multipart/form-data" id="lembrasenha" />
	<fieldset id="lembrete">
    <legend>Digite o e-mail cadastrado conosco.</legend>
    Nome: <input type="text" name="nome" id="email"><br />
    Sobrenome:<input type="text" name="sobrenome" id="sobrenome"><br />
	E-mail: <input type="email" name="email" id="email"><br />
    <input type="hidden" name="acao"  value="lembrar" />
    <input type="submit" name="lembrar" value="Lembrar Senha" />
    </fieldset>
    <br />  <br />
    <?php 
/*Conexão ao banco de dados*/
	$con = mysql_connect("localhost","root","mlpsilv@30111969ec031103");
	$db = mysql_select_db("projetofinalsenai");		
		
	/*sentando charset*/
	mysql_query("SET NAMES'utf8'");
	mysql_query('SET character_set_connection=utf8');
	mysql_query('SET character_set_client=utf8');
	mysql_query('SET character_set_results=utf8');
	
	
	 if( $_POST['acao']){
	 $nome  =  mysql_real_escape_string($_POST['nome']);
     $sobrenome  =  mysql_real_escape_string($_POST['sobrenome']);
	 $email =  mysql_real_escape_string($_POST['email']);
	 
	 $getResults   = mysql_query("SELECT  `nome`,`sobrenome`,`email`,`senha` FROM `login` WHERE nome ='$nome',
	                              sobrenome='$sobrenome',email='$email'");
	 while($row = mysql_fetch_array($getResults)){
		 $name     = $row['nome'];
		 $lastname = $row['sobrenome'];
		 $e_mail   = $row['email'];
		 $password = $row['senha'];
		 }
	 if(@mysql_num_rows($getResults)!= 1){
	 echo '<h4>Nome ou E-mail não cadastrados.</h4>';
		}
	 }
	 else{
		
		$enviar = $_POST['$getResults'];		
		$Subject = 'Lembrete de senha do site Projeto Final Senai Web Programador.';
		$Sendto  = $_POST['email'];
		
		// Este sempre deverá existir para garantir a exibição correta dos caracteres
		$headers = "MIME_Version: 1.1\n";		
		// Para enviar o e-mail em formato HTML com codificação de caracteres Unicode (Usado em todos os países)
		$headers = "Content-type: text/plain; charset=utf-8\n";
		$headers .= "From: projetofinalsenai.esy.es\r\n"; // remetente
		$headers .= "Return-Path: projetofinalsenai.esy.es\r\n"; // return-path		
		// para enviar a mensagem em prioridade máxima
		$headers .= "X-Priority: 1\n";

		$enviando = mail($Subject,$Sendto,$enviar);
				
		if($enviando){
			echo '<script type=\"text/javascript\">alert("Usuários e senah enviado com sucesso!");</script>';
					 }
					 else{
						 echo'Erro ao enviar';
						 
						 }
	 
 }					

			
		
	?>
</form>
</section>	
</body>
</html>