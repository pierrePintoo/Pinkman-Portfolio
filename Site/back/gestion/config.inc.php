<?php session_start();
define('BDD_LOGIN', 'roort');
define('BDD_PASSWORD', 'root');
define('BDD_SERVER', 'localhost');
define('BDD_DATABASE', 'database');

function connexionBD()
{
    try {
        $idConnexion = new PDO('mysql:host=' . BDD_SERVER . ';dbname=' . BDD_DATABASE . ';charset=utf8;', BDD_LOGIN, BDD_PASSWORD);
        $idConnexion->query('SET NAMES utf8;');
        return $idConnexion;
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage() . '<br />';
        die();
    }
}

function deconnexionBD(&$idConnexion)
{
    $idConnexion = null;
}
$error = "";
