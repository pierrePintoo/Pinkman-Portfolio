<?php

require 'config.inc.php';
require 'session_verif.php';
require 'debut_html2.php';
require 'nav_html.php';

?>

<h1 class="text-center font-weight-normal mt-1" style="font-size: 1.7rem;">Vos vidéos :</h1>

<?php

$db = connexionBD();

$requete = 'SELECT * FROM video ORDER BY vid_id ';
$resultat =$db->query($requete);

?>

<div class="p-5">
<table id="catalogueV" class="ui celled table responsive unstackable" style="width:100%">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Titre</th>
        <th scope="col">Miniature</th>
        <th scope="col">Categorie</th>
        <th scope="col">Sous-categorie</th>
        <th scope="col">Modifier</th>
        <th scope="col">Supprimer</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $id=1;
    while($ligne = $resultat->fetch())
    {
        echo '<tr><td>'.$id.'</td><td scope="row">'.$ligne['vid_titre'].'</td><td><a href="'.$ligne['vid_url'].'" target="_blank"><img style="width: 200px; height: auto;" src="../../img/upload/'.$ligne['vid_minia'].'"></a></td><td>'.$ligne['vid_categorie'].'</td><td>'.$ligne['vid_souscat'].'</td><td class="edit"><a class="btn btn-outline-primary" href="modif_vid.php?vid_id='.$ligne['vid_id'].'"><p>Modifier</p></a></td><td class="suppr"><a href="delete_vid.php?vid_id='.$ligne['vid_id'].'"><p>Supprimer</p></a></td></tr>';
        $id++;
    }

    ?>
    </tbody>
</table>

</div>

<?php

require 'fin_html.php';

?>
