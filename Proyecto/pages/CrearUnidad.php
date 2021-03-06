<?php session_start();
error_reporting(0);
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
       
      if(isset($_SESSION["editar"])){
       $titu = $_SESSION["editar"];
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
    <title>Unidad de aprendizaje</title>

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

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <script src="../js/jquery.validate.min.js"></script>
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
              <?php if(!(isset($_COOKIE["recursosdidacticos"]) || isset($_SESSION["NuevaUnidad"]) || isset($_SESSION["editar"]))):?>
                <a class="navbar-brand" style="margin-left: 10px" href="indexDocente.php"><img src="img/logo.PNG" class="imagelogo" alt="" height="100" width="200"/></a>
              <?php else:?>
                <a data-toggle="modal" data-target="#myModal" class="navbar-brand" style="margin-left: 10px" href="#"><img src="img/logo.PNG" class="imagelogo" alt="" height="100" width="200"/></a>
              <?php endif;?>
                <h4 class="navbar-text navbar-right pull-right titulolandscape" style="margin-top: 30px; margin-right: 80px"><?php if(isset($_SESSION["editar"])):?> Editar Unidad <?php else:?> Crear Unidad <?php endif;?></h4>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav navbar-right hidden-xs" style="margin-top: 80px; margin-right: 0px">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-fw"></i> <?php echo $docente["nombre"]; ?> <i class="fa fa-caret-down"></i></a>
                  <ul class="dropdown-menu">
                    <li><?php if(!(isset($_COOKIE["recursosdidacticos"]) || isset($_SESSION["NuevaUnidad"]) || isset($_SESSION["editar"]))):?>
                      <a href="Perfil.php"><i class="fa fa-gear fa-fw"></i> Configuracion</a>
                    <?php else:?>
                      <a data-toggle="modal" data-target="#myModal" href="#"><i class="fa fa-gear fa-fw"></i> Configuracion</a>
                    <?php endif;?></li>
                    <?php if($docente["admin"]==1): ?>
                    <li>
                    <?php if(!(isset($_COOKIE["recursosdidacticos"]) || isset($_SESSION["NuevaUnidad"]) || isset($_SESSION["editar"]))):?>
                      <a href="indexAdmin.php"><i class="fa fa-gear fa-fw"></i>&nbsp;Cambiar a Administrador</a>
                    <?php else:?>
                      <a data-toggle="modal" data-target="#myModal" href="#"><i class="fa fa-gear fa-fw"></i>&nbsp;Cambiar a Administrador</a>
                    <?php endif;?>
                     </li>
                    <?php endif; ?>
                    <li role="separator" class="divider"></li>
                    <li><?php if(!(isset($_COOKIE["recursosdidacticos"]) || isset($_SESSION["NuevaUnidad"]) || isset($_SESSION["editar"]))):?>
                      <a href="php/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout/Salir</a>
                    <?php else:?>
                      <a data-toggle="modal" data-target="#myModal" href="#"><i class="fa fa-sign-out fa-fw"></i> Logout/Salir</a>
                    <?php endif;?></li>
                  </ul>
                </li>
              </ul>
              <h1 class="navbar-text navbar-right" style="margin-top: 50px; margin-right: 80px"><?php if(isset($_SESSION["editar"])):?> Editar Unidad <?php else:?> Crear Unidad <?php endif;?></h1> 
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
                        Menu Docente
                    </a>
                </li>
                <li> 
                      <?php if(!(isset($_COOKIE["recursosdidacticos"]) || isset($_SESSION["NuevaUnidad"]) || isset($_SESSION["editar"]))):?>
                          <a href="indexDocente.php">Inicio</a>
                      <?php else:?>
                          <a data-toggle="modal" data-target="#myModal" href="#">Inicio</a>
                      <?php endif;?>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Actividades<i class="fa fa-caret-down"></i></a>
                  <ul class="dropdown-menu">
                    <li class="active"><?php if(!(isset($_COOKIE["recursosdidacticos"]) || isset($_SESSION["NuevaUnidad"]) || isset($_SESSION["editar"]))):?>
                          <a href="CrearUnidad.php">Crear una actividad</a>
                        <?php else:?>
                          <a data-toggle="modal" data-target="#myModal" href="#">Crear una actividad</a>
                        <?php endif;?></li>
                    <li><?php if(!(isset($_COOKIE["recursosdidacticos"]) || isset($_SESSION["NuevaUnidad"]) || isset($_SESSION["editar"]))):?>
                          <a href="Biblioteca.php">Ir a biblioteca</a>
                        <?php else:?>
                          <a data-toggle="modal" data-target="#myModal" href="#">Ir a biblioteca</a>
                        <?php endif;?></li>
                    <li class="dropdown-header">Recuerda</li>
                    <li><?php if(!(isset($_COOKIE["recursosdidacticos"]) || isset($_SESSION["NuevaUnidad"]) || isset($_SESSION["editar"]))):?>
                        <a href="cursos.php">Crear Asignatura o Sección</a>
                    <?php else:?>
                      <a data-toggle="modal" data-target="#myModal" href="#">Crear Asignatura o Sección</a>
                    <?php endif;?></li>
                  </ul>
                </li>
                <li> 
                    <?php if(!(isset($_COOKIE["recursosdidacticos"]) || isset($_SESSION["NuevaUnidad"]) || isset($_SESSION["editar"]))):?>
                      <a href="Evaluar.php">Evaluar Proyectos</a>
                    <?php else:?>
                      <a data-toggle="modal" data-target="#myModal" href="#">Evaluar Proyectos</a>
                    <?php endif;?>
                </li>
                <li> 
                    <?php if(!(isset($_COOKIE["recursosdidacticos"]) || isset($_SESSION["NuevaUnidad"]) || isset($_SESSION["editar"]))):?>
                      <a href="Biblioteca.php">Biblioteca</a>
                    <?php else:?>
                      <a data-toggle="modal" data-target="#myModal" href="#">Biblioteca</a>
                    <?php endif;?>
                </li>
                <li class="dropdown hidden-lg hidden-md">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-fw"></i><span class="sidebar-nav-item"><?= $docente["nombre"]; ?></span><i class="fa fa-caret-down"></i></a>
                  <ul class="dropdown-menu">
                    <li><?php if(!(isset($_COOKIE["recursosdidacticos"]) || isset($_SESSION["NuevaUnidad"]) || isset($_SESSION["editar"]))):?>
                      <a href="Perfil.php"><i class="fa fa-gear fa-fw"></i><span class="sidebar-nav-item">Configuración</span></a>
                    <?php else:?>
                      <a data-toggle="modal" data-target="#myModal" href="#"><i class="fa fa-gear fa-fw"></i><span class="sidebar-nav-item">Configuración</span></a>
                    <?php endif;?>
                    </li>
                    <?php if($docente["admin"]==1): ?>
                    <li>
                    <?php if(!(isset($_COOKIE["recursosdidacticos"]) || isset($_SESSION["NuevaUnidad"]) || isset($_SESSION["editar"]))):?>
                      <a href="indexAdmin.php"><i class="fa fa-gear fa-fw"></i><span class="sidebar-nav-item">Cambiar a Administrador</span></a>
                    <?php else:?>
                      <a data-toggle="modal" data-target="#myModal" href="#"><i class="fa fa-gear fa-fw"></i><span class="sidebar-nav-item">Cambiar a Administrador</span></a>
                    <?php endif;?>
                     </li>
                    <?php endif; ?>
                    <li>
                    <?php if(!(isset($_COOKIE["recursosdidacticos"]) || isset($_SESSION["NuevaUnidad"]) || isset($_SESSION["editar"]))):?>
                      <a href="php/logout.php"><i class="fa fa-sign-out fa-fw"></i><span class="sidebar-nav-item">Logout/Salir</span></a>
                    <?php else:?>
                      <a data-toggle="modal" data-target="#myModal" href="#"><i class="fa fa-sign-out fa-fw"></i><span class="sidebar-nav-item">Logout/Salir</span></a>
                    <?php endif;?>
                    </li>
                  </ul>
                </li>
            </ul>
        </div>
        </nav>
        </div> 
        
        <?php  if(isset($_GET["SinTerminar"])): if($_GET["SinTerminar"]==1):?>
        <div class="alert alert-danger">
           <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
           <p class="text-center"><strong>Error, </strong> no has guardado o finalizado el proceso.</p>
        </div>
        <?php endif; endif;?>
        <?php  if(isset($_GET["SinTerminar"])): if($_GET["SinTerminar"]==2):?>
        <div class="alert alert-danger">
           <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
           <p class="text-center"><strong>Error, </strong> no has editado o finalizado el proceso.</p>
        </div>
        <?php endif; endif;?>
        <div class="hidden-xs hidden-sm">
            <br/>
        </div>
        <div id="page-content-wrapper content">
          <div class="container separate-rows tall-rows">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                            <div class="row">
                                <form action="php/creacionUnidad.php" method="POST" id="formulario" autocomplete="off">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="panel panel-default" id="contenido">
                                      <div class="panel-heading">
                                    <br/>
                                    <label>Titulo</label>
                                    <div class="text-center">
                                        
                                    <?php if(isset($_SESSION["editar"])):?>
                                    <input style="text-align: center;" class="form-control" type="text" name="nameActivity" value="<?= $titu["unidad"]["Titulo"] ?>" placeholder="Ingrese aquí el titulo" readonly="true"/>
                                    <p style="font-weight:bold;">Modo editar no se puede cambiar el nombre solamente su contenido.</p>
                                    <?php elseif(isset($_COOKIE["recursosdidacticos"]) || isset($_SESSION["NuevaUnidad"])):?>
                                    <input style="text-align: center;" class="form-control" type="text" name="nameActivity" value="<?php if(isset($_COOKIE["titulocreacion"])){echo $_COOKIE["titulocreacion"];}?>" placeholder="Ingrese aquí el titulo" readonly="true"/>
                                    <p style="font-weight:bold;">Para cambiar de nombre debes volver al portal docente cancelar la creacion de esta unidad, perdiendo todo lo avanzado.</p>
                                    <?php else:?>
                                    <input style="text-align: center;" class="form-control" type="text" name="nameActivity" value="<?php if(isset($_COOKIE["titulocreacion"])){echo $_COOKIE["titulocreacion"];}?>" placeholder="Ingrese aquí el titulo"/>
                                    <p style="font-weight:bold;">Una vez sea agregado los documentos, ppt, txt entre otros.<br/> No podras cambiar el título.</p>
                                    <?php endif;?>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="clearfix visible-xs"></div>
                                <div class="col-xs-12 text-center">
                                    <div class="hidden-lg hidden-md hidden-sm ">
                                    <?php if(isset($_SESSION["editar"])):?>
                                        <button name="boton1" type="submit" class="btn btn-default btn-lg btn-block"><i class="fa fa-sitemap fa-fw" aria-hidden="true"></i> Editar Recursos<br> (Premium) </button>
                                    <br/>
                                    <?php else:?>
                                        <button name="boton1" type="submit" class="btn btn-default btn-lg btn-block"><i class="fa fa-sitemap fa-fw" aria-hidden="true"></i> Agregar Recursos<br> (Premium)</button>
                                    <br/>
                                    <?php endif;?>
                                    </div>
                                    <div class="hidden-xs">
                                    <?php if(isset($_SESSION["editar"])):?>
                                        <button name="boton1" type="submit" class="btn btn-default btn-lg btn-block"><i class="fa fa-sitemap fa-fw" aria-hidden="true"></i> Editar Recursos Didácticos (Premium)</button>
                                    <br/>
                                    <?php else:?>
                                        <button name="boton1" type="submit" class="btn btn-default btn-lg btn-block"><i class="fa fa-sitemap fa-fw" aria-hidden="true"></i> Agregar Recursos Didácticos (Premium)</button>
                                    <br/>
                                    <?php endif;?>
                                    </div>
                                </div>

                                <div class="clearfix visible-xs"></div>

                                <div class="col-xs-12 text-center">
                                    <div class="hidden-lg hidden-md hidden-sm">
                                    
                                    <?php if(isset($_SESSION["editar"])):?>
                                        <button formaction="php/creacionUnidad.php?action=2" name="boton2" type="submit" class="btn btn-success btn-lg btn-block"><i class="fa fa-floppy-o fa-fw" aria-hidden="true"></i> Guardar Unidad<br> (Gratuito)</button>
                                    <br/>
                                    <?php else:?>
                                        <button formaction="php/creacionUnidad.php?action=1" name="boton2" type="submit" class="btn btn-success btn-lg btn-block"><i class="fa fa-floppy-o fa-fw" aria-hidden="true"></i> Guardar Unidad<br> (Gratuito)</button>
                                    <br/>
                                    <?php endif;?>
                                    </div>
                                    <div class="hidden-xs">
                                    <?php if(isset($_SESSION["editar"])):?>
                                        <button formaction="php/creacionUnidad.php?action=2" name="boton2" type="submit" class="btn btn-success btn-lg btn-block"><i class="fa fa-floppy-o fa-fw" aria-hidden="true"></i> Guardar Unidad de aprendizaje (Gratuito)</button>
                                    <br/>
                                    <?php else:?>
                                        <button formaction="php/creacionUnidad.php?action=1" name="boton2" type="submit" class="btn btn-success btn-lg btn-block"><i class="fa fa-floppy-o fa-fw" aria-hidden="true"></i> Guardar Unidad de aprendizaje (Gratuito)</button>
                                    <br/>
                                    <?php endif;?>
                                    </div>
                                </div>

                                <div class="col-xs-12 text-center">
                                    <?php if(!(isset($_COOKIE["recursosdidacticos"]) || isset($_SESSION["NuevaUnidad"]) || isset($_SESSION["editar"]))):?> 
                                    <a name="btn3" class="btn btn-primary btn-lg btn-block" href="indexDocente.php"><i class="fa fa-undo fa-1x fa-fw" aria-hidden="true"></i> Volver al Portal</a>
                                    <?php else:?>
                                    <a data-toggle="modal" data-target="#myModal" name="btn3" class="btn btn-primary btn-lg btn-block"><i class="fa fa-undo fa-1x fa-fw" aria-hidden="true"></i> Volver al Portal</a>
                                    <?php endif;?>
                                    <br/>
                                    <br/>
                                    <?php if(isset($_GET['error'])):
                                            if($_GET['error']=="1"):?>
                                               <div class="alert alert-warning">";
                                               <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                               <strong>Error, </strong> debe ingresar un nombre al recurso didáctico.
                                               </div>
                                    <?php endif;endif;?>
                                    <br/>
                                </div>
                                </form>
                                <form action="php/creacionUnidad.php" method="POST" autocomplete="off">
                                 <!-- Modal -->
                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title" id="myModalLabel">Advertencia aún no guarda el contenido</h4>
                                                </div>
                                                <div class="modal-body">
                                                    ¿Está seguro en salir, sin guardar?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">No, quiero volver.</button>
                                                    <button type="submit" class="btn btn-primary" formaction="php/creacionUnidad.php?action=0">Sí, seguro.</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
                                </form>
                                <div class="clearfix visible-xs"></div>
                            </div>
                        </div>
                        <div class="hidden-xs hidden-sm col-md-4 col-lg-4">
                            <span class="btn-block text-center"><img src="img/actividadcrear.png" alt=""/></span>
                        </div>
                        </div>
                </div>
            </div>
        </div>
      </div>
    </div>
        
    <?php if(!isset($_COOKIE["recursosdidacticos"])):?>
    <script>
          $.validator.setDefaults({
            errorElement: "span",
            errorClass: "help-block",
            highlight: function(element) {
                $(element).parent().removeClass('has-success').addClass('has-error');
            },
            unhighlight: function(element) {
                $(element).parent().removeClass('has-error').addClass('has-success');
            },
            errorPlacement: function (error, element) {
                if (element.parent('.input-group').length || element.prop('type') === 'checkbox' || element.prop('type') === 'radio') {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            }
            });
            
            $("#formulario").validate({
            rules: {
                'nameActivity': {
                    required: true,
                    maxlength: 20
                }
            },
           messages: {
                'nameActivity': {
                    required: "Ingrese un Titulo.",
                    maxlength: "A superado el numero de caracter.."
                }
            }
        });
    </script>
    <?php endif;?>
    
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
