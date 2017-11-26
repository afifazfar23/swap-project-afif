<link rel="stylesheet" href="mystyle.css" >
<?php
date_default_timezone_set('Asia/Singapore');
$sti=$_POST['st_i'];

if ($sti != "" )
{
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

$query = "DELETE FROM adb WHERE aid = '{$sti}' ";

$response = $dbc->query($query);

if($response){
	echo 'Audit log deleted';
	mysqli_close($dbc);
	$cdate = date('Y-m-d H:i:s');

	$DB_USER='auditor';
	$DB_PASSWORD = 'auditor';
	$DB_HOST = 'localhost';
	$DB_NAME = 'auditor';
	$dbc = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
	if ($dbc->connect_error)
	{
	die("Failed to connect to MySQL: " . $conn->connect_error);
	}
 
	$in="Administrator has deleted log {$sti} in audit table";
 
	$query = "INSERT INTO adb (adate,anote) VALUES ('{$cdate}','{$in}') ";

	$response = $dbc->query($query);

	if($response){
		echo ' Deletion will be recorded ';
		mysqli_close($dbc);
	} else {
		echo ' Error occured, Time issues encountered. ';
	}
	} else {
		echo 'Error occured, wrong store or item id entered.';
		echo("Error description: " . mysqli_error($dbc));
	}


} else {
	echo " You have entered an empty record in either the Store or Item ID ";
	
}
?>

<html>
<body>

<button onclick="goBack()">Go Back</button>

<script>
function goBack() {
    window.history.back();
}
</script>


</body>
</html>