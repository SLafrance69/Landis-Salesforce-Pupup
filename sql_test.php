<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	// SQL Server Extension Sample Code:
	$connectionInfo = array("UID" => "sa.local", "pwd" => "L3tM3!nSQL2024", "Database" => "Landis", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
	$serverName = "tcp:sql-landis.database.windows.net,1433";
	$conn = sqlsrv_connect($serverName, $connectionInfo);
		if( $conn === false ) {
     			die( print_r( sqlsrv_errors(), true));
		}else{
			print_r("Connected");
		}

	$sql= "SELECT * FROM BAR" // WHERE ScenarioId like '$ScenarioId' ";
    	$stmt = sqlsrv_query($conn, $sql);
		if( $stmt === false) {
    			die( print_r( sqlsrv_errors(), true) );
		}

	while ($Info = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
		$ScenarioId		= $Info['ScenarioId'];
		$CallerNumber		= $Info['CallerNumber'];
		$CallerName		= $Info['CallerName'];
		$StudentID		= $Info['StudentID'];
		$ContactID		= $Info['ContactID'];

		$MSG = "[".$ScenarioId."]"." "."[".$CallerNumber."]"." "."[".$CallerName."]"." "."[".$StudentID."]"." "."[".$ContactID."]";

		print_r($MSG);
    	}
    	sqlsrv_free_stmt($getResults);
?>
