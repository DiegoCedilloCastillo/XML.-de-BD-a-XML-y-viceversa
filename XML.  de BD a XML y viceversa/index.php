<?php
include 'config.php';

$sql = "SELECT * FROM Personas";
$stmt = sqlsrv_query($conn, $sql);
if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

$xml = new SimpleXMLElement('<root/>');

while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $item = $xml->addChild('item');
    foreach ($row as $key => $value) {
        $item->addChild($key, htmlspecialchars($value));
    }
}

$xml->asXML('datos.xml');

sqlsrv_close($conn);

echo "Datos exportados a datos.xml con éxito.";