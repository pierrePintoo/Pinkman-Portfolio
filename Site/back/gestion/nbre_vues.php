<?php

require 'config.inc.php';


$bdd = connexionBD();

//week
$weekly= $bdd->query('SELECT * FROM `stats`')->fetch();
if(date('Y-W')>$weekly['last_date']){
    $bdd->query('UPDATE `stats` SET `last_date`="'.date('Y-W').'",`most_vid_id`="0",`nbre_visit`="0",`nbre_vid`="0"');
    $bdd->query('UPDATE `video` SET `vid_view_hebdo`="0"');
    $bdd->query('UPDATE `playlist` SET `play_view_hebdo`="0"');
}
if(empty($_SESSION['visit'])){
    function getIp(){
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
    $_SESSION['visit']='OK';
    $bdd->query('UPDATE `stats` SET `nbre_visit`=`nbre_visit`+1,`since_creation`=`since_creation`+1');
    connexionBD()->query('INSERT INTO `stats`(`id`,`ip`) VALUES ("'.date("Y-m-d H:i:s").'","'.getIp().'")');
}

if($_POST['action']==1){
    if($_POST['type']=='video'){
        $prefixe='vid';
        $bdd->query('UPDATE `stats` SET `nbre_vid`=`nbre_vid`+1');
    }
    else if($_POST['type']=='playlist'){
        $prefixe='play';
    }
    $bdd->query('UPDATE `'.$_POST['type'].'` SET `'.$prefixe.'_views`=`'.$prefixe.'_views`+1,`'.$prefixe.'_view_hebdo`=`'.$prefixe.'_view_hebdo`+1,`'.$prefixe.'_last_view`="'.date("Y-m-d H:i:s").'" WHERE `'.$prefixe.'_id`="'.$_POST['id'].'"');
}
else if($_POST['action']==0){
    $bdd->query('UPDATE `trafic` SET `trafic_view`=`trafic_view`+1,`trafic_last_view`="'.date("Y-m-d H:i:s").'" WHERE `identifier`="'.$_POST['id'].'"');
}
else if($_POST['action']==2){
    $bdd->query('UPDATE `stats` SET `nbre_vid`=`nbre_vid`+1');
    $bdd->query('UPDATE `video` SET `'.$_POST['type'].'`=`'.$_POST['type'].'`+1,`vid_view_hebdo`=`vid_view_hebdo`+1,`vid_last_view`="'.date("Y-m-d H:i:s").'" WHERE `vid_id`="'.$_POST['id'].'"');
}
else if($_POST['action']==3){
    $bdd->query('UPDATE `stats` SET `easter_egg`=`easter_egg`+1');
}
