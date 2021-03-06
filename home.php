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
<nav id="menuSuperior">

<ul class="menuSuperior">
	<li class="selected"><a href="home.php" title="home">Home</a></li>
	<li><a href="empresa.php" title="cadastro de empresas">Empresas</a></li>
    <li ><a href="candidato.php">Candidatos</a>
    <li><a href="contato.php">Contato</a></li>
    <li><a href="logout.php">Sair</a>
</ul>
    <?php 
   session_start();
   
   $nome   = mysql_real_escape_string($_POST['nome']);
   $senha  = mysql_real_escape_string($_POST['senha']);
   
   ?>      
</nav>
<!--cabeçalho do site-->
<header>
<!--slider do site-->
<nav id="slider">
<section id="pessoas">
<!--tabela dinâmica que exibe imagens do banco de dados-->
<table align="center" id="tablepessoas">
<tr class="trpessoas"> 
 <?php

	/*Conexão ao banco de dados*/

    //$con = mysql_connect("localhost","u416966957_senai","qY0YxhrATW");
	//$db = mysql_select_db("u416966957_vagas");	
	$con = mysql_connect("localhost","root","mlpsilv@30111969ec031103");
	$db = mysql_select_db("projetofinalsenai");		
		
	/*sentando charset*/
	mysql_query("SET NAMES'utf8'");
	mysql_query('SET character_set_connection=utf8');
	mysql_query('SET character_set_client=utf8');
	mysql_query('SET character_set_results=utf8');
	?>
	<?php
	$looph = 3;
	$selectImg = mysql_query("SELECT * FROM imagens");
	$registro  = mysql_num_rows($selectImg);
	$i = 1;
	while($linha = mysql_fetch_array($selectImg)){
	if($i < $looph){
	echo'<td class="tdpessoas" align="center" valign="top">
							
    	<img src="'.$linha['caminho_foto'].$linha['foto'].'">
		
        </td>	
	';
	}elseif($i = $looph){
		echo'<td class="tdpessoas" align="center" valign="top">
					
    	<img src="'.$linha['caminho_foto'].$linha['foto'].'">
	
        </td>	
		</tr>
		<tr>
		';
		$i =0;
		}
		$i++;
	}
		?>
	
</tr>
</table>



<p>EQUIPE LCML VAGAS DE EMPREGOS.</p>
</section>
<div id="cadastrar" action="#" method="post" enctype="multipart/form-data">
<p></p>
<p></p>
<h2>Olá <?php echo $_SESSION['UsuarioNome']; ?>, Seja bem vindo(a)!</h2>
<p class="ola">A equipe da <strong>LCML VAGAS DE EMPREGOS</strong> agradace imensamente por você está usando nossos serviços.</p>
<P class="ola">Contamos com um seleto grupo de empresas anunciantes, onde você com certeza 
encontrará a vaga de emprego que tanto almeja</p>
<p>Leia com atenção nossos <a href="termodeuso.html" rel="shadowbox">Termos de uso</a> do site, para evitar transtornos e se ainda assim
ficando em dúvida, 
não esite, entre em contato por <a href="contato.php">e-mail</a> ou pelo tel: 0800 727 44444 para esclarecimentos e sugestões.</p>
<p>Use o menu superior para realizar seu cadastro de dados e de seu currículo.</p>
<p>Esperamos que faça o melhor com está oportunidade e que possa trazer mais usuários para nosso site.</p>
<p></p>
<p></p>
<h2>Atenciosamente Equipe LCML</h2>


</div>

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
<a title="Histórias de Sucesso" href="videos/video1.mp4" rel="shadowbox,width=600;height=400" target="_blank"><img src="videos/capa.jpg"></a>&nbsp;
<a title="Histórias de Sucesso" href="videos/video2.mp4" rel="shadowbox,width=600;height=400" target="_blank"><img src="videos/capa.jpg"></a>
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
