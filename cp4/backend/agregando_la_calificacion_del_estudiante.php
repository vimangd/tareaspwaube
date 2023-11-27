<?php 
    session_start();
    require '../functions.php';
    $config = require '../public/configuracion.php';

    if ( isset( $_REQUEST[ "boton_agregar_calificacion" ] ) )
    {
        $g_usuario_id_activo = $_SESSION['g_usuario_id_activo'];

        // Conexión a la BD 
        $conexion = dbConnectmysqli($config['database']);

        // Datos del formulario 
        $usuario        = $_POST['usuario'];
        $asignatura     = $_POST['asignatura'];
        $parcial        = $_POST['parcial'];  
        $nota_t         = $_POST['nota_t'];
        $nota_p         = $_POST['nota_p'];

        // ID Usuario activo  
        $usuario_id_creacion    = $_SESSION['g_usuario_id_activo'];
        $fecha_creacion         = date('Y-m-d H:i:s'); 
        $hora_creacion      = date('H:i:s');

        // Consulta INSERT
        $sql = "INSERT INTO notas(asignatura_id, usuario_id, 
                                parcial, teoria, practica, 
                                usuario_id_creacion, fecha_creacion, hora_creacion) 
                VALUES ($asignatura, $usuario, 
                        $parcial, $nota_t, $nota_p,
                        $usuario_id_creacion, '$fecha_creacion', '$hora_creacion')";
                        
        // Ejecutar                
        $resultado = mysqli_query($conexion, $sql);

        // Cerrar conexión
        mysqli_close($conexion);


        // Mensaje que queremos mostrar
        $mensaje = "Nota del Estudiante agregada";

        ?>

            <script>
            alert("<?php echo $mensaje; ?>");
            </script>

            <meta http-equiv="refresh" content="0;url=/cp4/backend/dashboard_teacher.php">

        <?php 

    }


?>