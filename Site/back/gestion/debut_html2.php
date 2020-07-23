<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>BACK OFFICE - PINKMAN</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.semanticui.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.semanticui.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="../../css/style_back.css">
    <link rel="stylesheet" href="../../css/trafic.css">

    <script src="../../js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.semanticui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.semanticui.min.js"></script>

    <style>
        body{
            display: flex;
            align-items: center;
            flex-direction: column;
        }
        .nav_back{
            display: flex;
            align-items: center;
            justify-content: flex-start;
            min-height: 80px;
            box-shadow: 0 -3px 10px black;
            width:100vw;
            height: 12vh;
            padding: 0 50px;
            box-sizing: border-box;
        }
        .nav_back a{
            font-weight: 400;
            margin: 0;
            font-size: 1.5vw;
            position: relative;
            cursor: pointer;
            color: #132f3a;
            transition: all 0.3s;
        }
        table.dataTable.no-footer{
            border-bottom: 1px solid rgba(34,36,38,.1);
        }
        .p-5{
            position: relative;
            width:90vw;
        }
        .ui.table td, .ui.table th{
            transition: background-color 0.3s;
            text-align: center;
            position: relative;
            padding: 10px;
        }
        .edit,.suppr{
            text-align: center;
            cursor: pointer;

        }
        .edit:hover{
            background-color: #4285F4;
        }
        .edit:hover a{
            color: white;
        }
        .edit>a{
            transition: all 0.3s;
            color:#4285F4;
        }
        .edit>a,.suppr>a{
            position: absolute;
            height: 100%;
            width:100%;
            top:0;
            left:0;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0;
        }
        .suppr>a p{
            transition: all 0.3s;
            color: #de273d;
        }
        .suppr:hover{
            background-color: #de273d;
        }
        .suppr:hover a p{
            color: white;
        }
        .top,.bottom{
            display: flex;
            justify-content: space-between;
            margin: 50px 0 20px 0;
        }
        .stop{
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
