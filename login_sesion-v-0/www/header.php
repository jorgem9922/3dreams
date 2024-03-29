<!doctype html>
<html lang="es">

<head>
  <title>3DREAMS</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <link rel ="icon" type="image/x-icon" href="/favicon.ico">


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link href="/css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="/css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />

    <!-- libraries -->
    <link href="/css/lib/jquery-ui-1.10.2.custom.css" rel="stylesheet" type="text/css" />
    <link href="/css/lib/font-awesome.css" type="text/css" rel="stylesheet" />
    <link href="/css/lib/uniform.default.css" type="text/css" rel="stylesheet" />
    <link href="/css/lib/select2.css" type="text/css" rel="stylesheet" />
    <link href="/css/lib/bootstrap.datepicker.css" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="/css/compiled/layout.css" />
    <link rel="stylesheet" type="text/css" href="/css/compiled/elements.css" />
    <link rel="stylesheet" type="text/css" href="/css/compiled/icons.css" />

    <!-- this page specific styles -->
    <link rel="stylesheet" href="/css/compiled/index.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="/css/compiled/form-showcase.css" type="text/css" media="screen" />

    <!-- open sans font -->
    <link href='http://fonts.googleapis.com/css?family=OpenSans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css' />

    <!-- lato font -->
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css' />

</head>

<body>
<header class="navbar navbar-inverse" role="banner">
        <div class="navbar-header">            
            <a class="navbar-brand" href="principal.php">
                <img src="/imagenes/logo.png" width="50px" height="50px"alt="logo" />Tu imaginacion cobra vida
            </a>
        </div>
        <ul class="nav navbar-nav pull-right hidden-xs">                       
            <li class="notification-dropdown hidden-xs hidden-sm">
                <a href="#" class="trigger">
                    <i class="icon-user"></i>
                </a>
                <div class="pop-dialog">                    
                </div>
            </li>
            <li class="dropdown open">
                <a href="#" class="dropdown-toggle hidden-xs hidden-sm" data-toggle="dropdown">
                    Bienvenido<?php echo ": ".$_SESSION['usuario'] ?>
                </a>                
            </li>  
            <li class="settings hidden-xs hidden-sm">
                <a href="cerrarSesion.php" role="button">
                    <i class="icon-share-alt"></i>
                    <li><i class="bi-cart-dash px-3" ></i></li>           

                </a>
            </li>
        </ul>
    </header>
  <header class="container-fluid bg-primary  text-center py-3 display-4">
    3DREAMS
  </header>
</body>

</html>

