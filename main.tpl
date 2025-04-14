{*
    Massively by HTML5 UP
    html5up.net | @ajlkn
    Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
*}
<!DOCTYPE HTML>
<html>
<head>
    <title>{$page_title|default:'Kalkulator Kredytowy'}</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta name="description" content="{$page_description|default:'Oblicz swoją ratę kredytu'}" />
    <link rel="stylesheet" href="{$conf->app_url}/assets/css/main.css" />
    <noscript><link rel="stylesheet" href="{$conf->app_url}/assets/css/noscript.css" /></noscript>
</head>
<body class="is-preload">
    <!-- Wrapper -->
    <div id="wrapper" class="fade-in">
        <!-- Intro -->
        <div id="intro">
            <h1>Kalkulator Kredytowy</h1>
            <p>Oblicz swoją miesięczną ratę kredytu szybko i łatwo.</p>
        </div>

        <!-- Main -->
        <div id="main">
            {block name=content}Domyślna treść...{/block}
        </div>

        <!-- Footer -->
        <footer id="footer">
            <p class="copyright">&copy; Kalkulator Kredytowy. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="{$conf->app_url}/assets/js/jquery.min.js"></script>
    <script src="{$conf->app_url}/assets/js/jquery.scrollex.min.js"></script>
    <script src="{$conf->app_url}/assets/js/jquery.scrolly.min.js"></script>
    <script src="{$conf->app_url}/assets/js/browser.min.js"></script>
    <script src="{$conf->app_url}/assets/js/breakpoints.min.js"></script>
    <script src="{$conf->app_url}/assets/js/util.js"></script>
    <script src="{$conf->app_url}/assets/js/main.js"></script>
</body>
</html>