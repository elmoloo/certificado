
<?php include_once('config.php');
	include_once('navbar.php');
?>
<!DOCTYPE html>
<html>
    
<head>
    <title>Tabla de Asistencia</title>
</head>
<body>

<h1>Tabla de Asistencia</h1>

<?php
// Obtener la fecha actual
$fechaActual = date('Y-m-d');

// Simular una lista de estudiantes (puedes reemplazar esto con datos de tu base de datos)
$estudiante = array(
    'Estudiante 1',
    'Estudiante 2',
    'Estudiante 3',
    'Estudiante 4',
    // Agregar más estudiantes según sea necesario
);

// Verificar si se envió el formulario de asistencia
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Procesar los datos del formulario
    foreach ($estudiante as $estudiante) {
        $asistencia = isset($_POST[$estudiante]) ? 'Presente' : 'Ausente';
        echo "$estudiante: $asistencia<br>";
    }
}

// Mostrar el formulario de asistencia
echo '<form method="POST">';
echo '<table border="1">';
echo '<tr><th>Estudiante</th><th>Asistencia</th></tr>';
foreach ($estudiante as $estudiante) {
    echo '<tr>';
    echo "<td>$estudiante</td>";
    echo '<td><input type="checkbox" name="' . $estudiante . '"></td>';
    echo '</tr>';
}
echo '</table>';
echo '<br>';
echo '<input type="submit" value="Registrar Asistencia">';
echo '</form>';
?>

</body>
</html>
