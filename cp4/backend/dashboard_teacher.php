<?php
    session_start();

    
    // echo "estado_sesion= " .  $_SESSION['estado_sesion'] . "<br>";

    // ---- BEGIN Nos aseguramos si estamos en Sesión

        if ( isset( $_SESSION['estado_sesion'] ) )
        {
            $estado_sesion = $_SESSION['estado_sesion'];

            if ( $estado_sesion != "S" )
            {
                ?>

                    <meta http-equiv="refresh" content="0;url=https://tarea1ubepwa.site">

                <?php 
            }

        }
        else 
        {
            ?>

                <meta http-equiv="refresh" content="0;url=https://tarea1ubepwa.site">

            <?php 

        }

    // ---- END Nos aseguramos si estamos en Sesión
    
    
    // --- session_start(); es importante para que el session_start() de index.php en línea 72
    // --- nos conserve valores por cada programa PHP .. Cada Programa PHP dentro del sistema
    // --- hay que poner session_start(); al inicio de cada Programa, así disponemos de toda
    // --- variable que juzgamos utilizar con sentido global en nuestro sistema


    // --- Se está trabajando la BD con PDO en functions

    require '../functions.php';
    $config = require '../public/configuracion.php';

    // --- Se está trabajando la BD con PDO a continuación

    $conexion_PDO = dbConnect($config['database']);
    $conexion_mysql = dbConnectmysqli($config['database']);
    $docente = getUsuariosByRol($conexion_PDO, 1)[0];
    $nombre = $docente->nombre;

    require 'dashboard_teacher.view.php';