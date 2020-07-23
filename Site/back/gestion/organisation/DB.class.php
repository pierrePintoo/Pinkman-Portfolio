<?php

require '../session_verif_SD.php';

class DB{
    // Database configuration
    private $dbHost     = "localhost";
    private $dbUsername = "root";
    private $dbPassword = "root";
    private $dbName     = "pinkman";
    private $imgTbl     = 'video';
    private $imgTbl2     = 'playlist';

    function __construct(){ 
        if(!isset($this->db)){ 
            // Connect to the database 
            $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
            $conn->set_charset("utf8");
            if($conn->connect_error){ 
                die("Failed to connect with MySQL: " . $conn->connect_error); 
            }else{ 
                $this->db = $conn; 
            } 
        } 
    } 
     
    /* 
     * Get rows from images table 
     */ 
    function getRows(){
        /*if(!empty($_GET['cat']) && $_GET['cat']!='home'){
            $query = $this->db->query("SELECT * FROM ".$this->imgTbl." WHERE vid_categorie='".$_GET['cat']."'ORDER BY vid_ordrecat ASC");
        }
        else{
            $query = $this->db->query("SELECT * FROM ".$this->imgTbl." ORDER BY vid_news ASC");
        }*/
        if(empty($_GET['cat']) || $_GET['cat']=='home'){
            //$req= "SELECT *, COUNT(video_playlist._play_id) AS nb_playlist FROM video LEFT OUTER JOIN video_playlist ON video.vid_id = video_playlist._vid_id GROUP BY video.vid_id, video.vid_titre, video.vid_categorie, video.vid_ordrecat ORDER BY vid_ordrecat";//INNER JOIN playlist ON video_playlist._play_id = playlist.play_id
            $query = $this->db->query("SELECT * FROM video LEFT OUTER JOIN video_playlist ON video.vid_id = video_playlist._vid_id ORDER BY vid_news");
        }
        elseif(!empty($_GET['playlist']) && $_GET['playlist']=='false'){
            $query = $this->db->query("SELECT * FROM video LEFT OUTER JOIN video_playlist ON video.vid_id = video_playlist._vid_id WHERE vid_categorie='".$_GET['cat']."'  ORDER BY vid_ordrecat");
        }
        else{
            //$req= "SELECT *, COUNT(video_playlist._play_id) AS nb_playlist FROM video LEFT OUTER JOIN video_playlist ON video.vid_id = video_playlist._vid_id WHERE vid_categorie = '".$_GET['cat']."' GROUP BY video.vid_id, video.vid_titre, video.vid_categorie, video.vid_ordrecat ORDER BY vid_ordrecat";
            //$req = "SELECT * FROM `video` WHERE `vid_categorie`='".$_GET['cat']."' ORDER BY `vid_ordrecat` ASC";//possibilité de recup ordrecat de playlist
            $query = $this->db->query("SELECT * FROM video LEFT OUTER JOIN video_playlist ON video.vid_id = video_playlist._vid_id WHERE vid_categorie='".$_GET['cat']."' ORDER BY vid_ordrecat");

        }
        if($query->num_rows > 0){
            while($row = $query->fetch_assoc()){
                $result[] = $row;
            }
        }else{
            $result = FALSE;
        }
        return $result;
    } 
     
    /* 
     * Update image order 
     */ 
    function updateOrder($id_array){ 
        $count = 1;
        foreach ($id_array as $id){
            if(substr($id,0,1)=='v') {
                $el=substr($id,1);
                if($_POST['home']=='home'){
                    $update = $this->db->query("UPDATE ".$this->imgTbl." SET vid_news = $count WHERE vid_id = $el");
                }
                else{
                    $update = $this->db->query("UPDATE ".$this->imgTbl." SET vid_ordrecat = '$count' WHERE vid_id = $el");
                }
            }
            $count++;
        } 
        return TRUE;
    }
    function updateOrder_play($id_array2){
        $count2 = 1;
        foreach ($id_array2 as $id2){
            if(substr($id2,0,1)=='p') {
                $el2=substr($id2,1);
                if ($_POST['home'] == 'home') {
                    $update = $this->db->query("UPDATE " . $this->imgTbl2 . " SET play_news = $count2 WHERE play_id = $el2");
                } else {
                    $update = $this->db->query("UPDATE " . $this->imgTbl2 . " SET play_ordrecat = $count2 WHERE play_id = $el2");
                }
            }
            $count2++;
        }
        return TRUE;
    }
}
