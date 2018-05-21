<?php
    
	require_once( 'gerador.php' );
   $codigo_secreto = $_SESSION["codigo_secreto"];

?>

<form action="verificador.php" method="post" autocomplete="off">
	
	<input type="text" name="codigo" placeholder="Enter 6-digit pin">

	<button>Verificar</button>
    <?php echo $codigo_secreto; ?>
	<input type="hidden" value="<?php echo $codigo_secreto; ?>" name="codigosecreto">

</form>
