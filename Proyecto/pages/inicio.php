<?php session_start(); 
  if(!isset($_SESSION["docente"]))
      { 
        if(isset($_SESSION["alumno"]))
        {
          header("location: ../pages/indexAlumno.php");
          die();
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
    
    <title>Heuristica Movil</title>
    
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
        
        <nav class="navbar navbar-default navbar-fixed-top" id="nav1" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" style="margin-left: 10px" href="#"><img src="img/logo.PNG" class="imagelogo" alt="" height="100" width="200"/></a>
                </div>
            </div>
        </nav>
        
        <div class="espacio"></div>
        
        <div id="buttoncolgando" style="display: none; position: fixed; z-index: 801; border:none; top: 0; left: 45%; width: 50px;">
            <button type="button" class="btn btn-link" id="imagebutton" ><img src="img/buttontop.png" width="45px" height="45px"/></button>
        </div>
        
        <div class="container">
            <div class="row">
                <div id="warnning">
                    <a class="btn" id="help1" data-placement="right" title="Nueva actualización 26/07/2016:">
                        <span class="fa-stack fa-lg" style="z-index: 801; width: 100%">
                          <i class="fa fa-exclamation-triangle shake text-danger"></i>
                        </span>
                    </a>
                    <div id="popover_content_wrapper" style="display: none">
                      <div>
                            <ul>
                                <li style="font-size: 16px">Estudiante anonimo:<span style="color: green;">Habilitado</span></li>
                                <li style="font-size: 16px">Barra de navegacion, se actualiza y se esconde cuando la pantalla se mueva hacia abajo y para volver a la normalidad hay que apretar el boton transparente:<span style="color: green;">Habilitado</span></li>
                                <li style="font-size: 16px">Todas las paginas tienen modo carga:<span style="color: green;">Habilitado</span></li>
                                <li style="font-size: 16px">Todas las paginas tienen carga asíncrona:<span style="color: green;">Habilitado</span></li>
                                <li style="font-size: 16px">Se agregan mas avisos en anonimo.</li>
                                <li style="font-size: 16px">Se corrigieron errores de tipado y algunos errores de base de dato.</li>
                            </ul>
                      </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="row" id="paso1">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <!-- Botones donde se dirige -->
                            <br/>
                            <div class="row">
                                <div class="center-block repo">
                                   <a class="btn" id="profe"><img src="img/docente.png" class="img-thumbnail img-circle hidden-xs" height="180" width="180" alt=""/><img src="img/docente.png" class="img-thumbnail img-circle hidden-sm hidden-md hidden-lg" height="120" width="120" alt=""/></a>
                                </div>
                            </div>
                            <p class="text-center lead">Profesor</p>
                        </div>
                        <div class="col-xs-6 col-sm-6  col-md-6 col-lg-6">
                            <!-- Botones donde se dirige -->
                            <br/>
                            <div class="row">
                                <div class="center-block repo">
                                    <a class="btn" id="alu"><img src="img/alumno.png" class="img-thumbnail img-circle hidden-xs" height="180" width="180" alt=""/><img src="img/alumno.png" class="img-thumbnail img-circle hidden-sm hidden-md hidden-lg" height="120" width="120" alt=""/></a>
                                </div>
                            </div>
                            <p class="text-center lead">Estudiante</p>
                        </div>
                    </div>
                    <div class="row" id="paso2">
                        <div class="hidden-xs hidden-sm col-md-5 col-lg-5">
                            <!-- Botones donde se dirige -->
                            <br/>
                            <div class="row">
                                <div class="center-block" style="width:190px; height: 190px">
                                  <a><img src="img/docente.png" id="profe" class="img-thumbnail img-circle" height="180" width="180" alt=""/></a>
                                </div>
                            </div>
                            <p class="text-center lead">Profesor</p>
                        </div>
                        <div class="col-xs-12 col-sm-12  col-md-7 col-lg-7">
                            <!-- Botones donde se dirige -->
                            <form role="form" method="POST" action="php/loginDocente.php">
                                    <fieldset>
                                    <legend><h1>Acceso Docente:</h1></legend>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-user fa-fw" aria-hidden="true"></i>
                                            </span>
                                            <input class="form-control" placeholder="E-mail" name="email" id="email" type="email" autofocus>
                                        </div> 
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-key fa-fw" aria-hidden="true"></i>
                                            </span>
                                            <input class="form-control" placeholder="Password" name="password" id="password" type="password" value="">
                                        </div>                               
                                    </div>
<!--                                    <div class="checkbox">
                                        <label>
                                            <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                        </label>
                                    </div>-->

                                    <!-- Change this to a button or input when using this as a form -->
                                    <button type="submit" class="btn btn-lg btn-success btn-block"><i class="fa fa-sign-in fa-1x fa-fw" aria-hidden="true"></i> Ingresar</button>
                                    <button type="button" id="crear1" class="btn btn-lg btn-primary btn-block"><i class="fa fa-user-plus fa-1x fa-fw" aria-hidden="true"></i> Crear Cuenta</button>
                                    <button type="button" class="btn btn-lg btn-primary btn-block opened"><i class="fa fa-arrow-left fa-1x fa-fw" aria-hidden="true"></i> Atrás</button>
                                    </fieldset>

                                    <?php	
                                    if(isset($_GET['error'])):
                                        if($_GET['error']=="error"): ?>
                                            <div class='alert alert-warning text-center'>
                                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                            <strong>Error, </strong> ingrese nuevamente su correo y su contraseña.
                                            </div>
                                    <?php endif; endif;?>
                                    <?php	
                                    if(isset($_GET['exito4'])):
                                        if($_GET['exito4']=="1"): ?>
                                            <div class='alert alert-success text-center'>
                                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                            Su cuenta se ha creado con <strong>exito!!!</strong>, ahora ingrese.
                                            </div>
                                    <?php endif; endif;?>
                            </form>
                        </div>
                    </div>
                    <div class="row" id="paso3">
                        <div class="hidden-xs hidden-sm col-md-5 col-lg-5">
                            <!-- Botones donde se dirige -->
                            <br/>
                            <div class="row">
                                <div class="center-block" style="width:190px; height: 190px">
                                   <a class="center-block"><img src="img/alumno.png" id="alu" class="img-thumbnail img-circle" height="180" width="180" alt=""/></a>
                                </div>
                            </div>
                            <p class="text-center lead">Estudiante</p>
                        </div>
                        <div class="col-xs-12 col-sm-12  col-md-7 col-lg-7">
                            <!-- Botones donde se dirige -->
                                <fieldset>
                                    <legend><h1>Estudiante:</h1></legend>
                                    <div class="form-group">
                                        <button type="button" id="useralum" class="btn btn-lg btn-primary btn-block"><i class="fa fa-sign-in fa-1x fa-fw" aria-hidden="true"></i> Ingresar como estudiante.</button>
                                        <button type="button" id="useranom" class="btn btn-lg btn-primary btn-block"><i class="fa fa-sign-in fa-1x fa-fw" aria-hidden="true"></i> Ingresar como anónimo.</button>
                                        <button type="button" class="btn btn-lg btn-primary btn-block opened"><i class="fa fa-arrow-left fa-1x fa-fw" aria-hidden="true"></i> Atrás</button>
                                    </div>
                        </div>
                    </div>
                    <div class="row" id="paso4">
                        <div class="hidden-xs hidden-sm col-md-5 col-lg-5">
                            <!-- Botones donde se dirige -->
                            <br/>
                            <div class="row">
                                <div class="center-block" style="width:190px; height: 190px">
                                   <a class="center-block"><img src="img/alumno.png" id="alu" class="img-thumbnail img-circle" height="180" width="180" alt=""/></a>
                                </div>
                            </div>
                            <p class="text-center lead">Estudiante</p>
                        </div>
                        <div class="col-xs-12 col-sm-12  col-md-7 col-lg-7">
                            <!-- Botones donde se dirige -->
                            <form role="form" method="POST" action="php/loginAlumno.php">
                                <fieldset>
                                    <legend><h1>Acceso Estudiante:</h1></legend>
                                    <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user fa-fw" aria-hidden="true"></i>
                                        </span>
                                        <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-key fa-fw" aria-hidden="true"></i>
                                        </span>
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                        </div> 
                                    </div>
<!--                                    <div class="checkbox">
                                        <label>
                                            <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                        </label>
                                    </div>-->

                                    <!-- Change this to a button or input when using this as a form -->
                                    <button type="submit" class="btn btn-lg btn-success btn-block"><i class="fa fa-sign-in fa-1x fa-fw" aria-hidden="true"></i> Ingresar</button>
                                    <button type="button" id="crear" class="btn btn-lg btn-primary btn-block"><i class="fa fa-user-plus fa-1x fa-fw" aria-hidden="true"></i> Crear Cuenta</button>
                                    <button type="button" class="btn btn-lg btn-primary btn-block opened1"><i class="fa fa-arrow-left fa-1x fa-fw" aria-hidden="true"></i> Atrás</button>
                                    </fieldset>
                                    <br/>
                                    <?php	
                                    if(isset($_GET['error1'])):
                                        if($_GET['error1']=="error"):?>
                                            <div class='alert alert-warning text-center'>
                                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                            <strong>Error, </strong> ingrese nuevamente su correo y su contraseña.
                                            </div> 
                                    <?php endif; endif;?>
                                    
                                    <?php	
                                    if(isset($_GET['error1'])):
                                        if($_GET['error1']=="50"):?>
                                            <div class='alert alert-warning text-center'>
                                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                            El usuario ingresado era un usuario: <strong> Registrado</strong>.
                                            </div> 
                                    <?php endif; endif;?>

                                    <?php	
                                    if(isset($_GET['exito1'])):
                                        if($_GET['exito1']==1): ?>
                                            <div class='alert alert-success text-center'>
                                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                            Se ha podido <strong>Actualizar</strong> el alumno, ahora ingrese.
                                            </div>
                                    <?php endif; endif;?>
                            </form>
                        </div>
                    </div>
                    <div class="row" id="paso5">
                        <div class="hidden-xs hidden-sm col-md-5 col-lg-5">
                            <!-- Botones donde se dirige -->
                            <br/>
                            <div class="row">
                                <div class="center-block" style="width:190px; height: 190px">
                                   <a class="center-block"><img src="img/alumno.png" id="alu" class="img-thumbnail img-circle" height="180" width="180" alt=""/></a>
                                </div>
                            </div>
                            <p class="text-center lead">Estudiante</p>
                        </div>
                        <div class="col-xs-12 col-sm-12  col-md-7 col-lg-7">
                            <!-- Botones donde se dirige -->
                            <form role="form" method="POST" id="formAnonimo" action="php/loginAlumno.php?anonim=1">
                                <fieldset>
                                    <legend><h1>Acceso Anónimo:</h1></legend>
                                    <div class="form-group">
                                        <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-key fa-fw" aria-hidden="true"></i>
                                        </span>
                                        <input class="form-control" placeholder="PIN Actividad" name="idactividad" type="text" autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user fa-fw" aria-hidden="true"></i>
                                        </span>
                                        <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user fa-fw" aria-hidden="true"></i>
                                        </span>
                                            <input class="form-control" placeholder="Nombre" id="nombreAnonimo" name="name" type="text" value="" disabled="">
                                        </div> 
                                    </div>
                                    <div class="form-group center-block">
                                        <div class="input-group">
                                            <div class="checkbox-inline">
                                                <label style="padding-left: 100px"><input id="Nuevo" type="checkbox"> ¿Primera vez ingresas como anónimo?</label>
                                            </div>
                                        </div> 
                                    </div>
                                    
                                    <!-- Change this to a button or input when using this as a form -->
                                    <button type="submit" class="btn btn-lg btn-success btn-block"><i class="fa fa-sign-in fa-1x fa-fw" aria-hidden="true"></i> Ingresar</button>
                                    <button type="button" class="btn btn-lg btn-primary btn-block opened1"><i class="fa fa-arrow-left fa-1x fa-fw" aria-hidden="true"></i> Atrás</button>
                                    </fieldset>
                                    <br/>
                                    
                                    <?php	
                                    if(isset($_GET['error3'])):
                                        if($_GET['error3']=="51"):?>
                                            <div class='alert alert-warning text-center'>
                                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                            El email esta registrado como: <strong>Anonimo</strong>, intentalo denuevo.<br/> Consejo: deja la casilla en blanco del nombre y destacha "Mi primera vez".
                                            </div> 
                                    <?php endif; endif;?>
                                    
                                    <?php	
                                    if(isset($_GET['error3'])):
                                        if($_GET['error3']=="100"):?>
                                            <div class='alert alert-danger text-center'>
                                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                            El <strong>nombre</strong> está vacío.
                                            </div> 
                                    <?php endif; endif;?>
                                    
                                    <?php	
                                    if(isset($_GET['error3'])):
                                        if($_GET['error3']=="200"):?>
                                            <div class='alert alert-danger text-center'>
                                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                            El pin de la actividad es:<strong> Incorrecto</strong>.
                                            </div> 
                                    <?php endif; endif;?>
                                    
                                    <?php	
                                    if(isset($_GET['error3'])):
                                        if($_GET['error3']=="40"):?>
                                            <div class='alert alert-danger text-center'>
                                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                            Usuario: <strong>No Registrado</strong>.
                                            </div> 
                                    <?php endif; endif;?>

                            </form>
                        </div>
                    </div>
                    <div class="row" id="paso6">
                        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">                      
                            <form role="form" method="POST" id="formulario" action="php/UsuarioAction.php?user=2&action=2" autocomplete="off">
                                <fieldset>
                                    <legend><h1>Crear Estudiante:</h1></legend>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Codigo de Invitacion" name="codigo" type="text" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Nombre" name="nombre" type="text" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="E-mail" name="email1" type="text" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" id="confiPassword" name="password" type="password" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Confirma password" name="confiPassword" type="password" autofocus required>
                                    </div>
                                    <?php  if(isset($_GET["error2"])): if($_GET["error2"]==1):?>
                                        <div class="alert alert-danger text-center">
                                           <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                           <p class="text-center"><strong>Error, </strong> el usuario existe y fue actualizado.</p>
                                        </div>
                                    <?php endif; endif;?>
                                     <?php  if(isset($_GET["error2"])): if($_GET["error2"]==2):?>
                                        <div class="alert alert-danger text-center">
                                           <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                           <p class="text-center"><strong>Error, </strong> el codigo de invitacion es erronea.</p>
                                        </div>
                                    <?php endif; endif;?>

                                    <!-- Change this to a button or input when using this as a form -->
                                    <button type="submit" class="btn btn-lg btn-success btn-block"><i class="fa fa-user-plus fa-1x fa-fw" aria-hidden="true"></i> Crear</button>
                                    <button type="button" class="btn btn-lg btn-primary btn-block opened2"><i class="fa fa-arrow-left fa-1x fa-fw" aria-hidden="true"></i> Atrás</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                    <div class="row" id="paso7">
                        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">                      
                            <form role="form" method="POST" id="formulario3" action="php/UsuarioAction.php?user=1&action=3" autocomplete="off">
                                <fieldset>
                                    <legend><h1>Crear Docente:</h1></legend>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Nombre" name="nombre" type="text" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="E-mail" name="email1" type="text" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" id="confiPassword1" name="password" type="password" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Confirma password" name="confiPassword" type="password" autofocus required>
                                    </div>
                                    <?php  if(isset($_GET["error4"])): if($_GET["error4"]==1):?>
                                        <div class="alert alert-danger text-center">
                                           <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                           <p class="text-center"><strong>Error, </strong> el usuario existe con ese email.</p>
                                        </div>
                                    <?php endif; endif;?>

                                    <!-- Change this to a button or input when using this as a form -->
                                    <button type="submit" class="btn btn-lg btn-success btn-block"><i class="fa fa-user-plus fa-1x fa-fw" aria-hidden="true"></i> Crear</button>
                                    <button type="button" class="btn btn-lg btn-primary btn-block opened3"><i class="fa fa-arrow-left fa-1x fa-fw" aria-hidden="true"></i> Atrás</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
            <br/>
            <br/>
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
    
    <script>
    $().ready(function(){
        <?php if(isset($_GET['error'])):?>
        $("#paso1").hide();
        $("#paso2").show();
        $("#paso3").hide();
        $("#paso4").hide();
        $("#paso5").hide();
        $("#paso6").hide();
         $("#paso7").hide();
        $("#warnning").hide();
        <?php elseif(isset($_GET['error1']) || isset($_GET['exito1'])):?>
        $("#paso1").hide();
        $("#paso2").hide();
        $("#paso3").hide();
        $("#paso4").show();
        $("#paso5").hide();
        $("#paso6").hide();
         $("#paso7").hide();
        $("#warnning").hide();
        <?php elseif(isset($_GET['error2']) || isset($_GET['exito2'])):?>
        $("#paso1").hide();
        $("#paso2").hide();
        $("#paso3").hide();
        $("#paso4").hide();
        $("#paso5").hide();
        $("#paso6").show();
         $("#paso7").hide();
        $("#warnning").hide();
        <?php elseif(isset($_GET['error3']) || isset($_GET['exito3'])):?>
        $("#paso1").hide();
        $("#paso2").hide();
        $("#paso3").hide();
        $("#paso4").hide();
        $("#paso5").show();
        $("#paso6").hide();
         $("#paso7").hide();
        $("#warnning").hide();
        <?php elseif(isset($_GET['exito4'])):?>
        $("#paso1").hide();
        $("#paso2").show();
        $("#paso3").hide();
        $("#paso4").hide();
        $("#paso5").hide();
        $("#paso6").hide();
        $("#paso7").hide();
        $("#warnning").hide();
        <?php elseif(isset($_GET['error4'])):?>
        $("#paso1").hide();
        $("#paso2").hide();
        $("#paso3").hide();
        $("#paso4").hide();
        $("#paso5").hide();
        $("#paso6").hide();
        $("#paso7").show();
        $("#warnning").hide();
        <?php else:?> 
        $("#paso1").show();
        $("#paso2").hide();
        $("#paso3").hide();
        $("#paso4").hide();
        $("#paso5").hide();
        $("#paso6").hide();
        $("#paso7").hide();
        $("#warnning").show();
        <?php endif;?>
        $("#profe").click(function(){
            $("#paso2").fadeIn("fast");
            $("#paso1").hide();
            $("#paso3").hide();
            $("#paso4").hide();
            $("#paso5").hide();
            $("#paso6").hide();
             $("#paso7").hide();
            $("#warnning").hide();
        });
        $("#alu").click(function(){
            $("#paso3").fadeIn("fast");
            $("#paso4").hide(); 
            $("#paso2").hide();
            $("#paso1").hide();
            $("#paso5").hide();
            $("#paso6").hide();
             $("#paso7").hide();
            $("#warnning").hide();
        });
        $("#crear").click(function(){
            $("#paso4").hide();
            $("#paso3").hide();
            $("#paso2").hide();
            $("#paso1").hide();
            $("#paso5").hide();
            $("#paso6").fadeIn("fast");
            $("#paso7").hide();
            $("#warnning").hide();
        });
        $("#crear1").click(function(){
            $("#paso4").hide();
            $("#paso3").hide();
            $("#paso2").hide();
            $("#paso1").hide();
            $("#paso5").hide();
            $("#paso6").hide();
             $("#paso7").fadeIn("fast");
            $("#warnning").hide();
        });
        $("#useralum").click(function(){
            $("#paso4").fadeIn("fast");
            $("#paso3").hide();
            $("#paso2").hide();
            $("#paso1").hide();
            $("#paso5").hide();
            $("#paso6").hide();
            $("#paso7").hide();
            $("#warnning").hide();
        });
        $("#useranom").click(function(){
            $("#paso4").hide()
            $("#paso3").hide();
            $("#paso2").hide();
            $("#paso1").hide();
            $("#paso5").fadeIn("fast");
            $("#paso6").hide();
            $("#paso7").hide();
            $("#warnning").hide();
        });
        $(".opened").click(function(){
            $("#paso1").fadeIn("fast");
            $("#paso2").hide();
            $("#paso3").hide();
            $("#paso4").hide();
            $("#paso5").hide();
            $("#paso6").hide();
            $("#paso7").hide();
            $("#warnning").show();
        });
        $(".opened1").click(function(){
            $("#paso3").fadeIn("fast");
            $("#paso4").hide(); 
            $("#paso2").hide();
            $("#paso1").hide();
            $("#paso5").hide();
            $("#paso6").hide();
            $("#paso7").hide();
            $("#warnning").hide();
        });
        $(".opened2").click(function(){
            $("#paso3").hide();
            $("#paso4").fadeIn("fast"); 
            $("#paso2").hide();
            $("#paso1").hide();
            $("#paso5").hide();
            $("#paso6").hide();
            $("#paso7").hide();
            $("#warnning").hide();
        });
        $(".opened3").click(function(){
            $("#paso3").hide();
            $("#paso4").hide(); 
            $("#paso2").fadeIn("fast");
            $("#paso1").hide();
            $("#paso5").hide();
            $("#paso6").hide();
            $("#paso7").hide();
            $("#warnning").hide();
        });
    });
    </script>
    <script>
    $(document).ready(function(){
      $('#help1').popover({ 
        html : true,
        content: function() {
          return $('#popover_content_wrapper').html();
        }
      });
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
        $('#Nuevo').click(function() {
            if($('#Nuevo').is(":checked")){
                $('#nombreAnonimo').attr('disabled', false);
            }
            else{
                $('#nombreAnonimo').prop( "disabled", true );
            }
        });
        
        $().ready(function(){
            $('#nombreAnonimo').prop( "disabled", true );
        });
    </script>
    
    <script src="../js/jquery.validate.min.js"></script>
    
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
                'codigo': {
                    required: true,
                    maxlength: 15
                },
                'nombre': {
                    required: true,
                    maxlength: 15,
                    lettersonly: true
                },
                'email1': {
                    required: true,
                    emailnew: true,
                    email: false
                },
                'password': {
                    required: true,
                    maxlength: 15
                },
                'confiPassword': {
                    required: true,
                    maxlength: 20,
                    equalTo: "#confiPassword"
                }
            },
           messages: {
               'codigo': {
                    required: "Ingrese un codigo de creación.",
                    maxlength: "A superado el numero de caracter.."
                },
               'nombre': {
                    required: "Ingrese un nombre.",
                    maxlength: "A superado el numero de caracter.."
                },
                'email1': {
                    required: "Ingrese un email.",
                },
                'password': {
                    required: "Ingrese una password.",
                    maxlength: "A superado el numero de caracter.."
                },             
                'confiPassword': {
                    required: "Vuelva a ingresar la password.",
                    maxlength: "A superado el numero de caracter..",
                    equalTo: "No coincide con la password."
                }
            }
        });
        
        $("#formulario3").validate({
            rules: {
                'nombre': {
                    required: true,
                    maxlength: 15,
                    lettersonly: true
                },
                'email1': {
                    required: true,
                    emailnew: true,
                    email: false
                },
                'password': {
                    required: true,
                    maxlength: 15,
                    minlength: 3
                },
                'confiPassword': {
                    required: true,
                    maxlength: 20,
                    equalTo: "#confiPassword1"
                }
            },
           messages: {
               'nombre': {
                    required: "Ingrese un nombre.",
                    maxlength: "A superado el numero de caracter.."
                },
                'email1': {
                    required: "Ingrese un email.",
                },
                'password': {
                    required: "Ingrese una password.",
                    maxlength: "A superado el numero de caracter..",
                    minlength: "Minimo son 3 caracteres o digitos."
                },             
                'confiPassword': {
                    required: "Vuelva a ingresar la password.",
                    maxlength: "A superado el numero de caracter..",
                    equalTo: "No coincide con la password."
                }
            }
        });
        
        $("#formulario1").validate({
            rules: {
                'nombre': {
                    required: true,
                    maxlength: 15,
                    lettersonly: true
                },
                'email1': {
                    required: true,
                    emailnew: true,
                    email: false
                }
            },
           messages: {
               'nombre': {
                    required: "Ingrese un nombre.",
                    maxlength: "A superado el numero de caracter.."
                },
                'email1': {
                    required: "Ingrese un email.",
                }
            }
        });
        
        $("#formAnonimo").validate({
            rules: {
                'idactividad': {
                    required: true
                },
                'email': {
                    required: true,
                    emailnew: true,
                    email: false
                }
            },
           messages: {
               'idactividad': {
                    required: "Ingrese un PIN.",
                },
                'email': {
                    required: "Ingrese un email.",
                }
            }
        });
        
        jQuery.validator.addMethod("emailnew", function(value, element) {
          return this.optional(element) || /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/.test(value);
        }, "Debe cumplir el formato de un email. Ej: user@dominio.com");
        
        jQuery.validator.addMethod("lettersonly", function(value, element) {
          return this.optional(element) || /^[a-z ]+$/i.test(value);
        }, "Solamente letras, sin acento."); 
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

