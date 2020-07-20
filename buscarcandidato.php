<!doctype html>
<html>
<head>

<meta charset="utf-8">
<title>Projeto Final Curso Programador Web Senai - Busca de Empregos</title>
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
	<li class="selected"><a href="empresa.php" >Empresas</a></li>
    <li><a href="contato.php">Contato</a></li>
</ul>
    <!--formulário de login-->
    <form action="logar.php" method="post" id="logar">
    <label>Login:</label>
    <input name="nome" type="text" id="usuario" value="usuário">
    <input name="senha" type="password" id="senha" value="senha">
    <input type="submit" name="btn" id="btn">
    
    <a href="lembrarSenha.php">Lembrar Senha</a>
    </form>
   
    <!--logar facebook ou linkedin-->
      

</nav>
</nav>
</header>
<!--menu interior do site-->
<nav id="menuinterior">
<!--formulaário de buscar do site-->
<form action="#" method="post" id="buscaemprego" enctype="multipart/form-data">
<label>BUSCAR CANDIDATOS:</label>
<input name="cargodInteresse" type="text" id="emprego" value="entre com sua vaga de emprego">
<select name="estado" id="uf">
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

	/*Conexão ao banco de dados*/
	$con = mysql_connect("localhost","root","mlpsilv@30111969ec031103");
	$db = mysql_select_db("projetofinalsenai");		
		
	/*sentando charset*/
	mysql_query("SET NAMES'utf8'");
	mysql_query('SET character_set_connection=utf8');
	mysql_query('SET character_set_client=utf8');
	mysql_query('SET character_set_results=utf8');
	
	$word = $_POST['cargodeInteresse'];
	$uf   = $_POST['estado'];

	
	$getResults   = mysql_query("SELECT * FROM curriculo WHERE cargodeInteresse  LIKE '%$word%' AND estado LIKE '%$uf%'");
	if($_POST['cargodeInteresse'] != ''){
	if(@mysql_num_rows($getResults) <= 0){
	 echo '<h2>Não temos candidatos desta descrição no ' .$uf. '. Busque outra profissão ou outro estado.</h2>';
	 }else{
		 echo'<h2>Resultados ' . @mysql_num_rows($getResults).'</h2>'.'';
		 while($exibir = mysql_fetch_array($getResults)){
			echo'<h3>Candidato: ' .$exibir['titulo']. '</h3><br />   
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
<video width="320" height="240" poster="videos/capa.jpg" controls>
<source src="videos/video.mp4" type="video/mp4; codecs="avc1.42E01E, mp4a.40.2"' />

</video>

<video width="320" height="240" poster="videos/capa.jpg" controls>
<source src="videos/video1.mp4" type="video/mp4; codecs="avc1.42E01E, mp4a.40.2"' />

</video>
<video width="320" height="240" poster="videos/capa.jpg" controls>
<source src="videos/video2.mp4" type="video/mp4; codecs="avc1.42E01E, mp4a.40.2"' />

</video>
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
</section>
</body>
</html>
