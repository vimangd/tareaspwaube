<?php
    require '../functions.php';
    $conexion_mysql = dbConnectmysqli($config['database']);
    
    if (isset($_POST['registrar'])) {
        if (strlen($_POST['name']) >= 1 && 
        strlen($_POST['last_name']) >= 1 && 
        strlen($_POST['email']) >= 1 && 
        strlen($_POST['institucion']) >= 1 &&
        strlen($_POST['materia']) >= 1 &&
        strlen($_POST['parcial']) >= 1 &&  
        strlen($_POST['nota_t']) >= 1 &&
        strlen($_POST['nota_p']) >= 1) {
            $name = $_POST['name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $institucion = $_POST['institucion'];
            $materia = $_POST['materia'];
            $parcial = $_POST['parcial'];
            $nota_t = $_POST['nota_t'];
            $nota_p = $_POST['nota_p'];
            $fecha = date("Y-m-d");
            $hora = date("H:i:s");

            $consulta_usuario = "INSERT INTO usuarios (nombre, email, rol, , fecha_creacion, hora_creacion)  
                                VALUES ($name.' '.$last_name, $email, 2, $fecha, $hora)";
            $resultado_usuario = mysqli_query($conexion_mysql,$consulta_usuario);

            $consulta_lugar = "INSERT INTO lugares(nombre, fecha_creacion, hora_creacion)  
                                VALUES ($institucion, $fecha, $hora)";
            $resultado_lugar = mysqli_query($conexion_mysql,$consulta_lugar);

            $consulta_materia = "INSERT INTO asignaturas(nombre, fecha_creacion, hora_creacion) 
                                VALUES ($materia, $fecha, $hora)";
            $resultado_materia = mysqli_query($conexion_mysql,$consulta_materia);
            
            $consulta_notas = "INSERT INTO notas(parcial, teoria, practica, fecha_creacion, hora_creacion) 
                                VALUES ($parcial, $nota_t, $nota_p, $fecha, $hora)";
            $resultado_notas = mysqli_query($conexion_mysql,$consulta_notas);    
            
            if ($resultado_usuario && $resultado_lugar && $resultado_materia && $resultado_notas) {
                ?>
                <h3>Registro exitoso</h3>
                <?php
            } else {
                ?>
                <h3>Hubo un error en el registro</h3>
                <?php
            }
        } else {
            ?>
            <h3>Debe completar todos los campos para hacer el registro</h3>
            <?php
        }
    }
    header('Location: ./dashboard_teacher.php');