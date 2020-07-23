<?php

require 'config.inc.php';

$bd = connexionBD();
$mdp = $_POST['password'];

$req = 'SELECT * FROM user';
$res = $bd->query($req);
$ligne=$res->fetch();

if (password_verify($mdp,$ligne['user_mdp'])){
    $_SESSION['nom']=$ligne['user_nom'];
    $_SESSION['mail']=$ligne['user_email'];
    $bd->query('UPDATE `user` SET `last_co`="'.date("Y-m-d H:i:s").'"');
    header('location:index.php');
} else {
    //$_SESSION['erreur']= password_verify('toto',$ligne['user_mdp']);
    $_SESSION['erreur']='<p>Mot de passe erroné</p>';
    header('location:login.php');
}