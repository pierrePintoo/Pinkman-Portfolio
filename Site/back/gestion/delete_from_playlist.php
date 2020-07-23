<?php
require 'config.inc.php';

$id_video = $_GET['vid_id'];
$id_playlist=$_GET['play_id'];

$db = connexionBD();
$requete = 'DELETE FROM video_playlist WHERE _play_id = '.$id_playlist.' AND _vid_id = '.$id_video.';';
$resultat = $db->query($requete);
$retour=$_GET['play_id'];
header("location:modif_playlist.php?play_id=$retour");

