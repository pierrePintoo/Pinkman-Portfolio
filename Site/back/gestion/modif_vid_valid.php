<?php

require 'config.inc.php';
$db = connexionBD();

//ON RECUPERE LES DONNES
$id_video = $_POST['vid-id']; //id
$categorie_video = $_POST['video-categorie']; //categorie
if (isset($_POST['video-sous-categorie'])) {
    if($_POST['sous-cat']=='1'){
        $sous_cat_video = $_POST['video-sous-categorie'];
    }
    else{
        $sous_cat_video = '/';
    };
}; //sous categorie

/*$vid_news = $_POST['video-accueil'];*/

if (isset($_POST['video-url']) && $_POST['video-url'] != "") { //URL

    $url_video = $_POST['video-url'];
    $url_video= str_replace(' ','',$url_video);
    if(substr($url_video,-1)=="/"){
        $url_video=substr($url_video,0,-1);
    }

    $req = 'UPDATE video SET vid_url = "'.$url_video.'" WHERE vid_id = '. $id_video .';';
    $res =$db->query($req);
}

if (isset($_POST['video-titre']) && $_POST['video-titre'] != "") { //TITRE

    $titre_video = $_POST['video-titre'];
    $titre_video= str_replace('"','\\"',$titre_video);
    $titre_video= str_replace("'","\\'",$titre_video);
    $titre_video= str_replace(";","\\;",$titre_video);
    $titre_video= str_replace(".","\\.",$titre_video);
    $titre_video= str_replace("$","\\$",$titre_video);

    $req = 'UPDATE video SET vid_titre = "'.$titre_video.'" WHERE vid_id = '. $id_video .';';
    $res =$db->query($req);
}

if (isset($_POST['video-desc']) && $_POST['video-desc'] != "") { //DESCRIPTION

    $desc_video = $_POST['video-desc'];
    $desc_video= str_replace('"','\\"',$desc_video);
    $desc_video= str_replace("'","\\'",$desc_video);
    $desc_video= str_replace(";","\\;",$desc_video);
    $desc_video= str_replace(".","\\.",$desc_video);
    $desc_video= str_replace("$","\\$",$desc_video);

    $req = 'UPDATE video SET vid_desc = "'.$desc_video.'" WHERE vid_id = '. $id_video .';';
    $res =$db->query($req);
}

/*if (isset($_POST['video-ordre']) && $_POST['video-ordre'] != "") { //NOUVELLE PLACE

    $nouvelle_place = $_POST['video-ordre'];

//ON SELECTIONNE L'ANCIENNE PLACE DE LA VIDEO
    $req1 = 'SELECT * FROM video WHERE vid_id = '.$id_video.';';
    $resultat1 =$db->query($req1);
    $unevid = $resultat1->fetch();
    $ancienne_place = $unevid['vid_ordrecat'];

//TEST SI PLACE GAGNE OU PERD
    if ($nouvelle_place < $ancienne_place) { // LA VIDEO GAGNE DES PLACES nv = 4 ; ac = 2

        $req2 = 'UPDATE video SET vid_ordrecat = vid_ordrecat + 1 WHERE vid_categorie = "'.$categorie_video.'" && vid_ordrecat >= '.$nouvelle_place.' && vid_ordrecat < '.$ancienne_place.';';
        $resultat2 =$db->query($req2);

    }   elseif ($nouvelle_place > $ancienne_place) { // LA VIDEO PERD DES PLACES

        $req2 = 'UPDATE video SET vid_ordrecat = vid_ordrecat - 1 WHERE vid_categorie = "'.$categorie_video.'" && vid_ordrecat <= '.$nouvelle_place.' && vid_ordrecat >  '.$ancienne_place.';';
        $resultat2 =$db->query($req2);

    }

    $req = 'UPDATE video SET vid_ordrecat = "'.$nouvelle_place.'" WHERE vid_id = '. $id_video .';';
    $res =$db->query($req);
}*/

/*if ($_POST['playlist'] != "/") {

    $playlist_id = $_POST['playlist'];

    $req = 'UPDATE video_playlist SET _vid_id = "'.$id_video.'" WHERE _play_id = '. $playlist_id .';';
    $res =$db->query($req);

}   else {

    if (isset($_POST['play-id2'])) {

        $playlist_id2 = $_POST['play-id2'];

        $req = 'UPDATE playlist SET _vid_id = NULL WHERE play_id = '. $playlist_id2 .';';
        $res =$db->query($req);
    }

}*/



if (isset($_FILES['video-minia']) && $_FILES['video-minia']['name'] != "") { //SI IL Y A UNE NOUVELLE MINIATURE

    $fichier = basename($_FILES['video-minia']['name']); //fichier miniature
    //DONNEES DE LA MINIATURE
    $dossier = '../../img/upload/';
    $taille_maxi = 2000000;
    $taille = filesize($_FILES['video-minia']['tmp_name']);
    $extensions = array('.png', '.jpg', '.jpeg');
    $extension = strrchr($_FILES['video-minia']['name'], '.');

    if(!in_array($extension, $extensions)) //ON VERIFIE L'EXTENSION
    {
        $erreur = '<p style="color: red; font-style: italic;" class="text-center mt-5">Modification de la miniature non prise en compte, car doit etre de type png/jpg/jpeg !</p>';
    }

    if($taille>$taille_maxi) //ON VERIFIE LE POIDS (limite 2mo)
    {
        $erreur = '<p style="color: red; font-style: italic;" class="text-center mt-5">Modification de la miniature non prise en compte, car taille doit etre inferieure a 2mo !</p>';
    }


    if(!isset($erreur)) //PAS D'ERREUR
    {
//FORMATE LE FICHIER POUR LES ACCENTS
        $fichier = strtr($fichier,
            'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
            'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
        $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);


//DETECTE SI MINIATURE AVEC LE MEME NOM
        $req0 = 'SELECT * FROM video WHERE vid_minia = "'.$fichier.'";';
        $resultat0 = $db->query($req0);

        while ($videos1 = $resultat0->fetch()) { //si minia avec le meme nom, alors ++nomminia.extension
            if ($videos1['vid_minia'] == $fichier) {
                $fichier = $ordrevid.$fichier;
                $ordrevid = $ordrevid +1;
            }
        }
        if(move_uploaded_file($_FILES['video-minia']['tmp_name'], $dossier . $fichier))
        {
//MODIFICATION DE LA VIDEO EN QUESTION
            $requete = 'UPDATE video SET vid_minia = "'.$fichier.'" WHERE vid_id = '. $id_video .';';
            $resultat =$db->query($requete);
        }
        else
        {
            echo 'Erreur';
        }
    }
    else
    {
        echo $erreur;
    }
}

$req = 'UPDATE video SET vid_categorie = "'.$categorie_video.'" , vid_souscat = "'.$sous_cat_video.'"  WHERE vid_id = '. $id_video .';';
$res =$db->query($req);
header('location:catalogue.php');
?>

<h2 class="text-center">Vidéo modifier avec succès !</h2>
    <!--<div class="d-flex justify-content-center">
        <img src="../../img/ok-upload.jpg">
    </div>-->
    <div class="d-flex justify-content-center">
        <a href="catalogue.php">Retour</a>
    </div>

<?php
require 'fin_html.php';