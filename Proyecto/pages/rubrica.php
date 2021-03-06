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
        
        if(isset($_SESSION["edita"])){
            
            $rubrica = $_SESSION["edita"];
          
            foreach ($rubrica["tipo"] as $tipo){

            if($tipo["tipos"]==2){
               if(!isset($_SESSION["autoevaluacion"])){
                    foreach ($rubrica["criterio"] as $criterio){
                        for($x = 0;$x<=count($criterio)-1;$x++){
                        if($tipo["idTipoCriterioRubrica"] == $criterio[$x]["TipoCriterioRubrica_idTipoCriterioRubrica"]){
                        $arrey1[$x] = array("id"=> $x, "pregunta"=> $criterio[$x]["Nombre"], "Cambios"=>null, "unico"=>$criterio[$x]["idCriterio"]);}}
                        }
                    $_SESSION["autoevaluacion"] = $arrey1;
                }
            }

            if($tipo["tipos"]==3){
               if(!isset($_SESSION["coevaluacion"])){
                   foreach ($rubrica["criterio"] as $criterio){
                       for($x = 0;$x<=count($criterio)-1;$x++){
                       if($tipo["idTipoCriterioRubrica"] == $criterio[$x]["TipoCriterioRubrica_idTipoCriterioRubrica"]){
                       $arrey2[$x] = array("id"=> $x, "pregunta"=> $criterio[$x]["Nombre"], "Cambios"=>null, "unico"=>$criterio[$x]["idCriterio"]);}}
                    }
                $_SESSION["coevaluacion"] = $arrey2;
                }
            }

            if($tipo["tipos"]==1){
               if(!isset($_SESSION["evaluacion"])){
                    foreach ($rubrica["criterio"] as $criterio){
                        for($x = 0;$x<=count($criterio)-1;$x++){
                            if($tipo["idTipoCriterioRubrica"] == $criterio[$x]["TipoCriterioRubrica_idTipoCriterioRubrica"]){
                            foreach ($rubrica["competencia"] as $competencia){
                                for($y = 0;$y<=count($competencia)-1;$y++){
                                   if($competencia[$y]["Criterio_idCriterio"] == $criterio[$x]["idCriterio"]){         
                                   $arreyi[] = array("Descripcion"=> $competencia[$y]["Descripcion"], "Puntaje"=> $competencia[$y]["Puntaje"], "Cambios"=>null, "CambiosPuntaje"=>null, "id"=> $competencia[$y]["idNivelCompetencia"]);}
                                }   
                            }
                            $arrey[] = array("id"=> $criterio[$x]["idCriterio"], "Criterio"=> $criterio[$x]["Nombre"], "NivelCompetencia"=> $arreyi, "Cambios"=>null);
                            unset($arreyi);
                            } 
                        }
                    } 
                $_SESSION["evaluacion"] = $arrey;
               }
            }
            }
        }
        else{
            if(isset($_SESSION["rubrica"]))
            {
               $rubrica = $_SESSION["rubrica"];

               foreach ($rubrica["tipo"] as $tipo){

                   if($tipo["tipos"]==2){
                       if(!isset($_SESSION["autoevaluacion"])){
                            foreach ($rubrica["criterio"] as $criterio){
                                for($x = 0;$x<=count($criterio)-1;$x++){
                                if($tipo["idTipoCriterioRubrica"] == $criterio[$x]["TipoCriterioRubrica_idTipoCriterioRubrica"]){
                                $arrey1[$x] = array("id"=>$x, "pregunta"=> $criterio[$x]["Nombre"], "unico"=>-1);}}
                                }
                            $_SESSION["autoevaluacion"] = $arrey1;
                        }
                   }

                   if($tipo["tipos"]==3){
                       if(!isset($_SESSION["coevaluacion"])){
                           foreach ($rubrica["criterio"] as $criterio){
                               for($x = 0;$x<=count($criterio)-1;$x++){
                               if($tipo["idTipoCriterioRubrica"] == $criterio[$x]["TipoCriterioRubrica_idTipoCriterioRubrica"]){
                               $arrey2[$x] = array("id"=>$x, "pregunta"=> $criterio[$x]["Nombre"], "unico"=>-1);}}
                            }
                        $_SESSION["coevaluacion"] = $arrey2;
                        }
                   }

                   if($tipo["tipos"]==1){
                       if(!isset($_SESSION["evaluacion"])){
                            foreach ($rubrica["criterio"] as $criterio){
                                for($x = 0;$x<=count($criterio)-1;$x++){
                                    if($tipo["idTipoCriterioRubrica"] == $criterio[$x]["TipoCriterioRubrica_idTipoCriterioRubrica"]){
                                    foreach ($rubrica["competencia"] as $competencia){
                                        for($y = 0;$y<=count($competencia)-1;$y++){
                                           if($competencia[$y]["Criterio_idCriterio"] == $criterio[$x]["idCriterio"]){         
                                           $arreyi[] = array("Descripcion"=> $competencia[$y]["Descripcion"], "Puntaje"=> $competencia[$y]["Puntaje"]);}
                                        }   
                                    }
                                    $arrey[] = array("Criterio"=> $criterio[$x]["Nombre"], "NivelCompetencia"=> $arreyi);
                                    unset($arreyi);
                                    } 
                                }
                            } 
                        $_SESSION["evaluacion"] = $arrey;
                       }
                   }
               }
            }
            else
            {
              header("location: ../pages/error.php?error=404");
              die();
            }
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
    <title>Rubrica</title>

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
    <script src="../component/jquery/dist/jquery.min.js"></script>
    <script src="../component/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../js/jquery.bootstrap.wizard.min.js"></script>
    
    <script>
    $(document).ready(function() {
            $('#rootwizard').bootstrapWizard();
           
            $('#pills').bootstrapWizard({
                 //bloquear los tabs de arriba.
                'tabClass': 'nav nav-tabs'
            });
		window.prettyPrint && prettyPrint()
            //que hace el boton finish
            $('#pills .finish').click(function() {
                <?php if(isset($_SESSION["autoevaluacion"]) && isset($_SESSION["coevaluacion"]) && isset($_SESSION["recursosdidacticos"])): ?>
                    document.getElementById("finalform").submit();
                <?php else: ?>
                    alert('No puedes terminar la unidad lea los requisitos.');
                <?php endif; ?>
	    });
            
            <?php if(isset($_GET["jump"]))
            {
             //permite mostrar que parte del tab cuando genere el post.
             $num = $_GET["jump"];
             echo "$('#pills').bootstrapWizard('show',{$num});";
            }
            ?>
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
                'nombre': {
                    required: true,
                    maxlength: 20,
                    lettersonly: true
                },
                'codigo': {
                    required: true,
                    maxlength: 10,
                    number: true
                }
            },
           messages: {
               'nombre': {
                    required: "Ingrese un nombre.",
                    maxlength: "A superado el numero de caracter.."
                },
                'codigo': {
                    required: "Ingrese un codigo.",
                    maxlength: "A superado el numero de caracter..",
                    number: "Se permite numero..."
                }
            }
        });
        
        jQuery.validator.addMethod("lettersonly", function(value, element) {
          return this.optional(element) || /^[a-z ]+$/i.test(value);
        }, "Solamente letras, sin acento."); 
    </script>
    
    <script>
    $('#myLink').addClass('disabled');
    </script>
    
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
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
                <a class="navbar-brand" style="margin-left: 10px" data-toggle="modal" data-target="#myModal" href="#"><img src="img/logo.PNG" class="imagelogo" alt="" height="100" width="200"/></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav navbar-right hidden-xs" style="margin-top: 80px; margin-right: 0px">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-fw"></i> <?php echo $docente["nombre"]; ?> <i class="fa fa-caret-down"></i></a>
                  <ul class="dropdown-menu">
                    <li><a data-toggle="modal" data-target="#myModal" href="#"><i class="fa fa-gear fa-fw"></i> Configuracion</a></li>
                    <?php if($docente["admin"]==1):?>
                      <li><a data-toggle="modal" data-target="#myModal" href="#"><i class="fa fa-gear fa-fw"></i>&nbsp;Cambiar a Administrador</a></li>
                    <?php endif;?>  
                    <li role="separator" class="divider"></li>
                    <li><a data-toggle="modal" data-target="#myModal" href="#"><i class="fa fa-sign-out fa-fw"></i> Logout/Salir</a></li>
                  </ul>
                </li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </nav>
        
        <div class="espacio"></div>
        
        <div id="buttoncolgando" style="display: none; position: fixed; z-index: 800; border:none; top: 0; left: 45%; width: 50px;">
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
                    <a data-toggle="modal" data-target="#myModal" href="#">Inicio</a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Actividades<i class="fa fa-caret-down"></i></a>
                  <ul class="dropdown-menu">
                    <li><a data-toggle="modal" data-target="#myModal" href="#">Crear una actividad</a></li>
                    <li><a data-toggle="modal" data-target="#myModal" href="#">Ir a biblioteca</a></li>
                    <li class="dropdown-header">Recuerda</li>
                    <li><a data-toggle="modal" data-target="#myModal" href="#">Crear Asignatura o Sección</a></li>
                  </ul>
                </li>
                <li> 
                      <a data-toggle="modal" data-target="#myModal" href="#">Evaluar Proyectos</a>
                </li>
                <li> 
                      <a data-toggle="modal" data-target="#myModal" href="#">Biblioteca</a>
                </li>
                <li class="dropdown hidden-lg hidden-md">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-fw"></i><span class="sidebar-nav-item"><?php echo $docente["nombre"]; ?></span><i class="fa fa-caret-down"></i></a>
                  <ul class="dropdown-menu">
                    <li><a data-toggle="modal" data-target="#myModal" href="#"><i class="fa fa-gear fa-fw"></i><span class="sidebar-nav-item">Configuración</span></a></li>
                    <?php if($docente["admin"]==1):?>
                      <li><a data-toggle="modal" data-target="#myModal" href="#"><i class="fa fa-gear fa-fw"></i><span class="sidebar-nav-item">Cambiar a Administrador</span></a></li>
                    <?php endif;?>
                    <li><a data-toggle="modal" data-target="#myModal" href="#"><i class="fa fa-sign-out fa-fw"></i><span class="sidebar-nav-item">Logout/Salir</span></a></li>
                  </ul>
                </li>
            </ul>
        </div>
        </nav>
        </div>
        
        <?php  if(isset($_GET["error"])): if($_GET["error"]==2):?>
        <div class="alert alert-warning">
           <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
           <p class="text-center"><strong>Error, </strong> ocurrio un algo inesperado.</p>
        </div>
        <?php elseif ($_GET["error"]==3):?>
        <div class="alert alert-warning">
           <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
           <p class="text-center"><strong>Error, </strong> el codigo de seccion ya existe.</p>
        </div>
        <?php endif; endif;?>
        <?php if(isset($_GET["succes"])): if($_GET["succes"]==1):?>
        <div class="alert alert-success">
           <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
           <p class="text-center"><strong>Listo, </strong> se acaba de enviar el email.</p>
        </div>
        <?php endif; endif;?>
        <?php  if(isset($_GET["error"])): if($_GET["error"]==100):?>
        <div class="alert alert-danger">
           <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
           <p class="text-center"><strong>Error, </strong> nombre de rubrica no ingresado.</p>
        </div>
        <?php endif; endif;?>
        <div id="page-content-wrapper content" >
          <div class="container separate-rows tall-rows">
            <div class="row">
                <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-12"> 
                            <section id="wizard">
                                <div class="page-header">
                                <h1>Rubricas</h1>
                                </div>
                                <div id="pills">
                                    <ul>
                                            <li><a href="#tabi1" data-toggle="tab">Editar Autoevaluación</a></li>
                                            <li><a href="#tabi2" data-toggle="tab">Editar Coevaluación</a></li>
                                            <li><a href="#tabi3" data-toggle="tab">Editar Evaluación</a></li>
                                            <?php if(!isset($_SESSION["ver"])): ?>
                                            <li><a href="#tabi4" data-toggle="tab">Guardar Rubrica</a></li>
                                            <?php endif; ?>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane well" id="tabi1" style="overflow-x: auto;">
                                            <table class="table table-bordered" style="min-width:500px" >
                                                <tr>
                                                    <th class="text-center">Seleccionar:</th>
                                                    <th class="text-center">Criterios</th>
                                                    <th class="text-center">Nota</th>
                                                </tr>
                                                <form method="POST" action="php/RubricaEdit.php?pre=1" id="formulario1" autocomplete="off">
                                                    <?php if(isset($_SESSION["autoevaluacion"])):
                                                          $autoeval = $_SESSION["autoevaluacion"];
                                                          foreach($autoeval as $pu): if($pu["unico"]==-1): ?>
                                                    <tr>
                                                    <td style="width: 7%">
                                                        <input class="checkbox" type="checkbox" value="<?= $pu["id"] ?>" name="checklist1[]">
                                                    </td>
                                                    <td style="width: 83%">
                                                        <input class="form-control" type="text" value="<?= $pu["pregunta"]?>" name="preg[]">
                                                    </td>
                                                    <td style="width: 10%">
                                                        <input class="form-control" type="text" value="" name="procedimiento" disabled="true">
                                                    </td>
                                                    </tr>
                                                    <?php else:
                                                          if($pu["Cambios"] == null):?>
                                                    <tr>
                                                    <td style="width: 7%" class="info">
                                                        <input class="checkbox" type="checkbox" value="<?= $pu["id"] ?>" name="checklist1[]">
                                                    </td>
                                                    <td style="width: 83%" class="info">
                                                        <input class="form-control" type="text" value="<?= $pu["pregunta"]?>" name="preg[]">
                                                    </td>
                                                    <td style="width: 10%" class="info">
                                                        <input class="form-control" type="text" value="" name="procedimiento" disabled="true">
                                                    </td>
                                                    </tr>
                                                    <?php elseif($pu["Cambios"] == "Eliminar!!."):?>
                                                    <tr>
                                                    <td style="width: 7%" class="danger">
                                                        <input class="checkbox" type="checkbox" value="<?= $pu["id"] ?>" name="checklist1[]">
                                                    </td>
                                                    <td style="width: 83%" class="danger">
                                                        <div class="input-group">
                                                        <input class="form-control" type="text" value="<?= $pu["pregunta"]?>" name="preg[]">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-danger" formaction="php/RubricaEdit.php?pre=1&a=4&n=<?= $pu["id"] ?>" type="submit">Cancelar</button>
                                                        </span>
                                                        </div>
                                                    </td>
                                                    <td style="width: 10%" class="danger">
                                                        <input class="form-control" type="text" value="" name="procedimiento" disabled="true">
                                                    </td>
                                                    </tr>
                                                    <?php else:?>
                                                    <tr>
                                                    <td style="width: 7%" class="warning">
                                                        <input class="checkbox" type="checkbox" value="<?= $pu["id"] ?>" name="checklist1[]">
                                                    </td>
                                                    <td style="width: 83%" class="warning">
                                                        <div class="input-group">
                                                        <input class="form-control" type="text" value="<?= $pu["Cambios"]?>" name="preg[]">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-danger" formaction="php/RubricaEdit.php?pre=1&a=4&n=<?= $pu["id"] ?>" type="submit">Cancelar</button>
                                                        </span>
                                                        </div>
                                                    </td>
                                                    <td style="width: 10%" class="warning">
                                                        <input class="form-control" type="text" value="" name="procedimiento" disabled="true">      
                                                    </td>
                                                    </tr>
                                                    <?php endif; endif; endforeach; endif;?>
                                                    <tr>
                                                        <td colspan="3">
                                                            <label for="moreinput">Agregar Comentario</label>
                                                            <br/>
                                                            <textarea class="form-control" rows="2" name="procedimiento" disabled="true"></textarea>
                                                        </td>
                                                    </tr>
                                                    <?php if(!isset($_SESSION["ver"])): ?>
                                                    <tr>
                                                        <td colspan="3">
                                                            <div class="form-group">
                                                                <div class="btn-group" role="group" aria-label="..." style="float:right;">
                                                                <button type="submit" formaction="php/RubricaEdit.php?pre=1&a=2" class="btn btn-warning">Guardar</button>
                                                                <button type="submit" formaction="php/RubricaEdit.php?pre=1&a=3" class="btn btn-danger">Eliminar</button>
                                                                </div>
                                                                <p class="help-block" style="float:right;">Selecciona cual quieres eliminar o editar.&nbsp;&nbsp;&nbsp;</p>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>                                                 
                                                        <th colspan="3" class="text-center">Crear Nuevos Criterios</th>
                                                    </tr>
                                                    <tr>                                                 
                                                        <td colspan="3">
                                                            <input class="form-control" type="text" name="preguntas">
                                                        </td>
                                                    </tr>
                                                    <tr>                                                 
                                                        <td colspan="3">
                                                            <div class="form-group">                                                             
                                                                <button type="submit" formaction="php/RubricaEdit.php?pre=1&a=1" class="btn btn-success" style="float:right;">Agregar</button>&nbsp;&nbsp;&nbsp;
                                                                <p class="help-block" style="float:right;">Al guardar se modificara.&nbsp;&nbsp;&nbsp;</p>
                                                                <a name="submit3"></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <?php	
                                                        if(isset($_GET['pre'])):
                                                            if($_GET['pre']=="102"):?>
                                                        <td colspan="3">
                                                                <div class="alert alert-warning">
                                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                <strong>Error, </strong> el nuevo criterio no puede estar en blanco.
                                                                </div>
                                                        </td>
                                                        <?php endif; endif;?>
                                                    </tr>
                                                    <?php else: ?>
                                                    <tr>
                                                        <td colspan="3">
                                                            <div class="text-center">
                                                                <br/>
                                                                    <a class="btn btn-info" href="php/RubricaEdit.php?pre=-1">Volver a Biblioteca</a>
                                                                <br/>
                                                            </div>  
                                                        </td>
                                                    </tr>
                                                    <?php endif; ?>
                                                </form>
                                            </table>
                                        </div>
                                        <div class="tab-pane well" id="tabi2" style="overflow-x: auto;">
                                            <table class="table table-bordered" style="min-width:500px">
                                                <tr>
                                                    <th colspan="2" class="text-center">Criterios</th>
                                                    <th colspan="5" class="text-center">integrantes</th>
                                                </tr>
                                                <tr>
                                                    <th class="text-center">Selecciona:</th>
                                                    <th class="text-center"></th>
                                                    
                                                    <?php // Detecta la cantidad de alumnos estan en la tabla.
                                                          if(isset($_SESSION["tabla"])):
                                                          if($_SESSION["tabla"]==1):?>
                                                        <th class="text-center">1</th>
                                                    <?php elseif($_SESSION["tabla"]==2):?>
                                                        <th class="text-center">1</th>
                                                        <th class="text-center">2</th>
                                                    <?php elseif($_SESSION["tabla"]==3):?>
                                                        <th class="text-center">1</th>
                                                        <th class="text-center">2</th>
                                                        <th class="text-center">3</th>
                                                    <?php elseif($_SESSION["tabla"]==4):?>
                                                        <th class="text-center">1</th>
                                                        <th class="text-center">2</th>
                                                        <th class="text-center">3</th>
                                                        <th class="text-center">4</th>
                                                    <?php elseif($_SESSION["tabla"]==5):?>
                                                        <th class="text-center">1</th>
                                                        <th class="text-center">2</th>
                                                        <th class="text-center">3</th>
                                                        <th class="text-center">4</th>
                                                        <th class="text-center">5</th>
                                                    <?php endif; else:?>
                                                        <th class="text-center">1</th>
                                                        <th class="text-center">2</th>
                                                        <th class="text-center">3</th>
                                                    <?php endif;?>
                                                </tr>
                                                <form method="POST" action="php/RubricaEdit.php?pre=2" id="formulario2" autocomplete="off">
                                                        <?php // Meter un for para mostrar la cantidad de criterios e integrantes.
                                                              if(isset($_SESSION["tabla"])):
                                                              if($_SESSION["tabla"]==1):
                                                              if(isset($_SESSION["coevaluacion"])):
                                                              $autoeval = $_SESSION["coevaluacion"];
                                                              foreach($autoeval as $pu):?>
                                                        <tr>
                                                        <td style="width: 7%">
                                                            <input class="checkbox" type="checkbox" value="<?= $pu["id"] ?>" name="checklist[]">
                                                        </td>
                                                        <td style="width: 86%">
                                                            <input class="form-control" type="text" value="<?= $pu["pregunta"]?>" name="preg[]">
                                                        </td>
                                                        <td style="width: 7%">
                                                            <input class="form-control" type="text" value="" name="procedimiento" disabled="true">
                                                        </td>
                                                        </tr>
                                                        <?php endforeach; endif; elseif($_SESSION["tabla"]==2):
                                                              if(isset($_SESSION["coevaluacion"])):
                                                              $autoeval = $_SESSION["coevaluacion"];
                                                              foreach($autoeval as $pu):?>
                                                        <tr>
                                                            <td style="width: 7%">
                                                                <input class="checkbox" type="checkbox" value="<?= $pu["id"] ?>" name="checklist[]">
                                                            </td>
                                                            <td style="width: 79%">
                                                                <input class="form-control" type="text" value="<?= $pu["pregunta"]?>" name="preg[]">
                                                            </td>
                                                            <td style="width: 7%">
                                                                <input class="form-control" type="text" value="" name="procedimiento" disabled="true">
                                                            </td>
                                                            <td style="width: 7%">
                                                                <input class="form-control" type="text" value="" name="procedimiento" disabled="true">
                                                            </td>
                                                        </tr>
                                                        <?php endforeach; endif; elseif($_SESSION["tabla"]==4):
                                                              if(isset($_SESSION["coevaluacion"])):
                                                              $autoeval = $_SESSION["coevaluacion"];
                                                              foreach($autoeval as $pu):?>
                                                        <tr>
                                                        <td style="width: 7%">
                                                            <input class="checkbox" type="checkbox" value="<?= $pu["id"] ?>" name="checklist[]">
                                                        </td>
                                                        <td style="width: 65%">
                                                            <input class="form-control" type="text" value="<?= $pu["pregunta"]?>" name="preg[]">
                                                        </td>
                                                        <td style="width: 7%">
                                                            <input class="form-control" type="text" value="" name="procedimiento" disabled="true">
                                                        </td>
                                                        <td style="width: 7%">
                                                            <input class="form-control" type="text" value="" name="procedimiento" disabled="true">
                                                        </td>
                                                        <td style="width: 7%">
                                                            <input class="form-control" type="text" value="" name="procedimiento" disabled="true">
                                                        </td>
                                                        <td style="width: 7%">
                                                            <input class="form-control" type="text" value="" name="procedimiento" disabled="true">
                                                        </td>
                                                        </tr>
                                                        <?php endforeach; endif; elseif($_SESSION["tabla"]==5):
                                                              if(isset($_SESSION["coevaluacion"])):
                                                              $autoeval = $_SESSION["coevaluacion"];
                                                              foreach($autoeval as $pu):?>
                                                        <tr>
                                                        <td style="width: 7%">
                                                            <input class="checkbox" type="checkbox" value="<?= $pu["id"] ?>" name="checklist[]">
                                                        </td>
                                                        <td style="width: 58%">
                                                            <input class="form-control" type="text" value="<?= $pu["pregunta"]?>" name="preg[]">
                                                        </td>
                                                        <td style="width: 7%">
                                                            <input class="form-control" type="text" value="" name="procedimiento" disabled="true">
                                                        </td>
                                                        <td style="width: 7%">
                                                            <input class="form-control" type="text" value="" name="procedimiento" disabled="true">
                                                        </td>
                                                        <td style="width: 7%">
                                                            <input class="form-control" type="text" value="" name="procedimiento" disabled="true">
                                                        </td>
                                                        <td style="width: 7%">
                                                            <input class="form-control" type="text" value="" name="procedimiento" disabled="true">
                                                        </td>
                                                        <td style="width: 7%">
                                                            <input class="form-control" type="text" value="" name="procedimiento" disabled="true">
                                                        </td>
                                                        </tr>
                                                        <?php endforeach; endif; elseif($_SESSION["tabla"]==3):
                                                               if(isset($_SESSION["coevaluacion"])):
                                                              $autoeval = $_SESSION["coevaluacion"];
                                                              foreach($autoeval as $pu):?>
                                                        <tr>
                                                        <td style="width: 7%">
                                                            <input class="checkbox" type="checkbox" value="<?= $pu["id"] ?>" name="checklist[]">
                                                        </td>
                                                        <td style="width: 72%">
                                                            <input class="form-control" type="text" value="<?= $pu["pregunta"]?>" name="preg[]">
                                                        </td>
                                                        <td style="width: 7%">
                                                            <input class="form-control" type="text" value="" name="procedimiento" disabled="true">
                                                        </td>
                                                        <td style="width: 7%">
                                                            <input class="form-control" type="text" value="" name="procedimiento" disabled="true">
                                                        </td>
                                                        <td style="width: 7%">
                                                            <input class="form-control" type="text" value="" name="procedimiento" disabled="true">
                                                        </td>
                                                        </tr>
                                                        <?php endforeach; endif; endif; 
                                                              else:
                                                              if(isset($_SESSION["coevaluacion"])):
                                                              $autoeval = $_SESSION["coevaluacion"];
                                                              foreach($autoeval as $pu): if($pu["unico"]==-1): ?>       
                                                        <tr>
                                                            <td style="width: 7%">
                                                                <input class="checkbox" type="checkbox" value="<?= $pu["id"] ?>" name="checklist[]">
                                                            </td>
                                                            <td style="width: 72%">
                                                                <input class="form-control" type="text" value="<?= $pu["pregunta"]?>" name="preg[]">
                                                            </td>
                                                            <td style="width: 7%">
                                                                <input class="form-control" type="text" value="" name="procedimiento" disabled="true">
                                                            </td>
                                                            <td style="width: 7%">
                                                                <input class="form-control" type="text" value="" name="procedimiento" disabled="true">
                                                            </td>
                                                            <td style="width: 7%">
                                                                <input class="form-control" type="text" value="" name="procedimiento" disabled="true">
                                                            </td>
                                                        </tr>
                                                        <?php else:
                                                              if($pu["Cambios"] == null):?>
                                                        <tr>
                                                        <td style="width: 7%" class="info">
                                                            <input class="checkbox" type="checkbox" value="<?= $pu["id"] ?>" name="checklist[]">
                                                        </td>
                                                        <td style="width: 72%" class="info">
                                                            <input class="form-control" type="text" value="<?= $pu["pregunta"]?>" name="preg[]">
                                                        </td>
                                                        <td style="width: 7%" class="info">
                                                            <input class="form-control" type="text" value="" name="procedimiento" disabled="true">
                                                        </td>
                                                        <td style="width: 7%" class="info">
                                                            <input class="form-control" type="text" value="" name="procedimiento" disabled="true">
                                                        </td>
                                                        <td style="width: 7%" class="info">
                                                            <input class="form-control" type="text" value="" name="procedimiento" disabled="true">
                                                        </td>
                                                        </tr>
                                                        <?php elseif($pu["Cambios"] == "Eliminar!!."):?>
                                                        <tr>
                                                        <td style="width: 7%" class="danger">
                                                            <input class="checkbox" type="checkbox" value="<?= $pu["id"] ?>" name="checklist[]">
                                                        </td>
                                                        <td style="width: 72%" class="danger">
                                                            <div class="input-group">
                                                            <input class="form-control" type="text" value="<?= $pu["pregunta"]?>" name="preg[]">
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-danger" formaction="php/RubricaEdit.php?pre=2&a=4&n=<?= $pu["id"] ?>" type="submit">Cancelar</button>
                                                            </span>
                                                            </div>
                                                        </td>
                                                        <td style="width: 7%" class="danger">
                                                            <input class="form-control" type="text" value="" name="procedimiento" disabled="true">
                                                        </td>
                                                        <td style="width: 7%" class="danger">
                                                            <input class="form-control" type="text" value="" name="procedimiento" disabled="true">
                                                        </td>
                                                        <td style="width: 7%" class="danger">
                                                            <input class="form-control" type="text" value="" name="procedimiento" disabled="true">
                                                        </td>
                                                        </tr>
                                                        <?php else:?>
                                                        <tr>
                                                        <td style="width: 7%" class="warning">
                                                            <input class="checkbox" type="checkbox" value="<?= $pu["id"] ?>" name="checklist[]">
                                                        </td>
                                                        <td style="width: 72%" class="warning">
                                                            <div class="input-group">
                                                            <input class="form-control" type="text" value="<?= $pu["Cambios"]?>" name="preg[]">
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-danger" formaction="php/RubricaEdit.php?pre=2&a=4&n=<?= $pu["id"] ?>" type="submit">Cancelar</button>
                                                            </span>
                                                            </div>
                                                        </td>
                                                        <td style="width: 7%" class="warning">
                                                            <input class="form-control" type="text" value="" name="procedimiento" disabled="true">
                                                        </td>
                                                        <td style="width: 7%" class="warning">
                                                            <input class="form-control" type="text" value="" name="procedimiento" disabled="true">
                                                        </td>
                                                        <td style="width: 7%" class="warning">
                                                            <input class="form-control" type="text" value="" name="procedimiento" disabled="true">
                                                        </td>
                                                        </tr>
                                                        <?php endif; endif; endforeach; endif; endif;?>
                                                    <tr>
                                                        <td colspan="7">
                                                            <a name="submit4"></a>
                                                            <label for="moreinput">Agregar Comentario</label>
                                                            <br/>
                                                            <textarea class="form-control" rows="2" name="procedimiento" disabled="true"></textarea>
                                                        </td>
                                                    </tr>
                                                    <?php if(!isset($_SESSION["ver"])): ?>
                                                    <tr>
                                                        <td colspan="7">
                                                            <div class="form-group">
                                                                <div class="btn-group" role="group" aria-label="..." style="float:right;">
                                                                <button type="submit" formaction="php/RubricaEdit.php?pre=2&a=2" class="btn btn-warning">Guardar</button>
                                                                <button type="submit" formaction="php/RubricaEdit.php?pre=2&a=3" class="btn btn-danger">Eliminar</button>
                                                                </div>
                                                                <p class="help-block" style="float:right;">Selecciona cual quieres eliminar o editar.&nbsp;&nbsp;&nbsp;</p>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="7" class="text-center">Crear Nuevos Criterios</th>
                                                    </tr>
                                                    <tr>                                                 
                                                        <td colspan="7">
                                                            <input class="form-control" type="text" name="preguntas">
                                                        </td>
                                                    </tr>
                                                    <tr>                                                 
                                                        <td colspan="7">
                                                            <div class="form-group">                                                             
                                                                <button type="submit" formaction="php/RubricaEdit.php?pre=2&a=1" class="btn btn-success" style="float:right;">Agregar</button>&nbsp;&nbsp;&nbsp;
                                                                <p class="help-block" style="float:right;">Al guardar se modificara.&nbsp;&nbsp;&nbsp;</p>
                                                            </div>
                                                        </td>    
                                                    </tr>
                                                    
                                                    <?php if(isset($_GET['pre'])):
                                                            if($_GET['pre']=="103"):?>
                                                    <tr>
                                                        <td colspan="7">
                                                                <div class="alert alert-warning">
                                                                <strong>Error, </strong> el nuevo criterio no puede estar en blanco.
                                                                </div>
                                                        </td>
                                                    </tr>
                                                    <?php endif;endif;?>  
                                                    
                                                    <?php else: ?>
                                                    <tr>                                                 
                                                        <td colspan="7">
                                                            <div class="text-center">
                                                                <br/>
                                                                    <a class="btn btn-info" href="php/RubricaEdit.php?pre=-1">Volver a Biblioteca</a>
                                                                <br/>
                                                            </div> 
                                                        </td>
                                                    </tr>
                                                    <?php endif; ?>
                                                </form>
                                            </table>
                                            <br/>
                                            
                                            <!--a lo mejor usaremos php y no javascript-->
<!--                                            <form method="post" action="php/AvanceDidactico.php?pre=5">
                                            <button type="submit" class="btn btn-primary" style="float:right; margin-top: 44px">Modificar</button>
                                            <div class="row">
                                                <div class="col-xs-2" style="float:right;">
                                                    <label for="textocantidadalumno">Cantidad de alumnos por evaluar</label>
                                                    <input type="text" id="textocantidadalumno" name="cantidad" maxlength="1" onkeypress="return event.charCode >= 49 && event.charCode <= 53" class="form-control">
                                                    <p class="help-block">Modificara la tabla. (Minimo 1 | Maximo 5 )</p>
                                                </div>
                                            </div>
                                            <br/>
                                            </form>-->
                                            
                                        </div>
                                        <div class="tab-pane well" id="tabi3" style="overflow-x: auto;">
                                            <form method="POST" action="php/RubricaEdit.php?pre=3" id="formulario1" autocomplete="off">
                                            <table class="table table-bordered" style="min-width:800px">
                                                <tr>
                                                    <th class="text-center" style="width: 22%;">Criterios</th>
                                                    <?php $a = $_SESSION["evaluacion"];
                                                          foreach($a[0]["NivelCompetencia"] as $key1): 
                                                          if(isset($_SESSION["rubrica"])):?>
                                                    <th><input class="form-control text-center" type="text" value="<?= $key1["Puntaje"]?>" name="puntaje[]"></th>
                                                    <?php else:?>
                                                    <?php if($key1["id"]==-1):?>
                                                    <th><input class="form-control text-center" type="text" value="<?= $key1["Puntaje"]?>" name="puntaje[]"></th>
                                                    <?php else:?>
                                                    <?php if($key1["CambiosPuntaje"]==null):?>
                                                    <th class="info"><input class="form-control text-center" type="text" value="<?= $key1["Puntaje"]?>" name="puntaje[]"></th>
                                                    <?php elseif($key1["CambiosPuntaje"]=="Eliminar!!."):?>
                                                    <th class="danger"><input class="form-control text-center" type="text" value="<?= $key1["Puntaje"]?>" name="puntaje[]"></th>
                                                    <?php else:?>
                                                    <th class="warning"><input class="form-control text-center" type="text" value="<?= $key1["CambiosPuntaje"]?>" name="puntaje[]"></th>
                                                    <?php endif; endif; endif; endforeach;?>
                                                </tr>
                                                    <?php $a = $_SESSION["evaluacion"];
                                                          foreach($a as $key1 => $innerArray):
                                                          if(!isset($_SESSION["rubrica"])):?>
                                                    <tr>
                                                        <?php if($innerArray["id"]==-1):?>
                                                        <td>
                                                            <input class="form-control" type="text" value="<?= $innerArray["Criterio"]?>" name="criterios[]">
                                                        </td>
                                                        <?php else:
                                                              if($innerArray["Cambios"]==null):?>
                                                        <td class="info">
                                                            <input class="form-control" type="text" value="<?= $innerArray["Criterio"]?>" name="criterios[]">
                                                        </td>
                                                        <?php elseif($innerArray["Cambios"]=="Eliminar!!."):?>
                                                        <td class="danger">
                                                            <input class="form-control" type="text" value="<?= $innerArray["Criterio"]?>" name="criterios[]">
                                                        </td>
                                                        <?php else:?>
                                                        <td class="warning">
                                                            <input class="form-control" type="text" value="<?= $innerArray["Cambios"]?>" name="criterios[]">
                                                        </td>
                                                        <?php endif; endif; foreach($innerArray["NivelCompetencia"] as $key2 => $value): ?>
                                                        <?php if($value["id"]==-1):?>
                                                        <?php if($value["Cambios"] == null):?>
                                                        <td>
                                                            <textarea style="resize: none;" class="form-control" rows="4" name="nivelcompetencia<?= $key1?>[]"><?= $value["Descripcion"]?></textarea>
                                                        </td>
                                                        <?php else:?>
                                                        <td class="danger">
                                                            <textarea style="resize: none;" class="form-control" rows="4" name="nivelcompetencia<?= $key1?>[]"><?= $value["Descripcion"]?></textarea>
                                                        </td>
                                                        <?php endif;?>
                                                        <?php else:
                                                              if($value["Cambios"] == null):?>
                                                        <td class="info">
                                                            <textarea style="resize: none;" class="form-control" rows="4" name="nivelcompetencia<?= $key1?>[]"><?= $value["Descripcion"]?></textarea>
                                                        </td>
                                                        <?php elseif($value["Cambios"] == "Eliminar!!."):?>
                                                        <td class="danger">
                                                            <textarea style="resize: none;" class="form-control" rows="4" name="nivelcompetencia<?= $key1?>[]"><?= $value["Descripcion"]?></textarea>
                                                        </td>
                                                        <?php else: ?>
                                                        <td class="warning">
                                                            <textarea style="resize: none;" class="form-control" rows="4" name="nivelcompetencia<?= $key1?>[]"><?= $value["Cambios"]?></textarea>
                                                        </td>
                                                        <?php endif; endif; endforeach;?>
                                                    </tr>
                                                    <?php else:?>
                                                    <tr>
                                                        <td>
                                                            <input class="form-control" type="text" value="<?= $innerArray["Criterio"]?>" name="criterios[]">
                                                            <?php foreach($innerArray["NivelCompetencia"] as $key2 => $value):?>
                                                            <td>
                                                            <textarea style="resize: none;" class="form-control" rows="4" name="nivelcompetencia<?= $key1?>[]"><?= $value["Descripcion"]?></textarea>
                                                            </td>
                                                        </td>  
                                                    <?php endforeach;?>
                                                    </tr>
                                                    <?php endif; endforeach;?>
                                                    <?php if(!isset($_SESSION["ver"])): ?>
                                                    <tr>
                                                        <td colspan="6">
                                                            <div class="form-group text-center" style="margin: 0px auto">
                                                                <div class="btn-group" role="group" aria-label="...">
                                                                <button type="submit" formaction="php/RubricaEdit.php?pre=3&a=3" class="btn btn-danger" >Eliminar Criterio</button>
                                                                <button type="submit" formaction="php/RubricaEdit.php?pre=3&a=1" class="btn btn-warning" >Agregar Criterio</button>
                                                                </div>
                                                                <br/>
                                                                <br/>
                                                                <div class="btn-group" role="group" aria-label="...">
                                                                <button type="submit" formaction="php/RubricaEdit.php?pre=3&a=4" class="btn btn-danger" >Eliminar Competencia</button>
                                                                <button type="submit" formaction="php/RubricaEdit.php?pre=3&a=2" class="btn btn-warning" >Agregar Competencia</button>
                                                                </div>
                                                                <br/>
                                                                <br/>
                                                                <div class="btn-group" role="group" aria-label="...">
                                                                <button type="submit" formaction="php/RubricaEdit.php?pre=3&a=5" class="btn btn-success" >Guardar</button>
                                                                <button type="submit" formaction="php/RubricaEdit.php?pre=3&a=6" class="btn btn-primary" >Cancelar</button>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>  
                                                        <?php	
                                                        if(isset($_GET['pre'])):
                                                            if($_GET['pre']=="102"):?>
                                                        <td colspan="6">
                                                                <div class="alert alert-warning">
                                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                <strong>Error, </strong> el nuevo criterio no puede estar en blanco.
                                                                </div>
                                                        </td>
                                                        <?php endif; endif;?>
                                                    </tr>
                                                    <?php else: ?>
                                                    <tr>
                                                        <td colspan="6">
                                                            <div class="text-center">
                                                                <br/>
                                                                    <a class="btn btn-info" href="php/RubricaEdit.php?pre=-1">Volver a Biblioteca</a>
                                                                <br/>
                                                            </div> 
                                                        </td>
                                                    </tr>
                                                    <?php endif; ?>
                                            </table>
                                            </form>
                                        </div>
                                        <div class="tab-pane well" id="tabi4" style="overflow-x: auto;">
                                            <?php if(isset($_SESSION["edita"])): $rubrica1 = $_SESSION["edita"];?>
                                            <form method="POST" action="php/RubricaEdit.php?pre=4" id="formulario1" autocomplete="off">
                                                <div class="panel panel-success" id="contenido">
                                                    <div class="panel-heading text-center">
                                                        <h2>
                                                            Editar Rubrica
                                                        </h2>
                                                        <label style="float: left">Nombre:</label>
                                                        <input type="text" value="<?= $rubrica1["rubrica"]["nombre"]?>" name="nombre" placeholder="Ingrese nombre." class="form-control text-center" disabled="true"/>
                                                        <p>Si ya terminaste guardalo.</p>
                                                        <button name="boton" class="btn btn-success" type="submit">Guardar</button>  
                                                    </div>
                                                </div>
                                            </form>
                                            <?php else: ?>
                                            <?php if(!isset($_SESSION["ver"])): ?>
                                            <form method="POST" action="php/RubricaEdit.php?pre=4" id="formulario1" autocomplete="off">
                                                <div class="panel panel-success" id="contenido">
                                                    <div class="panel-heading text-center">
                                                        <h2>
                                                            Guardar Rubrica
                                                        </h2>
                                                        <label style="float: left">Nombre:</label>
                                                        <input type="text" value="" name="nombre" placeholder="Ingrese nombre." class="form-control text-center" />
                                                        <p>Ingresar nombre antes de guardar.</p>
                                                        <button name="boton" class="btn btn-success" type="submit">Guardar</button>  
                                                    </div>
                                                </div>
                                            </form>
                                            <?php endif; endif;?>
                                        </div>                                        
                                        <ul class="pager wizard">
                                                <li class="previous first" style="display:none;"><a href="javascript:;">First</a></li>
                                                <li class="previous" style="display:none;"><a href="javascript:;">Previous</a></li>
                                                <li class="next last" style="display:none;"><a href="javascript:;">Last</a></li>
                                                <li class="next" style="display:none;"><a href="javascript:;">Next</a></li>
                                                <li class="finish" style="display:none;"><a href="javascript:;">Finish</a></li>
                                        </ul>
                                    </div>
                                </div>
                        </section>
                    </div>
                </div>
        </div>
    </div>     
    </div>
    </div>
        
    <!-- Modal -->
    <div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" autocomplete="off">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Vas a salir de esta pagina...</h4>
                </div>
                <div class="modal-body">
                    <p>¿Está seguro que quieres salir?, se perdera todo lo que ha avanzado.</p>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No, quiero volver.</button>
                    <a class="btn btn-primary" href="php/RubricaEdit.php?pre=-1">Sí, estoy seguro.</a>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
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
