<?php
require_once('phpmailer/class.phpmailer.php');
require_once('phpmailer/class.smtp.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail             = new PHPMailer();
$mail->CharSet = "UTF-8";

$mail->IsSMTP();
$mail->SMTPAuth   = true;                                   
$mail->Host       = "mail.file:///C:/Users/marka/Downloads/portifolio/portifolio/contato.html";      
$mail->Port       = "587";
//$mail->SMTPSecure = 'tls';
$mail->Username = 'joyce';
$mail->Password = 'ex2@control';


$body  = "<!DOCTYPE html>".
		"<html lang='pt-br''>".
		"<head><meta charset='UTF-8'>".
		"<title></title>".
		"</head><body>".
		"<h1></h1>".
		"<p><strong>Nome: </strong>".$_POST['nome']."</p>".
		"<p><strong>E-mail: </strong>".$_POST['email']."</p>".
		"<p><strong>Telefone: </strong>".$_POST['telefone']."</p>".
		"</body></html>";

$mail->SetFrom('envia@negocioscaixa.com.br', 'Négocios Caixa');

$mail->Subject    = "Novo parceiro ".$_POST['nome']." - Négocios Caixa ";

$mail->AltBody    = "Contato enviado pelo site Négocios Caixa"; // optional, comment out and test

$mail->MsgHTML($body);

$address = "atendimento@negocioscaixa.com.br";
$mail->AddAddress($address, "Négocios Caixa");
//$mail->AddCC('marcelle@unival.com.br', 'Marcelle Delfino');
$mail->AddCC('renata@negocioscaixa.com.br', 'Négocios Caixa');


if(!$mail->Send()) {
  	echo "Mailer Error: " . $mail->ErrorInfo;
}else{
      echo "<script type='text/javascript'>alert('Obrigado!\\nSua simula\u00e7\u00e3o foi enviada.'); location.href='http://negocioscaixa.com.br/obrigado.php';</script>" ;            
}

?>
