<?php
require '../config.inc.php';
require '../session_verif_SD.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Réorganisation</title>
    <link rel="apple-touch-icon" sizes="180x180" href="../../../fvcns/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../../fvcns/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../../fvcns/favicon-16x16.png">
    <link rel="manifest" href="../../../fvcns/site.webmanifest">
    <link rel="mask-icon" href="../../../fvcns/safari-pinned-tab.svg" color="#3a4048">
    <link rel="shortcut icon" href="../../../fvcns/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="Pinkman Prod.">
    <meta name="application-name" content="Pinkman Prod.">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-config" content="../../../fvcns/browserconfig.xml">
    <meta name="theme-color" content="#000000">

    <link rel="stylesheet" href="../../../css/style2.css">
    <link rel="stylesheet" href="../../../css/organisation.css">
    <link rel="stylesheet" type="text/css" href="../style.css">

</head>
<body>
<header>
    <a href="../"><div id="bloc_logo" class="link_pagetop">
            <h1 title="Retour à l'accueil">Back Office</h1>
        </div></a>
    <div id="back_select" title="Choisir une catégorie">
        <select id="select_tri">
            <option value="home" <?php if(!empty($_GET['cat'])){if($_GET['cat']=='home'){echo 'selected';}}else{echo 'selected';} ?>>Page d'accueil</option>
            <option value="pub" <?php if(!empty($_GET['cat'])){if($_GET['cat']=='pub'){echo 'selected';}} ?>>Film publicitaire</option>
            <option value="corp" <?php if(!empty($_GET['cat'])){if($_GET['cat']=='corp'){echo 'selected';}} ?>>Film corporate</option>
            <option value="clip" <?php if(!empty($_GET['cat'])){if($_GET['cat']=='clip'){echo 'selected';}} ?>>Music video</option>
            <option value="motion" <?php if(!empty($_GET['cat'])){if($_GET['cat']=='motion'){echo 'selected';}} ?>>Motion designs</option>
        </select>
        <svg class="svg_select" data-name="Calque 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 252 500.71"><defs><style>.cls-1{fill:#fff;}</style></defs><title>Sans titre - 2</title><polygon class="cls-1" points="0 174.35 126 0 252 174.35 0 174.35"/><polygon class="cls-1" points="252 326.35 126 500.71 0 326.35 252 326.35"/></svg>
    </div>
</header>
<div class="reorder_link" id="saveReorder">
    <p>Réorganiser</p>
</div>
<div id="bloc_infos">
    <div id="bloc_cbx">
        <input type="checkbox" id="cbx" style="display:none"  <?php if(empty($_GET['playlist']) || $_GET['playlist']=='true'){echo 'checked';} ?>/>
        <label for="cbx" id="label_cbx" class="toggle"><span></span></label>
        <p>Playlists</p>
    </div>
    <p>Organisation pour :<br><strong id="txt_cur_modif"><?php
            if(!empty($_GET['cat'])){
                if($_GET['cat']=='home'){
                    if($_GET['playlist']=='false'){
                        echo "Page principale de l'accueil";
                    }
                    else{
                        echo "Toutes les vidéos de la page “Tous les films”";
                    }
                }
                else{
                    if($_GET['playlist']=='false'){
                        echo "Catégorie ".$_GET['cat']." de l'accueil";
                    }
                    else{
                        echo "Catégorie ".$_GET['cat']." de la page “Tous les films”";
                    }
                }
            }
            else{
                echo "Page “Tous les films”";
            }
            ?></strong></p>
</div>


<div class="container">
    <div id="reorderHelper" class="light_box" style="display:none;">1. Faites glisser les films pour réorganiser.<br>2. Cliquez sur 'Sauvegarder' quand vous avez terminé.<br><br><span style="opacity: 0.5">Pour annuler, rechargez simplement la page.</span></div>
        <div class="gallery">
            <ul class="reorder_ul reorder-photos-list" id="maj_li">
            <?php
            $bdd = connexionBD();
            require_once 'DB.class.php';
            $db = new DB();
            $films = $db->getRows();
            $deja_placed=[];


            if(!empty($films)){ 
                foreach($films as $video){
                    if(!$video['_play_id'] || !empty($_GET['playlist']) && $_GET['playlist']=='false'){//Si la vidéo n'est pas liée à une playlist
                        echo "<li data-filter='".$video['vid_categorie']."' class='bloc_vid classic_vid organisator classs' title='Voir ".$video['vid_titre']."' data-souscat='".$video['vid_souscat']."' data-filtr='image_li_v".$video['vid_id']."'>
                    <section class='video video_appear' style=\"background-image: url('../../../img/upload/".$video['vid_minia']."')\"  data-lien='".$video['vid_url']."'>
                        <div class=\"hover_video\">
                         <svg class=\"play_button\" data-name=\"Calque 1\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 101.31 114.56\"><g id=\"_356._Play\" data-name=\"356. Play\"><path d=\"M213.55,150.65,131.34,102.7c-7.49-4.37-13.53-.87-13.49,7.79l.42,95.18c0,8.66,6.15,12.19,13.67,7.85l81.58-47.11C221,162.08,221,155,213.55,150.65Z\" transform=\"translate(-117.85 -100.82)\"/></g></svg>
                        </div>
                        </section>
                        <p class=\"title_video\">".$video['vid_titre']."</p></li>";
                    }
                    else{//Si elle est liée à une playlist --> pour afficher les playlists
                        if(!in_array($video['_play_id'],$deja_placed)){//Pour ne pas placer une playlist par video qu'elle contient
                            array_push($deja_placed,$video['_play_id']);
                            $requete2 = 'SELECT * FROM playlist WHERE play_id="'.$video['_play_id'].'"';
                            $resultat= $bdd->query($requete2);
                            $playlist=$resultat->fetch(PDO::FETCH_ASSOC);

                            echo "<li data-filter='".$playlist['play_categorie']."' id='play_item_".$playlist['play_id']."' data-filtr='image_li_p".$playlist['play_id']."' title='Liste de lecture ".$playlist['play_titre']."' data-souscat='".$playlist['play_souscat']."' class='bloc_vid playlist organisator";
                            if(empty($_GET['cat']) || $_GET['cat']=='home'){
                                echo "' data-ordre='".$playlist['play_news']."'";
                            }
                            else{
                                if($playlist['play_categorie']!=$_GET['cat'] && !empty($_GET['cat']) || !$_GET['cat']=='home'){
                                    echo " remove' data-ordre='".$playlist['play_ordrecat']."'";
                                }
                                else{
                                    echo "' data-ordre='".$playlist['play_ordrecat']."'";
                                }
                            }
                            echo ">
                    <section class='video' style=\"background-image: url('../../../img/upload/".$playlist['play_minia']."')\"'>
                        <div class=\"hover_video\">
                        <svg class=\"play_button\" data-name=\"Calque 2\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 442.76 312.88\"><path d=\"M268.52,150.89l-74.38-43.38c-6.78-4-12.25-.8-12.21,7l.38,86.11c0,7.84,5.57,11,12.37,7.11l73.81-42.62C275.29,161.23,275.3,154.85,268.52,150.89Z\" transform=\"translate(0 -0.6)\"/><path d=\"M411,44.76h-1a31.77,31.77,0,0,0-31-24.89h-3.77A31.77,31.77,0,0,0,346.09.6H96.67A31.79,31.79,0,0,0,67.49,19.87H63.73a31.78,31.78,0,0,0-31,24.89h-1A31.77,31.77,0,0,0,0,76.49V241.24A31.77,31.77,0,0,0,31.73,273h2.06A31.79,31.79,0,0,0,63.73,294.2h3.76a31.79,31.79,0,0,0,29.18,19.27H346.09a31.77,31.77,0,0,0,29.17-19.27H379A31.79,31.79,0,0,0,409,273H411a31.78,31.78,0,0,0,31.73-31.74V76.49A31.77,31.77,0,0,0,411,44.76ZM17.34,241.24V76.49A14.4,14.4,0,0,1,31.73,62.11H32V255.63h-.26A14.41,14.41,0,0,1,17.34,241.24Zm32,21.23V51.6A14.4,14.4,0,0,1,63.73,37.21h1.21V276.86H63.73A14.41,14.41,0,0,1,49.34,262.47Zm311.13,19.27a14.4,14.4,0,0,1-14.38,14.39H96.67a14.4,14.4,0,0,1-14.38-14.39V32.33A14.4,14.4,0,0,1,96.67,17.94H346.09a14.4,14.4,0,0,1,14.38,14.39Zm32.95-19.27A14.41,14.41,0,0,1,379,276.86h-1.21V37.21H379A14.4,14.4,0,0,1,393.42,51.6Zm32-21.23A14.4,14.4,0,0,1,411,255.63h-.27V62.11H411a14.4,14.4,0,0,1,14.38,14.38Z\" transform=\"translate(0 -0.6)\"/></svg>
                        </div>
                        </section>
                        <p class=\"title_video\">".$playlist['play_titre']."</p><div class='play_arrow'></div></li>";
                        }
                    }
                }
                if(!empty($_GET['playlist']) && $_GET['playlist']=='true'){
                    if(empty($_GET['cat']) || $_GET['cat']=='home'){
                            $req="SELECT * FROM video LEFT OUTER JOIN video_playlist ON video.vid_id = video_playlist._vid_id ORDER BY vid_news";
                        }
                        else{
                            $req="SELECT * FROM video LEFT OUTER JOIN video_playlist ON video.vid_id = video_playlist._vid_id WHERE vid_categorie='".$_GET['cat']."' ORDER BY vid_ordrecat";
                        }
                        $allvideos = $bdd->query($req);//je refait un tour pour choper les vidéos dans les playlists pour les lier (via data-filter) à la div portant le bon id
                        echo "<section id='bloc_playlist' style='padding-bottom: 0px;'><ul class='list_playlist'>";
                        while($video = $allvideos->fetch()){
                            if($video['_play_id']){//Je dois trouver les deux _play_id
                                    echo "<li data-filter='play_item_".$video['_play_id']."' class='bloc_vid classic_vid play_vid' title='Voir ".$video['vid_titre']."'data-souscat='/'>
                                <section class='video video_appear' style=\"background-image: url('../../../img/upload/".$video['vid_minia']."')\"  data-lien='".$video['vid_url']."'>
                                    <div class=\"hover_video\">
                                     <svg class=\"play_button\" data-name=\"Calque 1\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 101.31 114.56\"><g id=\"_356._Play\" data-name=\"356. Play\"><path d=\"M213.55,150.65,131.34,102.7c-7.49-4.37-13.53-.87-13.49,7.79l.42,95.18c0,8.66,6.15,12.19,13.67,7.85l81.58-47.11C221,162.08,221,155,213.55,150.65Z\" transform=\"translate(-117.85 -100.82)\"/></g></svg>
                                    </div>
                                    </section>
                                    <p class=\"title_video\">".$video['vid_titre']."</p></li>";
                            }
                        }
                        echo "</ul></section>";
                    }
                }

                 ?>
            </ul>
        </div>
    </div>
<section id="shadow">
    <div id="loader" style="border-left-color: white;border-right-color:white"></div>
</section>
<iframe id="video" src="" width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>

<!--<li id="image_li_<?php /*echo $row['vid_id']; */?>" class="ui-sortable-handle">
                    <a href="javascript:void(0);" style="float:none;" class="image_link">
                        <img src="../../../img/upload/<?php /*echo $row['vid_minia']; */?>" alt="Miniature : <?php /*echo $row['vid_titre']; */?>">
                    </a>
                    <h3><?php /*echo $row['vid_titre']; */?></h3>
                </li>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript">
    let url;
$(document).ready(function(){
    let orga=false;
    $('.reorder_link').on('click', function(){
        toggle_playlistO();
        $('.bloc_vid').addClass('orga');
        $('.playlist').attr('id');
        orga=true;
        $("ul.reorder-photos-list").sortable({
            scroll: true,
            tolerance: 'pointer',
            scrollSensitivity: 30,
            scrollSpeed: 20
        });
        $('.hover_video').remove();
        $('.reorder_link>p').text('sauvegarder');
        $('.reorder_link').attr("id","saveReorder");
        $('#reorderHelper').slideDown(300);
        $('.image_link').attr("href","javascript:void(0);");
        $('.image_link').css("cursor","move");

        $("#saveReorder").click(function( e ){
            orga=false;
            if( !$("#saveReorder i").length ){
                $('.container').before('<div id="loader_top" style="height:20px;width:20px"></div>');
                $("ul.reorder-photos-list").sortable('destroy');
                $("#reorderHelper").html("Réorganisation en cours - Cela peux prendre un petit moment. Restez calme ça va bien se passer... Quoi que...").removeClass('light_box').addClass('notice notice_error');
                var h = [];
                $(".organisator").each(function() {
                    h.push($(this).attr('data-filtr').substr(9));
                });

                $.ajax({
                    type: "POST",
                    url: "orderUpdate.php",
                    data: {ids: "" + h + "",home:$('#select_tri option:selected').attr('value')},
                    success: function(){
                        window.location.reload();
                        console.log(""+h+"");
                    }
                });
                return false;
            }
            e.preventDefault();
        });
    });




    $('.video_appear').click(function(){
        if(!orga) {
            $('#shadow').fadeIn(300);
            $('body').css('overflow-y', 'hidden');
            $('#video').css('left', "50%");
            let lien = $(this).attr('data-lien'); //Le lien est stocké dans un attribut 'lien' direct sur la miniature
            if (lien.indexOf("youtu") != -1) {
                console.log('youtube');
                if (lien.indexOf("&") != -1) {//Pour éviter le timer auto
                    $('#video').attr('src', 'https://www.youtube.com/embed/' + lien.substr(lien.lastIndexOf('&') - 11, 11) + "?autoplay=1&rel=0&fs=1");
                } else {
                    $('#video').attr('src', 'https://www.youtube.com/embed/' + lien.substr(lien.length - 11, lien.length) + "?autoplay=1&rel=0&fs=1");
                }
                $('#video').on('load', function () {
                    setTimeout(fade, 10, '#video');
                });

            } else {
                console.log('vimeo');
                $('#video').attr('src', 'https://player.vimeo.com/video/' + lien.slice(lien.lastIndexOf('/') + 1) + "?autoplay=1");//+1 pour forbide le /
                $('#video').on('load', function () {
                    setTimeout(fade, 10, '#video');
                });
            }

        }
    });

    function fade(e) {
        $(e).fadeIn(300);
    }
    $('#shadow').click(function(){
        $('body').css('overflow-y','scroll');
        $('#video').attr('src',"");
        $('#video').fadeOut(300);
        $('#shadow').fadeOut(300);
        setTimeout(shadow,300);
    });
    function shadow(){
        $('#video').css('left',"-100%");
    }


    $('#select_tri').on('change',function(){
        $('#bloc_playlist').css('height','0');
        let selected='';
        $('.bloc_vid').css('opacity','0');
        switch ($('#select_tri option:selected').attr('value')) {
            case 'home':
                selected='home';
                break;
            case 'pub':
                selected='pub';
                break;
            case 'corp':
                selected='corp';
                break;
            case 'clip':
                selected='clip';
                break;
            case 'motion':
                selected='motion';
                break;
            case 'home':
                selected='home';
                break;
            default:
                console.log('error');
        }
        url=window.location.href;
        console.log(url);
        window.location.replace(url.substr(0,url.lastIndexOf('/'))+'?cat='+selected);
        setTimeout(vid_fade,300);
        prev_plyst='';
        toggle_playlistO();
        function vid_fade(){
            $('.bloc_vid').each(function(){
                if($(this).attr('data-filter')!=selected && selected!='home'){
                    $(this).css('display','none');
                }
                else{
                    $(this).css('display','block');
                }
            });

            setTimeout(vid_fade2,300);
        }
        function vid_fade2(){
            $('.bloc_vid').css('opacity','1');

        }
    });
});
$('#cbx').on('change',function(){
    url=window.location.href;
    if (url.lastIndexOf("&") != -1) {
        url=url.substr(0,url.lastIndexOf('playlist'));
    }
    else if (url.lastIndexOf("playlist") != -1) {
        url=url.substr(0,url.lastIndexOf('playlist'));
    }
    else{
        if (url.lastIndexOf("?") != -1){
            url=url+'&';
        }
        else{
            url=url+'?';
        }
    }
    if( $('#cbx').prop('checked')){
        console.log(url);
        $('.bloc_vid').fadeOut();
        toggle_playlistO();
        setTimeout(function(){window.location.replace(url+'playlist=true')},300);
    }
    else{
        console.log('nah');
        $('.bloc_vid').fadeOut();
        toggle_playlistO();
        setTimeout(function(){window.location.replace(url+'playlist=false')},300);
        //window.location.replace(url+'&playlist=false');
       // setTimeout(function(){window.location.reload()},300);
    }
});
</script>
<script src="../../../js/playlist.js"></script>
</body>
</html>