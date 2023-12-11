<?php
require_once 'Configuracion/bd.php';
$pdopag = ConexionBD::conectar();
$pdopag->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

date_default_timezone_set('America/Bogota');
$fechasistema = date("Y-m-d");
$horasistema = date("H:i:s");
$url = "http://localhost/MoteleroSGM/";

$perfil = $perfilusuario->fetch(PDO::FETCH_ASSOC);
$titulopagina = "IMAS";
$roles = $perfil["u_rol"];
        
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="Vista/bootstrap/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <script type="text/javascript" src="Vista/js/jquery-3.6.0.min.js"></script>
        <link rel="shortcut icon" href="Vista/imagen/logo.png">
        <script src="Vista/jquery/jquery-ui.js" type="text/javascript"></script>
        <link href="Vista/jquery/jquery-ui.min.css" rel="stylesheet" type="text/css"/>       
        <link href="Vista/fontawesome/css/all.css" rel="stylesheet" />
        <script src="Vista/fontawesome/js/all.js" crossorigin="anonymous"></script>
        <link href="Vista/css/styles.css" rel="stylesheet" />
        <script src="Vista/js/sweetalert.min.js" type="text/javascript"></script>        
        <title>IMAS</title>
    </head>
    <style>
        .navbar-toggler{
            background-color: white;
        }
        .navbar-toggler:hover{
            color: orange;
        }
        .btn-light{
            background-color: orange;
            color: white;

        }
        .btn-light:hover{
            background-color: #0473ab;
            color: white;
            font-weight: bold; 
        }
        footer, .modal-header,.card-header{
            background-color: #182951;
            color:white;
        }

        .btn-success{
            background-color: #0473ab;
            color: white;            
        }

        .btn-success:hover{
            background-color: white;
            color: #182951;
            font-weight: bold;
        }

        .btn-danger{
            background-color: #182951;
        }
        .btn-danger:hover{
            background-color: orange;
            color: white;
            font-weight: bold;
        }

        nav, .navbar{
            background-color: #182951;
            color: white;
            font-size: 15px; 
            text-transform: uppercase;
        }

        .dropdown-item, .dropdown-menu{
            background-color: #182951;
            color: white;
            font-size: 15px; 
            text-transform: uppercase;

        }

        .dropdown-item:hover{
            background-color: orange;
            font-weight: bold;

        }
        .nav-link{
            color: white;
        }

        .nav-item:hover{
            background-color: orange;
            font-weight: bold;
        }
        a{
            color:red;
            text-decoration:none;
        }
        a:hover{
            color:pink;
        }
        header{
            color:#182951;
            text-align: center;
            font-size: 80px;
        }
        .titulo{
            background-color: orange;
            text-align: center;
            font-weight: bold;
        }
    </style>
    <body>

        <header>
            <img src="Vista/imagen/banner.png" height="20%" alt="...">
        </header>

