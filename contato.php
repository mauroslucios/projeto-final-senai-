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
<title>Projeto Final Curso Programador Web Senai - Candidatos</title>
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
    <li class="selected"><a href="contato.php">Contato</a></li>
    <li><a href="logout.php">Sair</a>
</ul>  
</nav>
<!--cabeçalho do site-->
<header>
<!--slider do site-->
<nav id="slider">

<section id="formularioCadastro">
<!--formulário de cadastro com banco de dados--> 
<form id="Contato" method="post" action="enviar.php" enctype="multipart/form-data">
<fieldset>
<legend>Suas informações para envio da mensagem:</legend>
<label class="tituloform">Nome:<br />
<input type="text" name="nome" value="seu nome" id="seunome" required><br />
<label class="tituloform">E-mail:<br />
<input type="text" name="email" value="seu email" id="seuemail" required><br />
<label class="tituloform">Pessoa:<br />
<input type="text" name="pessoa" value="fisica/juridica" id="pessoa" required><br />
<label class="tituloform">Estado:<br />
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
</select><br />
<label class="tituloform">Título da mensagem:</label><br />
<input type="text" name="titulo" value="título da mensagem" id="Titulo" required><br />
<label class="tituloform">Mensagem:</label><br />
<textarea name="mensagem"  required id="suamensagem" form="text" value="sua mensagem" >Sua mensagem
</textarea><br />
<input type="submit" value="Enviar" id="submit">
<input type="reset" value="Limpar" id="limpar">
</fieldset>

</form>
</section>
</nav>
</header>
<!--menu interior do site-->
<nav id="menuinterior">
<!--formulaário de buscar do site-->
<h2>VAGAS DE EMPREGOS</h2>
</nav>
<!--resultado da bsuca do site-->
<div id="resultado">
<table  width="100%" id="resultadoEmpregos" align="left">
<tr>
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
	
    $looph = 2;
	$selectImg = mysql_query("SELECT * FROM vagas");
	$registro  = mysql_num_rows($selectImg);
	$i = 1;
	while($exibir = mysql_fetch_array($selectImg)){
	if($i < $looph){
	echo'<td align="left" valign="top">
    	 <h3>Vaga: ' .$exibir['titulo']. '</h3><br />   
		         <strong>Empresa: </strong>'.$exibir['empresa']. '<br /><strong>  Cidade: </strong>'.$exibir['cidade']. 
				 '<strong> Estado: </strong>'.$exibir['uf']. '<br /> 
				 <strong>E-mail: </strong>'. $exibir['email']. '<br />
				 <strong>Turno : </strong>'.$exibir['turno']. ' <strong>Dias:</strong> ' .$exibir['dias'].'<br />
				 <strong>Salário: R$ </strong>'.$exibir['salario'].'<br />
				 <strong>Descrição da vaga: </strong>'.nl2br($exibir['descricao']).'<br/>
        </td>	
	';
	}elseif($i = $looph){
		echo'<td  align="left" valign="top">
    	 <h3>Vaga: ' .$exibir['titulo']. '</h3><br />   
		         <strong>Empresa: </strong>'.$exibir['empresa']. '<br /><strong>  Cidade: </strong>'.$exibir['cidade']. 
				 '<strong> Estado: </strong>'.$exibir['uf']. '<br /> 
				 <strong>E-mail: </strong>'. $exibir['email']. '<br />
				 <strong>Turno : </strong>'.$exibir['turno']. ' <strong>Dias:</strong> ' .$exibir['dias'].'<br />
				 <strong>Salário: R$ </strong>'.$exibir['salario'].'<br />
				 <strong>Descrição da vaga: </strong>'.nl2br($exibir['descricao']).'<br/>
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
