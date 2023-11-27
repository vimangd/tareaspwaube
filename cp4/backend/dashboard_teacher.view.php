<?php 
    
    // echo "g_usuario_id_activo= " . $_SESSION['g_usuario_id_activo'] . "<br>";


    // --- No es necesario session_start() porque está en dashboard_teacher.view.php en línea 15:

    // --- require 'dashboard_teacher.view.php';

    // --- formando parte del propio programa dashboard_teacher.php, es decir

    // --- dashboard_teacher.view.php forma parte de dashboard_teacher

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de calificaciones</title>
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/dashboard_teacher.style.css">
</head>
<body>

    <?php 

        if (isset($_POST["boton_salir"])) {
            // Destruir todas las variables de session
            session_destroy();

            // Redireccionar a la página principal de las tareas
            header('Location: https://tarea1ubepwa.site');

            // Salir del script
            exit();
        }



        if ( isset( $_SESSION[ "g_nombre_del_usuario" ] ) )
        {
            $g_nombre_del_usuario = $_SESSION[ "g_nombre_del_usuario" ];
        }
        else 
        {
            $g_nombre_del_usuario = "Nombre NO DISPONIBLE";
        }


    ?>

    <div class="container">

        <header>
            <h1>Bienvenido docente <?= $g_nombre_del_usuario?></h1>
        </header>
        
        <div>
            
            <h2>Opciones</h2>
            
            <form id="formulario_docente" name="formulario_docente" action="" method="POST" class="opciones" aria-labelledby="options-heading">

                <style>

                    .opciones {
                        display: flex;
                        justify-content: space-between;
                    }
                    .btn {
                        flex: 1;
                        margin: 0 10px;
                    }

                </style> 

                <div class="opciones">
                    <button type="submit" id="agregar_estudiante" name="agregar_estudiante" class="btn btn-primary">Añadir estudiante</button>
                    <button type="submit" id="agregar_calificacion" name="agregar_calificacion" class="btn btn-primary">Añadir calificacion</button>
                    <button type="submit" id="boton_ver" name="boton_ver" class="btn btn-primary">Ver estudiantes</button>
                    
                    <button type="submit" id="boton_salir" name="boton_salir" class="btn btn-primary" 
                        aria-controls="form_content" aria-expanded="true" aria-pressed="false">Salir del Sistema</button>

                </div>

            </form>

            <?php 

                
                // echo "g_lugar= " . $_SESSION[ "g_lugar" ] . "<br>";


                if ( isset( $_REQUEST[ "agregar_estudiante" ] ) )
                {
                    // ---- Ponemos en blanco $_SESSION[ "g_lugar" ] 
                    // ---- si hemos escogido anteriormente
                    // ---- Añadir calificación

                    $_SESSION[ "g_lugar" ] = ""; 
                    include "agregar_estudiante.php";
                }



                if ( isset( $_REQUEST[ "agregar_calificacion" ] ) )
                {
                    include "escojo_lugar.php";
                }



                if ( isset( $_REQUEST[ "boton_ver" ] ) )
                {
                    include "ver_estudiantes.php";
                }


                

                if ( isset( $_SESSION[ "g_lugar" ] ) )
                {
                    include "agregando_calificacion_estudiante.php";
                }


            ?>

            
            
        </div>
    </div>

    <script src="../bootstrap/bootstrap.bundle.min.js"></script>
    <script src="../bootstrap/popper.min.js"></script>
    <script src="../scripts/mostrar_elementos.js"></script>
</body>
</html>