<?php

require 'config.inc.php';
require 'session_verif.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>BACK OFFICE - PINKMAN</title>
    <link rel="stylesheet" type="text/css" href="../../css/style_back.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">

    <link rel="apple-touch-icon" sizes="180x180" href="../../fvcns/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../fvcns/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../fvcns/favicon-16x16.png">
    <link rel="manifest" href="../../fvcns/site.webmanifest">
    <link rel="mask-icon" href="../../fvcns/safari-pinned-tab.svg" color="#3a4048">
    <link rel="shortcut icon" href="../../fvcns/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="Pinkman Prod.">
    <meta name="application-name" content="Pinkman Prod.">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-config" content="../../fvcns/browserconfig.xml">
    <meta name="theme-color" content="#000000">

    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/typed.min.js"></script>

</head>
<body>
<header>

    <a href="../../"><div id="bloc_logo" class="link_pagetop">
            <h1 title="Retour à l'accueil">Pinkman</h1>
        </div></a>
    <h2 class="titre">Back office de <?php echo $_SESSION['nom'] ?> </h2>

</header>

<div class="centrer">
    <a class="add-btn add-btn--redfonce" href="new_vid.php">Ajouter une vidéo</a>
    <a class="add-btn add-btn--redfonce" href="new_playlist.php">Ajouter une playlist</a>
    <a class="add-btn add-btn--redfonce" href="catalogue.php">Gérer mes vidéos</a>
    <a class="add-btn add-btn--redfonce" href="playlist.php">Gérer mes playlist</a>
    <a class="add-btn add-btn--redfonce" href="organisation/index.php?cat=home&playlist=true">Organisation</a>
    <a class="add-btn add-btn--redfonce" href="trafic.php">Trafic</a>
</div>
<div id="donate">
    <svg id="paypal_logo_princ" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 172.44 206"><defs><style>.cls-1{fill:#139ad6;}.cls-2{fill:#263b80;}.cls-3{fill:#232c65;}</style></defs><path class="cls-1" d="M317.84,140.21c-9-10.3-25.75-15.45-48.92-15.45H204.54c-3.86,0-7.72,3.86-9,7.72L169.78,301.15c0,3.86,2.57,6.43,5.15,6.43h39.91l10.3-63.08v2.57c1.29-3.86,5.15-7.72,9-7.72h19.32c37.33,0,65.66-15.45,74.67-57.94v-3.86h0c1.29-16.74-1.29-27-10.3-37.34" transform="translate(-169.78 -124.76)"/><path class="cls-2" d="M326.85,177.55h0v3.86c-9,43.77-37.33,57.94-74.67,57.94H232.87c-3.87,0-7.73,3.86-9,7.72L211,325.61c0,2.57,1.29,5.15,5.15,5.15H249.6c3.87,0,7.73-2.58,7.73-6.44V323l6.44-39.91v-2.57c0-3.87,3.86-6.44,7.72-6.44h5.15c32.19,0,57.94-12.88,64.38-51.5,2.57-15.45,1.28-29.61-6.44-38.63a13.16,13.16,0,0,0-7.73-6.43" transform="translate(-169.78 -124.76)"/><path class="cls-3" d="M317.84,173.68c-1.29,0-2.57-1.28-3.86-1.28a4.71,4.71,0,0,1-3.86-1.29c-5.15-1.29-10.3-1.29-16.74-1.29H243.17a4.74,4.74,0,0,0-3.87,1.29,7.09,7.09,0,0,0-3.86,6.44l-10.3,66.95v2.57c1.29-3.86,5.15-7.72,9-7.72h19.32c37.33,0,65.66-15.45,74.67-57.94a4.71,4.71,0,0,1,1.29-3.86c-2.58-1.29-3.86-2.58-6.44-2.58-3.86-1.29-3.86-1.29-5.15-1.29" transform="translate(-169.78 -124.76)"/></svg>
    <div style="display: flex">
        <p id="txt_donate"></p>
    </div>
    <div  class="bloc_input" style="align-items: center;" onclick="type2(true)">
        <p class="sub_back sub_back_cancel" style="background-image: linear-gradient(100deg, #FF7C45, rgba(255, 115, 145, 1));">Oui avec plaisir :)</p>
    </div>
    <div  class="bloc_input kasstoa" style="align-items: center;transition-delay: 0.1s">
        <p class="sub_back sub_back_cancel">Non allez creuver</p>
    </div>
</div>

    <footer title="BAM ! Comme ça vous nous oublierez jamais... Futé l'artiste">
        <p style="text-align: center">ⓒ Nathan, Théo, Pierre, Alexis <3</p>
        <div id="paypal">
            <p>Bouh !</p>
        </div>
    </footer>

<script>
    $.ajax({
        url : "nbre_vues.php",
        type : "POST"
    });
    let timeout;
    let paypay=false;
    $('footer').on({
        mouseenter:function(){
            if(!paypay){
            timeout=setTimeout(paypayIn,700);}
        },
        mouseleave: function () {
            clearTimeout(timeout);
        },
        click:function (){if(!paypay){paypayIn();clearTimeout(timeout)}}
    });


    function paypayIn(){
        $.ajax({
            url : "nbre_vues.php",
            type : "POST",
            data : "id=0&type=add&action=3"
        });
        paypay=true;
        for(i=1;i<=6;i++){
            setTimeout(buttonOut,i*100,i);
        }
        function buttonOut(i){
            $('.add-btn:nth-of-type('+i+')').css('left','-100vw');
        }
        setTimeout(type,1000);
    }
    let typed;
    function type() {
        $('.bloc_input').css('opacity','1');
        $('#donate').css({'display':'flex','opacity':'1'});
        typed = new Typed("#txt_donate", {
            strings: ['Eh bonjour,','On dirait que vous avez trouvé notre <span class=\'epais\'>easter egg</span>','Étant donné le <span class=\'epais\'>super</span> travail qu\'on a fait,','(Sans vouloir nous vanter <span class=\'epais\'>évidemment</span>)','Mais c\'est vrai qu\'on est <span class=\'epais\'>trop forts</span>','eheh','Bon', 'On ne savait pas trop comment demander', 'Donc on a choisi de le faire comme ça','En espérant que ça vous fera rire','Sinon c\'est gênant mdrr','Ce back office n\'est-il pas <span class=\'epais\'>sublime</span> ?', 'Ce site web n\'est-il pas <span class=\'epais\'>incroyable</span> ?','Cette équipe n\'était-elle pas votre <span class=\'epais\'>pref</span> ?','En vrai on adore nous <span class=\'epais\'>vanter</span>...','En guise de notre <span class=\'epais\'>implication</span>,','Accepteriez-vous de <span class=\'epais\'>récompenser notre travail</span> ?'],
            typeSpeed: 20,
            backSpeed: 10,
            backDelay: 1000,
            smartBackspace: true,
            loop: false,
            onComplete: function(){
                buttonsPayIn();
            }
        });
    }
    function buttonsPayIn(){
        $('.bloc_input').css('left','0vw');
        $('#paypal_logo_princ').css('opacity','1');
        setTimeout(function () {
            $('.bloc_input').css('transition-delay','unset');
        },1000)
    }

    transform=false;
    $('.kasstoa').on({
       mouseenter: function(){
           if(!transform){
               $(this).css('transform','translate(0,100%)');
               transform=true;
           }
           else{
               $(this).css('transform','translate(0,0%)');
               transform=false;
           }
       },
        click:function(){
           $(this).children('p').text('Dommage...');
           setTimeout(function(){
               $('.kasstoa').children('p').text('Mais bien joué');
               setTimeout(type2,1000,false);
               },1000);
        }
    });

    function type2(donate) {
        let emoji='';
        if(donate){
            emoji="😍";
            setTimeout(function () {
                window.open('https://paypal.me/pools/c/8oAGqOkwNr');
                setTimeout(outEgg,1000);
            },1000);
        }
        else{
            emoji="😢";
            $.ajax({
                url : "../mail.php",
                type : "POST",
                data : "nan=1"
            });
            setTimeout(outEgg,1000);
        }
        typed.destroy();
        typed = new Typed("#txt_donate", {
            strings: [emoji],
            typeSpeed: 20,
            backSpeed: 10,
            backDelay: 1000,
            smartBackspace: true,
            loop: false,
            onComplete: function(){
                buttonsPayIn();
            }
        });
    }

    function outEgg(){
        $('.bloc_input').css('opacity','0');
        $('.kasstoa').css({'transition-delay':'0.1s','transform':'translate(0,0%)'});
        $('#paypal_logo_princ').css('opacity','0');
        setTimeout(function () {
            $('#donate').css('opacity','0');
            $('.bloc_input').css('left','100vw');
            setTimeout(function () {
                $('#donate').css('display','none');
                typed.destroy();
                $('.kasstoa').children('p').text('Non allez creuver');
                for(i=1;i<=6;i++){
                    setTimeout(buttonIn,i*100,i);
                }
                function buttonIn(i){
                    $('.add-btn:nth-of-type('+i+')').css('left','0vw');
                }
                paypay=false;
            },1000);
        },3000);
    }
</script>
<?php

require 'fin_html.php';

?>