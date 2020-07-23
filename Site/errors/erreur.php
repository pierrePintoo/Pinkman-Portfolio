<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Erreur <?php echo $_GET['erreur'] ?></title>
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
        <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">

        <style>
			@import url('https://fonts.googleapis.com/css?family=Josefin+Sans&Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap');

			html,body{
				margin:0;
				display: flex;
				height:100%;
				width: 100%;
				justify-content: center;
				align-items: center;
                font-family: 'Poppins',Futura,sans-serif;
			}
            header{
                position: absolute;
                align-self: flex-start;
                width: 100vw;
                height:12vh;
                background-color: white;
                display: flex;
                align-items: center;
                justify-content: space-between;
                min-height: 80px;
                box-shadow: 0 -3px 10px black;
            }
            header a{
                text-decoration: none;
            }
            #bloc_logo{
            }
            #bloc_logo>h1{
                font-weight: 400;
                margin:0;
                padding-left: 50px;
                font-size:1.5vw;
                position: relative;
                cursor: pointer;
                color:#132f3a;
                transition: all 0.3s;
            }

			.error_type{
				position: absolute;
				font-size:20vw;
                min-font-size: 100px;
				font-family: 'Josefin Sans';
				margin: 0;
				color: #132f3a;
				transition: transform 0.03s;
			}
			#cause{
				position: relative;
				margin-top:50vh;
				font-size:1em;
				font-family: 'Josefin Sans';
				color:#132f3a;
				width:70%;
				text-align: center;
			}
            a{
                color: #3588a3;
            }
            @media screen and (max-width: 960px) {
                #bloc_logo h1{
                    font-size: 4vw;
                    padding-left: 10vw;
                }
                h1{
                    font-size: 20px;
                }
                header{
                    height:10vw;
                    box-shadow: 0 -3px 10px black;
                }
                .error_type {
                    font-size: 150px;
                }
                }
		</style>
	</head>
    <header>
        <a href="../"><div id="bloc_logo" class="link_pagetop">
                <h1 title="Retour à l'accueil">Pinkman</h1>
            </div></a>
    </header>
	<body>
		<h1 class='error_type'>.<?php echo $_GET['erreur']?></h1>
		<?php
			switch($_GET['erreur'])
			{
			   case '400':
			   $cause= "Oups! Une erreur est survenue durant l'analyse HTTP" ;
			   break;
			   case '401':
			   $cause= "Une erreur d'identification a eu lieu. Veuillez vérifier les informations et réessayer";
			   break;
			   case '402':
			   $cause= 'Le client doit reformuler sa demande avec les bonnes données de paiement.';
			   break;
			   case '403':
			   $cause= 'Vous n\'avez pas l’autorisation d\'être ici.';
			   break;
			   case '404':
			   $cause= 'Oups! Cette page n\'existe pas...';
			   break;
			   case '405':
			   $cause= 'Méthode non autorisée.';
			   break;
			   case '500':
			   $cause= 'Une erreur interne au serveur s\'est produite. Veuillez réessayer.';
			   break;
			   case '501':
			   $cause= 'Le serveur ne supporte pas ce service.';
			   break;
			   case '502':
			   $cause= 'Mauvaise passerelle.';
			   break;
			   case '503':
			   $cause= 'Le service n\'est pas disponible :/';
			   break;
			   case '504':
			   $cause= "Le service est inhabituellement long. Vous pouvez nous contacter par mail le temps que ce problème soit réglé : <a href='mailto:vianney.meurville@gmail.com'>vianney.meurville@gmail.com</a>";
			   break;
			   case '505':
			   $cause= 'Version de HTTP non supportée.';
			   break;
			   default:
			   $cause= 'Une erreur s\'est produite';
			}
		?>
		<p id="cause"><?php echo $cause ?></p>
        <script>
           setTimeout(function(){window.location.href='../'},10000)
        </script>
	</body>
</html>