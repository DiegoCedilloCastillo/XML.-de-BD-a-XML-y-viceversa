<?php
include 'config.php';

$xml = simplexml_load_file('datos.xml') or die("Error: No se puede crear el objeto XML");

$sql = "INSERT INTO Personas (Nombre, Apellido, Edad) VALUES (?, ?, ?)";
$stmt = sqlsrv_prepare($conn, $sql, array(&$nombre, &$apellido, &$edad));

if (!$stmt) {
    die(print_r(sqlsrv_errors(), true));
}

foreach ($xml->item as $item) {
    $nombre = (string)$item->Nombre;
    $apellido = (string)$item->Apellido;
    $edad = (int)$item->Edad;
    
    if (!sqlsrv_execute($stmt)) {
        die(print_r(sqlsrv_errors(), true));
    }
}

sqlsrv_close($conn);

echo "Datos importados desde datos.xml con éxito.";