<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:sql-landis.database.windows.net,1433; Database = Landis", "sa.local", "L3tM3!nSQL2024");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

print("PASS Connection Point A");

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "sa.local", "pwd" => "L3tM3!nSQL2024", "Database" => "Landis", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:sql-landis.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);

print("PASS Connection Point A");
?>
