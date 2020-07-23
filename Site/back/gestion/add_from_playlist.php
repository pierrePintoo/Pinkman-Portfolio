<?php
require 'config.inc.php';
require 'debut_html2.php';

$id_video = $_GET['vid_id'];
$id_playlist=$_GET['play_id'];

$db = connexionBD();
$requete = 'INSERT INTO video_playlist (_play_id, _vid_id) VALUES ('.$id_playlist.','.$id_video.');';
$resultat = $db->query($requete);

?>

<h2 class="text-center mt-5">Oui</h2>
<div class="d-flex justify-content-center">
    <img src="../../img/ok-upload.jpg">
</div>
<div class="d-flex justify-content-center">
    <a href="javascript:history.go(-1)">Retour</a>
</div>

<?php

require 'fin_html.php';
?>