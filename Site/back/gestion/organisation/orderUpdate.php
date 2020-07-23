<?php

require '../config.inc.php';
require '../session_verif_SD.php';

// Include and create instance of DB class 
require_once 'DB.class.php'; 
$db = new DB(); 
 
// Get images id and generate ids array 
$idArray = explode(",", $_POST['ids']);
$idArray2 = explode(",", $_POST['ids']);

// Update images order
$db->updateOrder($idArray);
$db->updateOrder_play($idArray2);

?>