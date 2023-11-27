<!-- 

    Se asume que ya existen valores pre cargados en las Tablas de lugares y asignaturas

--> 

<h2>Agregar Estudiantes</h2>

<form action="agregando_estudiante.php" method="POST" id="form_agregar">

        <h4>Datos a ingresar</h4>
        
        <div class="row">

            <div class="col-md-4 mb-3">
                <label for="name" class="form-label">Nombres</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="col-md-4 mb-3">
                <label for="last_name" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="last_name" name="last_name" required>
            </div>

            <div class="col-md-4 mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

        </div>

        <br>

        <div class="row">

            <div class="col-md-6 mb-3">
                <label for="lugar" class="form-label">Lugar</label>
                <select class="form-control" id="lugar" name="lugar" required>

                <?php 

                    $conexion = dbConnectmysqli($config['database']);

                    // Consulta

                    $sql = "SELECT id, nombre FROM lugares";
                    $resultado = mysqli_query($conexion, $sql);

                    // Recorrer resultados y tomar valores y 
                    // asignar a cada <option> (según número de registros encontrados) del select HTML

                    while($lugar = mysqli_fetch_assoc($resultado)){

                    echo '<option value="'.$lugar['id'].'">';
                    echo $lugar['nombre'];
                    echo '</option>';

                    }

                    // Cerrar conexión
                    mysqli_close($conexion);

                ?>

                </select>

            </div>

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

        </div>  


        <button type="submit" id="boton_agregar_estudiante" name="boton_agregar_estudiante" class="btn btn-primary">Agregar</button>
        

    </form>