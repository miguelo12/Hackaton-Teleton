<?php session_start(); 
  if(!isset($_SESSION["docente"]))
      { 
        if(!isset($_SESSION["alumno"])){
          header("location: ../pages/inicio.php");
          die();
        }
        else
        {
          header("location: ../pages/indexAlumno.php");
          die();
        }
      }
  else
      {
        $docente = $_SESSION["docente"];
        if($docente["admin"]==0)
        {
           header("location: ../pages/indexDocente.php");
           die(); 
        }
      }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/png" href="img/icon.png"/>
    <title>Administrador</title>

     <!-- Loading -->
    <link href="css/loading.css" rel="stylesheet" type="text/css"/>
    
    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    
    <!-- Bootstrap Core CSS -->
    <link href="../component/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
    
    <!-- Custom Fonts -->
    <link href="../component/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="none" onload="if(media!='all')media='all'">

    <!-- Sidebar -->
    <link href="css/simple-sidebar.css" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
    
    <noscript>
    <!-- Loading -->
    <link href="css/loading.css" rel="stylesheet" type="text/css"/>
    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="../component/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="../component/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Siderbar -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
    </noscript>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
        <!-- jQuery -->
    <script src="../component/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../component/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../component/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../bower_components/raphael/raphael-min.js"></script>
    <script src="../component/morrisjs/morris.min.js"></script>
    <script src="../js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</head>

<body>
    <div id="cargando">
        <div class="espacio"></div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="center-block text-center">
                        <div class="cssload-container">
                            <div class="cssload-arc">
                                <div class="cssload-arc-cube"></div>
                            </div>
                            <div id="fountainTextG" style="margin-top: 140px; margin-left: 60px"><div id="fountainTextG_1" class="fountainTextG">c</div><div id="fountainTextG_2" class="fountainTextG">a</div><div id="fountainTextG_3" class="fountainTextG">r</div><div id="fountainTextG_4" class="fountainTextG">g</div><div id="fountainTextG_5" class="fountainTextG">a</div><div id="fountainTextG_6" class="fountainTextG">n</div><div id="fountainTextG_7" class="fountainTextG">d</div><div id="fountainTextG_8" class="fountainTextG">o</div><div id="fountainTextG_9" class="fountainTextG">.</div><div id="fountainTextG_10" class="fountainTextG">.</div><div id="fountainTextG_11" class="fountainTextG">.</div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="listo" style="display: none;">
        <!-- Navigation -->
        
        <nav class="navbar navbar-default navbar-fixed-top" id="nav1" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" id="menu-toggle" href="#menu-toggle" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" style="margin-left: 10px" href="#"><img src="img/logo.PNG" class="imagelogo" alt="" height="100" width="200"/></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav navbar-right hidden-xs" style="margin-top: 80px; margin-right: 0px">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-fw"></i> <?php echo $docente["nombre"]; ?> <i class="fa fa-caret-down"></i></a>
                  <ul class="dropdown-menu">
                    <li><a href="indexDocente.php"><i class="fa fa-gear fa-fw"></i>&nbsp;&nbsp;&nbsp;Cambiar a Docente</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="php/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout/Salir</a></li>
                  </ul>
                </li>
              </ul>
              <h1 class="navbar-text navbar-right" style="margin-top: 50px; margin-right: 80px">Portal Admin</h1> 
            </div><!--/.nav-collapse -->
          </div>
        </nav>
        
        <div class="espacio"></div>
        
        <div id="buttoncolgando" style="display: none; position: fixed; z-index: 801; border:none; top: 0; left: 45%; width: 50px;">
            <button type="button" class="btn btn-link" id="imagebutton" ><img src="img/buttontop.png" width="45px" height="45px"/></button>
        </div>
        
        <div id="wrapper">
         <nav class="navbar-inverse" role="navigation">
         <div id="sidebar-wrapper">
         <ul class="sidebar-nav navbar-nav">
                <br/> 
                <br/> 
                <br/> 
                <li class="sidebar-brand">
                    <a href="#">
                        Menu Administrador
                    </a>
                </li>
                <li class="active"> 
                      <a href="#">Inicio</a>
                </li>
                <li> 
                    <a href="adminCuentas.php">Administrar Cuentas</a>
                </li>
                <li class="dropdown hidden-lg hidden-md">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-fw"></i><span class="sidebar-nav-item"><?php echo $docente["nombre"]; ?><i class="fa fa-caret-down"></span></i></a>
                  <ul class="dropdown-menu">
                    <li><a href="indexDocente.php"><i class="fa fa-gear fa-fw"></i><span class="sidebar-nav-item">Cambiar a Docente</span></a></li>
                    <li><a href="php/logout.php"><i class="fa fa-sign-out fa-fw"></i><span class="sidebar-nav-item">Logout/Salir</span></a></li>
                  </ul>
                </li>
            </ul>
        </div>
        </nav>
        </div>
       
        
        
        <div id="page-content-wrapper content" >
            <div class="container separate-rows tall-rows">
                
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="row">
                         
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <div class="row">
                                    <div class="col-xs-12 col-md-12 col-lg-12 text-center">
                                        <br/>
                                        <a class="lead" href="adminCuentas.php"><p><img src="img/admin.png" class="img-circle hidden-sm hidden-md hidden-lg" alt="lista" width="80" height="80"><img src="img/admin.png" class="img-circle hidden-xs hidden-lg" alt="lista" width="160" height="160"><img src="img/admin.png" class="img-circle hidden-xs hidden-sm hidden-md" alt="lista" width="180" height="180"></p>Crear Profesor o<br> Administrar cuentas.</a>
                                    </div>     
                                </div>
                            </div>

                            <div class="clearfix visible-xs"></div>
                        </div>
                    </div>     
                </div>
            </div>
        </div>
    </div>
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    
    $(window).scroll( function() {
    var value = $(this).scrollTop();
    if ( value > 0.1 ){
        $("#nav1").hide();
        $(".espacio").css("display","none");
        $("#buttoncolgando").css("display","block");
        $("body").css("padding-top", "10px");
    }
    });
    
    $('#imagebutton').click(function(){
        $("#nav1").show();
        $(".espacio").css("display","block");
        $("#buttoncolgando").css("display","none");
        $("body").css("padding-top", "0px");
    });
    </script>
    
    <script>
    $(window).load(function (){
    // Una vez se cargue al completo la página desaparecerá el div "cargando"
    $('#cargando').delay(1200).fadeOut(200);
    $('#listo').delay(1600).fadeIn(400);
    });
    </script>
</body>

</html>
