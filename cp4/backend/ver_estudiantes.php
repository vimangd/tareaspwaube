<h2>Ver Estudiantes</h2>

<?php
   

    if (!$conexion_mysql) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

?>

<?php

    // Consulta SQL
    $sql = "SELECT lugares.nombre AS lugar, asignaturas.nombre AS asignatura, CONCAT(usuarios.apellidos, ' ', usuarios.nombre) AS estudiante 
            FROM asignaturas_estudiante
            INNER JOIN lugares ON asignaturas_estudiante.lugar_id = lugares.id
            INNER JOIN asignaturas ON asignaturas_estudiante.asignatura_id = asignaturas.id
            INNER JOIN usuarios ON asignaturas_estudiante.usuario_id = usuarios.id
            WHERE asignaturas_estudiante.usuario_id_eliminacion IS NULL
            ORDER BY lugar, asignatura, estudiante";

    $resultado = mysqli_query($conexion_mysql, $sql);

    $datos = array();
    while ($row = mysqli_fetch_assoc($resultado)) {
        $datos[] = $row;
    }

?>


    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <!-- DataTables JS -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>



    <style>
        #miTabla {
            width: 100% !important;
        }
    </style>



<table id="miTabla" class="display">
    <thead>
        <tr>
            <th>Lugar</th>
            <th>Asignatura</th>
            <th>Estudiante</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($datos as $dato): ?>
        <tr>
            <td><?php echo $dato['lugar']; ?></td>
            <td><?php echo $dato['asignatura']; ?></td>
            <td><?php echo $dato['estudiante']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<script>
$(document).ready(function() {
    $('#miTabla').DataTable({
        autoWidth: false
    });
});
</script>



