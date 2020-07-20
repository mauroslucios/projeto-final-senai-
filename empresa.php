<!doctype html>
<html>
<head>
<link href="shadowbox/shadowbox.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="shadowbox/shadowbox.js"></script>
<script type="text/javascript">
 Shadowbox.init({
 language: 'pt',
 player: ['img', 'html', 'swf','mp4']
 });
</script>
<meta charset="utf-8">
<title>Projeto Final Curso Programador Web Senai - Cadastro Empresas</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<!--container onde está todo conteúdo do site-->
<section id="container">
<!--linha superior do site-->
<nav id="linha"></nav>
<!--menu superior do site-->
<nav id="menuSuperior">
<ul class="menuSuperior">
	<li><a href="home.php" title="home">Home</a></li>
	<li class="selected"><a href="empresa.php" title="cadastro de empresas">Empresas</a></li>
    <li><a href="contato.php">Contato</a></li>
     <li><a href="buscarcurriculo.php" title="home">Curriculos</a></li>
    <li><a href="logout.php">Sair</a>
</ul>
    
</nav>
<!--cabeçalho do site-->
<header>
<!--slider do site-->
<nav id="slider">

<section id="formularioCadastro">
<!--formulário de cadastro com banco de dados--> 
<form id="cadastroCandidatos" method="post" action="#" enctype="multipart/form-data">
<fieldset>
<legend>Suas informações para cadastro de vagas de sua empresa:</legend>
<input type="text"   name="titulo" value="titulo de sua vaga" id="seunome" required>
<input type="text"   name="empresa" value="sua empresa" id="seuestadocivil" required>
<textarea            name="descricao" id="descricao">descrição da vaga</textarea>
<input type="text"   name="cidade" value="sua cidade" required id="suacidade">
<input type="text"   name="uf" value="seu estado" required id="seuestado">
<input type="text"   name="cep" value="seu cep" required id="cep">
<input type="email"  name="email" value="seu e-mail" id="seutelefone" required>
<input type="text"   name="turno" value="turno de trabalho" id="seucpf" required>
<input type="text"   name="dias" value="dias da semana" id="orgaoemissor" required>
<input type="text"   name="salario" value="salário a pagar" id="salario" required>
<input type="submit" name="btncadastrar" value="Cadastrar seu dados" id="btncadastrarseusdados">
<input type="reset"  name="btnlimpar" value="Limpar formulário" id="btnlimparseusdados">
</fieldset>
</form>

<?php 
  
	
	/*Conexão ao banco de dados*/
	$con = mysql_connect("localhost","root","mlpsilv@30111969ec031103");
	$db = mysql_select_db("projetofinalsenai");		
	//$con = mysql_connect("localhost","u416966957_senai","qY0YxhrATW");
	//$db = mysql_select_db("u416966957_vagas");	
		
	/*sentando charset*/
	mysql_query("SET NAMES'utf8'");
	mysql_query('SET character_set_connection=utf8');
	mysql_query('SET character_set_client=utf8');
	mysql_query('SET character_set_results=utf8');
	
	$titulo    = $_POST['titulo'];
	$descricao = $_POST['descricao'];
	$empresa   = $_POST['empresa'];
	$cidade    = $_POST['cidade'];
	$uf        = $_POST['uf'];
	$email     = $_POST['email'];
	$turno     = $_POST['turno'];
	$dias      = $_POST['dias'];
	$salario   = $_POST['salario'];
	session_destroy();
    session_unset();
	
	if(isset($_POST['btncadastrar'])){
	$inserir = mysql_query("INSERT INTO `vagas`(`titulo`,`descricao`,`empresa`,`cidade`,`uf`,`email`,`turno`,`dias`,`salario`) 
	VALUES ('$titulo','$descricao','$empresa','$cidade','$uf','$email','$turno','$dias','$salario')");
	echo"<script language=javascript> alert(\"Cadastro realizado com Sucesso!\");</script>";
	}
	?>
</section>
</nav>
</header>
<!--menu interior do site-->
<nav id="menuinterior">
<!--formulaário de buscar do site-->
<span  id="anunciantesSite"><h2>EMPRESAS QUE BUSCAM COLABORADORES CONOSCO FAÇA PARTE DESTE GRUPO.</h2></span>
</nav>
<!--resultado da bsuca do site-->
<div id="resultado">
<span class="anunciantes"><img src="imagens/anunciantes/abril_educacao.jpg"></span>
<span class="anunciantes"><img src="imagens/anunciantes/carrefour.jpg"></span>
<span class="anunciantes"><img src="imagens/anunciantes/cea.jpg"></span>
<span class="anunciantes"><img src="imagens/anunciantes/ciee.jpg"></span>
<span class="anunciantes"><img src="imagens/anunciantes/cocacola.jpg"></span>
<span class="anunciantes"><img src="imagens/anunciantes/cepel.jpg"></span>
<span class="anunciantes"><img src="imagens/anunciantes/culturainglesa.jpg"></span>
<span class="anunciantes"><img src="imagens/anunciantes/fundacao_roberto_marinho.jpg"></span>
<span class="anunciantes"><img src="imagens/anunciantes/telemar.jpg"></span>
<span class="anunciantes"><img src="imagens/anunciantes/crie.jpg"></span>
<span class="anunciantes"><img src="imagens/anunciantes/editora_atica.jpg"></span>
<span class="anunciantes"><img src="imagens/anunciantes/asbraer.jpg"></span>
<span class="anunciantes"><img src="imagens/anunciantes/escola_24_horas.jpg"></span>
<span class="anunciantes"><img src="imagens/anunciantes/faperj.jpg"></span>
<span class="anunciantes"><img src="imagens/anunciantes/fapes.jpg"></span>
<span class="anunciantes"><img src="imagens/anunciantes/ans.jpg"></span>
<span class="anunciantes"><img src="imagens/anunciantes/banco_safra.jpg"></span>
<span class="anunciantes"><img src="imagens/anunciantes/bb_seguro_saude.jpg"></span>
<span class="anunciantes"><img src="imagens/anunciantes/brandi.jpg"></span>
<span class="anunciantes"><img src="imagens/anunciantes/copesul.jpg"></span>
<span class="anunciantes"><img src="imagens/anunciantes/eletrobras.gif"></span>
<span class="anunciantes"><img src="imagens/anunciantes/eletronulear.jpg"></span>
<span class="anunciantes"><img src="imagens/anunciantes/ticket.jpg"></span>
<span class="anunciantes"><img src="imagens/anunciantes/tjmg.gif"></span>
<span class="anunciantes"><img src="imagens/anunciantes/oas.jpg"></span>
<span class="anunciantes"><img src="imagens/anunciantes/nutron.jpg"></span>
<span class="anunciantes"><img src="imagens/anunciantes/contax.jpg"></span>


</div>
<!--empresas anunciantes-->
<section id="anunciantes">
</section>
<!--videos contendo depoimentos dos candidatos-->
<section id="videos">
<p>Histórias de sucesso que começaram conosco.</p>
<a title="Histórias de Sucesso" href="videos/video.mp4" rel="shadowbox,width=600;height=400" target="_blank"><img src="videos/capa.jpg"></a>&nbsp;
<a title="Histórias de Sucesso" href="videos/video.mp4" rel="shadowbox,width=600;height=400" target="_blank"><img src="videos/capa.jpg"></a>&nbsp;
<a title="Histórias de Sucesso" href="videos/video.mp4" rel="shadowbox,width=600;height=400" target="_blank"><img src="videos/capa.jpg"></a>
</section>
<!--rodapé do site-->
<footer>
<span class="linksFooter">₢ Todos Direitos LCML</span>
<span class="linksFooter">Redes socias
Facebook.
</span>
<span class="linksFooter"><a title="Termo de Uso" href="termodeuso.html" rel="shadowbox" class="termos">Termo de Uso</a></span>
</footer>

</section>

</body>
</html>
