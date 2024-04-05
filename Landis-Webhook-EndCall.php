<?PHP
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

  // Takes raw data from the request
  $json = file_get_contents('php://input');

  // Converts it into a PHP object
  $data_jason = json_decode($json);

	try {
    $conn = new PDO("sqlsrv:server = tcp:sql-landis.database.windows.net,1433; Database = Landis", "sa.local", "L3tM3!nSQL2024");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
	}

  $data = [
    'ScenarioId' => $data_jason->{'ScenarioId'},
    'EventName' => $data_jason->{'EventName'},
    'QueueDisplayName' => $data_jason->{'QueueDisplayName'},
    'RemotePartyName' => $data_jason->{'RemotePartyName'},
    'RemotePartyUri' => $data_jason->{'RemotePartyUri'},
    'RemotePartyNumber' => $data_jason->{'RemotePartyNumber'},
    'RemotePartyId' => $data_jason->{'RemotePartyId'},
    'CallStartDateTime' => $data_jason->{'CallStartDateTime'},
    'CallEndDateTime' => $data_jason->{'CallEndDateTime'},
    'CallLength' => $data_jason->{'CallLength'},
    'AgentUPN' => $data_jason->{'AgentUPN'},
    'TalkTime' => $data_jason->{'TalkTime'},
    'WaitTime' => $data_jason->{'WaitTime'},
    'CallbackRequested' => $data_jason->{'CallbackRequested'},
    'VoicemailRequested' => $data_jason->{'VoicemailRequested'},
    'TimedOut' => $data_jason->{'TimedOut'},
    'Abandoned' => $data_jason->{'Abandoned'},
    'ServiceLevelAchieved' => $data_jason->{'ServiceLevelAchieved'},
  ];

  $sql = "UPDATE SET EventName=:EventName, QueueDisplayName=:QueueDisplayName, RemotePartyName=:RemotePartyName, RemotePartyName=:RemotePartyName, RemotePartyUri=:RemotePartyUri, RemotePartyNumber=:RemotePartyNumber, RemotePartyId=:RemotePartyId, CallStartDateTime=:CallStartDateTime, CallEndDateTime=:CallEndDateTime, CallLength=:CallLength, AgentUPN=:AgentUPN,TalkTime=:TalkTime, WaitTime=:WaitTime, CallbackRequested=:CallbackRequested, VoicemailRequested=:VoicemailRequested, TimedOut=:TimedOut, Abandoned=:Abandoned, ServiceLevelAchieved=:ServiceLevelAchieved WHERE ScenarioId=:ScenarioId";
  $conn->prepare($sql)->execute($data);
?>
