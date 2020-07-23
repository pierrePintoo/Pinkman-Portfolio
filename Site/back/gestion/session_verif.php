<?php
if (!isset($_SESSION['nom']) && !isset($_SESSION['mail'])) {
    header('location:login.php');
}
?>