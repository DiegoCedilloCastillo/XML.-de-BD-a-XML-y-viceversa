<?php
$serverName = "localhost";
$connectionOptions = array(
    "Database" => "EjemploDB",
    "Uid" => "sa",
    "PWD" => "kirby2003"
);

$conn = sqlsrv_connect($serverName, $connectionOptions);
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}