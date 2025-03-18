<?php require_once dirname(__FILE__) .'/../config.php';?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator Kredytowy</title>
</head>
<body>

<form action="<?php print(_APP_URL);?>/app/calc.php" method="post">
    <label for="id_x">Kwota kredytu: </label>
    <input id="id_x" type="text" name="x" value="<?php print($x); ?>" /><br />
    
    <label for="id_y">Oprocentowanie (% rocznie): </label>
    <input id="id_y" type="text" name="y" value="<?php print($y); ?>" /><br />
    
    <label for="id_op">Okres kredytowania: </label>
    <select name="op">
        <option value="1 rok">1 rok</option>
        <option value="2 lata">2 lata</option>
        <option value="3 lata">3 lata</option>
        <option value="5 lat">5 lat</option>
    </select><br />
    
    <input type="submit" value="Oblicz" />
</form>    

<?php
// Wyświetlenie listy błędów, jeśli istnieją
if (isset($messages)) {
    if (count($messages) > 0) {
        echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
        foreach ($messages as $key => $msg) {
            echo '<li>'.$msg.'</li>';
        }
        echo '</ol>';
    }
}
?>

<?php if (isset($result)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
<?php echo 'Miesięczna rata: '.round($result, 2).' PLN'; ?>
</div>
<?php } ?>

</body>
</html>
