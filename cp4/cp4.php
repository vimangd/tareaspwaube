<?php
    session_start();

    /*
        Siempre es importante considerar antes de realizar un sistema PHP MySQL
        disponer de la BD relacionada hasta mínimo una 3er Forma Normal.

        Hay que considerar que cada tabla debe tener activado auto increment en su ID

    */

    require 'functions.php';
    $config = require './public/configuracion.php';

    if (true)
    {
        
        $conexion = dbConnect($config['database']);


        // print_r( $conexion ); echo "<br>";


        $docente = getUsuariosByRol($conexion, 1)[0]; // --- Se asume valores pre cargados en tabla usuarios


        // print_r( $docente ); echo "<br>";


        $imagenes = getImagenes($conexion); // --- Asume valores pre cargados en tabla imagenes


        // print_r( $imagenes ); echo "<br>";


        $nombre = $docente->nombre;
        
        // $fondo = $imagenes[0]->enlace;

        // $inicio = $imagenes[1]->enlace;


        $fondo = $imagenes[0]->enlace;
    
        // Verifica si hay al menos dos imágenes retornadas antes de acceder a la segunda
        if( array_key_exists(1, $imagenes) ) 
        {
            $inicio = $imagenes[1]->enlace; 
        } 
        else 
        {
            // echo "No hay suficientes imágenes.";  No es necesaria esta orden
            $inicio = null;
        }
        

        // print_r( $fondo ); echo "<br>";

        // print_r( $inicio ); echo "<br>";


        $docente = null;
        $imagenes = null;
        $conexion = null;

    }
    
        
    if( isset( $_REQUEST["boton_acceso"] ) )
    {
        // Toma los datos del formulario

        $email      = $_REQUEST["email"];
        $password   = $_REQUEST["contrasena"];
        $w_password = md5($password);

        $conexion = dbConnectmysqli($config['database']);

        //Consulta a la base de datos

        $query = "SELECT * FROM usuarios 
                WHERE email= '$email' AND contrasena = '$w_password' ";

        $queryTeacher = mysqli_query($conexion,$query);

        if (mysqli_num_rows($queryTeacher) > 0) 
        {
            $usuarioDocente = mysqli_fetch_assoc($queryTeacher);
  
            $_SESSION['g_usuario_id_activo']    = $usuarioDocente['id']; // --- Importante

            $_SESSION['rol']                    = $usuarioDocente['rol'];
            $_SESSION['email']                  = $email;
            $_SESSION['estado_sesion']          = "S";

            $_SESSION[ "g_nombre_del_usuario" ] = $nombre;


            // --- A continuación decisiones de Acceso por Rol: 1 -> Docente y 2 -> Estudiante

            // --- Debió considerarse: 3 Roles: 1 -> Administrador, 2 -> Docente y 3 -> Estudiante

            // --- Administrador debiera de encargarse de poder editar cualquier tabla

            // --- Y así pre cargar (asignar) valores a las tablas: Usuarios, Asignaturas, Lugares

            
            if ($_SESSION['rol'] = 1)
            {
                header('Location: backend/dashboard_teacher.php');
                exit();

            } 
            else 
            {
                header('Location: backend/dashboard_student.php');
                exit();

            }
        } 
        else 
        {
            echo "Su email o constraseña no coincide con nuestros registros";

            unset($_SESSION['email']);
            $_SESSION['estado_sesion'] = "N";
        }

        $queryTeacher = null;
        $conexion = null;
    }


    // --- Carga la Vista de index.php

    require 'index.view.php';
 