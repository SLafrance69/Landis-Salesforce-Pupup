<?PHP
	$ScenarioId=$_GET['ScenarioId'];
?>

<?php
// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:landis.database.windows.net,1433; Database = landis", "sa.admin", "Voma!495999!");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

      $query = $conn->prepare("SELECT * FROM IVR");
      $query->execute();

      foreach ($conn->query($query) as $row) {
        print $row['ID'] . "\t";
        print $row['ScenarioId'] . "\t";
        print $row['CallerNumber'] . "\n";
        print $row['CallerName'] . "\n";
        print $row['StudentID'] . "\n";
        print $row['ContactID'] . "\n";
		print "---------------------------------------\n";
    }

      unset($conn); 
      unset($query);



// SQL Server Extension Sample Code:
//$connectionInfo = array("UID" => "sa.admin", "pwd" => "{your_password_here}", "Database" => "landis", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
//$serverName = "tcp:landis.database.windows.net,1433";
//$conn = sqlsrv_connect($serverName, $connectionInfo);
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