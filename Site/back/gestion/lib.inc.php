<?php
function connexionBD() {
    try {
        $idConnexion=new PDO('mysql:host='.HOST.';port='.PORT.';
dbname='.DATABASE.';charset=UTF8;', USER, PASSWORD);
        $idConnexion->query('SET NAMES utf8;');
        return $idConnexion;
    } catch (PDOException $e) {
        echo 'Erreur : '.$e->getMessage().'<br />'; die();
    }
}
function deconnexionBD(&$idConnexion) {
    $idConnexion=null;
}
?>