<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	date_default_timezone_set('America/Bogota');

	?>
	<form action="php/mensualidad.php" method="POST">
		PLACA: <input type="text" name="placa">
		<input type="hidden" name="estado" value="f">
		<input type="hidden" name="mensual" value="SI">
		<input type="hidden" name="horae" value="<?php echo date("H:i", time()); ?>"">
		<input type="hidden" name="horas" value="<?php echo date("H:i", time()); ?>"">
		<input type="hidden" name="fechae" value="<?php echo date('Y-m-d'); ?>">
		<input type="hidden" name="fechas" value="<?php echo date('Y-m-d'); ?>">
		<input type="submit" name="Registrar">
	</form>
</body>
</html>