<?PHP
	$ScenarioId=$_GET['ScenarioId'];
?>

<?php
    $serverName = "landis.database.windows.net";
    $connectionOptions = array(
        "Database" => "landis",
        "Uid" => "sa.admin",
        "PWD" => "Voma!495999!"
    );
    //Establishes the connection
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    $tsql= "SELECT [ID],[ScenarioId],[CallerNumber],[CallerName],[StudentID],[ContactID] FROM [dbo].[IVR-BAR]";
    $getResults= sqlsrv_query($conn, $tsql);

	while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
     echo ($row['ID'] . " " . $row['ScenarioId']. " " . $row['CallerNumber']. " " . $row['CallerName']. " " . $row['StudentID']. " " . $row['ContactID'] . "/n");
    }
    sqlsrv_free_stmt($getResults);
?>

<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-Equiv="Cache-Control" Content="no-cache">
<meta http-Equiv="Pragma" Content="no-cache">
<meta http-Equiv="Expires" Content="0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Landis-Salesforce-Popup</title>
</head>
<body>
	<?PHP echo $ScenarioId; ?>
</body>
</html>