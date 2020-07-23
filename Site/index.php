<?php
require 'back/gestion/config.inc.php';
$bdd=connexionBD();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Pinkman Production</title>
        <link rel="stylesheet" href="css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">

        <link rel="apple-touch-icon" sizes="180x180" href="fvcns/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="fvcns/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="fvcns/favicon-16x16.png">
        <link rel="manifest" href="fvcns/site.webmanifest">
        <link rel="mask-icon" href="fvcns/safari-pinned-tab.svg" color="#3a4048">
        <link rel="shortcut icon" href="fvcns/favicon.ico">
        <meta name="apple-mobile-web-app-title" content="Pinkman Prod.">
        <meta name="application-name" content="Pinkman Prod.">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-config" content="fvcns/browserconfig.xml">
        <meta name="theme-color" content="#000000">

        <script src="js/jquery.min.js"></script>
    </head>
    <body>
        <header>
            <div id="bloc_logo" class="link_pagetop">
                <h1 title="Retour à l'accueil" class="link_page" data-page="0">Pinkman</h1>
            </div>
            <div id="debug_menu">
                <nav id="nav_screen">
                    <ul>
                        <li class="link_page" data-page="1" data-indentifier="pub0">Film Publicitaire</li>
                        <li class="link_page" data-page="2" data-indentifier="corp0">Film Corporate</li>
                        <li class="link_page" data-page="3" data-indentifier="clip0">Music videos</li>
                    </ul>
                    <ul>
                        <li class="link_page" data-page="4" data-indentifier="motion0">Motion Designs</li>
                        <li class="link_page" data-page="5" data-indentifier="contact0">Contact</li>
                    </ul>
                </nav>
            </div>
            <section id="menu_burger">
                <div class="burger_bar"></div>
                <div class="burger_bar"></div>
            </section>
        </header>
        <section id="bloc_bleu">
            <nav id="nav_mobile">
                <ul>
                    <a class="link_page_m" href="#pub" data-indentifier="pub0"><li data-page="1">Film Publicitaire</li></a>
                    <a class="link_page_m" href="#corp" data-indentifier="corp0"><li data-page="2">Film Corporate</li></a>
                    <a class="link_page_m" href="#clip" data-indentifier="clip0"><li data-page="3">Music videos</li></a>
                    <a class="link_page_m" href="#motion" data-indentifier="motion0"><li data-page="4">Motion Designs</li></a>
                    <a class="link_page_m" href="#bloc_contact" data-indentifier="contact0"><li data-page="5">Contact</li></a>
                </ul>
            </nav>
            <div id="stroke">
                <?php
                $req = "SELECT * FROM `video` ORDER BY `vid_news` ASC";
                $allvideos = $bdd->query($req);
                    while($video = $allvideos->fetch()){
                            echo "<article class='video_side video_side_news link_smooth' data-identifier='".$video['vid_id']."' style='display:none' data-link='".$video['vid_categorie']."' data-lien='".$video['vid_url']."' data-filter='news' data-href='#".$video['vid_categorie']."'>
                                <div class='miniature_side' style='background-image: url(img/upload/".$video['vid_minia'].")'></div>
                                <p class='title_side'>".$video['vid_titre']."</p>
                                <p class='desc_hidden' style='display: none'>".$video['vid_desc']."</p>
                            </article>";
                        }
                ?>
                <a href="plus/" title="Voir tous les films" class="classic_text" id="voirplus">Tous les films</a>
            </div>
            <div id="stroke_blue"></div>
            <div id="bloc_title_page">
                <h1></h1>
            </div>
        </section>

        <section id="main">
            <div id="mask_bg_img">
                <div id="bg_img">
                    <video  autoplay loop muted playsinline id="showreel">
                        <source src="img/showreel.mp4" type="video/mp4">
                        Votre navigateur ne supporte pas les lecteurs vidéos
                    </video>
                </div>
            </div>
            <div id="infos_princ">
                <div id="descript_princ">
                    <div class="mot_princ">
                        <div class="point_mot"></div>
                        <p>production</p>
                    </div>
                    <div class="mot_princ">
                        <div class="point_mot"></div>
                        <p>créativité</p>
                    </div>
                    <div class="mot_princ">
                        <div class="point_mot"></div>
                        <p>sur-mesure</p>
                    </div>
                </div>
                <div id="play_button">
                    <div id="arrow_play"></div>
                </div>
            </div>
        </section>
        <section class="append_mobile"></section>
        <section class="main_type" id="pub">
            <h1 class="cat_titre">Pinkman</h1>
            <h2 class="vid_titre">Production</h2>
            <div class="vid_poster">
                <iframe class="vid_type" src="https://youtube.com/embed/pz3sW4y09P0" allow="autoplay; fullscreen" allowfullscreen></iframe>
            </div>
            <p class="vid_desc"></p>
            <section class="bloc_video_side_m"></section>
            <a href="" class="voir_plus_lk">
                <div class='voir_plus_btn'>
                    <p>Voir plus</p>
                </div>
            </a>
        </section>
        <section id="bloc_bleuv2">
            <div id="strokev2">
                <aside id="bloc_side">
                    <?php
                    $req2 = "SELECT * FROM `video` ORDER BY `vid_ordrecat` ASC";
                    $allvideos = $bdd->query($req2);
                    while($video = $allvideos->fetch()){
                        echo "<article data-lien='".$video['vid_url']."' style='display:none' class='video_side' data-identifier='".$video['vid_id']."' data-filter='".$video['vid_categorie']."'>
                            <div class='miniature_side' style='background-image: url(img/upload/".$video['vid_minia'].")'></div>
                            <p class='title_side'>".$video['vid_titre']."</p>
                            <p class='desc_hidden' style='display: none'>".$video['vid_desc']."</p>
                            
                        </article>";
                    }
                    ?>
                </aside>
            </div>
            <a href="" class="classic_link voirplus">Voir plus</a>
        </section>


        <section id="bloc_contact">
            <form action="back/mail.php" method="post">
                <div id="names">
                    <div class="input">
                        <label for="name_input">Prénom : <span style="color:red">*</span></label>
                        <input type="text" name="name" id="name_input" class="border_color" placeholder="John" required>
                    </div>
                    <div class="input">
                        <label for="last_name_input">Nom : <span style="color:red">*</span></label>
                        <input type="text" name="last_name" id="last_name_input" class="border_color" placeholder="Doe" required>
                    </div>
                </div>
                <div class="input">
                    <label for="mail_input">Email : <span style="color:red">*</span></label>
                    <input type="email" name="email" id="mail_input" class="border_color" placeholder="exemple@email.fr" required>
                </div>
                <div class="input">
                    <label for="tel_input">Téléphone :</label>
                    <input type="tel" name="tel" id="tel_input" class="border_color" placeholder="0623456789">
                </div>
                <div class="input">
                    <label for="mail_input">Message : <span style="color:red">*</span></label>
                    <textarea name="message" id="message_input" cols="30" rows="5" class="border_color" placeholder="Votre message ici" required></textarea>
                </div>
                <div id="submit_button">
                    <input type="submit" id="submit" value="Envoyer">
                </div>
            </form>
        </section>
        <?php
            if(!empty($_SESSION['titre'])){
                echo "<section id='popup'>
                    <h3>".$_SESSION['titre']."</h3>
                    <p>".$_SESSION['message']."</p>
                </section>";
            }

            $_SESSION['titre']='';
            $_SESSION['message']='';
        ?>



        <script>//MENU
            let toggle_menu=false;
            let action_menu=false;
            if(window.innerWidth<=960) {
                $('.link_smooth').click(function() {
                    let page = $(this).attr('data-href');
                    let speed = 550; // Durée de l'animation (en ms)
                    $('html, body').animate( { scrollTop: $(page).offset().top-window.innerHeight*0.11 }, speed );
                    //console.log('#'+$(this).attr('data-link'),$(this).children('.title_side').text());
                    $('#'+$(this).attr('data-link')).find('.vid_titre').text($(this).children('.title_side').text());
                    $('#'+$(this).attr('data-link')).find('.vid_desc').text($(this).children('.desc_hidden').text());
                    $('#'+$(this).attr('data-link')).find('.vid_poster').attr('style',$(this).children('.miniature_side').attr('style'));
                    lien_apply_m2($(this));
                    return false;
                });
                $('.link_pagetop').click(function() {
                    let speed = 550;
                    $('html, body').animate( { scrollTop: 0 }, speed );
                    return false;
                });



                $('#menu_burger').click(function () {
                    if(toggle_menu && !action_menu){//Ouvert et non actif
                        //console.log("Ouvert",action_menu,toggle_menu);
                        menu_out();
                    }
                    else if(!toggle_menu && !action_menu){//Fermé et non actif
                        //console.log("Fermé",action_menu,toggle_menu);
                        menu_in();
                    }
                    else{
                        //console.log('doucement stp',action_menu,toggle_menu);
                    }
                });

                function menu_in() {
                    //console.log('menu_in');
                    action_menu=true;
                    $('#bloc_bleu').css('height', '100vh');
                    $('.burger_bar:nth-child(2)').css('width', '100%');
                    setTimeout(menu_in1,300);
                }
                function menu_in1() {
                    //console.log('menu_in1');
                    $('body').css('overflow-y', 'hidden');
                    $('.burger_bar:nth-child(1)').css('transform', 'translate(0,0%) rotate(-45deg)');
                    $('.burger_bar:nth-child(2)').css('transform', 'translate(0,0%) rotate(45deg)');
                    setTimeout(menu_in2,300);
                }
                function menu_in2() {
                    //console.log('menu_in2');
                    $('#nav_mobile').css('left', '0');
                    toggle_menu=true;
                    action_menu = false;
                    //console.log('toggle true & action false',toggle_menu,action_menu);
                }

                function menu_out() {
                    //console.log('menu_out');
                    action_menu=true;
                    $('#nav_mobile').css('left', '-100%');
                    setTimeout(menu_out1,300);
                }

                function menu_out1() {
                    //console.log('menu_out1');
                    $('body').css('overflow-y', 'scroll');
                    $('#bloc_bleu').css('height', '5vh');
                    $('.burger_bar:nth-child(1)').css('transform', 'translate(0,-100%)');
                    $('.burger_bar:nth-child(2)').css('transform', 'translate(0,100%)');
                    setTimeout(menu_out2, 300);
                }
                function menu_out2() {
                    //console.log('menu_out2');
                    $('.burger_bar:nth-child(2)').css('width', '50%');
                    //console.log('toggle & action false',toggle_menu,action_menu);
                    toggle_menu=false;
                    action_menu = false;
                }

                $('.link_page_m').click(function() {
                    menu_out();
                    $('html, body').animate( { scrollTop: $($(this).attr('href')).offset().top-80}, 550 );
                    return false;
                });

               /* let toggle_menu = false;
                let action_menu = false;
                $('#menu_burger').click(function () {
                    console.log(action_menu,toggle_menu);
                    if (toggle_menu && !action_menu) {
                        $('#nav_mobile').css('left', '-100%');
                        toggle_menu = false;
                        action_menu = true;
                        setTimeout(menu_out, 300);
                    } else if (!action_menu) {
                        $('#bloc_bleu').css('height', '100vh');
                        $('.burger_bar:nth-child(2)').css('width', '100%');
                        toggle_menu = true;
                        action_menu = true;
                        setTimeout(menu_in, 300);
                        setTimeout(menu_in1, 500);
                    }
                    console.log(action_menu,toggle_menu);
                });
                $('.link_page_m').click(function() {
                    console.log('out');
                    $('#nav_mobile').css('left', '-100%');
                    toggle_menu = false;
                    action_menu = true;
                    setTimeout(menu_out, 300);
                    let page = $(this).attr('href');
                    let speed = 550;
                    $('html, body').animate( { scrollTop: $(page).offset().top-window.innerHeight*0.12 }, speed );
                    return false;
                });


                function menu_in() {
                    $('body').css('overflow-y', 'hidden');
                    $('.burger_bar:nth-child(1)').css('transform', 'translate(0,0%) rotate(-45deg)');
                    $('.burger_bar:nth-child(2)').css('transform', 'translate(0,0%) rotate(45deg)');
                }

                function menu_in1() {
                    $('#nav_mobile').css('left', '0');
                    action_menu = false;
                }

                function menu_out() {
                    $('body').css('overflow-y', 'scroll');
                    $('#bloc_bleu').css('height', '5vh');
                    $('.burger_bar:nth-child(1)').css('transform', 'translate(0,-100%)');
                    $('.burger_bar:nth-child(2)').css('transform', 'translate(0,100%)');
                    setTimeout(menu_out2, 300);
                }

                function menu_out2() {
                    $('.burger_bar:nth-child(2)').css('width', '50%');
                    action_menu = false;
                    console.log('action_menu :',action_menu);
                }*/
            }
        </script>
        <script>
            $('#showreel').on('loadstart',function(){
                //console.log('loaded');
                $('#showreel').fadeIn(1000);
            });
            $('#infos_princ').dblclick(function(){
                fullscreen();
            });
            $('#infos_princ').click(function(){
                $('#play_button').css({
                    height:$('#play_button').height()+10+'px',
                    width:$('#play_button').width()+10+'px'
                });
                setTimeout(playButton_attractO,300);
            });
            function playButton_attractO(){
                $('#play_button').css({
                    height:$('#play_button').height()-10+'px',
                    width:$('#play_button').width()-10+'px'
                });
            }
            $("video").on('exitFullscreen',function(){
                //console.log('oui');
            });
            $('body').bind('webkitfullscreenchange mozfullscreenchange fullscreenchange', function(e) {
                var state = document.fullScreen || document.mozFullScreen || document.webkitIsFullScreen;
                var event = state ? 'FullscreenOn' : 'FullscreenOff';

                if(event=='FullscreenOn'){
                    $("video").animate({volume: 1}, 1000);
                }
                else{
                    $("video").animate({volume: 0}, 1000);
                }
            });
            $('#play_button').click(function(){
               fullscreen();
            });
            function fullscreen(){
                ajaxviews('shwrl','trafic',0);
                $("video").prop('muted', false);
                $("video").animate({volume: 0}, 0);
                let element=document.getElementById( 'showreel');

                if(element.requestFullscreen){
                    element.requestFullscreen();
                }
                else if (element.webkitRequestFullscreen){
                    element.webkitRequestFullscreen();
                }
                else if (element.mozRequestFullScreen){
                    element.mozRequestFullScreen();
                }
                else if (element.msRequestFullscreen){
                    element.msRequestFullscreen();
                }
            }


        </script>
        <script>//PAGES
                let content_page0 = {'current': '0', 'categorie': 'News', 'cat': 'news'};
                let content_page1 = {'current': '1', 'categorie': 'Film Publicitaire', 'cat': 'pub'};
                let content_page2 = {'current': '2', 'categorie': 'Film Corporate', 'cat': 'corp'};
                let content_page3 = {'current': '3', 'categorie': 'Music videos', 'cat': 'clip'};
                let content_page4 = {'current': '4', 'categorie': 'Motion Designs', 'cat': 'motion'};
                let content_page5 = {'current': '5', 'categorie': 'Contact'};
                let tab = content_page0;
                let current_page = 0;
                let next_page = 1;

                let contact=false;

                let selected = {'titre': '', 'poster': '', 'desc': '', 'lien': ''};
                nbre_vids();

            if(window.innerWidth>=960) {


                $('.link_page').click(function () {
                    change_page(parseInt($(this).attr('data-page')));
                });
                function change_page(e) {
                    let action = false;

                    if (!action) {
                        action = true;
                        switch (e) {
                            case 0:
                                next_page = 0;
                                tab = content_page0;

                                //$('#input_post').attr('value','');//Pas adaptatif !!!!!!!!
                                break;
                            case 1:
                                next_page = 1;
                                tab = content_page1;
                                //window.location.replace('#'+$('#'+"1").text());
                                //window.location.replace('?cat=pub');

                                //$('#input_post').attr('value','pub');
                                break;
                            case 2:
                                next_page = 2;
                                tab = content_page2;
                                //window.location.replace('#'+$('#'+"2").text());

                                //$('#input_post').attr('value','corp');
                                break;
                            case 3:
                                next_page = 3;
                                tab = content_page3;
                                //window.location.replace('#'+$('#'+"3").text());

                                //$('#input_post').attr('value','clip');
                                break;
                            case 4:
                                next_page = 4;
                                tab = content_page4;
                                //window.location.replace('#'+$('#'+"4").text());

                                //$('#input_post').attr('value','motion');
                                break;
                            case 5:
                                next_page = 5;
                                tab = content_page5;
                                //window.location.replace('#'+$('#'+"5").text());

                                //$('#input_post').attr('value','');
                                break;
                            default:
                                //console.log('Home');
                        }

                        $('.voirplus').attr('href', 'plus/?cat='+tab['cat']);
                        if (current_page == 0 && next_page != 0) {
                            change_introOut();
                        } else {
                            if (next_page == 0 && current_page!=0) {
                                //console.log('next —— 0');
                                page_out();
                                change_introIn();//bloc_side
                                //console.log(next_page);
                            } else if(next_page==5){
                                page_out();
                                contact=true;
                                setTimeout(page_in,500);
                            }
                            else{
                                page_out();
                                setTimeout(nbre_vids, 500);//bloc_side
                            }
                        }
                    }

                }

                function change_introIn() {
                    $('#play_button').css('top', '110vh');
                    $('.point_mot').css({'border-radius': '0', 'bottom': '0'});
                    $('.main_type').css({'top': '100vh'});
                    setTimeout(change_introIn1, 500);
                }

                function change_introIn1() {
                    $('#bloc_bleu').css({'position': 'absolute', 'width': '100vw', 'justify-content': 'normal'});
                    $('.main_type').css('display', 'none');
                    $('#bloc_bleuv2').css('transform', 'translate(100%)');
                    $('#bloc_title_page').css('display', 'none');
                    $('.vid_type').attr('src', '');
                    $('nav ul').css('color', 'white');
                    $('#stroke').css('display', 'flex');
                    $('head').append('<style>nav>ul:nth-child(2) li::after{background-color:white !important;};nav>ul:nth-child(1) li::after{background-color:#132f3a !important;}</style>');
                    setTimeout(change_introIn2, 500, next_page);
                }

                function change_introIn2() {
                    $('#main').css('display', 'block');
                    $('#bloc_bleuv2').css('display', 'none');
                    $('#bloc_bleu').css({'left': '100vw', 'transform': 'translate(-100%)', 'width': '40vw'});
                    $('#bloc_logo>h1').css('color', '#132f3a');
                    $('nav ul:nth-child(1)').css('color', '#132f3a');
                    nbre_vids();//bloc_side
                    setTimeout(change_introIn3, 300);
                }

                function change_introIn3() {
                    $('#mask_bg_img').css('width', '65vw');
                    $('.point_mot').css('width', '100%');
                    $('#stroke').css('opacity', '1');
                    setTimeout(change_introIn4, 300);
                }

                function change_introIn4() {
                    $('.mot_princ>p').css('opacity', '1');
                    $('.point_mot').css('width', '0.4vw');
                    //$('#showreel').fadeIn(1000);
                    setTimeout(change_introIn5, 300);
                }

                function change_introIn5() {
                    $('.point_mot').css('height', '0.4vw');
                    $('#play_button').css('top', '100%');
                    current_page = next_page;
                    setTimeout(change_introIn6, 300);
                }

                function change_introIn6() {
                    $('.point_mot').css({'border-radius': '100%', 'bottom': '0.3vw'});
                    action = false;
                }

                function change_introOut() {
                    //$('#showreel').fadeOut();
                    $('#play_button').css('top', '110vh');
                    $('.point_mot').css({'border-radius': '0', 'bottom': '0'});
                    setTimeout(change_introOut2, 100);
                }

                function change_introOut2() {
                    $('#mask_bg_img').css('width', '-0');
                    $('.point_mot').css('height', '100%');
                    setTimeout(change_introOut3, 300);
                }

                function change_introOut3() {
                    $('.point_mot').css('width', 100 + 2 * $('.point_mot').width() + '%');
                    setTimeout(change_introOut4, 500);
                }

                function change_introOut4() {
                    $('.mot_princ>p').css('opacity', '0');
                    $('.point_mot').css('width', '0');
                    $('#stroke').css('opacity', '0');
                    setTimeout(change_introOut5, 300);
                }

                function change_introOut5() {
                    $('#main').css('display', 'none');
                    $('#bloc_bleu').css('width', '100vw');
                    $('#bloc_bleuv2').css('display', 'flex');
                    $('#bloc_logo>h1').css('color', 'white');
                    $('nav ul').css('color', 'white');
                    $('.main_type').css('display', 'block');
                    page_out();
                    setTimeout(change_introOut6, 500);
                }

                function change_introOut6() {
                    $('#bloc_bleu').css({
                        'left': '0',
                        'transform': 'translate(0,0)',
                        'width': '23vw',
                        'justify-content': 'center'
                    });
                    $('#bloc_bleuv2').css({'transform': 'translate(-0%)'});
                    $('#bloc_title_page').css('display', 'flex');
                    $('nav ul').css('color', '#132f3a');
                    $('#stroke').css('display', 'none');
                    $('head').append('<style>nav>ul:nth-child(2) li::after{background-color:#132f3a !important;};nav>ul:nth-child(1) li::after{background-color:#132f3a !important;}</style>');
                    current_page = next_page;
                    if(next_page!=5){
                        setTimeout(nbre_vids, 500);
                    }
                    else{
                        contact=true;
                        $('.main_type').css('display', 'none');
                        $('#bloc_bleuv2').css('display', 'none');
                        setTimeout(page_in,500);
                    }
                }

                function page_out() {
                    if(contact){
                        $('#bloc_contact').css('transform','translate(100%,0)');
                        contact=false;
                    }
                    $('#bloc_title_page').css('top', '200vh');
                    $('.voirplus').css('opacity', '0');
                    $('.main_type').css('top', '100vh');
                    $('#bloc_side').css('top', '100vh');
                    $('.vid_type').attr('src', '');
                    setTimeout(page_out2, 500);
                }

                function page_out2() {
                    $('#bloc_contact').css('display', 'none');
                    $('.main_type').css('display', 'block');
                    $('#bloc_bleuv2').css('display', 'block');
                    $('.video_side').css('display', 'none');

                }

                function page_in() {
                    if(contact){
                        $('#bloc_bleuv2').css('transform', 'translate(100%)');
                        $('.main_type').css('display', 'none');
                    }
                    else{
                        $('#bloc_bleuv2').css('transform','translate(0%,0%)');
                    }
                    if (selected['titre']) {
                        $('.vid_titre').text(selected['titre']);
                        $('.vid_desc').text(selected['desc']);
                        $('.vid_type').attr('data-lien', selected['lien']);
                        $('.vid_poster').attr('style', selected['poster']);
                    } else if($('#first')){
                        $('.vid_titre').text($('#first').children('.title_side').text());
                        $('.vid_desc').text($('#first').children('.desc_hidden').text());
                        $('.vid_type').attr($('#first').attr('data-lien'));
                        $('.vid_poster').attr('style', $('#first').children('.miniature_side').attr('style'));
                    }
                    else{
                        //console.log('nothing');
                    }
                    $('#bloc_bleu').css('position', 'relative');
                    $('#bloc_title_page h1').text('.' + tab['categorie']);
                    action = false;
                    setTimeout(page_in2, 500);
                }

                function page_in2() {
                    if(contact){
                        $('#bloc_bleuv2').css('display', 'none');
                        $('#bloc_contact').css('display', 'flex');
                        setTimeout(function(){$('#bloc_contact').css('transform', 'translate(0%)');},10);

                    }
                    else{
                        $('.main_type').css('top', '0');
                        $('#bloc_side').css('top', '0');
                    }
                    $('#bloc_title_page').css('top', '100vh');
                    setTimeout(page_in3, 500)
                }

                function page_in3() {
                    if (selected['titre']) {
                        lien_apply(selected['elem']);
                        selected = {};
                    } else if(next_page!=5){
                        lien_apply($('#first'));
                    }
                    $('.voirplus').css('opacity', '1');
                    $('.vid_type').on('load', function () {
                        $('.vid_type').fadeIn();
                    });
                }
            }

            function nbre_vids() {
                let max_height;
                let total_height = 0;
                let tours=0;
                if(window.innerWidth<=960){
                    $('.append_mobile').append($('.video_side_news'));
                    let length_mobile_news=$('.append_mobile > .video_side_news').length;
                    for(i=6;i<=length_mobile_news;i++){
                        $('.video_side_news:nth-child(6)').remove();
                        console.log(i,length_mobile_news);
                    }
                    $('.append_mobile').append('<a href="plus/" class="voir_plus_lk">' +
                        '                <div class="voir_plus_btn voir_tout_m">' +
                        '                    <p>Voir tout</p>' +
                        '                </div>' +
                        '            </a>');
                    max_height=0.95*window.innerWidth;
                    $('.video_side_news').css('display','block');
                }
                else{
                    if(next_page==0){
                        max_height = $('#stroke').height();
                        //console.log('stroke');
                    }
                    else{
                        max_height = $('#strokev2').height();
                        //console.log('strokev2');
                    }
                    $('#first').attr('id','');

                    $('.video_side').each(function(){
                        if($(this).attr('data-filter')==tab['cat']){
                            tours==0 ?  $(this).attr('id','first'): $(this).attr('id','no'+tours);
                            $(this).css('display', 'block');
                            //console.log('height: ',$(this).height());
                            total_height+=$(this).height()+0.014*window.innerWidth;//cumul margin, padding
                            //console.log('max: ',max_height,' total: ',total_height);
                            if(total_height>max_height){
                                $(this).css('display','none');
                            }
                            tours++;
                        }
                    });
                    if(next_page!=0 && current_page!=0) {
                        page_in();
                    }
                }
            }
        </script>
        <script>
            $('.video_side').click(function() {
                selected={'elem':'','titre':'','poster':'','desc':'','lien':''};
                let lien = $(this).attr('data-link');
                if(window.innerWidth>=960){
                    if (current_page == 0) {
                        switch (lien) {
                            case 'pub':
                                lien = 1;
                                break;
                            case 'corp':
                                lien = 2;
                                break;
                            case 'clip':
                                lien = 3;
                                break;
                            case 'motion':
                                lien = 4;
                                break;
                            default:
                                lien = 1;
                        }
                        selected['elem']=$(this);
                        selected['titre']=$(this).children('.title_side').text();
                        selected['poster']=$(this).children('.miniature_side').attr('style');
                        selected['desc']=$(this).children('.desc_hidden').text();
                        selected['lien']=$(this).attr('data-link');
                        change_page(lien);

                        ajaxviews($(this).attr('data-identifier'),'view_home0',2);
                    } else {
                        $('.vid_titre').text($(this).children('.title_side').text());
                        $('.vid_desc').text($(this).children('.desc_hidden').text());
                        $('.vid_poster').attr('style',$(this).children('.miniature_side').attr('style'));
                        //console.log('yes',$('.vid_poster').attr('style'));

                        lien_apply($(this));

                        ajaxviews($(this).attr('data-identifier'),'view_home1',2);
                    }
                }
                else{
                    $(this).parents('.main_type').find('.vid_titre').text($(this).children('.title_side').text());
                    $(this).parents('.main_type').find('.vid_desc').text($(this).children('.desc_hidden').text());
                    $(this).parents('.main_type').find('.vid_poster').attr('style',$(this).children('.miniature_side').attr('style'));
                    lien_apply_m($(this));
                }
            });
            function lien_apply_m(e){
                let lien = e.attr('data-lien');
                //console.log(lien);
                if (lien.indexOf("youtu") != -1) {
                    //console.log('youtube');
                    if (lien.indexOf("&") != -1) {
                        e.parents('.main_type').find('.vid_type').attr('src', 'https://www.youtube.com/embed/' + lien.substr(lien.lastIndexOf('&') - 11, 11) + "?rel=0&fs=1&modestbranding=1&playsinline=1");
                    } else {
                        e.parents('.main_type').find('.vid_type').attr('src', 'https://www.youtube.com/embed/' + lien.substr(lien.length - 11, lien.length) + "?&rel=0&fs=1&modestbranding=1&playsinline=1");
                    }
                } else {
                    //console.log('vimeo');
                    e.parents('.main_type').find('.vid_type').attr('src', 'https://player.vimeo.com/video/' + lien.slice(lien.lastIndexOf('/') + 1));
                }
            }
            function lien_apply_m2(e){
                let lien = e.attr('data-lien');
                //console.log(lien);
                if (lien.indexOf("youtu") != -1) {
                    //console.log('youtube');
                    if (lien.indexOf("&") != -1) {
                        $('#'+e.attr('data-link')).find('.vid_type').attr('src', 'https://www.youtube.com/embed/' + lien.substr(lien.lastIndexOf('&') - 11, 11) + "?rel=0&fs=1&modestbranding=1&playsinline=1");
                    } else {
                        $('#'+e.attr('data-link')).find('.vid_type').attr('src', 'https://www.youtube.com/embed/' + lien.substr(lien.length - 11, lien.length) + "?&rel=0&fs=1&modestbranding=1&playsinline=1");
                    }
                } else {
                    //console.log('vimeo');
                    $('#'+e.attr('data-link')).find('.vid_type').attr('src', 'https://player.vimeo.com/video/' + lien.slice(lien.lastIndexOf('/') + 1));
                }
            }
            function lien_apply(e){
                let lien = e.attr('data-lien');
                $('.vid_type').fadeOut();
                //console.log(lien);
                if (lien.indexOf("youtu") != -1) {
                    //console.log('youtube');
                    if (lien.indexOf("&") != -1) {//Pour éviter le timer auto
                        $('.vid_type').attr('src', 'https://www.youtube.com/embed/' + lien.substr(lien.lastIndexOf('&') - 11, 11) + "?autoplay=1&rel=0&fs=1&modestbranding=1&playsinline=1");
                    } else {
                        $('.vid_type').attr('src', 'https://www.youtube.com/embed/' + lien.substr(lien.length - 11, lien.length) + "?autoplay=1&rel=0&fs=1&modestbranding=1&playsinline=1");
                    }
                    $('.vid_type').on('load', function () {
                        setTimeout(fade, 10, '#video');
                    });
                } else {
                    //console.log('vimeo');
                    $('.vid_type').attr('src', 'https://player.vimeo.com/video/' + lien.slice(lien.lastIndexOf('/') + 1) + "?autoplay=1");//+1 pour forbide le /
                    $('.vid_type').on('load', function () {
                        setTimeout(fade, 10, '#video');
                    });
                }

                function fade(e) {
                    //console.log('ok');
                    $(e).fadeIn(300);
                }
            }
        </script>
        <script>
            if(window.innerWidth<=960){
                let nbre_menu = $('#nav_mobile>ul>*').length;
                let id_main;
                let titleCat='';
                let firstvideoM;
                let oui=$('.main_type').last();
                for(let i=1;i<nbre_menu-1;i++){//-2 pour contact
                    $('.main_type').last().after($('.main_type').last().clone());
                    switch(i){
                        case 1:
                            id_main='corp';
                        break;
                        case 2:
                            id_main='clip';
                        break;
                        case 3:
                            id_main='motion';
                        break;
                        default:
                            id_main='error';
                    }
                    $('.main_type').last().attr('id',id_main);
                    //console.log(i);
                }
                let blocid;
                $('.main_type').each(function(){
                    blocid=$(this).attr('id');
                    $('.video_side').each(function(){
                        if($(this).attr('data-filter')==blocid){
                            $('#'+blocid).children('.bloc_video_side_m').append($(this));
                            $(this).css('display','block');
                        }
                    });
                    switch(blocid){
                        case 'pub':
                            titleCat='Film publicitaire';
                        break;
                        case 'corp':
                            titleCat='Film corporate';
                        break;
                        case 'clip':
                            titleCat='Music videos';
                        break;
                        case 'motion':
                            titleCat='Motion designs';
                        break;
                        default:
                            titleCat='error';
                    }

                    //console.log(blocid);
                    $('#'+blocid).children('.cat_titre').text('.'+titleCat);

                    $(this).children('.vid_titre').text($(this).find('.video_side:first-child>.title_side').text());
                    $(this).find('.vid_poster').attr('style',$(this).find('.video_side:first-child>.miniature_side').attr('style'));
                    $(this).find('.vid_desc').text($(this).find('.video_side:first-child>.desc_hidden').text());
                    $(this).find('.voir_plus_lk').attr('href',window.location.href+'plus/?cat='+blocid);
                    lien_apply_m($(this).find('.video_side:first-child'));
                });
            }
           /* widthBase=window.innerWidth;
            if(window.innerWidth>960){
                var resizeTimer;

                $(window).resize(function(e) {

                    clearTimeout(resizeTimer);
                    resizeTimer = setTimeout(function () {
                        //console.log('yes');
                        location.reload();

                    }, 250);
                });
            }*/

        </script>
        <script src="js/form.js"></script>

        <script> //TRACKING
            ajaxviews('home0','trafic',0);

            $(document).on('click', ".link_page", function() {
                ajaxviews($(this).attr('data-indentifier'),"trafic",0);
            });
            $(document).on('click', ".link_page_m", function() {
                ajaxviews($(this).attr('data-indentifier'),"trafic",0);
            });
            function ajaxviews(id,type,action){
                //console.log('id:'+id,'type:'+type,'action:'+action);
                $.ajax({
                    url : "back/gestion/nbre_vues.php",
                    type : "POST",
                    data : "id=" + id + "&type=" + type + "&action=" + action
                });
            }
        </script>

    </body>
</html>