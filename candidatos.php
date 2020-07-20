<!doctype html>
<html>
<head>
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
	<li class="selected"><a href="empresa.php" >Empresas</a></li>
    <li><a href="candidato.php">Registre-se</a></li>
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
<!--cabeçalho do site-->
<header>
<!--slider do site-->
<nav id="slider">

<section id="formularioCadastro">
<!--formulário de cadastro com banco de dados--> 
<form id="cadastroCandidatos" method="post" action="#">
<fieldset>
<legend>Suas informações pessoais para cadastro como candidato a vagas:</legend>
<input type="text" name="nome" value="seu nome" id="seunome" required>
<input type="date" name="datanascimento" value="dd/mm/yy" id="seunasc" required>
<input type="text" name="estadocivil" value="seu estado civil" id="seuestadocivil" required>
<input type="tel" name="telefone" value="seu telefone" id="seutelefone" required>
<input type="text" name="cpf" value="0000.00.000/00" id="seucpf" required>
<input type="text" name="idt" value="000000-0" id="orgaoemissor" required>
<input type="text" name="rua" value="sua rua" id="suarua" required>
<input type="text" name="bairro" value="seu bairro" required id="seubairro">
<input type="text" name="cidade" value="sua cidade" required id="suacidade">
<input type="text" name="estado" value="seu estado" required id="seuestado">
<input type="text" name="seuusuario" value="seu usuário" required id="seuusuario">
<input type="text" name="suasenha" value="sua senha" required id="suasenha">
<input type="text" name="cep" value="seu cep" required id="seucep">
<input type="submit" name="btncadastrar" value="Cadastrar seu dados" id="btncadastrarseusdados">
<input type="reset" name="btnlimpar" value="Limpar formulário" id="btnlimparseusdados">
</fieldset>

</form>
</section>
</nav>
</header>
<!--menu interior do site-->
<nav id="menuinterior">
<!--formulaário de buscar do site-->
<form action="buscaremprego.php" method="post" id="buscaemprego">
<label>BUSCAR VAGAS DE EMPREGO:</label><input name="emprego" type="text" id="emprego" value="entre com sua vaga de emprego">
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
<table  width="100%" id="resultadoEmpregos" align="left">
<tr>
	<?php 
	
	/*Conexão ao banco de dados*/
	$con = mysql_connect("localhost","root","mlpsilv@30111969ec031103");
	$db = mysql_select_db("projetofinalsenai");		
		
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

</footer>
</section>

</body>
</html>
