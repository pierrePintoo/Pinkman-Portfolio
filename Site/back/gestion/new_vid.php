<?php

require 'config.inc.php';
require 'session_verif.php';
require 'debut_html2.php';
require 'nav_html.php';

?>

<h1 class="">Ajouter une vidéo</h1>

<form action="new_vid_valid.php" method="POST" enctype="multipart/form-data">

    <!--URL-->
    <div class="bloc_input">
        <label for="video-url">URL de la video</label>
        <input type="text" class="form-control" name="video-url" id="video-url" placeholder="URL YouTbe ou Vimeo..." required>
    </div>

    <!--TITRE-->
    <div class="bloc_input">
        <label for="video-titre">Titre de la video</label>
        <input type="text" name="video-titre" id="video-titre" placeholder="Titre de la video..." required>
    </div>

    <!--//DESCRIPTION-->
    <div class="bloc_input" style="height: auto;">
        <label for="video-desc">Description de la video</label>
        <textarea id="video-desc" name="video-desc" rows="3" placeholder="Description de la video..." required></textarea>
    </div>

    <!--CATEGORIE-->
    <div class="bloc_input bloc_input_select">
        <label for="video-categorie">Categorie de la video</label>
        <div class="back_select">
            <select id="video-categorie" name="video-categorie" required>
                <option value="pub">Film publicitaire</option>
                <option value="corp">Film corporate</option>
                <option value="clip">Clip</option>
                <option value="motion">Motion design</option>
            </select>
            <svg class="svg_select" data-name="Calque 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 252 500.71"><defs><style>.cls-1{fill:#fff;}</style></defs><title>Sans titre - 2</title><polygon class="cls-1" points="0 174.35 126 0 252 174.35 0 174.35"/><polygon class="cls-1" points="252 326.35 126 500.71 0 326.35 252 326.35"/></svg>
        </div>

    </div>

    <!--SOUS CATEGORIE-->
    <div class="bloc_input bloc_input_select">
        <label for="video-sous-categorie">Sous-categorie de la video</label>
        <div class="bloc_radios">
            <label class="radio" for="sous-cat1">Oui
                <input class="show_categorie" type="radio" name="sous-cat" id="sous-cat1" value="1" required>
                <span class="checkmark"></span>
            </label>
            <label class="radio" for="sous-cat2">Non
                <input class="hide_categorie" type="radio" name="sous-cat" id="sous-cat2" value="0" checked required>
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="back_select tutu" style="margin-top: 5px;">
            <select id="video-sous-categorie" name="video-sous-categorie" required>
                <option selected value="/">Aucune</option>
                <option value="corporate">Corporate</option>
                <option value="events/portraits">Events/Portraits</option>
                <option value="interviews">Interviews</option>
            </select>
            <svg class="svg_select" data-name="Calque 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 252 500.71"><defs><style>.cls-1{fill:#fff;}</style></defs><title>Sans titre - 2</title><polygon class="cls-1" points="0 174.35 126 0 252 174.35 0 174.35"/><polygon class="cls-1" points="252 326.35 126 500.71 0 326.35 252 326.35"/></svg>
        </div>
    </div>

    <!--MINIATURE-->
    <div class="bloc_input">
        <label for="video-minia">Miniature de la video</label>
        <div class="bloc_file">
            <input required type="file" name="avatar" id="avatar" accept="image/*">
            <span class="select-file">Choisir la miniature</span>
            <p class="filename"></p>
        </div>
    </div>
    <!--PAGE D'ACCUEIL-->
    <!--<div class="form-group mb-3">
        <label for="video-sous-categorie">Video en page d'accueil ?</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="video-accueil" id="exampleRadios1" value="1" checked>
            <label class="form-check-label" for="exampleRadios1">Oui</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="video-accueil" id="exampleRadios1" value="0">
            <label class="form-check-label" for="exampleRadios1">Non</label>
        </div>
    </div>-->

    <!--VALIDATION-->
    <div  class="bloc_input">
        <div>
            <input type="submit" class="sub_back" value="Ajouter la video">
        </div>
    </div>

</form>
    <a href="index.php"><p class="cancel" style="margin-bottom: 50px;">Annuler</p></a>




<?php require 'fin_html.php'; ?>