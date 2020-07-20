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
	<li><a href="home.php" title="home">Home</a></li>
	<li class="selected"><a href="empresa.php" title="cadastro de empresas">Empresas</a></li>
    <li ><a href="candidato.php">Candidatos</a>
    <li><a href="contato.php">Contato</a></li>
    <li><a href="logout.php">Sair</a>
</ul>
   
      
</nav>
</nav>
</header>
<!--menu interior do site-->
<nav id="menuinterior">
<!--formulaário de buscar do site-->
<form action="#" method="post" id="buscaemprego" enctype="multipart/form-data">
<input name="formacaoAcademica" type="text" id="emprego" value="digite o perfil que deseja encontrar">
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
	//$con = mysql_connect("localhost","u416966957_senai","qY0YxhrATW");
	//$db = mysql_select_db("u416966957_vagas");	
		
	/*sentando charset*/
	mysql_query("SET NAMES'utf8'");
	mysql_query('SET character_set_connection=utf8');
	mysql_query('SET character_set_client=utf8');
	mysql_query('SET character_set_results=utf8');
	
	$work   = $_POST['formacaoAcademica'];
	$estado = $_POST['estado'];	
	
   
	$getResults   = mysql_query("SELECT * FROM curriculo WHERE 	formacaoAcademica  LIKE '%$work%' AND estado LIKE '%$estado%'");

	if($_POST['formacaoAcademica'] != ''){
	if(@mysql_num_rows($getResults) <= 0){
	 echo '<h2>Não há Profissionais desta descrição no ' .$estado. '. Busque outra profissão ou outro estado.</h2>';
			}
	
	else{
		 echo'<h2>Resultados ' . @mysql_num_rows($getResults).'</h2>'.'';
		 while($exibir = mysql_fetch_array($getResults)){
			echo'<h3>Profissão:</h3>' .nl2br($exibir['formacaoAcademica']). '<br />   
		         <h3>Objetivos Profissionais:</h3>'.nl2br($exibir['objetivosProfissionais']). '<br />
				 <h3> Cursos Extracurriculares:</h3>'.nl2br($exibir['cursosExtracurriculares']). '<br/>
				 <h3> Experiência Profissional:</h3>'.nl2br($exibir['experienciaProfissional']). '<br /> 
				 <h3>Formação Acadêmica:</h3>'. $exibir['formacaoAcademica']. '<br />
				 <h3>Cargo Desejado:</h3>'.$exibir['cargodeInteresse']. '<br /> 
				 <h3>Idiomas:</h3>' .$exibir['idiomas'].'<br />
				 <h3>Estado:</h3>'.$exibir['estado'].'<br />
				 <h3>Tipo Deficiência:</h3>'.$exibir['tipoDeficiencia'].'<br/>
				 <h3>Informações Complementares:</h3>'.$exibir['informacoesComplementares'].'<br/>
				 <h3>Sobre Você:</h3>'.$exibir['digaSobre'].'<br/>'
				 
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
<a title="Histórias de Sucesso" href="videos/video1.mp4" rel="shadowbox,width=600;height=400" target="_blank"><img src="videos/capa.jpg"></a>&nbsp;
<a title="Histórias de Sucesso" href="videos/video2.mp4" rel="shadowbox,width=600;height=400" target="_blank"><img src="videos/capa.jpg"></a>
</section>

<!--rodapé do site-->
<footer>
<span class="linksFooter">₢ Todos Direitos LMCL</span>
<span class="linksFooter"><img src="imagens/Fbook .png" width="32" height="32" id="redessociais"><br/>
Facebook.
</span>
<span class="linksFooter"><a title="Termo de Uso" href="termodeuso.html" rel="shadowbox" class="termos">Leia Nossos Termo de Uso e Garanta seus direitos</a></span>

</footer>
</section>
</body>
</html>
