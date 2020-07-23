<?php

require 'config.inc.php';
require 'session_verif.php';
require 'debut_html2.php';


$bdd=connexionBD();

$res_trafic=$bdd->query('SELECT * FROM `trafic`');
$res_video=$bdd->query('SELECT * FROM `video`');
$stats=$bdd->query('SELECT * FROM `stats` WHERE id="hebdo"')->fetch();
$vid_week=$bdd->query('SELECT * FROM video a INNER JOIN (SELECT MAX(`vid_view_hebdo`) `max` FROM video) b ON b.`max`=a.`vid_view_hebdo`')->fetch();
$bdd->query('UPDATE `stats` SET `most_vid_id`="'.$vid_week['vid_id'].'"');


$trafic=array();
$video=array();
while($ligne=$res_trafic->fetch()){
    array_push($trafic,$ligne['identifier']);
    $trafic[$ligne['identifier']]=['trafic_view'=>$ligne['trafic_view'],'trafic_last_view'=>$ligne['trafic_last_view'],'trafic_name'=>$ligne['trafic_name']];
}
while($ligne=$res_video->fetch()){
    array_push($video,$ligne['vid_id']);
    $video["'".$ligne['vid_id']."'"]=['vid_url'=>$ligne['vid_url'],'vid_titre'=>$ligne['vid_titre'],'vid_categorie'=>$ligne['vid_categorie'],'vid_views'=>$ligne['vid_views'],'vid_last_view'=>$ligne['vid_last_view'],'view_home0'=>$ligne['view_home0'],'view_home1'=>$ligne['view_home1'],'vid_ordrecat'=>$ligne['vid_ordrecat'],'vid_news'=>$ligne['vid_news']];
}

$total_views=0;
$count_pub=array('views'=>0,'titre'=>'Publicité');
$count_corp=array('views'=>0,'titre'=>'Corporate');
$count_motion=array('views'=>0,'titre'=>'Motion Design');
$count_clip=array('views'=>0,'titre'=>'Clips');
$most_viewed=array('titre'=>'','nbre_vues'=>'0','categorie'=>'0','id'=>'');
for($i=0;$i<count($video)/2;$i++){
    if($video["'".$video[$i]."'"]['vid_categorie']=='pub'){
        $video_views=$video["'".$video[$i]."'"]['vid_views']+$video["'".$video[$i]."'"]['view_home0']+$video["'".$video[$i]."'"]['view_home1'];
        $count_pub['views']+=$video_views;
    }
    else if($video["'".$video[$i]."'"]['vid_categorie']=='corp'){
        $video_views=$video["'".$video[$i]."'"]['vid_views']+$video["'".$video[$i]."'"]['view_home0']+$video["'".$video[$i]."'"]['view_home1'];
        $count_corp['views']+=$video_views;
    }
    else if($video["'".$video[$i]."'"]['vid_categorie']=='motion'){
        $video_views=$video["'".$video[$i]."'"]['vid_views']+$video["'".$video[$i]."'"]['view_home0']+$video["'".$video[$i]."'"]['view_home1'];
        $count_motion['views']+=$video_views;
    }
    else if($video["'".$video[$i]."'"]['vid_categorie']=='clip'){
        $video_views=$video["'".$video[$i]."'"]['vid_views']+$video["'".$video[$i]."'"]['view_home0']+$video["'".$video[$i]."'"]['view_home1'];
        $count_clip['views']+=$video_views;
    }
    if($video_views>$most_viewed['nbre_vues']){
        $most_viewed['titre']=$video["'".$video[$i]."'"]['vid_titre'];
        $most_viewed['categorie']=$video["'".$video[$i]."'"]['vid_categorie'];
        $most_viewed['nbre_vues']=$video_views;
        $most_viewed['id']=$video["'".$video[$i]."'"]['id'];
    }
    $total_views+=$video_views;
}
$count_chart=array();
$place=array($count_pub,$count_corp,$count_motion,$count_clip);
$classement = new ArrayObject($place);
$classement->asort();
foreach ($classement as $key => $val) {
    array_unshift($count_chart,$val);
}


?>

<header>
    <a href="index.php"><div id="bloc_logo" class="link_pagetop">
            <h1 title="Retour à l'accueil">Back Office</h1>
        </div></a>
    <a href="https://analytics.google.com/analytics/web/" target="_blank">
        <p class="btn_header">Analytics</p>
    </a>
</header>

<section id="tuiles">
    <article id="tuile_hg">
        <section class="slide_container">
            <div class="slide slide1">
                <p class="classic_text medium_text">Cette semaine</p>
                <p class="classic_text big_text"><?php echo $stats['nbre_visit'] ?><span class="classic_text bigs_text"> visites</span></p>
            </div>
            <div class="slide slide2">
                <p class="classic_text medium_text">Depuis la création</p>
                <p class="classic_text big_text"><?php echo $stats['since_creation'] ?><span class="classic_text bigs_text"> visites</span></p>
            </div>
        </section>
        <section class="bloc_slider">
            <div class="slider_selected slider slider1"></div>
            <div class="slider slider2"></div>
        </section>
    </article>
    <article id="tuile_bg">
        <section class="slide_container">
            <div class="slide slide1">
                <p class="classic_text medium_text">Vidéo de la semaine</p>
                <p class="classic_text big_text"><?php echo $vid_week['vid_view_hebdo']?><span class="classic_text bigs_text"> vues</span></p>
                <p class="classic_text little_text"><?php if($vid_week['vid_view_hebdo']==0){ echo 'Aucune donnée pour l\'instant';}else{ echo $vid_week['vid_titre'].' <strong>('.$vid_week['vid_categorie'].')</strong>';};?></p>
            </div>
            <div class="slide slide2">
                <p class="classic_text medium_text">Top vidéo</p>
                <p class="classic_text big_text"><?php echo $most_viewed['nbre_vues'] ?><span class="classic_text bigs_text"> vues</span></p>
                <p class="classic_text little_text"><?php echo $most_viewed['titre'].' <strong>('.$most_viewed['categorie'].')</strong>'?></p>
            </div>
        </section>
        <section class="bloc_slider">
            <div class="slider_selected slider slider1"></div>
            <div class="slider slider2"></div>
        </section>
    </article>
    <article id="tuile_d">
        <section>
            <p class="classic_text medium_text">Top catégories</p>
            <p class="classic_text macro_text" style="position: absolute">Un total de</p>
            <p class="classic_text big_text"><?php echo $total_views /*$count=0;for($i=0;$i<count($trafic)/2;$i++){$count+=$trafic[$trafic[$i]]['trafic_view'];};echo $count */?><span class="classic_text bigs_text"> vues</span></p>
        </section>
            <div id="chart_tuiled">
                <?php
                for($i=0;$i<4;$i++){
                    echo '<article class="bloc_chart_line">
                    <p class="chart_line_txt classic_text little_text">'.$count_chart[$i]['titre'].'</p>
                    <div class="bloc_animation_chart" data-scale="'.$count_chart[$i]['views'].'">
                        <div class="chart_line chart_line_tuile">'.$count_chart[$i]['views'].'</div>
                    </div>
                </article>';
                }



                ?>
        </div>
    </article>
</section>

    <section id="stats_trafic">
        <section>
            <p class="classic_text bigs_text">Page d'accueil</p>
            <article class="bloc_chart_line">
                <p class="chart_line_txt classic_text little_text">Page principale</p>

                <div class="bloc_animation_chart" data-scale="<?php echo $trafic['home0']['trafic_view'] ?>">
                    <span class="tooltiptext">Dernière visite :<br><?php echo substr($trafic['home0']['trafic_last_view'],8,2).'/'.substr($trafic['home0']['trafic_last_view'],5,2).' à '.substr($trafic['home0']['trafic_last_view'],11,5) ?></span>
                    <div class="chart_line"><?php echo $trafic['home0']['trafic_view'] ?></div>
                </div>
            </article>
            <article class="bloc_chart_line">
                <p class="chart_line_txt classic_text little_text">Film publicitaire</p>
                <div class="bloc_animation_chart" data-scale="<?php echo $trafic['pub0']['trafic_view'] ?>">
                    <span class="tooltiptext">Dernière visite :<br><?php echo substr($trafic['pub0']['trafic_last_view'],8,2).'/'.substr($trafic['pub0']['trafic_last_view'],5,2).' à '.substr($trafic['pub0']['trafic_last_view'],11,5) ?></span>
                    <div class="chart_line"><?php echo $trafic['pub0']['trafic_view'] ?></div>
                </div>
            </article>
            <article class="bloc_chart_line">
                <p class="chart_line_txt classic_text little_text">Film corporate</p>
                <div class="bloc_animation_chart" data-scale="<?php echo $trafic['corp0']['trafic_view'] ?>">
                    <span class="tooltiptext">Dernière visite :<br><?php echo substr($trafic['corp0']['trafic_last_view'],8,2).'/'.substr($trafic['corp0']['trafic_last_view'],5,2).' à '.substr($trafic['corp0']['trafic_last_view'],11,5) ?></span>
                    <div class="chart_line"><?php echo $trafic['corp0']['trafic_view'] ?></div>
                </div>
            </article>
            <article class="bloc_chart_line">
                <p class="chart_line_txt classic_text little_text">Motion Design</p>
                <div class="bloc_animation_chart" data-scale="<?php echo $trafic['motion0']['trafic_view'] ?>">
                    <span class="tooltiptext">Dernière visite :<br><?php echo substr($trafic['motion0']['trafic_last_view'],8,2).'/'.substr($trafic['motion0']['trafic_last_view'],5,2).' à '.substr($trafic['motion0']['trafic_last_view'],11,5) ?></span>
                    <div class="chart_line"><?php echo $trafic['motion0']['trafic_view'] ?></div>
                </div>
            </article>
            <article class="bloc_chart_line">
                <p class="chart_line_txt classic_text little_text">Clips</p>
                <div class="bloc_animation_chart" data-scale="<?php echo $trafic['clip0']['trafic_view'] ?>">
                    <span class="tooltiptext">Dernière visite :<br><?php echo substr($trafic['clip0']['trafic_last_view'],8,2).'/'.substr($trafic['clip0']['trafic_last_view'],5,2).' à '.substr($trafic['clip0']['trafic_last_view'],11,5) ?></span>
                    <div class="chart_line"><?php echo $trafic['clip0']['trafic_view'] ?></div>
                </div>
            </article>
            <!--<article class="bloc_chart_line">
                <p class="chart_line_txt classic_text little_text">Contact</p>
                <div class="bloc_animation_chart" data-scale="<?php /*echo $trafic['contact0']['trafic_view'] */?>">
                    <div class="chart_line"><?php /*echo $trafic['contact0']['trafic_view'] */?></div>
                </div>
            </article>-->
        </section>
        <section>
            <p class="classic_text bigs_text">Plus de films</p>
            <article class="bloc_chart_line">
                <p class="chart_line_txt classic_text little_text">Film publicitaire</p>
                <div class="bloc_animation_chart" data-scale="<?php echo $trafic['pub1']['trafic_view'] ?>">
                    <span class="tooltiptext">Dernière visite :<br><?php echo substr($trafic['pub1']['trafic_last_view'],8,2).'/'.substr($trafic['pub1']['trafic_last_view'],5,2).' à '.substr($trafic['pub1']['trafic_last_view'],11,5) ?></span>
                    <div class="chart_line"><?php echo $trafic['pub1']['trafic_view'] ?></div>
                </div>
            </article>
            <article class="bloc_chart_line">
                <p class="chart_line_txt classic_text little_text">Film corporate</p>
                <div class="bloc_animation_chart" data-scale="<?php echo $trafic['corp1']['trafic_view'] ?>">
                    <span class="tooltiptext">Dernière visite :<br><?php echo substr($trafic['corp1']['trafic_last_view'],8,2).'/'.substr($trafic['corp1']['trafic_last_view'],5,2).' à '.substr($trafic['corp1']['trafic_last_view'],11,5) ?></span>

                    <div class="chart_line"><?php echo $trafic['corp1']['trafic_view'] ?></div>
                </div>
            </article>
            <article class="bloc_chart_line">
                <p class="chart_line_txt classic_text little_text">Motion Design</p>
                <div class="bloc_animation_chart" data-scale="<?php echo $trafic['motion1']['trafic_view'] ?>">
                    <span class="tooltiptext">Dernière visite :<br><?php echo substr($trafic['motion1']['trafic_last_view'],8,2).'/'.substr($trafic['motion1']['trafic_last_view'],5,2).' à '.substr($trafic['motion1']['trafic_last_view'],11,5) ?></span>

                    <div class="chart_line"><?php echo $trafic['motion1']['trafic_view'] ?></div>
                </div>
            </article>
            <article class="bloc_chart_line">
                <p class="chart_line_txt classic_text little_text">Clips</p>
                <div class="bloc_animation_chart" data-scale="<?php echo $trafic['clip1']['trafic_view'] ?>">
                    <span class="tooltiptext">Dernière visite :<br><?php echo substr($trafic['clip1']['trafic_last_view'],8,2).'/'.substr($trafic['clip1']['trafic_last_view'],5,2).' à '.substr($trafic['clip1']['trafic_last_view'],11,5) ?></span>

                    <div class="chart_line"><?php echo $trafic['clip1']['trafic_view'] ?></div>
                </div>
            </article>
            <article class="bloc_chart_line">
                <p class="chart_line_txt classic_text little_text">Tous les films</p>
                <div class="bloc_animation_chart" data-scale="<?php echo $trafic['all1']['trafic_view'] ?>">
                    <span class="tooltiptext">Dernière visite :<br><?php echo substr($trafic['all1']['trafic_last_view'],8,2).'/'.substr($trafic['all1']['trafic_last_view'],5,2).' à '.substr($trafic['all1']['trafic_last_view'],11,5) ?></span>
                    <div class="chart_line"><?php echo $trafic['all1']['trafic_view'] ?></div>
                </div>
            </article>
        </section>
    </section>

<section id="stats_showreel">
    <p class="classic_text bigs_text text_dark">Showreel</p>
    <article class="bloc_chart_line">
        <div class="bloc_animation_chart" data-scale="<?php echo $trafic['shwrl']['trafic_view'] ?>">
            <span class="tooltiptext">Dernière visite :<br><?php echo substr($trafic['shwrl']['trafic_last_view'],8,2).'/'.substr($trafic['shwrl']['trafic_last_view'],5,2).' à '.substr($trafic['shwrl']['trafic_last_view'],11,5) ?></span>
            <div class="chart_line"><?php echo $trafic['shwrl']['trafic_view'] ?></div>
        </div>
    </article>
</section>

    <section style="margin-top:50px">
        <p class="classic_text bigs_text text_dark" style="text-align: center;">Top vidéos</p>
        <div class="p-5" style="max-width:1200px">
            <table id="catalogueT" class="ui celled table responsive unstackable" style="width:100%">
                <thead>
                <tr>
                    <th scope="col">Total vues</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Catégorie</th>
                    <th scope="col">Vues dupuis l'accueil</th>
                    <th scope="col">Position catégorie</th>
                    <th scope="col">Position globale</th>
                    <th scope="col">Dèrnier visionage</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $resultat=$bdd->query('SELECT * FROM video');
                while($ligne = $resultat->fetch())
                {
                    switch ($ligne['vid_categorie']){
                        case 'pub':
                            $cat="Film Publicitaire";
                            break;
                            case 'corp':
                            $cat="Film Corporate";
                            break;
                            case 'motion':
                            $cat="Motion Design";
                            break;
                            case 'clip':
                            $cat="Clip";
                            break;
                    }
                    if(substr($ligne['vid_last_view'],8,2)=='00'){
                        $date='Aucune donnée pour l\'instant';
                        $homeview='Aucune vue';
                    }
                    else{
                        $date='Le '.substr($ligne['vid_last_view'],8,2).'/'.substr($ligne['vid_last_view'],5,2).' à '.substr($ligne['vid_last_view'],11,5);
                        $homeview=$ligne['view_home0']+$ligne['view_home1'];
                    }
                    echo '<tr><td>'.($ligne['vid_views']+$ligne['view_home0']+$ligne['view_home1']).'</td><td scope="row">'.$ligne['vid_titre'].'</td><td>'.$cat.'</td><td class="tooltip"><span class="tooltiptext">Depuis la page principale : '.$ligne['view_home0'].'<br><br>Depuis les catégories de l\'accueil : '.$ligne['view_home1'].' </span>'.$homeview.'</td><td>Position '.$ligne['vid_ordrecat'].'</td><td>Position '.$ligne['vid_news'].'</td><td>'.$date.'</td></tr>';
                }

                ?>
                </tbody>
            </table>
        </div>
    </section>
    <section style="margin: 80px 0">
        <p class="classic_text bigs_text text_dark" style="text-align: center;">Top playlists</p>
        <div class="p-5" style="max-width:1200px">
            <table id="catalogueTP" class="ui celled table responsive unstackable" style="width:100%">
                <thead>
                <tr>
                    <th scope="col">Total vues</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Catégorie</th>
                    <th scope="col">Sous catégorie</th>
                    <th scope="col">Position catégorie</th>
                    <th scope="col">Position globale</th>
                    <th scope="col">Dèrnier visionage</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $resultat=$bdd->query('SELECT * FROM playlist');
                while($ligne = $resultat->fetch())
                {
                    switch ($ligne['play_categorie']){
                        case 'pub':
                            $cat="Film Publicitaire";
                            break;
                            case 'corp':
                            $cat="Film Corporate";
                            break;
                            case 'motion':
                            $cat="Motion Design";
                            break;
                            case 'clip':
                            $cat="Clip";
                            break;
                    }
                    if(substr($ligne['play_last_view'],8,2)=='00'){
                        $date='Aucune donnée pour l\'instant';
                    }
                    else{
                        $date='Le '.substr($ligne['play_last_view'],8,2).'/'.substr($ligne['play_last_view'],5,2).' à '.substr($ligne['play_last_view'],11,5);
                    }
                    echo '<tr><td>'.$ligne['play_views'].'</td><td scope="row">'.$ligne['play_titre'].'</td><td>'.$cat.'</td><td>'.$ligne['play_souscat'].'</td><td>Position '.$ligne['play_ordrecat'].'</td><td>Position '.$ligne['vid_news'].'</td><td>'.$date.'</td></tr>';
                }

                ?>
                </tbody>
            </table>
        </div>
    </section>

    <script>
        let maxWChart_tuile=$('#chart_tuiled').find('.bloc_animation_chart:first').attr('data-scale');
        let valmax1=[];
        let valmax2=[];

        $('#chart_tuiled').find('.bloc_animation_chart').each(function(){
           $(this).css('width',$(this).attr('data-scale')*100/maxWChart_tuile+'%');
        });
        $('#stats_trafic').children('section:nth-child(1)').find('.bloc_animation_chart').each(function(){
            valmax1.push($(this).data('scale'));
        });
        $('#stats_trafic').children('section:nth-child(2)').find('.bloc_animation_chart').each(function(){
            valmax2.push($(this).data('scale'));
        });
        let maxWChart1=Math.max.apply(Math, valmax1);
        let maxWChart2=Math.max.apply(Math, valmax2);

        $('#stats_trafic').children('section:nth-child(1)').find('.bloc_animation_chart').each(function(){
           $(this).css('width',$(this).attr('data-scale')*100/maxWChart1+'%');
        });
        $('#stats_trafic').children('section:nth-child(2)').find('.bloc_animation_chart').each(function(){
           $(this).css('width',$(this).attr('data-scale')*100/maxWChart2+'%');
        });



        $('.slider').click(function(){
            dot_change($(this));
        });
        $('.slide_container').click(function(){
            dot_change($(this).siblings('.bloc_slider').children('.slider:not(".slider_selected")'));

        });

        let timeout_slide=setTimeout(dot_change,10000,$('.slider:not(".slider_selected")'));

        function dot_change(elem){
            if(!elem.hasClass('slider1')){
                elem.parent().siblings('.slide_container').css('left','-100%');
            }
            else{
                elem.parent().siblings('.slide_container').css('left','0%');
            }

            elem.addClass('slider_selected');
            elem.siblings().removeClass('slider_selected');
            clearTimeout(timeout_slide);
            timeout_slide=setTimeout(dot_change,10000,$('.slider:not(".slider_selected")'))
        }
    </script>
<?php

require 'fin_html.php';

?>
</section>