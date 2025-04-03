<?php
/* Smarty version 4.5.5, created on 2025-04-03 12:13:09
  from 'C:\xampp\htdocs\PhpProject5\app\calc\CalcView.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67ee5f35004969_68924588',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2d3221da5e9811772099a618b81b1e8bcf3c93db' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PhpProject5\\app\\calc\\CalcView.html',
      1 => 1743675181,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67ee5f35004969_68924588 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE HTML>
<!--
    Massively by HTML5 UP
    html5up.net | @ajlkn
    Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
    <head>
        <title><?php echo $_smarty_tpl->tpl_vars['page_title']->value;?>
 - Massively by HTML5 UP</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/css/main.css" />
        <noscript><link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/css/noscript.css" /></noscript>
    </head>
    <body class="is-preload">

        <!-- Wrapper -->
            <div id="wrapper">

                <!-- Header -->
                    <header id="header">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/index.php" class="logo">Kalkulator</a>
                    </header>

                <!-- Nav -->
                    <nav id="nav">
                        <ul class="links">
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/index.php">Strona główna</a></li>
                            <li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
calcView">Kalkulator Kredytowy</a></li>
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/elements.html">Elements Reference</a></li>
                        </ul>
                    </nav>

                <!-- Main -->
                    <div id="main">

                        <!-- Post -->
                            <section class="post">
                                <header class="major">
                                    <h1>Kalkulator<br />Kredytowy</h1>
                                </header>

                                <!-- Formularz kalkulatora -->
                                <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
calcCompute">
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
                                <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
                                    <ul style="color: #f00; margin-top: 1em;">
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getErrors(), 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
                                            <li><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</li>
                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    </ul>
                                <?php }?>

                                <!-- Wyświetlanie informacji -->
                                <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
                                    <ul style="color: #00f; margin-top: 1em;">
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getInfos(), 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
                                            <li><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</li>
                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    </ul>
                                <?php }?>

                                <!-- Wyświetlanie wyniku -->
                                <?php if ((isset($_smarty_tpl->tpl_vars['res']->value->result))) {?>
                                    <div style="margin-top: 1em; padding: 1em; background-color: #ffd700; border-radius: 5px;">
                                        <p>Miesięczna rata: <?php echo round((float) $_smarty_tpl->tpl_vars['res']->value->result, (int) 2, (int) 1);?>
 PLN</p>
                                    </div>
                                <?php }?>

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
                                    <li><input type="submit" value="Send Message" /></li>
                                </ul>
                            </form>
                        </section>
                        <section class="split contact">
                            <section class="alt">
                                <h3>Address</h3>
                                <p>1234 Somewhere Road #87257<br />
                                Nashville, TN 00000-0000</p>
                            </section>
                            <section>
                                <h3>Phone</h3>
                                <p><a href="#">(000) 000-0000</a></p>
                            </section>
                            <section>
                                <h3>Email</h3>
                                <p><a href="#">info@untitled.tld</a></p>
                            </section>
                            <section>
                                <h3>Social</h3>
                                <ul class="icons alt">
                                    <li><a href="#" class="icon brands alt fa-twitter"><span class="label">Twitter</span></a></li>
                                    <li><a href="#" class="icon brands alt fa-facebook-f"><span class="label">Facebook</span></a></li>
                                    <li><a href="#" class="icon brands alt fa-instagram"><span class="label">Instagram</span></a></li>
                                    <li><a href="#" class="icon brands alt fa-github"><span class="label">GitHub</span></a></li>
                                </ul>
                            </section>
                        </section>
                    </footer>

                <!-- Copyright -->
                    <div id="copyright">
                        <ul><li>© Untitled</li><li>Design: <a href="https://html5up.net">HTML5 UP</a></li></ul>
                    </div>

            </div>

        <!-- Scripts -->
            <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/js/jquery.min.js"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/js/jquery.scrollex.min.js"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/js/jquery.scrolly.min.js"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/js/browser.min.js"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/js/breakpoints.min.js"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/js/util.js"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/js/main.js"><?php echo '</script'; ?>
>

    </body>
</html><?php }
}
