<?php require_once dirname(__FILE__) .'/../config.php';?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator</title>
</head>
<body>

<form action="<?php print(_APP_URL);?>/app/calc.php" method="post">
	<label>Kwota kredytu: </label>
	<input type="text" name="kwota" placeholder="Kwota kredytu" value="<?php print($kwota); ?>" /><br />
	
	<label>Oprocentowanie: </label>
	<input type="text" name="procent" placeholder="Oprocentowanie" value="<?php print($procent); ?>" /><br />
	
	<label>Liczba miesięcy: </label>
	<input type="text" name="ile" placeholder="Liczba miesięcy" value="<?php print($ile); ?>" /><br />
	
	<input type="submit" value="Oblicz" />
</form>	

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $messages as $key => $msg ) {
			echo $msg;
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
<?php echo 'Miesięczna rata: '.$result; ?>
</div>
<?php } ?>

</body>
</html>