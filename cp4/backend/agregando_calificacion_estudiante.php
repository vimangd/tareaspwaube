
<?php 
    $config = require '../public/configuracion.php';

if  (

    ( isset( $_SESSION[ "g_lugar" ] ) ) AND ( !empty( $_SESSION[ "g_lugar" ] ) )
    )
{
    $g_lugar                = $_SESSION[ "g_lugar" ];

    // echo "g_lugar= " .  $g_lugar . "<br>";


    // ---- BEGIN Determino si hay estudiantes en aquel Lugar

        // Iniciamos la conexión
        $conexion_new_mysql = new mysqli($config['database']['server'], $config['database']['user'], $config['database']['password'], $config['database']['database']);
        
        if ($conexion_new_mysql->connect_error) {
            die("Conexión fallida: " . $conexion_new_mysql->connect_error);
        }
        
        // Consulta SQL
        $sql = "SELECT COUNT(*) AS existe FROM asignaturas_estudiante WHERE lugar_id = $g_lugar";
        
        $resultado = $conexion_new_mysql->query($sql);
        
        if ($resultado->num_rows > 0) {
            // obtenemos los datos de la fila
            $fila = $resultado->fetch_assoc();
            if ($fila['existe'] > 0) {
                $sw_existe = "S";
            } else {
                $sw_existe = "N";
            }
        } else {
            $sw_existe = "N";
        }
        
        $conexion_new_mysql->close();

        // echo "sw_existe= " . $sw_existe . "<br>";

    // ---- END Determino si hay estudiantes en aquel Lugar


    if ( $sw_existe == "S" )
    {
        ?>

            <form action="agregando_la_calificacion_del_estudiante.php" method="POST" id="form_agregar">

                <h4>Datos a ingresar</h4>

                <?php

                    // Conexión BD
                    $conn = dbConnectmysqli($config['database']); 

                    // Lugar seleccionado

                $lugar_id = $_SESSION["g_lugar"];

                // Consulta datos
                $sql = "SELECT u.id, u.apellidos, u.nombre  
                                FROM asignaturas_estudiante ae 
                                INNER JOIN usuarios u ON ae.usuario_id = u.id
                                WHERE ae.lugar_id = $lugar_id";

                $result = mysqli_query($conn, $sql);

                ?>
                
                    <!-- Select2 -->
                    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
                    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

                    <div class="mb-3">

                        <table>

                            <tr>

                                <td>
                                    Estudiante
                                </td>

                                <td>

                                <select class="form-control select2" id="usuario" name="usuario">
                            
                                <?php 

                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                        ?>
                                        
                                        <option value="<?= $row['id'] ?>">
                                        <?= $row['apellidos'] ?>, <?= $row['nombre'] ?> 

                                        </option>
                                    
                                        <?php
                                    }

                                ?>
                                                                
                                </select>

                                </td>

                            </tr>

                        </table>

                    </div>

                    <script>
                    $(document).ready(function() {
                        $('.select2').select2();
                    }); 
                    </script>

                    <div class="col-md-6 mb-3">

                        <label for="asignatura" class="form-label">Asignatura</label>
                        <select class="form-control" id="asignatura" name="asignatura" required>

                        <?php 

                            // Conexión a la BD
                            $conexion = dbConnectmysqli($config['database']); 

                            // Consulta 
                            $sql = "SELECT id, nombre FROM asignaturas";
                            $resultado = mysqli_query($conexion, $sql);

                            // Recorrer resultados
                            while($asignatura = mysqli_fetch_assoc($resultado)){

                            echo '<option value="'.$asignatura['id'].'">';
                            echo $asignatura['nombre']; 
                            echo '</option>';

                            }

                            // Cerrar conexión
                            mysqli_close($conexion);

                        ?>
                        
                        </select>

                    </div>

                    <div class="mb-3">
                        <label for="parcial" class="form-label">Parcial</label>  
                        <input type="number" class="form-control" id="parcial" name="parcial" min="1" max="2">
                    </div>

                    <div class="mb-3">

                        <label for="nota_t" class="form-label">Nota teórica (1-40)</label>
        
                        <input 
                        type="number" 
                        class="form-control"
                        id="nota_t"
                        name="nota_t"
                        min="1"
                        max="40">
                        
                    </div> 

                    <div class="mb-3">

                        <label for="nota_p" class="form-label">Nota práctica (1-60)</label>

                        <input 
                        type="number" 
                        class="form-control"
                        id="nota_p"
                        name="nota_p"
                        min="1"
                        max="60">

                    </div> 

                    <button type="submit" id="boton_agregar_calificacion" name="boton_agregar_calificacion" class="btn btn-primary">Añadir</button>

            </form>

        <?php 

    }
    
}

?>