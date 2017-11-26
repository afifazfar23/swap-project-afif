<link rel="stylesheet" href="mystyle.css" >
<?php



date_default_timezone_set('Asia/Singapore');
$ai=$_POST['a_i'];
$ac=$_POST['a_c'];


if ($ai != "" && $ac != ""  )
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
$cdate = date('Y-m-d H:i:s');
$query = "INSERT INTO adb (aid,adate,anote) VALUES ('{$ai}','{$cdate}','{$ac}') ";

$response = $dbc->query($query);

if($response){
	
	echo ' Addition successful ';
	mysqli_close($dbc);
	$ndate = date('Y-m-d H:i:s');
	
	$DB_USER='auditor';
	$DB_PASSWORD = 'auditor';
	$DB_HOST = 'localhost';
	$DB_NAME = 'auditor';
	$dbc = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
	if ($dbc->connect_error)
	{
	die("Failed to connect to MySQL: " . $conn->connect_error);
	}
 
	$in="Administrator has added log {$ai} to auditor table";
 
	$query = "INSERT INTO adb (adate,anote) VALUES ('{$ndate}','{$in}') ";

	$response = $dbc->query($query);

	if($response){
		echo ' Addition will be recorded ';
		mysqli_close($dbc);
	} else {
		echo ' Error occured, time issues encountered. ';
	
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
