<?php

require 'config.inc.php';
require 'session_verif.php';
require 'debut_html2.php';
require 'nav_html.php';

?>

<h1 class="text-center font-weight-normal mt-1" style="font-size: 1.7rem;">Vos playlists :</h1>

<?php

$db = connexionBD();

$requete = 'SELECT * FROM playlist';
$resultat =$db->query($requete);

?>

<div class="p-5">

    <table id="catalogueP" class="ui celled table responsive unstackable" style="width:100%">
        <thead>
        <tr>
            <th scope="col">Titre</th>
            <th scope="col">Nombre de vidéos</th>
            <th scope="col">Infos</th>
            <th scope="col">Contenu</th>
            <th scope="col">Supprimer</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while($ligne = $resultat->fetch())
        {
            echo '<tr><td scope="row">'.$ligne['play_titre'].'</td><td>';

            $requete = $db->prepare('SELECT * FROM video_playlist WHERE _play_id = '.$ligne['play_id'].';');
            $requete->execute();
            $count = $requete->rowCount();
            echo $count-1;

            echo '</td><td class="edit"><a class="btn btn-outline-primary" href="modif_play_infos.php?play_id='.$ligne['play_id'].'"><p>Modifier</p></a></td><td class="edit"><a class="btn btn-outline-primary" href="modif_playlist.php?play_id='.$ligne['play_id'].'"><p>Modifier</p></a></td><td class="suppr"><a class="btn btn-outline-danger" href="delete_playlist.php?play_id='.$ligne['play_id'].'"><p>Supprimer</p></a></td></tr>';
        }

        ?>
        </tbody>
    </table>

</div>
<?php

require 'fin_html.php';

?>
