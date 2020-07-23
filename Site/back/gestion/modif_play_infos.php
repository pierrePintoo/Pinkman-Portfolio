<?php

require 'config.inc.php';
require 'session_verif.php';
require 'debut_html2.php';
require 'nav_html.php';

$id = $_GET['play_id'];

$db = connexionBD();

$requete = 'SELECT * FROM playlist where play_id = '.$id.';';

$resultat = $db->query($requete);

$video =$resultat->fetch();

$req = 'SELECT MAX(play_ordrecat) FROM playlist WHERE play_categorie = "'.$video['play_categorie'].'";'; // LA PLACE MAX POUR LES PLACES
$res = $db->query($req);
$vid = $res->fetch();
$placemax = $vid[0] + 1;

?>

    <h1 style="margin-bottom: 20px;min-height: auto;"><?php echo $video['play_titre']?></h1>

        <div class="info_modif">
            <div>
                <p><strong>Categorie :</strong> <?php echo $video['play_categorie'] ?></p>
                <p><strong>Sous-Categorie :</strong> <?php echo $video['play_souscat'] ?></p>
                <p><strong>Description :</strong><br><?php echo $video['play_desc'] ?></p>
            </div>
            <div class="bloc_img_modif">
                <img alt="miniature" src="../../img/upload/<?php echo $video['play_minia'] ?>">
                <em><p style="color:rgba(0,0,0,0.4)"><?php echo $video['play_minia'] ?></p></em>
            </div>
        </div>
    <h1>MODIFIER</h1>
            <form method="POST" action="modif_play_infos_valid.php" enctype="multipart/form-data">

                <!--TITRE-->
                <div class="bloc_input">
                    <label for="video-titre">Titre de la playlist</label>
                    <input type="text" class="form-control" name="video-titre" id="video-titre" value="<?php echo $video['play_titre']  ?>">
                </div>

                <!--//DESCRIPTION-->
                <div class="bloc_input" style="height: auto;">
                    <label for="video-desc">Description de la playlist</label>
                    <textarea class="form-control" id="video-desc" name="video-desc" rows="3"><?php echo $video['play_desc']  ?></textarea>
                </div>

                <!--CATEGORIE-->
                <div class="bloc_input bloc_input_select">
                    <label for="video-categorie">Categorie de la playlist</label>
                    <div class="back_select">
                        <select class="form-control" id="video-categorie" name="video-categorie">
                            <option value="pub" <?php if($video['play_categorie']=='pub'){ echo 'selected';}  ?>>Film publicitaire</option>
                            <option value="corp" <?php if($video['play_categorie']=='corp'){ echo 'selected';}  ?>>Film corporate</option>
                            <option value="clip" <?php if($video['play_categorie']=='clip'){ echo 'selected';}  ?>>Clip</option>
                            <option value="motion" <?php if($video['play_categorie']=='motion'){ echo 'selected';}  ?>>Motion design</option>
                        </select>
                        <svg class="svg_select" data-name="Calque 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 252 500.71"><defs><style>.cls-1{fill:#fff;}</style></defs><title>Sans titre - 2</title><polygon class="cls-1" points="0 174.35 126 0 252 174.35 0 174.35"/><polygon class="cls-1" points="252 326.35 126 500.71 0 326.35 252 326.35"/></svg>
                    </div>
                </div>

                <div class="bloc_input bloc_input_select">
                    <label for="video-sous-categorie">Sous-categorie de la video</label>
                    <div class="bloc_radios">
                        <label class="radio" for="sous-cat1">Oui
                            <input class="show_categorie" type="radio" name="sous-cat" id="sous-cat1" value="1"  <?php if($video['play_souscat']!='/'){ echo 'checked';}  ?> required>
                            <span class="checkmark"></span>
                        </label>
                        <label class="radio" for="sous-cat2">Non
                            <input class="hide_categorie" type="radio" name="sous-cat" id="sous-cat2" value="0"  <?php if($video['play_souscat']=='/'){ echo 'checked';}  ?> required>
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="back_select tutu" style="margin-top: 5px;">
                        <select class="form-control tutu" id="video-sous-categorie" name="video-sous-categorie" style="display: none;">
                            <option value="/" <?php if($video['play_souscat']=='/'){ echo 'selected';}  ?>>Aucune</option>
                            <option value="corporate" <?php if($video['play_souscat']=='corporate'){ echo 'selected';}  ?>>Corporate</option>
                            <option value="events/portraits" <?php if($video['play_souscat']=='events/portraits'){ echo 'selected';}  ?>>Events/Portraits</option>
                            <option value="interviews" <?php if($video['play_souscat']=='interviews'){ echo 'selected';}  ?>>Interviews</option>
                        </select>
                        <svg class="svg_select" data-name="Calque 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 252 500.71"><defs><style>.cls-1{fill:#fff;}</style></defs><title>Sans titre - 2</title><polygon class="cls-1" points="0 174.35 126 0 252 174.35 0 174.35"/><polygon class="cls-1" points="252 326.35 126 500.71 0 326.35 252 326.35"/></svg>
                    </div>
                </div>


                <!--PLACE-->
                <!--<div class="form-group">
                <label for="video-minia">Place dans la file</label><br>
                <input placeholder="Place dans la file..." type="number" min="1" max="<?php /*echo $placemax; */?>" name="video-ordre">
                <small id="miniaHelp" class="form-text text-muted">Place min = 1 & place max = <?php /*echo $placemax; */?></small>
            </div>-->

                <!--MINIATURE-->
                <div class="bloc_input">
                    <label for="video-minia">Miniature de la video</label>
                    <div class="bloc_file">
                        <input type="file" name="avatar" id="avatar" accept="image/*">
                        <span class="select-file">Choisir la miniature</span>
                        <p class="filename" style="padding: 0 10px"><?php echo $video['play_minia'] ?></p>
                    </div>
                </div>


                <!--PAGE D'ACCUEIL-->
                <!--<div class="form-group mb-3">
                    <label for="video-sous-categorie">Video en page d'accueil ?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="video-accueil" id="exampleRadios1" value="1" checked>
                        <label class="form-check-label" for="exampleRadios1">Oui</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="video-accueil" id="exampleRadios1" value="0">
                        <label class="form-check-label" for="exampleRadios1">Non</label>
                    </div>
                </div>-->

                <input type="hidden" value="<?php echo $id?>" name="vid-id">
                <!--VALIDATION-->
                <div  class="bloc_input">
                    <div>
                        <input type="submit" class="sub_back" value="Modifier la playlist">
                    </div>
                </div>
            </form>
    <a href="playlist.php"><p class="cancel" style="margin-bottom: 50px;">Annuler</p></a>


<?php

require 'fin_html.php';

?>