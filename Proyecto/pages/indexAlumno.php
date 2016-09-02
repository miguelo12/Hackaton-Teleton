<?php session_start(); 
  if(!isset($_SESSION["docente"]))
      { 
        if(!isset($_SESSION["alumno"])){
          header("location: ../pages/inicio.php");
          die();
        } else {
            $alumno = $_SESSION["alumno"];
            if($alumno["anonimo"]==1){
                header("location: ../pages/actividadAlumno.php");
                die();
            } elseif($alumno["anonimo"]==0) {
                unset($_SESSION["idActividad"]);
            }
        }
      }
  else
      {
       header("location: ../pages/indexDocente.php");
       die();
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
    <title>Inicio Alumno</title>

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
                <h4 class="navbar-text navbar-right pull-right titulolandscape" style="margin-top: 30px; margin-right: 80px">Portal Alumno</h4>
            </div>          
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right hidden-xs" style="margin-top: 80px; margin-right: 0px">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-fw"></i> <?php echo $alumno["nombre"]; ?> <i class="fa fa-caret-down"></i></a>
                  <ul class="dropdown-menu">
                    <li><a href="Perfil.php"><i class="fa fa-gear fa-fw"></i> Configuracion</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="php/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout/Salir</a></li>
                  </ul>
                </li>
              </ul>
              <h1 class="navbar-text navbar-right" style="margin-top: 50px; margin-right: 80px">Portal Alumno</h1> 
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
                        Menu Alumno
                    </a>
                </li>
                <li class="active"> 
                      <a href="#">Inicio</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Actividades<i class="fa fa-caret-down"></i></a>
                  <ul class="dropdown-menu">
                    <li><a href="actividadAlumno.php">Unete a una actividad</a></li>
                    <li><a href="#">Ver unidades de aprendizaje</a></li>
                    <li><a href="#">Responde una Actividad</a></li>
                    <li><a href="#">Crea un grupo</a></li>
                  </ul>
                </li>
                <li><a href="#contact">Contáctenos</a></li>
                <li class="dropdown hidden-lg hidden-md">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-fw"></i><span class="sidebar-nav-item"><?php echo $alumno["nombre"]; ?><i class="fa fa-caret-down"></span></i></a>
                  <ul class="dropdown-menu">
                      <li><a href="Perfil.php"><i class="fa fa-gear fa-fw"></i><span class="sidebar-nav-item">Configuración</span></a></li>
                    <li><a href="php/logout.php"><i class="fa fa-sign-out fa-fw"></i><span class="sidebar-nav-item">Logout/Salir</span></a></li>
                  </ul>
                </li>
            </ul>
        </div>
        </nav>
        </div>
        
        
        <div class="hidden-xs hidden-md hidden-lg">
        <br/>
        </div>
        <div class="hidden-xs hidden-md hidden-sm">
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        </div>
        <div id="page-content-wrapper content" >
            <div class="container-fluid separate-rows tall-rows">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="row">
                            
                            <div id="paso1">
                                <div class="col-xs-12 hidden-sm hidden-md hidden-lg">
                                    <div class="text-center">
                                        <h4 style="float: right; margin-right: 20px" class="pretitulolandscape">Portal Estudiante</h4>
                                        <br class="pretitulolandscape" />
                                    </div>
                                </div>
                                <div class="col-xs-4 col-md-4 col-lg-4">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12 col-lg-12 text-center">                       
                                            <a class="lead" id="opcion1" href="#"><p><img src="img/Actividadesnew.png" alt="lista" class="img-circle hidden-lg hidden-md" width="80" height="80"><img src="img/Actividadesnew.png" alt="lista" class="img-circle hidden-xs hidden-sm" width="200" height="200"></p></a>
                                            <p>Actividades Pendientes.</p>
                                        </div>     
                                    </div>
                                </div>
                                <div class="col-xs-4 col-md-4 col-lg-4">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12 col-lg-12 text-center">                                    
                                            <div>
                                                <a class="lead" id="opcion2" href="#"><p><img src="img/actividadesold.png" alt="lista" class="img-circle hidden-lg hidden-md" width="80" height="80"><img src="img/actividadesold.png" alt="lista" class="img-circle hidden-xs hidden-sm" width="200" height="200"></p></a>
                                            <p>Actividades Finalizadas.</p>
                                            </div>
                                        </div>
                                    </div>        
                                </div>
                                <div class="col-xs-4 col-md-4 col-lg-4">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12 col-lg-12 text-center">
                                            <a id="opcion3" class="lead" href="#"><p><img src="img/libro.png" alt="lista" class="img-circle hidden-lg hidden-md" width="80" height="80"><img src="img/libro.png" alt="lista" class="img-circle hidden-xs hidden-sm" width="200" height="200"></p></a>
                                            <p>Biblioteca.</p>
                                        </div>
                                    </div>    
                                </div>
                            </div>                           
                               
                            <div id="paso2">
                                <div class="col-xs-12 hidden-sm hidden-md hidden-lg">
                                    <div class="text-center">
                                        <h4 style="float: right; margin-right: 20px" class="pretitulolandscape">Actividades pendientes</h4>
                                        <br class="pretitulolandscape" />
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-9 col-lg-9">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12 col-lg-12 text-center">                       
                                            <table class="table table-responsive" id="add-table">
                                                <tr>
                                                    <th class="text-center bg-primary">Unidad de Aprendizaje</th>
                                                    <th class="text-center bg-primary">Estado</th>
                                                    <th class="text-center bg-primary">Acción</th>
                                                </tr>
                                            </table>
                                        </div>     
                                    </div>
                                </div>
                                <div class="hidden-xs hidden-sm col-md-3 col-lg-3 text-center">
                                    <img src="img/Actividadesnew.png" alt="Actividades nuevos" height="180" width="180" />
                                </div>
                                <div class="col-xs-12">
                                    <br/>
                                    <div class="hidden-lg hidden-md"><button class="pull-left btn-xs btn btn-success opcion4" ><i class="fa fa-plus fa-1x fa-fw" aria-hidden="true"></i> Nueva Sección</button></div>
                                    <div class="hidden-sm hidden-xs"><button class="pull-left btn-lg btn btn-success opcion4" ><i class="fa fa-plus fa-1x fa-fw" aria-hidden="true"></i> Nueva Sección</button></div>
                                    <div class="hidden-lg hidden-md"><button class="pull-right btn-xs btn btn-default volver" ><i class="fa fa-undo fa-1x fa-fw" aria-hidden="true"></i> Volver</button></div>
                                    <div class="hidden-sm hidden-xs"><button class="pull-right btn-lg btn btn-default volver" style="margin-right: 50px"><i class="fa fa-undo fa-1x fa-fw" aria-hidden="true"></i> Volver</button></div>
                                </div>
                            </div>    
                            
                            <div id="paso3">
                                <div class="col-xs-12 hidden-sm hidden-md hidden-lg">
                                    <div class="text-center">
                                        <h4 style="float: right; margin-right: 20px" class="pretitulolandscape">Actividades finalizadas</h4>
                                        <br class="pretitulolandscape" />
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-9 col-lg-9">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12 col-lg-12 text-center">                       
                                            <table class="table table-responsive">
                                                <tr>
                                                    <th class="text-center bg-primary">Unidad de Aprendizaje</th>
                                                    <th class="text-center bg-primary">Nota Final</th>
                                                    <th class="text-center bg-primary">Acción</th>
                                                </tr>
                                            </table>
                                        </div>     
                                    </div>
                                </div>
                                <div class="hidden-xs hidden-sm col-md-3 col-lg-3 text-center">
                                    <img src="img/feedback.png" alt="Actividades nuevos" height="180" width="180" />
                                </div>
                                <div class="col-xs-12">
                                    <br/>
                                    <div class="hidden-lg hidden-md"><button class="pull-right btn-xs btn btn-default volver" ><i class="fa fa-undo fa-1x fa-fw" aria-hidden="true"></i> Volver</button></div>
                                    <div class="hidden-sm hidden-xs"><button class="pull-right btn-lg btn btn-default volver" style="margin-right: 50px"><i class="fa fa-undo fa-1x fa-fw" aria-hidden="true"></i> Volver</button></div>
                                </div>
                            </div>    
                            
                            <div id="paso4">
                                <div class="col-xs-12 hidden-sm hidden-md hidden-lg">
                                    <div class="text-center">
                                        <h4 style="float: right; margin-right: 20px" class="pretitulolandscape">Biblioteca</h4>
                                        <br class="pretitulolandscape" />
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-9 col-lg-9">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12 col-lg-12 text-center">                       
                                            <table class="table table-responsive">
                                                <tr>
                                                    <th class="text-center bg-primary">Título</th>
                                                    <th class="text-center bg-primary">Autor</th>
                                                    <th class="text-center bg-primary">Editorial</th>
                                                </tr>
                                            </table>
                                        </div>     
                                    </div>
                                </div>
                                <div class="hidden-xs hidden-sm col-md-3 col-lg-3 text-center">
                                    <img src="img/libro.png" alt="Actividades nuevos" height="180" width="180" />
                                </div>
                                <div class="col-xs-12">
                                    <br/>
                                    <div class="hidden-lg hidden-md"><button class="pull-right btn-xs btn btn-default volver" ><i class="fa fa-undo fa-1x fa-fw" aria-hidden="true"></i> Volver</button></div>
                                    <div class="hidden-sm hidden-xs"><button class="pull-right btn-lg btn btn-default volver" style="margin-right: 50px"><i class="fa fa-undo fa-1x fa-fw" aria-hidden="true"></i> Volver</button></div>
                                </div>
                            </div>    
                            
                            <div id="paso5">
                                <div class="col-xs-12 col-md-12 col-lg-12">
                                <br/>
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-3">
                                            <form class="form-horizontal" role="form" method="POST" action="php/actividades.php?accion=4">
                                              <fieldset>
                                              <legend><h1>Ingrese PIN Sección:</h1></legend>
                                              <div class="form-group">
                                                <label class="control-label col-sm-2" for="pin">PIN:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="pin" class="form-control" id="pin" placeholder="Ingresa el pin">
                                                </div>
                                              </div> 
                                              <div class="form-group pull-right"> 
                                                <div class="col-xs-12">
                                                  <button type="submit" class="btn btn-success">Enviar</button>
                                                </div>
                                              </div>
                                              </fieldset>
                                            </form>
                                            <?php  if(isset($_GET["error"])): if($_GET["error"]==1):?>
                                            <div class="alert alert-danger">
                                               <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                               <p class="text-center"><strong>Error, </strong> ya estas en esta seccion o curso.</p>
                                            </div>
                                            <?php endif; endif;?>
                                            <?php  if(isset($_GET["error"])): if($_GET["error"]==2):?>
                                            <div class="alert alert-danger">
                                               <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                               <p class="text-center"><strong>Error, </strong> el pin de la seccion o curso ingresada no existe.</p>
                                            </div>
                                            <?php endif; endif;?>
                                            <?php if(isset($_GET["exito"])): if($_GET["exito"]==1):?>
                                            <div class="alert alert-success">
                                               <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                               <p class="text-center"><strong>Listo, </strong> acabas de ingresar a una seccion.</p>
                                            </div>
                                            <?php endif; endif;?>
                                        </div>   
                                    </div>
                                </div>
                                
                                <div class="col-xs-12">
                                    <div class="hidden-lg hidden-md"><button class="pull-right btn-xs btn btn-default volver1" ><i class="fa fa-undo fa-1x fa-fw" aria-hidden="true"></i> Volver</button></div>
                                    <div class="hidden-sm hidden-xs"><button class="pull-right btn-lg btn btn-default volver1" style="margin-right: 50px"><i class="fa fa-undo fa-1x fa-fw" aria-hidden="true"></i> Volver</button></div>
                                </div>                           
                            </div>
                            
                        </div>
                    </div>     
                </div>
            </div>
        </div>
    </div>
    
    <!-- jQuery -->
    <script src="../component/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../component/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../component/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    
    <script>
    $().ready(function(){
        <?php if(isset($_GET["error"]) || isset($_GET["exito"])):?>
        $("#paso5").show();
        $("#paso2").hide();
        $("#paso4").hide();
        $("#paso3").hide();
        $("#paso6").hide();
        $("#paso1").hide();
        <?php else: ?>
        $("#paso1").show();
        $("#paso2").hide();
        $("#paso3").hide();
        $("#paso4").hide();
        $("#paso5").hide();
        $("#paso6").hide();   
        <?php endif;?>
        $("#opcion1").click(function(){
            $("#paso2").fadeIn("fast");
            $("#paso1").hide();
            $("#paso3").hide();
            $("#paso4").hide();
            $("#paso5").hide();
            $("#paso6").hide();
            
            $.ajax({
                url:   'php/actividades.php?accion=5',
                type:  'post',
                dataType: 'json',
                cache: false,
                beforeSend: function () {
                    var $tr = 
                            $('<tr>').append(
                                $('<td>').text("Cargando...").attr({ colspan:"3" })
                                ).appendTo('#add-table').attr({ class:"bg-info" }); 
                },
                success:  function (response) {
                        $('select#seccion').prop( "disabled", false );
                        $("#add-table tr:has(td)").remove(); // remueve los tr con td
                        
                        if(response !== null){
                        $('select#seccion').prop( "disabled", false );
                        $('#enviar').prop( "disabled", false );
                        var x = 0;
                        var tipo = "";
                        $.each(response, function(index, item) { 
                            
                            
                            if(x%2 === 0){
                                tipo = "default";
                            }
                            else{
                                tipo = "info";
                            }
                            
                            var $tr = 
                            $('<tr>').append(
                                $('<td>').text(item.unidadNombre),
                                $('<td>').text("Pendiente"),
                                $('<td>').append(
                                    $('<form>').append(
                                        $('<button>').text("Enviar").attr({ class: "btn btn-default", type:"submit", formaction:"php/actividades.php?accion=6&idActividad="+item.idactividad })
                                        )
                                        .attr({ method: "POST" })
                                    )
                                
                                ).appendTo('#add-table').attr({ class:"bg-"+tipo }); 
                        
                            x++;
                        });
                        }
                        else{
                            var $tr = 
                            $('<tr>').append(
                                $('<td>').text("No se tienes actividades pendientes...").attr({ colspan:"3" })
                                ).appendTo('#add-table').attr({ class:"bg-info" }); 
                        }
                },
                error: function(xhr, status) {
                    $("#resultado1").hide();
                    $("#resultado").show();
                    $('select#seccion').prop( "disabled", true );
                    $('#enviar').prop( "disabled", true );
                    $("select#seccion option").remove(); 
                    $("select#seccion").append( 
                        $("<option></option>") 
                            .text("Ocurrio un error inprevisto... reinicie la pagina.")
                    );
                }
            });
        });
        $("#opcion2").click(function(){
            $("#paso3").fadeIn("fast");
            $("#paso1").hide();
            $("#paso2").hide();
            $("#paso4").hide();
            $("#paso5").hide();
            $("#paso6").hide();
        });
        $("#opcion3").click(function(){
            $("#paso4").fadeIn("fast");
            $("#paso1").hide();
            $("#paso2").hide();
            $("#paso3").hide();
            $("#paso5").hide();
            $("#paso6").hide();
        });
        $(".opcion4").click(function(){
            $("#paso5").fadeIn("fast");
            $("#paso1").hide();
            $("#paso2").hide();
            $("#paso3").hide();
            $("#paso4").hide();
            $("#paso6").hide();
        });

        $(".volver").click(function(){
            $("#paso1").fadeIn("fast");
            $("#paso2").hide();
            $("#paso3").hide();
            $("#paso4").hide();
            $("#paso5").hide();
            $("#paso6").hide();
        });
        $(".volver1").click(function(){
            $("#paso2").fadeIn("fast");
            $("#paso1").hide();
            $("#paso3").hide();
            $("#paso4").hide();
            $("#paso5").hide();
            $("#paso6").hide();
            
            $.ajax({
                url:   'php/actividades.php?accion=5',
                type:  'post',
                dataType: 'json',
                cache: false,
                beforeSend: function () {
                    var $tr = 
                            $('<tr>').append(
                                $('<td>').text("Cargando...").attr({ colspan:"3" })
                                ).appendTo('#add-table').attr({ class:"bg-info" }); 
                },
                success:  function (response) {
                        $('select#seccion').prop( "disabled", false );
                        $("#add-table tr:has(td)").remove(); // remueve los tr con td
                        
                        if(response !== null){
                        $('select#seccion').prop( "disabled", false );
                        $('#enviar').prop( "disabled", false );
                        
                        var x = 0;
                        var tipo = "";
                        $.each(response, function(index, item) { 
                            
                            
                            if(x%2 === 0){
                                tipo = "default";
                            }
                            else{
                                tipo = "info";
                            }
                            
                            var $tr = 
                            $('<tr>').append(
                                $('<td>').text(item.unidadNombre),
                                $('<td>').text("Pendiente"),
                                $('<td>').append(
                                    $('<form>').append(
                                        $('<button>').text("Enviar").attr({ class: "btn btn-default", type:"submit", formaction:"php/actividades.php?accion=6&idActividad="+item.idactividad })
                                        )
                                        .attr({ method: "POST" })
                                    )
                                
                                ).appendTo('#add-table').attr({ class:"bg-"+tipo }); 
                        
                            x++;
                        });
                        
                        }
                        else{
                            var $tr = 
                            $('<tr>').append(
                                $('<td>').text("No se tienes actividades pendientes...").attr({ colspan:"3" })
                                ).appendTo('#add-table').attr({ class:"bg-info" }); 
                        }
                },
                error: function(xhr, status) {
                    $("#resultado1").hide();
                    $("#resultado").show();
                    $('select#seccion').prop( "disabled", true );
                    $('#enviar').prop( "disabled", true );
                    $("select#seccion option").remove(); 
                    $("select#seccion").append( 
                        $("<option></option>") 
                            .text("Ocurrio un error inprevisto... reinicie la pagina.")
                    );
                }
            });
        });
    });
    </script>

        
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
    $('#listo').delay(1500).fadeIn(400);
    });
    </script>
</body>
</html>