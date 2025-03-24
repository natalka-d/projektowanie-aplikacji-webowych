<!DOCTYPE HTML>
<!--
    Massively by HTML5 UP
    html5up.net | @ajlkn
    Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<?php require_once dirname(__FILE__) . '/../config.php'; ?>
<html>
    <head>
        <title>Kalkulator Kredytowy - Massively by HTML5 UP</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="../assets/css/main.css" />
        <noscript><link rel="stylesheet" href="../assets/css/noscript.css" /></noscript>
    </head>
    <body class="is-preload">

        <!-- Wrapper -->
            <div id="wrapper">

                <!-- Header -->
                    <header id="header">
                        <a href="../index.php" class="logo">Kalkulator</a>
                    </header>

                <!-- Nav -->
                    <nav id="nav">
                        <ul class="links">
                            <li><a href="../index.php">Strona główna</a></li>
                            <li class="active"><a href="calc_view.php">Kalkulator Kredytowy</a></li>
                            <li><a href="../elements.html">Elements Reference</a></li>
                        </ul>
                    </nav>

                <!-- Main -->
                    <div id="main">

                        <!-- Post -->
                            <section class="post">
                                <header class="major">
                                    <span class="date"><?php echo date("d F Y"); ?></span>
                                    <h1>Kalkulator<br />Kredytowy</h1>
                                </header>

                                <!-- Formularz kalkulatora -->
                                <form method="post" action="<?php print(_APP_URL); ?>/app/calc.php">
                                    <div class="fields">
                                        <div class="field">
                                            <label for="id_x">Kwota kredytu:</label>
                                            <input id="id_x" type="text" name="x" value="" />
                                        </div>
                                        <div class="field">
                                            <label for="id_y">Oprocentowanie (% rocznie):</label>
                                            <input id="id_y" type="text" name="y" value="" />
                                        </div>
                                        <div class="field">
                                            <label for="id_op">Okres kredytowania:</label>
                                            <select name="op" id="id_op">
                                                <option value="1 rok">1 rok</option>
                                                <option value="2 lata">2 lata</option>
                                                <option value="3 lata">3 lata</option>
                                                <option value="5 lat">5 lat</option>
                                            </select>
                                        </div>
                                    </div>
                                    <ul class="actions">
                                        <li><input type="submit" value="Oblicz" /></li>
                                    </ul>
                                </form>

                                <!-- Wyświetlanie błędów -->
                                <?php if (!empty($messages)) { ?>
                                    <ul style="color: #f00; margin-top: 1em;">
                                        <?php foreach ($messages as $msg) { echo '<li>' . $msg . '</li>'; } ?>
                                    </ul>
                                <?php } ?>

                                <!-- Wyświetlanie wyniku -->
                                <?php if (isset($result)) { ?>
                                    <div style="margin-top: 1em; padding: 1em; background-color: #ffd700; border-radius: 5px;">
                                        <p>Miesięczna rata: <?php echo round($result, 2); ?> PLN</p>
                                    </div>
                                <?php } ?>

                            </section>

                    </div>

                <!-- Footer -->
                    <footer id="footer">
                        <section>
                            <form method="post" action="#">
                                <div class="fields">
                                    <div class="field">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" />
                                    </div>
                                    <div class="field">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" id="email" />
                                    </div>
                                    <div class="field">
                                        <label for="message">Message</label>
                                        <textarea name="message" id="message" rows="3"></textarea>
                                    </div>
                                </div>
                                <ul class="actions">
                                    <li