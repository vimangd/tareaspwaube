<h2>Agregar Calificación - Escojo Lugar</h2>

<div class="container">

    <?php

        // Conexión BD
        $conexion = dbConnectmysqli($config['database']);

        // Consulta lugares
        $sql = "SELECT id, nombre FROM lugares";
        
        $resultado = mysqli_query($conexion, $sql);

    ?>

    <form action="lugar_seleccionado.php" method="POST" id="form_lugar">

        <div class="row">

            <div class="col">
            <select name="lugar">
                <?php while($lugar = mysqli_fetch_assoc($resultado)) { ?>
                <option value="<?php echo $lugar['id']; ?>">
                    <?php echo $lugar['nombre']; ?>  
                </option>
                <?php } ?>
            </select>
            </div>

            <div class="col">
            <button id="boton_lugar" name="boton_lugar" type="submit">Enviar</button>  
            </div>

        </div>

    </form>

    <?php

        // Cerrar conexión
        mysqli_close($conexion);  

    ?>

    


    
</div>