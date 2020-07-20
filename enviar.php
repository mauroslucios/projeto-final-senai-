<?php
$nome       = $_POST['nome'];
$email      = $_POST['email'];
$pessoa     = $_POST['pessoa'];
$estado     = $_POST['titulo'];
$mensagem   = $_POST['mensagem'];

$Sento   = "mauroslucios@gmail.com";
$Subject = "Contato pelo formulário do site ProjetoSenai";
$headers = "MIME_Version: 1.0"."\r\n";
$headers .="Content-type: text/html, charset=utf-8\n";
$headers .= "Reply-to: $email";

$body .="<strong>Nome</strong>      = $nome<br />";
$body .="<strong>Email</strong>     = $email<br />";
$body .="<strong>Pessoa</strong>    = $pessoa<br />";
$body .="<strong>Estado</strong>    = $estado<br />";
$body .="</strong>Mensagem</strong> = $mensagem<br />";

mail($Sento,$Subject,$msg,$headers);
echo"<script language=javascript> alert(\"Email enviado com Sucesso\");</script>";
header("Location:http://www.mauroslucios.esy.es/contato.php");


?>