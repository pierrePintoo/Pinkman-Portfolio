<?php
require 'config.inc.php';

$db = connexionBD();

//ON RECUPERE LES DONNES
$url_video = $_POST['video-url']; //url
$url_video= str_replace(' ','',$url_video);
if(substr($url_video,-1)=="/"){
    $url_video=substr($url_video,0,-1);
}

$titre_video = $_POST['video-titre']; //titre
$desc_video = $_POST['video-desc']; //description
$categorie_video = $_POST['video-categorie']; //categorie
if (isset($_POST['video-sous-categorie'])) {
    if($_POST['sous-cat']=='1'){
        $sous_cat_video = $_POST['video-sous-categorie'];
    }
    else{
        $sous_cat_video = '/';
    };
}; //sous categorie
$fichier = basename($_FILES['avatar']['name']); //fichier miniature
$ordrevid = 1; //on donne ordre = 1

//DONNEES DE LA MINIATURE
$dossier = '../../img/upload/';
$taille_maxi = 2000000;
$taille = filesize($_FILES['avatar']['tmp_name']);
$extensions = array('.png', '.jpg', '.jpeg');
$extension = strrchr($_FILES['avatar']['name'], '.');

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
    $req0 = 'SELECT * FROM video WHERE vid_minia = "'.$fichier.'";';
    $resultat0 = $db->query($req0);

    while ($videos1 = $resultat0->fetch()) { //si minia avec le meme nom, alors ++nomminia.extension
        if ($videos1['vid_minia'] == $fichier) {
            $fichier = $ordrevid.$fichier;
            $ordrevid = $ordrevid +1;
        }
    }


    if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier))
    {

        //INCREMENTE L'ORDRE
        $req1 = 'SELECT * FROM video WHERE vid_categorie = "'.$categorie_video.'";';
        $resultat1 = $db->query($req1);

        while ($videos = $resultat1->fetch()) { //tant qu'une video a le meme ordre, alors ordre ++
            if ($videos['vid_ordrecat'] == $ordrevid) {
                $ordrevid = $ordrevid +1;
            }
        }

        $titre_video= str_replace('"','\\"',$titre_video);
        $titre_video= str_replace("'","\\'",$titre_video);
        $titre_video= str_replace(";","\\;",$titre_video);
        $titre_video= str_replace(".","\\.",$titre_video);
        $titre_video= str_replace("$","\\$",$titre_video);
        $desc_video= str_replace('"','\\"',$desc_video);
        $desc_video= str_replace("'","\\'",$desc_video);
        $desc_video= str_replace(";","\\;",$desc_video);
        $desc_video= str_replace(".","\\.",$desc_video);
        $desc_video= str_replace("$","\\$",$desc_video);
        $requete = 'INSERT INTO video (vid_url, vid_titre, vid_categorie, vid_desc, vid_minia, vid_souscat, vid_ordrecat) VALUES ("' . $url_video . '","' . $titre_video . '", "' . $categorie_video . '", "' . $desc_video . '", "' . $fichier . '", "' . $sous_cat_video . '", "' . $ordrevid . '");';
        $resultat =$db->query($requete);
        header('location:catalogue.php');
        ?>

        <h2 class="text-center mt-5">Vidéo ajoutée avec succès !</h2>
        <!--<div class="d-flex justify-content-center">
            <img src="../../img/ok-upload.jpg">
        </div>-->
        <div class="d-flex justify-content-center">
            <a href="index.php">Retour</a>
        </div>

<?php
    }


    else
    {
        echo '<h2 class="text-center mt-5">Une erreur est survenue, veuillez reeseyer ulterieurement !</h2>
        <div class="d-flex justify-content-center">
            <img src="../../img/error.jpg">
        </div>
        <div class="d-flex justify-content-center">
            <a href="index.php">Retour</a>
        </div>';
    }
}

else
{
    echo $erreur;
}

require 'fin_html.php';