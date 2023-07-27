<?php
if(empty($_POST['name']) || empty($_POST['subject']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$m_subject = strip_tags(htmlspecialchars($_POST['subject']));
$message = strip_tags(htmlspecialchars($_POST['message']));

$to = "joaquinfernandes00@gmail.com"; // Change this email to your //
$subject = "$m_subject:  $name";
$body = "Recibiste un nuevo mensaje desde tu portfolio.\n\n"."Detalles:\n\nNombre: $name\n\n\nEmail: $email\n\nAsunto: $m_subject\n\nMesaje: $message";
$header = "De: $email";
$header .= "Responder a: $email";	

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
