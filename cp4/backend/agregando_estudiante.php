<?php 
    require '../functions.php';
    $config = require '../public/configuracion.php';
    session_start();

    if ( isset( $_REQUEST[ "boton_agregar_estudiante" ] ) )
    {
        $g_usuario_id_activo = $_SESSION['g_usuario_id_activo'];

        // Conexión a la BD 
        $conexion = dbConnectmysqli($config['database']);

        // Datos del formulario
        $name           = $_POST['name'];
        $last_name      = $_POST['last_name']; 
        $email          = $_POST['email'];
        $lugar          = $_POST['lugar'];
        $asignatura     = $_POST['asignatura'];

        // Otros datos 

        $rol = 2;
        $contrasena = "12345678"; //poner contraseña por defecto

        $contrasena = md5( $contrasena ); 
        
        $usuario_id_creacion = $g_usuario_id_activo;  
        
        $fecha_creacion = date('Y-m-d H:i:s'); 
        
        $hora_creacion = date('H:i:s');

        // Query 
        $sql = "INSERT INTO usuarios(nombre, apellidos, email, rol, contrasena,  
                                    usuario_id_creacion, fecha_creacion, hora_creacion)  
                VALUES ('$name', '$last_name', '$email', $rol, '$contrasena',
                        $usuario_id_creacion, '$fecha_creacion', '$hora_creacion')";
                        
        // Ejecutar consulta         
        $resultado = mysqli_query($conexion, $sql);

        // Cerrar conexión
        mysqli_close($conexion);

        // Mensaje que queremos mostrar
        $mensaje = "Estudiante agregado";

        ?>

            <script>
            alert("<?php echo $mensaje; ?>");
            </script>

            <meta http-equiv="refresh" content="0;url=/cp4/backend/dashboard_teacher.php">

        <?php 

    }


?>