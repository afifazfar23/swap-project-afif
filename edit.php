<link rel="stylesheet" href="mystyle.css" >
<?php
date_default_timezone_set('Asia/Singapore');
$si=$_POST['s_i'];
$ii=$_POST['i_i'];

if ($si != "" && $ii != "")
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

$query = "UPDATE adb SET anote='{$ii}' WHERE aid='{$si}'";

$response = $dbc->query($query);

if($response){
	
	echo 'Audit log Updated'."<br>";
	mysqli_close($dbc);
	$DB_USER='auditor';
	$DB_PASSWORD = 'auditor';
	$DB_HOST = 'localhost';
	$DB_NAME = 'auditor';
	$dbc = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
	if ($dbc->connect_error)
	{
	die("Failed to connect to MySQL: " . $conn->connect_error);
	}
	date_default_timezone_set('Asia/Singapore');
	$cdate = date('Y-m-d H:i:s');
 
	$in="Administrator has updated log {$si} in stritems table";
 
	$query = "INSERT INTO adb (adate,anote) VALUES ('{$cdate}','{$in}') ";

	$response = $dbc->query($query);

	if($response){
		echo ' Editing will be recorded ';
		mysqli_close($dbc);
	} else {
		echo ' Error occured,  issues encountered. ';
		echo("Error description: " . mysqli_error($dbc));
	}
} else {
	echo ' Error occured, wrong store or item id entered. ';
	
	echo("Error description: " . mysqli_error($dbc));
}


} else {
	echo "You have entered an empty record in one of the fields.";
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