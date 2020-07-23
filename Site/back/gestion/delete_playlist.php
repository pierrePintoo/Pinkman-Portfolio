<?php
require 'config.inc.php';

$id = $_GET['play_id'];

$db = connexionBD();
$req1 = 'DELETE FROM video_playlist WHERE _play_id = '.$id;
$res1 = $db->query($req1);

$requete = 'DELETE FROM playlist WHERE play_id = '.$id.';';
$resultat = $db->query($requete);
header('location:playlist.php');
?>

<?php
require 'fin_html.php';
?>
