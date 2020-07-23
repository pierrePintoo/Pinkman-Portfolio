<?php

require 'config.inc.php';
require 'session_verif.php';
require 'debut_html2.php';
require 'nav_html.php';

$id_playlist = $_GET['play_id'];

$db = connexionBD();

$req1 = $db->query('SELECT * FROM playlist WHERE play_id = '.$id_playlist); //ON SELECTIONNE LA PLAYLIST
$ma_playlist = $req1->fetch();

$req2 = $db->query('SELECT * FROM playlist INNER JOIN video_playlist ON playlist.play_id = '.$id_playlist.' INNER JOIN video ON video_playlist._vid_id = video.vid_id WHERE _play_id = '.$id_playlist); //TOUTES LES VIDEOS QUI SONT DANS LA PLAYLIST

$req3 = $db->query('SELECT * FROM video left join video_playlist on  vid_id =  _vid_id  WHERE _play_id is null or  _play_id <> '.$id_playlist.' ORDER BY vid_id DESC'); //TOUTES LES VIDEOS QUI NE SONT PAS DANS LA PLAYLIST

?>

            <!--DONNEES-->
            <div class="info_modif" style="margin-top: 30px;margin-bottom: 0;">
                <div>
                    <p><strong>Titre : </strong><?php echo $ma_playlist['play_titre'] ?></p>
                    <p><strong>Description :</strong><br><?php echo $ma_playlist['play_desc'] ?></p>
                </div>
                <div class="bloc_img_modif">
                    <img alt="miniature" src="../../img/upload/<?php echo $ma_playlist['play_minia'] ?>">
                    <em><p style="color:rgba(0,0,0,0.4)"><?php echo $ma_playlist['play_minia'] ?></p></em>
                </div>
            </div>

<div class="bloc_titre_play">
    <p>Vidéos dans la playlist :</p>
</div>
    <div class="p-5">
        <table id="tableModiPH" class="ui celled table responsive unstackable" style="width:100%">
            <thead>
            <tr>
                <th scope="col">Titre</th>
                <th scope="col">Miniature</th>
                <th scope="col">Categorie</th>
                <th scope="col">Supprimer</th>
            </tr>
            </thead>
            <tbody>
            <?php
            while($videos_playlist = $req2->fetch())
            {
                echo '<tr><td scope="row">'.$videos_playlist['vid_titre'].'</td>';
                echo '<td><img alt="Miniature" style="width: 200px; height: auto;" src="../../img/upload/'.$videos_playlist['vid_minia'].'"></td>';
                echo '<td>'.$videos_playlist['vid_categorie'].'</td>';
                echo '<td class="suppr"><a href="delete_from_playlist.php?vid_id='.$videos_playlist['_vid_id'].'&play_id='.$videos_playlist['_play_id'].'"><p>Supprimer</p></a></td></tr>';
            }

            ?>
            </tbody>
        </table>
    </div>

    <div class="bloc_titre_play">
        <p>Sélectionnez une vidéo à ajouter à cette playlist :</p>
    </div>
    <div class="p-5">
    <table id="tableModiPB" class="ui celled table responsive unstackable" style="width:100%">
            <thead>
            <tr>
                <th scope="col">Titre</th>
                <th scope="col">Miniature</th>
                <th scope="col">Categorie</th>
                <th scope="col">Ajouter</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $idcountB= $req3->rowCount();
            while($videos_pas_playlist = $req3->fetch())
            {
                echo '<tr><td scope="row">'.$videos_pas_playlist['vid_titre'].'</td>';
                echo '<td><img alt="Miniature" style="width: 200px; height: auto;" src="../../img/upload/'.$videos_pas_playlist['vid_minia'].'"></td>';
                echo '<td>'.$videos_pas_playlist['vid_categorie'].'</td>';
                /*echo '<td><img style="width: 200px; height: auto;" src="../img/upload/'.$videos_pas_playlist['vid_minia'].'"></td>';*/
                echo '<td class="edit"><a href="add_from_playlist.php?vid_id='.$videos_pas_playlist['vid_id'].'&play_id='.$id_playlist.'"><p>Ajouter</p></a></td></tr>';
                $idcountB--;
            }

            ?>
            </tbody>
        </table>
    </div>
    <a href="playlist.php"><p class="cancel" style="margin-bottom: 50px;">Annuler</p></a>

<?php

require 'fin_html.php';

?>