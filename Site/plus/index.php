<?php
require '../back/gestion/config.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Plus de films</title>
        <link rel="stylesheet" href="../css/style2.css">
        <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">

        <link rel="apple-touch-icon" sizes="180x180" href="../fvcns/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../fvcns/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../fvcns/favicon-16x16.png">
        <link rel="manifest" href="../fvcns/site.webmanifest">
        <link rel="mask-icon" href="../fvcns/safari-pinned-tab.svg" color="#3a4048">
        <link rel="shortcut icon" href="../fvcns/favicon.ico">
        <meta name="apple-mobile-web-app-title" content="Pinkman Prod.">
        <meta name="application-name" content="Pinkman Prod.">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-config" content="../fvcns/browserconfig.xml">
        <meta name="theme-color" content="#000000">

        <script src="../js/jquery.min.js"></script>
    </head>
    <body>
        <header>
            <div id="bloc_logo" class="link_pagetop">
                <h1 title="Retour à l'accueil" class="link_page" id="0">Pinkman</h1>
            </div>
                <div id="back_select" title="Choisir une catégorie">
                    <select id="select_tri">
                        <option value="all" <?php if(!empty($_GET['cat'])){if($_GET['cat']=='all'){echo 'selected';}}else{echo 'selected';} ?>>Tous les films</option>
                        <option value="pub" <?php if(!empty($_GET['cat'])){if($_GET['cat']=='pub'){echo 'selected';}} ?>>Film publicitaire</option>
                        <option value="corp" <?php if(!empty($_GET['cat'])){if($_GET['cat']=='corp'){echo 'selected';}} ?>>Film corporate</option>
                        <option value="clip" <?php if(!empty($_GET['cat'])){if($_GET['cat']=='clip'){echo 'selected';}} ?>>Music videos</option>
                        <option value="motion" <?php if(!empty($_GET['cat'])){if($_GET['cat']=='motion'){echo 'selected';}} ?>>Motion designs</option>
                    </select>
                    <svg class="svg_select" data-name="Calque 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 252 500.71"><defs><style>.cls-1{fill:#fff;}</style></defs><title>Sans titre - 2</title><polygon class="cls-1" points="0 174.35 126 0 252 174.35 0 174.35"/><polygon class="cls-1" points="252 326.35 126 500.71 0 326.35 252 326.35"/></svg>
                </div>
        </header>
        <div id="menu">
            <h1><?php
                if(empty($_GET['cat'])){
                    echo 'tous les films';
                }
                else{
                    switch ($_GET['cat']) {
                        case 'all':
                            echo 'Tous les films';
                            break;
                        case 'pub':
                            echo 'Film publicitaire';
                            break;
                        case 'corp':
                            echo 'Film corporate';
                            break;
                        case 'clip':
                            echo 'Music videos';
                            break;
                        case 'motion':
                            echo 'Motion designs';
                            break;
                        default:
                            echo 'error';
                    }
                }
                ?></h1>
        </div>


        <!-- De là ————————————————————————————————————-->
        <ul id="maj_li">
            <?php
            $bdd = connexionBD();

            if(empty($_GET['cat']) || $_GET['cat']=='all'){
                $_GET['cat']='all';
                //$req= "SELECT *, COUNT(video_playlist._play_id) AS nb_playlist FROM video LEFT OUTER JOIN video_playlist ON video.vid_id = video_playlist._vid_id GROUP BY video.vid_id, video.vid_titre, video.vid_categorie, video.vid_ordrecat ORDER BY vid_ordrecat";//INNER JOIN playlist ON video_playlist._play_id = playlist.play_id
                $req="SELECT * FROM video LEFT OUTER JOIN video_playlist ON video.vid_id = video_playlist._vid_id ORDER BY vid_news";
            }
            else{
                //$req= "SELECT *, COUNT(video_playlist._play_id) AS nb_playlist FROM video LEFT OUTER JOIN video_playlist ON video.vid_id = video_playlist._vid_id WHERE vid_categorie = '".$_GET['cat']."' GROUP BY video.vid_id, video.vid_titre, video.vid_categorie, video.vid_ordrecat ORDER BY vid_ordrecat";
                //$req = "SELECT * FROM `video` WHERE `vid_categorie`='".$_GET['cat']."' ORDER BY `vid_ordrecat` ASC";//possibilité de recup ordrecat de playlist
                $req="SELECT * FROM video LEFT OUTER JOIN video_playlist ON video.vid_id = video_playlist._vid_id WHERE vid_categorie='".$_GET['cat']."' ORDER BY vid_ordrecat";

            }
            $allvideos = $bdd->query($req);
            $bdd->query('UPDATE `trafic` SET `trafic_view`=`trafic_view`+1,`trafic_last_view`="'.date("Y-m-d H:i:s").'" WHERE `identifier`="'.$_GET['cat'].'1"');
            $deja_placed=[];


            while($video = $allvideos->fetch()){
                if(!$video['_play_id']){//Si la vidéo n'est pas liée à une playlist
                    echo "<li data-filter='".$video['vid_categorie']."' class='bloc_vid classic_vid classs' title='Voir ".$video['vid_titre']."' data-souscat='".$video['vid_souscat']."'>
                    <section class='video video_appear' style=\"background-image: url('../img/upload/".$video['vid_minia']."')\"  data-lien='".$video['vid_url']."' data-id='".$video['vid_id']."'>
                        <div class=\"hover_video\">
                         <svg class=\"play_button\" data-name=\"Calque 1\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 101.31 114.56\"><g><path d=\"M213.55,150.65,131.34,102.7c-7.49-4.37-13.53-.87-13.49,7.79l.42,95.18c0,8.66,6.15,12.19,13.67,7.85l81.58-47.11C221,162.08,221,155,213.55,150.65Z\" transform=\"translate(-117.85 -100.82)\"/></g></svg>
                        <h3 class=\"titre_inside\">".$video['vid_titre']."</h3>
                        </div>
                        </section>
                        <p class=\"title_video\">".$video['vid_titre']."</p>
                        <p class=\"desc_video\">".$video['vid_desc']."</p></li>";
                }
                else{//Si elle est liée à une playlist --> pour afficher les playlists
                    if(!in_array($video['_play_id'],$deja_placed)){//Pour ne pas placer une playlist par video qu'elle contient
                        array_push($deja_placed,$video['_play_id']);
                        $requete2 = 'SELECT * FROM playlist WHERE play_id="'.$video['_play_id'].'"';
                        $resultat= $bdd->query($requete2);
                        $playlist=$resultat->fetch(PDO::FETCH_ASSOC);

                        echo "<li data-filter='".$playlist['play_categorie']."' id='play_item_".$playlist['play_id']."' class='bloc_vid playlist organisator' title='Liste de lecture ".$playlist['play_titre']."' data-souscat='".$playlist['play_souscat']."' data-id='".$playlist['play_id']."' data-ordre='";
                        if(empty($_GET['cat']) || $_GET['cat']=='all'){
                            echo $playlist['play_news'];
                        }
                        else{
                            echo $playlist['play_ordrecat'];
                        }
                        echo "'>
                    <section class='video' style=\"background-image: url('../img/upload/".$playlist['play_minia']."')\">
                        <div class=\"hover_video\">
                        <svg class=\"play_button\" data-name=\"Calque 2\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 442.76 312.88\"><path d=\"M268.52,150.89l-74.38-43.38c-6.78-4-12.25-.8-12.21,7l.38,86.11c0,7.84,5.57,11,12.37,7.11l73.81-42.62C275.29,161.23,275.3,154.85,268.52,150.89Z\" transform=\"translate(0 -0.6)\"/><path d=\"M411,44.76h-1a31.77,31.77,0,0,0-31-24.89h-3.77A31.77,31.77,0,0,0,346.09.6H96.67A31.79,31.79,0,0,0,67.49,19.87H63.73a31.78,31.78,0,0,0-31,24.89h-1A31.77,31.77,0,0,0,0,76.49V241.24A31.77,31.77,0,0,0,31.73,273h2.06A31.79,31.79,0,0,0,63.73,294.2h3.76a31.79,31.79,0,0,0,29.18,19.27H346.09a31.77,31.77,0,0,0,29.17-19.27H379A31.79,31.79,0,0,0,409,273H411a31.78,31.78,0,0,0,31.73-31.74V76.49A31.77,31.77,0,0,0,411,44.76ZM17.34,241.24V76.49A14.4,14.4,0,0,1,31.73,62.11H32V255.63h-.26A14.41,14.41,0,0,1,17.34,241.24Zm32,21.23V51.6A14.4,14.4,0,0,1,63.73,37.21h1.21V276.86H63.73A14.41,14.41,0,0,1,49.34,262.47Zm311.13,19.27a14.4,14.4,0,0,1-14.38,14.39H96.67a14.4,14.4,0,0,1-14.38-14.39V32.33A14.4,14.4,0,0,1,96.67,17.94H346.09a14.4,14.4,0,0,1,14.38,14.39Zm32.95-19.27A14.41,14.41,0,0,1,379,276.86h-1.21V37.21H379A14.4,14.4,0,0,1,393.42,51.6Zm32-21.23A14.4,14.4,0,0,1,411,255.63h-.27V62.11H411a14.4,14.4,0,0,1,14.38,14.38Z\" transform=\"translate(0 -0.6)\"/></svg>
                        <h3 class=\"titre_inside\">".$playlist['play_titre']."</h3>
                        </div>
                        </section>
                        <p class=\"title_video\">".$playlist['play_titre']."</p>
                        <p class=\"desc_video\">".$playlist['play_desc']."</p><div class='play_arrow'></div></li>";
                    }
                }
            }
            $allvideos = $bdd->query($req);//je refait un tour pour choper les vidéos dans les playlists pour les lier (via data-filter) à la div portant le bon id
            echo "<section id='bloc_playlist'><ul class='list_playlist'>";
            while($video = $allvideos->fetch()){
                if($video['_play_id']){//Je dois trouver les deux _play_id
                        echo "<li data-filter='play_item_".$video['_play_id']."' class='bloc_vid classic_vid play_vid' title='Voir ".$video['vid_titre']."' data-souscat='/'>
                    <section class='video video_appear' data-id='".$video['vid_id']."' style=\"background-image: url('../img/upload/".$video['vid_minia']."')\"  data-lien='".$video['vid_url']."'>
                        <div class=\"hover_video\">
                         <svg class=\"play_button\" data-name=\"Calque 1\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 101.31 114.56\"><g><path d=\"M213.55,150.65,131.34,102.7c-7.49-4.37-13.53-.87-13.49,7.79l.42,95.18c0,8.66,6.15,12.19,13.67,7.85l81.58-47.11C221,162.08,221,155,213.55,150.65Z\" transform=\"translate(-117.85 -100.82)\"/></g></svg>
                        <h3 class=\"titre_inside\">".$video['vid_titre']."</h3>
                        </div>
                        </section>
                        <p class=\"title_video\">".$video['vid_titre']."</p>
                        <p class=\"desc_video\">".$video['vid_desc']."</p></li>";
                }
            }
            echo "</ul></section>";
            ?>
        </ul>
        <!-- À de là ————————————————————————————————————-->





        <section id="shadow">
            <div id="loader"></div>
        </section>
        <iframe id="video" src="" width="640" height="360" allow="autoplay; fullscreen" frameborder="false" allowfullscreen></iframe>

        <script src="../js/playlist.js"></script>
        <script>//sous catégories
            $('#bloc_logo').click(function(){
                location.href='../';
            });
            if($('#menu>h1').text()!='tous les films'){
                let soucategorized=false;
                let tab_soucat=[];
                let soucat='';
                let replace_div;

                $('.bloc_vid').each(function(){
                    soucat=$(this).attr('data-souscat');
                    if(soucat!='/' && tab_soucat.indexOf(soucat)==-1 && !$(this).hasClass('play_vid')){
                        $(this).before("<div class='bloc_titre_cat'><p>"+soucat+"</p></div>");
                        tab_soucat.push(soucat);
                    }
                    else if(soucat!='/' && tab_soucat.indexOf(soucat)>=0 && !$(this).hasClass('play_vid')){
                        //console.log( $(this).prev('.bloc_titre_cat'));
                        replace_div=$(this);
                        $('.bloc_vid').each(function(){
                            if($(this).attr('data-souscat')==soucat){
                                $(this).next('.bloc_titre_cat').before(replace_div);
                            }
                        });
                    }
                    else if(!$(this).hasClass('play_vid')){
                        replace_div=$(this);
                        $('.bloc_titre_cat').first().before(replace_div);
                    }
                });
            }
        </script>
        <script>
            $('.video_appear').click(function(){
                $('#shadow').fadeIn(300);
                $('body').css('overflow-y','hidden');
                $('#video').css('left',"50%");
                let lien=$(this).attr('data-lien'); //Le lien est stocké dans un attribut 'lien' direct sur la miniature
                if (lien.indexOf("youtu")!=-1){
                    //console.log('youtube');
                    if (lien.indexOf("&")!=-1){//Pour éviter le timer auto
                        $('#video').attr('src','https://www.youtube.com/embed/'+lien.substr(lien.lastIndexOf('&')-11,11)+"?autoplay=1&rel=0&fs=1");
                    }
                    else{
                        $('#video').attr('src','https://www.youtube.com/embed/'+lien.substr(lien.length-11,lien.length)+"?autoplay=1&rel=0&fs=1");
                    }
                    $('#video').on('load', function() {
                        setTimeout(fade,10,'#video');
                    });

                }
                else{
                    //.log('vimeo');
                    $('#video').attr('src', 'https://player.vimeo.com/video/' + lien.slice(lien.lastIndexOf('/') + 1)+"?autoplay=1");//+1 pour forbide le /
                    $('#video').on('load', function() {
                        setTimeout(fade,10,'#video');
                    });
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
                $('#menu>h1').text($('#select_tri option:selected').text());
                switch ($('#select_tri option:selected').attr('value')) {
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
                    case 'all':
                        selected='all';
                        break;
                    default:
                        console.log('error');
                }
                let url=window.location.href;
                //console.log(url);
                window.location.replace(url.substr(0,url.lastIndexOf('/'))+'?cat='+selected);
                setTimeout(vid_fade,300);
                prev_plyst='';
                toggle_playlistO();
                function vid_fade(){
                    $('.bloc_vid').each(function(){
                        if($(this).attr('data-filter')!=selected && selected!='all'){
                            $(this).css('display','none');
                        }
                        else{
                            $(this).css('display','block');
                        }
                    });
                }
            });
        </script>

        <script> //TRACKING
            ajaxviews('noid','notype','noaction');
            $(document).on('click', ".video_appear", function() {
                ajaxviews($(this).attr('data-id'),"video",1);
            });
            $(document).on('click', ".playlist", function() {
                if(toggle_playlist){
                    ajaxviews($(this).attr('data-id'),"playlist",1);
                }
            });
            function ajaxviews(id,type,action){
                console.log('id:'+id,'type:'+type,'action:'+action)
               $.ajax({
                    url : "../back/gestion/nbre_vues.php",
                    type : "POST",
                    data : "id=" + id + "&type=" + type + "&action=" + action
                });
            }
        </script>

        <script>
            if(window.innerWidth<=960) {
                $('#menu>h1').css('padding-left',$('.bloc_vid').offset().left+'px');
            }

        </script>
    </body>
</html>