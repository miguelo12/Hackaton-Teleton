<?php
session_start();

if(!isset($_GET["anonim"])){
    include_once("../php/CRUD/Alumno.php");
    error_reporting(E_ALL ^ E_WARNING);
    $email = "";
    $password = "";

    if( isset($_POST["email"]) && isset($_POST["password"]) )
    {
        $email=$_POST["email"];
        $password=$_POST["password"];

        try {     
           $usuario = new Alumno();

           $usuario->setEmail($email);
           $usuario->setPassword($password);

           $res = $usuario->validar();

           if(isset($res))
           {
               $usuario->setidAlumno($res["id"]);
               if($res["habilitado"]==0){
               $usuario->sethabilitado(1);
               $usuario->Habilitarono();
               session_start();
               $_SESSION["alumno"] = $res;
               header("location:../indexAlumno.php?Bienvenido=1");
               die();
               }else {
               session_start();
               $_SESSION["alumno"] = $res;
               header("location:../indexAlumno.php");
               die();
               }
           }
           else 
           {
               header("location:../inicio.php?error1=error");
               die();
           }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }

    }
    else
    {
        header("location:../error.php?error=404");
        die();
    }
}
else{
    if(isset($_POST["idactividad"]) && isset($_POST["email"]) && isset($_POST["name"])){
        // Anonimo!!!!
        // Primero ver si la id de la actividad existe.
        // Se crea si no existe, si existe se mandara un mensaje de error dependiendo si es anonimo o no.
        // ingresar y enviarlo hacia la actividad.
        
        include_once("../php/CRUD/Alumno.php");
        include_once("../php/CRUD/Actividad.php");
        
        $usuario = new Alumno();
        $actividad = new Actividad();
        
        $idact = $_POST["idactividad"];
        $email = $_POST["email"];
        $nombre = $_POST["name"];
        
        $actividad->setidActividad($idact);
        
        if($actividad->ExisteonoPorID()){
            
            if($nombre != null){
            #**********************************************************
            #* Revisar si efectivamente esta disponible la actividad  *
            #**********************************************************
                
                if($actividad->DevolverActividadAunSinFinalizar()){
                
                    $usuario->setEmail($email);

                    $res = $usuario->validarAnonimo();

                    if(!isset($res))
                    {
                    $usuario->setNombre($nombre);
                    $usuario->setPassword("1A*2b#3C9R*");
                    $usuario->sethabilitado(1);
                    $usuario->setanonimo(1);

                        if ($usuario->Ingresar()){
                        //sacar usuario para la id.
                        $res = $usuario->validarAnonimo();
                        $_SESSION["alumno"] = $res;

                        //ingresarlo a alumno-actividad (aunque salga unidad aprendizaje).
                        //enviarlo directamente a actividad como anonimo.
                        include_once("./CRUD/AlumnoUnidadAprendizaje.php");
                        $aluUnidadAprendizaje = new AlumnoUnidadAprendizaje();
                        $aluUnidadAprendizaje->setAlumno_idAlumno($res["id"]);
                        $aluUnidadAprendizaje->setActividad_idActividad($idact);

                            if(!$aluUnidadAprendizaje->ExisteonoPorID()){

                                $id = $aluUnidadAprendizaje->Ingresar();
                                //pasar la tabla completa.
                                $aluUnidadAprendizaje->setidAlumnoUnidadAprendizaje($id);
                                $_SESSION["idActividad"] = $aluUnidadAprendizaje->DevolveridActividad();
                                header("location: ../actividadAlumno.php");
                                die();

                            }
                            else{
                                $_SESSION["idActividad"] = $aluUnidadAprendizaje->DevolverActividad();
                                header("location: ../actividadAlumno.php");
                                die();   
                            }

                        }
                        else{
                            //GG base de datos XD
                        }
                    }
                    else{
                        if($res["anonimo"]==0){
                            //debe iniciar como usuario normal
                           header("location:../inicio.php?error1=50");
                           die();
                        }else{
                            //debe iniciar como usuario anonimo
                           header("location:../inicio.php?error3=51");
                           die();
                        }
                    }
                }
                else{
                    //La actividad existe pero esta finalizada.
                    header("location:../inicio.php?error3=201");
                    die();
                }
                
            }
            else{
                //nombre esta vacio...
                header("location:../inicio.php?error3=100");
                die();
            }
        }
        else{
            //Error id Incorrecta.
            header("location:../inicio.php?error3=200");
            die();
        }
    }
    else{
        if(isset($_POST["idactividad"]) && isset($_POST["email"])){
            //ver si existe el PIN de actividad.
            //ingresar y enviarlo hacia la actividad.
            
            include_once("../php/CRUD/Alumno.php");
            include_once("../php/CRUD/Actividad.php");
        
            $usuario = new Alumno();
            $actividad = new Actividad();
            
            $idact = $_POST["idactividad"];
            $email = $_POST["email"];
            
            $usuario->setEmail($email);
            
            $actividad->setidActividad($idact);
            
            if($actividad->ExisteonoPorID()){
                
                #**********************************************************
                #* Revisar si efectivamente esta disponible la actividad  *
                #**********************************************************
                
                if($actividad->DevolverActividadAunSinFinalizar()){
            
                    $res = $usuario->validarAnonimo();

                    if(isset($res))
                    {
                        if($res["anonimo"]==0){
                            //debe iniciar como usuario normal.
                            header("location:../inicio.php?error1=50");
                            die();
                        }else{
                            //Ingresarlo a una seccion y a la actividad donde se encuentra.
                            $_SESSION["alumno"] = $res;

                            //ingresarlo a alumno-actividad (aunque salga unidad aprendizaje).
                            //enviarlo directamente a actividad como anonimo.
                            include_once("./CRUD/AlumnoUnidadAprendizaje.php");
                            $aluUnidadAprendizaje = new AlumnoUnidadAprendizaje();
                            $aluUnidadAprendizaje->setAlumno_idAlumno($res["id"]);
                            $aluUnidadAprendizaje->setActividad_idActividad($idact);
                                if(!$aluUnidadAprendizaje->ExisteonoPorID()){

                                    $id = $aluUnidadAprendizaje->Ingresar();

                                    $aluUnidadAprendizaje->setidAlumnoUnidadAprendizaje($id);

                                    $_SESSION["idActividad"] = $aluUnidadAprendizaje->DevolveridActividad();
                                    header("location: ../actividadAlumno.php");
                                    die();

                                }else{
                                    $_SESSION["idActividad"] = $aluUnidadAprendizaje->DevolverActividad();
                                    header("location: ../actividadAlumno.php");
                                    die();   
                                }
                        }
                    }
                    else{
                        //no hay usuario.
                        header("location:../inicio.php?error3=40");
                        die();
                    }
                }
                else{
                    //La actividad existe pero esta finalizada.
                    header("location:../inicio.php?error3=201");
                    die();   
                }
            }
            else{
                //Error id Incorrecta.
                header("location:../inicio.php?error3=200");
                die();
            }
        }
        else{
            //no entro en ningun if...
            header("location:../error.php?error=404");
            die();
        }
    }
}