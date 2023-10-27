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
    $tsql= "SELECT [ID],[ScenarioId],[CallerNumber],[CallerName],[StudentID],[ContactID] FROM [dbo].[IVR-BAR] WHERE [dbo].[IVR-BAR].ScenarioId like '".$ScenarioId."' ";
    $getResults= sqlsrv_query($conn, $tsql);

	$Count=0;
	while ($Info = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
		$CallerNumber		= $Info["CallerNumber"];
		$CallerName			= $Info["CallerName"];
		$StudentID			= $Info["StudentID"];
		$ContactID[$Count]	= $Info["ContactID"];
		
		$Count++;
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
<style type="text/css">
body {
    background-color: #FFFFFF;
    color: #000000;
}
</style>
</head>

<script language="javascript">
	function F_Launch(IN){
		var V_URL="https://collegelacite.lightning.force.com/lightning/r/Contact/"+IN+"/view";
		alert(V_URL);
		window.open(V_URL,'Landis-SF');
		return;	
	}
</script>

<body>
	<table width="95%" border="4" align="center">
	  <tbody>
	    <tr>
	      <td align="center" valign="middle" nowrap="nowrap" bgcolor="#000000" style="color: #FFFFFF; font-size: 24px; font-weight: bold;">Landis - Salesforce</td>
        </tr>
      </tbody>
	</table>
	<table width="90%" border="2" align="center">
	  <tbody>
	    <tr>
	      <td width="25%" align="right" valign="middle" bgcolor="#AAAAAA" style="font-size: 18px">ScenarioId</td>
	      <td align="left" valign="middle" bgcolor="#FFFFFF" style="font-size: 18px; color: #000000;"><?PHP echo $ScenarioId; ?></td>
        </tr>
	    <tr>
	      <td width="25%" align="right" valign="middle" bgcolor="#AAAAAA" style="font-size: 18px">CallerNumber</td>
	      <td align="left" valign="middle" bgcolor="#FFFFFF" style="font-size: 18px; color: #000000;"><?PHP echo $CallerNumber; ?></td>
        </tr>
	    <tr>
	      <td width="25%" align="right" valign="middle" bgcolor="#AAAAAA" style="font-size: 18px">CallerName</td>
	      <td align="left" valign="middle" bgcolor="#FFFFFF" style="font-size: 18px; color: #000000;"><?PHP echo $CallerName; ?></td>
        </tr>
	    <tr>
	      <td width="25%" align="right" valign="middle" bgcolor="#AAAAAA" style="font-size: 18px">StudentID</td>
	      <td align="left" valign="middle" bgcolor="#FFFFFF" style="font-size: 18px; color: #000000;"><?PHP echo $StudentID; ?></td>
        </tr>
      </tbody>
</table>
	<p>&nbsp;</p>
	<table width="80%" border="4" align="center">
	  <tbody>
		  <?PHP for($i=0;$i<count($ContactID);$i++): ?>
	    <tr>
	      <td align="center" valign="middle" bgcolor="#000CFF" onClick="F_Launch('<?PHP echo trim($ContactID[$i]); ?>')">C : <?PHP echo trim($ContactID[$i]); ?></td>
        </tr>
		  <?PHP endfor; ?>
      </tbody>
</table>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
</body>
</html>