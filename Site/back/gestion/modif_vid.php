<?php

require 'config.inc.php';
require 'session_verif.php';
require 'debut_html2.php';
require 'nav_html.php';

$id = $_GET['vid_id'];

$db = connexionBD();

$requete = 'SELECT * FROM video where vid_id = '.$id.';';

$resultat = $db->query($requete);

$video =$resultat->fetch();

$req = 'SELECT MAX(vid_ordrecat) FROM video WHERE vid_categorie = "'.$video['vid_categorie'].'";'; // LA PLACE MAX POUR LES PLACES
$res = $db->query($req);
$vid = $res->fetch();
$placemax = $vid[0] + 1;

$req2 = 'SELECT * FROM playlist ;'; //ON SELECTIUONE LES PLAYLIST A AFFICHER DANS LE SELECT
$res2 = $db->query($req2);

$req3 = $db->query('SELECT COUNT(*) FROM video_playlist  WHERE _vid_id = '.$id.';'); //ON REGARDE SI IL Y A DES RESULTATS DE PLAYLIST POUR LA VIDEO
$res3 = $req3->fetch();

if ($res3[0] > 0) {
    $req4 = $db->query('SELECT * FROM video_playlist INNER JOIN video WHERE video_playlist._vid_id = '.$id.';'); //ON PREND L'ID DE LA PLAYLIST DE LA VIDEO
    $res4 = $req4->fetch();

    $req5 = $db->query('SELECT * FROM playlist WHERE play_id = '.$res4['_play_id'].';'); //ON RECUPERE LE TITRE DE LA PLAYLIST
}

?>

<h1 style="margin-bottom: 20px;min-height: auto;"><?php echo $video['vid_titre']?></h1>

        <!--DONNEES-->
        <div class="info_modif">
            <div>
            <p><strong>Categorie :</strong> <?php echo $video['vid_categorie'] ?></p>
            <p><strong>Sous-Categorie :</strong> <?php echo $video['vid_souscat'] ?></p>
            <p><strong>Description :</strong> <br><?php echo $video['vid_desc'] ?></p>
            <p><strong>Playlist associée(s) :</strong> <?php
                $tourcount=0;
                    if ($res3[0] > 0) { //SI IL Y A UNE OU PLUSIEURS PLAYLIST
                        while($ligne = $req5->fetch()) {
                            if($tourcount>0){
                                echo ', ',$ligne['play_titre'];
                            }
                            else{
                                echo $ligne['play_titre'];
                                $tourcount++;
                            }
                        }

                    }   else {

                        echo 'Aucune playlist';

                    }
                    ?></p>
            <p><strong>URL :</strong> <a href="<?php echo $video['vid_url'] ?>" style="color:#3F596F;" target="_blank"><?php echo $video['vid_url'] ?></a></p>
            </div>
        <div class="bloc_img_modif">
            <img alt="miniature" src="../../img/upload/<?php echo $video['vid_minia'] ?>">
            <em><p style="color:rgba(0,0,0,0.4)"><?php echo $video['vid_minia'] ?></p></em>
        </div>
    </div>
    <h1>Modifier</h1>


    <form action="modif_vid_valid.php" enctype="multipart/form-data" method="POST">

        <!--URL-->
        <div class="bloc_input">
            <label for="video-url">URL de la video</label>
            <input required type="text" class="form-control" name="video-url" id="video-url" value="<?php echo $video['vid_url']  ?>" required>
        </div>

        <!--TITRE-->
        <div class="bloc_input">
            <label for="video-titre">Titre de la video</label>
            <input required type="text" name="video-titre" id="video-titre" value="<?php echo $video['vid_titre']  ?>" required>
        </div>

        <!--//DESCRIPTION-->
        <div class="bloc_input" style="height: auto;">
            <label for="video-desc">Description de la video</label>
            <textarea id="video-desc" name="video-desc" rows="3" required><?php echo $video['vid_desc']  ?></textarea>
        </div>

        <!--CATEGORIE-->
        <div class="bloc_input bloc_input_select">
            <label for="video-categorie">Categorie de la video</label>
            <div class="back_select">
                <select id="video-categorie" name="video-categorie" required>
                    <option value="pub" <?php if($video['vid_categorie']=='pub'){ echo 'selected';}  ?>>Film publicitaire</option>
                    <option value="corp" <?php if($video['vid_categorie']=='corp'){ echo 'selected';}  ?>>Film corporate</option>
                    <option value="clip" <?php if($video['vid_categorie']=='clip'){ echo 'selected';}  ?>>Clip</option>
                    <option value="motion" <?php if($video['vid_categorie']=='motion'){ echo 'selected';}  ?>>Motion design</option>
                </select>
                <svg class="svg_select" data-name="Calque 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 252 500.71"><defs><style>.cls-1{fill:#fff;}</style></defs><title>Sans titre - 2</title><polygon class="cls-1" points="0 174.35 126 0 252 174.35 0 174.35"/><polygon class="cls-1" points="252 326.35 126 500.71 0 326.35 252 326.35"/></svg>
            </div>

        </div>

        <!--SOUS CATEGORIE-->
        <div class="bloc_input bloc_input_select">

            <label for="video-sous-categorie">Sous-categorie de la video</label>
            <div class="bloc_radios">
                <label class="radio" for="sous-cat1">Oui
                    <input class="show_categorie" type="radio" name="sous-cat" id="sous-cat1" value="1"  <?php if($video['vid_souscat']!='/'){ echo 'checked';}  ?> required>
                    <span class="checkmark"></span>
                </label>
                <label class="radio" for="sous-cat2">Non
                    <input class="hide_categorie" type="radio" name="sous-cat" id="sous-cat2" value="0"  <?php if($video['vid_souscat']=='/'){ echo 'checked';}  ?> required>
                    <span class="checkmark"></span>
                </label>
            </div>
            <div class="back_select tutu" style="margin-top: 5px;">
                <select id="video-sous-categorie" name="video-sous-categorie" required>
                    <option value="/" <?php if($video['vid_souscat']=='/'){ echo 'selected';}  ?>>Aucune</option>
                    <option value="corporate" <?php if($video['vid_souscat']=='corporate'){ echo 'selected';}  ?>>Corporate</option>
                    <option value="events/portraits" <?php if($video['vid_souscat']=='events/portraits'){ echo 'selected';}  ?>>Events/Portraits</option>
                    <option value="interviews" <?php if($video['vid_souscat']=='interviews'){ echo 'selected';}  ?>>Interviews</option>
                </select>
                <svg class="svg_select" data-name="Calque 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 252 500.71"><defs><style>.cls-1{fill:#fff;}</style></defs><title>Sans titre - 2</title><polygon class="cls-1" points="0 174.35 126 0 252 174.35 0 174.35"/><polygon class="cls-1" points="252 326.35 126 500.71 0 326.35 252 326.35"/></svg>
            </div>
        </div>

        <!--MINIATURE-->
        <div class="bloc_input">
            <label for="video-minia">Miniature de la video</label>
            <div class="bloc_file">
                <input type="file" name="avatar" id="avatar" accept="image/*">
                <span class="select-file">Choisir la miniature</span>
                <p class="filename" style="padding: 0 10px"><?php echo $video['vid_minia']  ?></p>
            </div>
        </div>

        <input type="hidden" value="<?php echo $id?>" name="vid-id">

        <!--VALIDATION-->
        <div  class="bloc_input">
            <div>
                <input type="submit" class="sub_back" value="Modifier la video">
            </div>
        </div>

    </form>
    <a href="catalogue.php"><p class="cancel" style="margin-bottom: 50px;">Annuler</p></a>

<?php

require 'fin_html.php';

?>