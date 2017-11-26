<link rel="stylesheet" href="mystyle.css" >
<?php


session_start();
$DB_USER = $_SESSION["Login"];
$DB_PASSWORD = $_SESSION["Pass"];
$DB_HOST = 'localhost';
$DB_NAME = 'auditor';

$dbc = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
if ($dbc->connect_error)
{
  die("Failed to connect to MySQL: " . $conn->connect_error);
}

$query= "SELECT * FROM adb";

$response = $dbc->query($query);

if($response){

	echo '<table align="left"
	cellspacing="5" cellpadding="8"
	
	<tr><th align="left"><b>Audit ID</b></th>
	<th align="left"><b>Audit Date</b></th>
	<th align="left"><b>Audit Note</b></th></tr>';

	while($row = mysqli_fetch_array($response)){
		echo '<tr><td align="left">' .
		$row['aid'] . '</td><td align="left">' .
		$row['adate'] . '</td><td align="left">' .
		$row['anote'] ;
		
		echo '</tr>';
	}
	echo '</table>';
	
	
	}else {
		echo "Couldnt issue db query";
		echo mysqli_error($dbc);
	}
	mysqli_close($dbc);
  
?>

<html>
<body>

<button onclick="goBack()">Go Back</button>

<script>
function goBack() {
    window.history.back();
}
</script>
 
 



<button onclick="refresh()">refresh</button>

<script>
function refresh() {
     location.reload(true);
}
</script>
</body>
</html>