<?php
require 'config.inc.php';

$id = $_POST['id_vid'];

$db = connexionBD();
$req1 = 'DELETE FROM video_playlist WHERE _vid_id = '.$id;
$res1 = $db->query($req1);

$requete = 'DELETE FROM video WHERE vid_id = '.$id;
$resultat = $db->query($requete);
header('location:catalogue.php');

?>

<div class="container mt-5">
    <!--<p class="text-center">La video a bien été supprimée !</p>
    <div class="d-flex justify-content-center">
        <img src="../../img/ok-upload.jpg">
    </div>-->
    <div class="d-flex justify-content-center">
        <a href="catalogue.php">Retour</a>
    </div>
</div>

<?php
require 'fin_html.php';
?>
