<?php

$errores ='';
$enviado = '';

if(isset($_POST['submit'])){
	$nombre = $_POST['nombre'];
	$email = $_POST['email'];
	$correo = $_POST['correo'];

	if(!empty($nombre)){
		$nombre = trim($nombre);
		$nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
	} else {
       $errores .='Please enter a name <br />';
	}
	if (!preg_match("/^[a-zA-Z ]*$/",$nombre)) {
      $errores .= 'Only letters are allowed <br />';
    }

	if(!empty($email)) {
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);

		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$errores .= 'Please enter a valid email <br />';
		}
	} else {
		$errores .='Please enter an email address <br />';
	}

	if(!empty($correo)){
		$correo = htmlspecialchars($correo);
		$correo = trim($correo);
		$correo = stripcslashes($correo);
	} else {
		$errores .= 'Please enter the message <br />';
	}

	if(!$errores){
		$enviar_a = 'danielsainz28@gmail.com';
		$asunto ='Correo enviado desde lucianosainz.com';
		$correo_preparado = "De: $nombre \n";
		$correo_preparado .= "Email: $email \n";
		$correo_preparado .= "Correo: " . $correo;

		mail($enviar_a, $asunto, $correo_preparado);
		$enviado = 'true';

	}
}

require 'index.view.php';

?>