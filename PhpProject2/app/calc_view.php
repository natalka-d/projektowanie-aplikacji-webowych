<?php // Widok kalkulatora kredytowego ?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Kalkulator Kredytowy</title>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css"/>
</head>
<body>

<div style="width:90%; margin: 2em auto;">
    <a href="<?php print(_APP_ROOT); ?>/app/inna_chroniona.php" class="pure-button">Inna chroniona strona</a>
    <a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="pure-button pure-button-active">Wyloguj</a>
</div>

<div style="width:90%; margin: 2em auto;">
    <form action="<?php print(_APP_ROOT); ?>/app/calc.php" method="post" class="pure-form pure-form-stacked">
        <legend>Kalkulator Kredytowy</legend>
        <fieldset>
            <label for="id_x">Kwota kredytu:</label>
            <input id="id_x" type="text" name="x" value="<?php out($x); ?>" />
            <label for="id_y">Oprocentowanie (% rocznie):</label>
            <input id="id_y" type="text" name="y" value="<?php out($y); ?>" />
            <label for="id_op">Okres kredytowania:</label>
            <select name="op">
                <option value="1 rok" <?php if ($operation == "1 rok") echo "selected"; ?>>1 rok</option>
                <option value="2 lata" <?php if ($operation == "2 lata") echo "selected"; ?>>2 lata</option>
                <option value="3 lata" <?php if ($operation == "3 lata") echo "selected"; ?>>3 lata</option>
                <option value="5 lat" <?php if ($operation == "5 lat") echo "selected"; ?>>5 lat</option>
            </select>
        </fieldset>
        <input type="submit" value="Oblicz" class="pure-button pure-button-primary" />
    </form>

    <?php if (isset($messages) && count($messages) > 0) { ?>
        <ol style="margin-top: 1em; padding: 1em 1em 1em 2em; border-radius: 0.5em; background-color: #f88; width:25em;">
            <?php foreach ($messages as $msg) { echo '<li>' . $msg . '</li>'; } ?>
        </ol>
    <?php } ?>

    <?php if (isset($result)) { ?>
        <div style="margin-top: 1em; padding: 1em; border-radius: 0.5em; background-color: #ff0; width:25em;">
            <?php echo 'Miesięczna rata: ' . round($result, 2) . ' PLN'; ?>
        </div>
    <?php } ?>
</div>

</body>
</html>