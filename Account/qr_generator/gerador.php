<?php
    session_start();
	require_once( 'vendor/autoload.php' );

	require_once( 'vendor/PHPGangsta/GoogleAuthenticator.php' );

	$autenticador = new GoogleAuthenticator();

	

    if(!$_SESSION["codigo_secreto"]){
       $_SESSION["codigo_secreto"] =  $autenticador->createSecret();
        
    }
    $codigo_secreto = $_SESSION["codigo_secreto"];

	$website = "FXCoin Limited";
	$titulo = "Google Autenticador";
	$url_qr_code = $autenticador->getQRCodeGoogleUrl( $titulo, $codigo_secreto, $website );

	echo "<img src='".$url_qr_code."' /> \n";

?>
