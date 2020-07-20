<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Projeto Final Curso Programador Web Senai - Home</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="shadowbox/shadowbox.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="shadowbox/shadowbox.js"></script>
<script type="text/javascript">
 Shadowbox.init({
 language: 'pt',
 player: ['img', 'html', 'swf','mp4']
 });
</script>
</head>
<body>
<!--container onde está todo conteúdo do site-->
<section id="container">
<!--linha superior do site-->
<nav id="linha"></nav>
<!--menu superior do site-->

<!--cabeçalho do site-->
<header>
<!--slider do site-->
<nav id="slider">
<section id="pessoas">
<!--tabela dinâmica que exibe imagens do banco de dados-->
<div id="termos">

<p class="uso">Faça seu cadastro para começar a usar nossos serviços, e tenha acesso a milhares de vagas exclusivas.
Temos muitas empresas de todos os setores ofertando vagas que certamente uma coincidirá com seu perfil.
Esperamos por você e desejamos sucesso!</p>
<p>Alguns de nossos anuanciantes</p>
<img src="imagens/anunciantes/carrefour.jpg" class="anuncios">
<img src="imagens/anunciantes/cocacola.jpg" class="anuncios">
<img src="imagens/anunciantes/cea.jpg" class="anuncios">
<img src="imagens/anunciantes/bb_seguro_saude.jpg" class="anuncios">
<img src="imagens/anunciantes/abril_educacao.jpg" class="anuncios">
<img src="imagens/anunciantes/ciee.jpg" class="anuncios">
<img src="imagens/anunciantes/cni.jpg" class="anuncios">
<img src="imagens/anunciantes/eletrobras.gif" class="anuncios">
</div>
</section>
<form id="cadastrar" action="#" method="post" enctype="multipart/form-data">
<h2>Comece já,</h2>
<p style="color:#600; font-weight:bold">Cadastro para pessoa física/jurídica</p>
<input name="nome" type="text" required id="nome" value="Nome">
<input name="sobrenome" type="text" required id="sobrenome" value="Sobrenome">
<input name="email" type="email" required id="email" value="E-mail">
<input name="senha" type="password" required id="password" value="Senha"><br /><br />
<p class="contrato">Ao clicar em Cadastre-se agora, você estará concordando com o
 Contrato do Usuário, a Política de Privacidade e a Política de Cookies.</p>
<input type="submit" name="submit" class="btn">
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
	
	$nome       = mysql_real_escape_string($_POST['nome']);
	$sobrenome  = mysql_real_escape_string($_POST['sobrenome']);
	$email      = mysql_real_escape_string($_POST['email']);
	$senha      = sha1($_POST['senha']);
	
	if($_POST['submit']== true){
	mysql_query("INSERT INTO `login`(`nome`,`sobrenome`,`email`,`senha`)VALUES ('$nome','$sobrenome','$email','$senha')");
	
	$Subject ="Email de cadastro site LMCL VAGAS DE EMPREGO"; 
	
	$html = '<!doctype html>
				<html>
				<head>
				<meta charset=\"utf-8\">
				<title>Cadastro Vagas de Emprego</title>
				</head>
				<body>
				Bem vindo ao site  LMCL VAGAS DE EMPREGO! <br />Clique no link abaixo ou cole no seu navegador para logar e completar
				o seu cadastro<br />
				<a href=\"http://www.projetofinalsenai.php/entrar.php\">clique aqui!</a>
				</body>
				</html>
			';
				
	$Sendto  = $_POST['email'];
		
	// Este sempre deverá existir para garantir a exibição correta dos caracteres
	$headers = "MIME_Version: 1.1\n";		
	// Para enviar o e-mail em formato HTML com codificação de caracteres Unicode (Usado em todos os países)
	$headers .= "De: projetofinalsenai.esy.es\r\n"; // remetente
	$headers .= "Retornar para: projetofinalsenai.esy.es\r\n"; // return-path		
	// para enviar a mensagem em prioridade máxima
	

	$enviando = mail($Sendto,$Subject,$html,$headers); 
	echo"<script language=javascript> alert(\"Cadastro realizado com Sucesso! Verifique seu e-mail.\");</script>";
	 
	 unset($nome);
	 unset($email);
	 unset($senha);

	}
?>

</form>

</nav>
</header>
<!--menu interior do site-->
<nav id="menuinterior">
<!--formulaário de buscar do site-->
<form action="#" method="post" id="buscaemprego" enctype="multipart/form-data">
  <input name="titulo" type="text" id="emprego" value="entre com sua vaga de emprego">
<select name="uf" id="uf">
   <option value="">Selecione um estado</option>
    <option value="AC">Acre</option>
    <option value="AL">Alagoas</option>
    <option value="AM">Amazonas</option>
    <option value="AP">Amapá</option>
    <option value="BA">Bahia</option>
    <option value="CE">Ceará</option>
    <option value="DF">Distrito Federal</option>
    <option value="ES">Espirito Santo</option>
    <option value="GO">Goiás</option>
    <option value="MA">Maranhão</option>
    <option value="MG">Minas Gerais</option>
    <option value="MS">Mato Grosso do Sul</option>
    <option value="MT">Mato Grosso</option>
    <option value="PA">Pará</option>
    <option value="PB">Paraíba</option>
    <option value="PE">Pernambuco</option>
    <option value="PI">Piauí</option>
    <option value="PR">Paraná</option>
    <option value="RJ">Rio de Janeiro</option>
    <option value="RN">Rio Grande do Norte</option>
    <option value="RO">Rondônia</option>
    <option value="RR">Roraima</option>
    <option value="RS">Rio Grande do Sul</option>
    <option value="SC">Santa Catarina</option>
    <option value="SE">Sergipe</option>
    <option value="SP">São Paulo</option>
    <option value="TO">Tocantins</option>
</select>
<input type="submit" name="acao" id="acao" value="">
</form>
</nav>
<!--resultado da bsuca do site-->
<div id="resultado">


  <?php

	
	$word = $_POST['titulo'];
	$uf   = $_POST['uf'];

	
	$getResults   = mysql_query("SELECT * FROM vagas WHERE titulo  LIKE '%$word%' AND uf LIKE '%$uf%'");
	if($_POST['titulo'] != ''){
	if(@mysql_num_rows($getResults) <= 0){
	 echo '<h2>Não temos vagas desta descrição no ' .$uf. '. Busque outra profissão ou outro estado.</h2>';
	 }else{
		 echo'<h2>Resultados ' . @mysql_num_rows($getResults).'</h2>'.'';
		 while($exibir = mysql_fetch_array($getResults)){
			echo'<h3>Vaga: ' .$exibir['titulo']. '</h3><br />   
		         <strong>Empresa: </strong>'.$exibir['empresa']. '<br /><strong>  Cidade: </strong>'.$exibir['cidade']. 
				 '<strong> Estado: </strong>'.$exibir['uf']. '<br /> 
				 <strong>E-mail: </strong>'. $exibir['email']. '<br />
				 <strong>Turno : </strong>'.$exibir['turno']. ' <strong>Dias:</strong> ' .$exibir['dias'].'<br />
				 <strong>Salário: R$ </strong>'.$exibir['salario'].'<br />
				 <strong>Descrição da vaga: </strong>'.nl2br($exibir['descricao']).
				 '<br/>'
				 ;
			 }
		 }
	 
 }
	?>
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
<span class="linksFooter">₢ Todos Direitos LMCL</span>
<span class="linksFooter"><a href="facebook.com" target="_blank">Redes socias
Facebook.
</a></span>
<span class="linksFooter"><a title="Termo de Uso" href="termodeuso.html" rel="shadowbox" class="termos">Termo de Uso</a></span>
</footer>
</section>

</body>
</html>
