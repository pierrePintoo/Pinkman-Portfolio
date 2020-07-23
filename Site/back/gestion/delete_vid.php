<?php
require 'config.inc.php';
require 'session_verif.php';
require 'debut_html2.php';
require 'nav_html.php';

$id = $_GET['vid_id'];

$db = connexionBD();
$requete = 'SELECT * FROM video WHERE vid_id = '.$id.';';
$resultat = $db->query($requete);
$toto = $resultat->fetch();
?>

    <p style="margin-top:50px;text-align: center;padding: 0 30px">Voulez vous vraiment supprimer la vidéo <strong><?php echo $toto['vid_titre'] ?></strong> ?</p>
        <img alt="miniature" class="img-fluid" src="../../img/upload/<?php echo $toto['vid_minia'] ?>" style="width:50vw;min-width: 100px">
    <form method="POST" action="delete_vid_valid.php">
        <input type="hidden" value="<?php echo $id ?>" name="id_vid">
        <div  class="bloc_input" style="align-items: center;">
            <div>
                <input type="submit" class="sub_back" value="Oui :(">
            </div>
        </div>
        <div  class="bloc_input" style="align-items: center;">
            <div>
                <a href="catalogue.php">
                <p class="sub_back sub_back_cancel">Nan je rigolais</p>
                </a>
            </div>
        </div>
    </form>


<?php
require 'fin_html.php';
?>