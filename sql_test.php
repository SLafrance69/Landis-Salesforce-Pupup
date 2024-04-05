<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	try {
    		$conn = new PDO("sqlsrv:server = tcp:sql-landis.database.windows.net,1433; Database = Landis", "sa.local", "L3tM3!nSQL2024");
   		 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (PDOException $e) {
    		print("Error connecting to SQL Server.");
    		die(print_r($e));
	}

	$data = $conn->query("SELECT * FROM BAR")->fetchAll();
	foreach ($data as $row) {
   		echo $row['ScenarioId']." ; ".$row['CallerNumber']." ; ".$row['CallerName']." ; ".$row['StudentID']." ; ".$row['ContactID']."<br />\n";
	}
?>
