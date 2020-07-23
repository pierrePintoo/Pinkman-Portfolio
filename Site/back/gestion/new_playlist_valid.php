<?php
require 'config.inc.php';

$db = connexionBD();

//DONNEES DE LA MINIATURE
$fichier = basename($_FILES['minia']['name']); //fichier miniature
$dossier = '../../img/upload/';
$taille_maxi = 2000000;
$taille = filesize($_FILES['minia']['tmp_name']);
$extensions = array('.png', '.jpg', '.jpeg');
$extension = strrchr($_FILES['minia']['name'], '.');

if(!in_array($extension, $extensions)) //ON VERIFIE L'EXTENSION
{
    $erreur = '<h2 class="text-center mt-5">La miniature doit être de type jpeg, jpg ou png !</h2>
        <div class="d-flex justify-content-center">
            <img src="../../img/error.jpg">
        </div>
        <div class="d-flex justify-content-center">
            <a href="javascript:history.go(-1)">Retour</a>
        </div>';
}


if($taille>$taille_maxi) //ON VERIFIE LE POIDS (limite 2mo)
{
    $erreur = '<h2 class="text-center mt-5">Miniature trop volumineuse, la taille doit être inferieure à 2MO !</h2>
        <div class="d-flex justify-content-center">
            <img src="../../img/error.jpg">
        </div>
        <div class="d-flex justify-content-center">
            <a href="javascript:history.go(-1)">Retour</a>
        </div>';
}




if(!isset($erreur)) //PAS D'ERREUR
{
    //FORMATE LE FICHIER POUR LES ACCENTS
    $fichier = strtr($fichier,
        'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
        'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
    $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);


    //DETECTE SI MINIATURE AVEC LE MEME NOM
    $req0 = 'SELECT * FROM playlist WHERE play_minia = "'.$fichier.'";';
    $resultat0 = $db->query($req0);

    while ($videos1 = $resultat0->fetch()) { //si minia avec le meme nom, alors ++nomminia.extension
        if ($videos1['play_minia'] == $fichier) {
            $fichier = $ordrevid.$fichier;
            $ordrevid = $ordrevid +1;
        }
    }


    if(move_uploaded_file($_FILES['minia']['tmp_name'], $dossier . $fichier)) {

        if (isset($_POST['playlist-nom']) && isset($_POST['playlist-desc']) && $_POST['playlist-nom'] != "") {

            $titre_play = $_POST['playlist-nom']; //titre
            $desc_play = $_POST['playlist-desc']; //description
            $cat_play = $_POST['play-categorie']; //categorie
            if (isset($_POST['play-souscat'])) {
                if($_POST['sous-cat']=='1'){
                    $souscat_play = $_POST['play-souscat'];
                }
                else{
                    $souscat_play = '/';
                };
            }; //sous categorie
            $ordrevid = 1;

            //INCREMENTE L'ORDRE
            $req1 = 'SELECT * FROM playlist WHERE play_categorie = "'.$cat_play.'";';
            $resultat1 = $db->query($req1);

            while ($plays = $resultat1->fetch()) {
                if ($plays['play_ordrecat'] == $ordrevid) {
                    $ordrevid = $ordrevid +1;
                }
            }


            $titre_play= str_replace('"','\\"',$titre_play);
            $titre_play= str_replace("'","\\'",$titre_play);
            $titre_play= str_replace(";","\\;",$titre_play);
            $titre_play= str_replace(".","\\.",$titre_play);
            $titre_play= str_replace("$","\\$",$titre_play);
            $desc_play= str_replace('"','\\"',$desc_play);
            $desc_play= str_replace("'","\\'",$desc_play);
            $desc_play= str_replace(";","\\;",$desc_play);
            $desc_play= str_replace(".","\\.",$desc_play);
            $desc_play= str_replace("$","\\$",$desc_play);
            $requete = 'INSERT INTO playlist (play_titre, play_desc, play_categorie, play_souscat, play_ordrecat, play_minia) VALUES ("' . $titre_play . '", "' . $desc_play . '", "' . $cat_play . '", "' . $souscat_play . '", '.$ordrevid.' ,"' . $fichier . '");';
            $resultat =$db->query($requete);

            $req = 'SELECT * FROM playlist WHERE play_titre = "'.$titre_play.'";';
            $res = $db->query($req);
            $ligne = $res->fetch();
            $play_id = $ligne['play_id'];

            $req2 = 'INSERT INTO video_playlist (_play_id) VALUES ('.$play_id.');';
            $res2 = $db->query($req2);

            header('location:playlist.php');

    }
}


?>

<?php

}   else {

    echo $erreur;

}

require 'fin_html.php';


?>