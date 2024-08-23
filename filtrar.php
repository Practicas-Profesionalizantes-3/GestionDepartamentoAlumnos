<?php
    // Conectar a la base de datos
    $conexion = mysqli_connect("localhost", "root", "", "gestiondptoalumnos");

    
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];

    
    $consulta = "SELECT * FROM tabla WHERE fecha BETWEEN '$fecha_inicio' AND '$fecha_fin'";

    
    $resultados = mysqli_query($conexion, $consulta);

    // Mostrar resultados en la tabla
    while ($fila = mysqli_fetch_assoc($resultados)) {
        echo "<tr>";
        echo "<td>" . $fila['fecha'] . "</td>";
        echo "<td>" . $fila['dato1'] . "</td>";
        echo "<td>" . $fila['dato2'] . "</td>";
        echo "</tr>";
    }


    mysqli_close($conexion);
?>