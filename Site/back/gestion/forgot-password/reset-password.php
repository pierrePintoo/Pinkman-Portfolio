<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>BACK OFFICE - PINKMAN</title>
    <!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    -->    <link rel="stylesheet" href="../../../css/style_back.css">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">

    <link rel="apple-touch-icon" sizes="180x180" href="../../../fvcns/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../../fvcns/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../../fvcns/favicon-16x16.png">
    <link rel="manifest" href="../../../fvcns/site.webmanifest">
    <link rel="mask-icon" href="../../../fvcns/safari-pinned-tab.svg" color="#3a4048">
    <link rel="shortcut icon" href="../../../fvcns/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="Pinkman Prod.">
    <meta name="application-name" content="Pinkman Prod.">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-config" content="../../../fvcns/browserconfig.xml">
    <meta name="theme-color" content="#000000">

    <script src="../../../js/jquery.min.js"></script>
</head>
<header>
    <a href="../../../"><div id="bloc_logo" class="link_pagetop">
            <h1 title="Retour à l'accueil" class="link_page" id="0">Pinkman</h1>
        </div></a>
</header>
<body>
<div id="container"> <h1>Mot de passe oublié</h1><form method="post" action="" name="reset">
<?php
require 'lib.inc.php';

if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"])
    && ($_GET["action"]=="reset") && !isset($_POST["action"])){
    $key = $_GET["key"];
    $email = $_GET["email"];
    $curDate = date("Y-m-d H:i:s");
    $query = mysqli_query($db,
        "SELECT * FROM `password_reset_temp` WHERE `key`='".$key."' and `email`='".$email."';"
    );
    $row = mysqli_num_rows($query);
    if ($row==""){
        $error .= '<h2>Lien Invalide</h2>
<p>Lien invalide/expiré. Soit vous n\'avez pas copié le bon lien, soit vous l\'avez déjà utilisé !</p>
<a href="http://pinkman.fr/back/gestion/forgot-password/index.php">
</a>Recupérer mon mot de passe</p>';
    }else{
        $row = mysqli_fetch_assoc($query);
        $expDate = $row['expDate'];
        if ($expDate >= $curDate){
            ?>
            <br />
            <form method="post" action="" name="update">
                <input type="hidden" name="action" value="update">
                <br /><br />
                <label>Entrez votre nouveau mot de passe :</label><br/>
                <input type="password" name="pass1" required>
                <br /><br />
                <label>Confirmez votre nouveau mot de passe :</label><br/>
                <input type="password" name="pass2" required>
                <br /><br />
                <input type="hidden" name="email" value="<?php echo $email;?>">
                <input type="submit" id="sub" value="Modifier le mot de passe">
            </form>
            <?php
        }else{
            $error .= "<h2>Lien expiré</h2>
<p>Le lien est valide 24 heures apres l envoi.<br /><br /></p>";
        }
    }
    if($error!=""){
        echo "<div class='error'>".$error."</div><br />";
    }
}

if(isset($_POST["email"]) && isset($_POST["action"]) &&
    ($_POST["action"]=="update")){
    $error="";
    $pass1 = mysqli_real_escape_string($db,$_POST["pass1"]);
    $pass2 = mysqli_real_escape_string($db,$_POST["pass2"]);
    $email = $_POST["email"];
    $curDate = date("Y-m-d H:i:s");
    if ($pass1!=$pass2){
        $error.= "<div id=\"error\"><p>Les mots de passe sont differents.</p></div>";
    }
    if($error!=""){
        echo "<div class='error'>".$error."</div><br />";
    }else{
        $pass1 = password_hash($pass1,PASSWORD_DEFAULT);
        mysqli_query($db,
            "UPDATE `user` SET `user_mdp`='".$pass1."' WHERE `user_email`='".$email."';"
        );

        mysqli_query($db,"DELETE FROM `password_reset_temp` WHERE `user_email`='".$email."';");

        echo "<div class='error'  id='error' style='border: solid 2px #77b95a; color: #5fa26c;background-color: rgba(43, 225, 104, 0.1)'><p>Le mot de passe a bien été modifié !</p>";
    }
}