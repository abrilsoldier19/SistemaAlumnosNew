<?php
$mysqli = mysqli_connect("localhost", "root", "", "alumno_reprobados");
if ($mysqli) {
    echo 'si';
} else {
    echo 'no';
}

include 'datos.php';
$query = mysqli_query($mysqli, "SELECT IdAlumno_Reprobados, Alumno_id FROM alumno_reprobados");
?>

