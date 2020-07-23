<?php
require 'config.inc.php';
?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>BACK OFFICE - PINKMAN</title>
        <link rel="stylesheet" href="../../css/style_back.css">
        <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">

        <link rel="apple-touch-icon" sizes="180x180" href="../../fvcns/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../../fvcns/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../../fvcns/favicon-16x16.png">
        <link rel="manifest" href="../../fvcns/site.webmanifest">
        <link rel="mask-icon" href="../../fvcns/safari-pinned-tab.svg" color="#3a4048">
        <link rel="shortcut icon" href="../../fvcns/favicon.ico">
        <meta name="apple-mobile-web-app-title" content="Pinkman Prod.">
        <meta name="application-name" content="Pinkman Prod.">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-config" content="../../fvcns/browserconfig.xml">
        <meta name="theme-color" content="#000000">
        <script src="../../js/jquery.min.js"></script>
    </head>
<body>

<header>

    <a href="../../"><div id="bloc_logo" class="link_pagetop">
        <h1 title="Retour à l'accueil">Pinkman</h1>
    </div></a>
</header>
    <div id="container">
        <h1>Bonjour Pinkman</h1>
        <form action="login_valid.php" method="post">
            <?php
            if (!empty($_SESSION['erreur'])) {
                echo "<div id=\"error\"><p>".$_SESSION['erreur']."</p></div>";
                unset ($_SESSION['erreur']);
            }
            ?>
            <div class="bloc_input">
                <label for="mdp">Mot de passe : </label><input id="mdp" type="password" name="password" placeholder="•••••••" required/>
                <div id="see_mdp">
                    <img src="../../img/nsee.svg" id="nsee" alt="Mot de passe caché"/>
                    <img src="../../img/see.svg" id="see" title="Afficher le mot de passe" alt="Mot de passe affiché"/>
                </div>
            </div>
            <input type="submit" id="sub" value="Connexion">
        </form>
        <a href="forgot-password/index.php" id="oubli" class="classic_link">Mot de passe oublié</a>
    </div>
    <script>
        var affiche=false;

        $('#see').click(function(){
            if(affiche){
                $('#see').css('opacity','0');
                $('#see').attr('title','Afficher le mot de passe');
                $('#nsee').css('opacity','1');
                $('#mdp').attr('type','password');
                $('#mdp').attr('placeholder','•••••••');
                affiche=false;
            }
            else {
                $('#see').css('opacity', '1');
                $('#see').attr('title','Cacher le mot de passe');
                $('#nsee').css('opacity', '0');
                $('#mdp').attr('type','text');
                $('#mdp').attr('placeholder','Mot de passe');
                affiche=true;
            }
        });

    </script>
<?php
require 'fin_html.php';
?>