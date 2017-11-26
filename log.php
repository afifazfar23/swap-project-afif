<html>
<link rel="stylesheet" href="mystyle.css" >
<body>
<?php

date_default_timezone_set('Asia/Singapore');
$h_i=$_POST['hi'];
$hwd=$_POST['h_w'];
if ($h_i != "" && $hwd != "" )
{



$DB_USER='dbreader';
$DB_PASSWORD = 'dbpw';
$DB_HOST = 'localhost';
$DB_NAME = 'auditor';

$dbc = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);

if ($dbc->connect_error)
{
die("Failed to connect to MySQL: " . $conn->connect_error);
}

$query= "SELECT uname FROM udb WHERE uid='{$h_i}' AND pw='{$hwd}'";

$response = $dbc->query($query)->fetch_object()->uname;
$cdate = date('Y-m-d H:i:s');
$pwc=$response;
if($response){
	if($pwc == 'auditor'){
	echo 'Correct Auditor Password entered'."<br>";
	mysqli_close($dbc);
	session_start();
	$_SESSION["Login"] = $h_i;
	$_SESSION["Pass"] = $hwd;
	echo '<form action="audit.html" method="GET">
	
	<input type="submit" value="Enter" />
	</form>';
	$DB_USER='auditor';
	$DB_PASSWORD = 'auditor';
	$DB_HOST = 'localhost';
	$DB_NAME = 'auditor';
	$dbc = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
	if ($dbc->connect_error)
	{
	die("Failed to connect to MySQL: " . $conn->connect_error);
	}
 
	$in="Auditor has logged in.";
 
	$query = "INSERT INTO adb (adate,anote) VALUES ('{$cdate}','{$in}') ";

	$response = $dbc->query($query);

	if($response){
	echo ' Login will be recorded '."<br>";
	mysqli_close($dbc);
	} else {
	echo ' Error occured, login issues encountered. ';
	}
	} else if ($h_i == 'admin' ) {
	echo 'Correct Admin Password entered'."<br>";
	mysqli_close($dbc);
	
	session_start();
	$_SESSION["Login"] = $h_i;
	$_SESSION["Pass"] = $hwd;
	echo '<form action="input.html" method="GET">

	<input type="submit" value="EnterRead" />
	</form>';
	$DB_USER='auditor';
	$DB_PASSWORD = 'A0d1T0r';
	$DB_HOST = 'localhost';
	$DB_NAME = 'swap';
	$dbc = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
	if ($dbc->connect_error)
	{
	die("Failed to connect to MySQL: " . $conn->connect_error);
	}
 
	$in="Administrator has logged in.";
 
	$query = "INSERT INTO adb (adate,anote) VALUES ('{$cdate}','{$in}') ";

	$response = $dbc->query($query);

	if($response){
	echo ' Login will be recorded '."<br>";
	mysqli_close($dbc);
	} else {
	echo ' Error occured, login issues encountered. ';
	}
	}
} else {
	echo 'Error occured, wrong password or no password entered.'."<br>";
	mysqli_close($dbc);
	echo '<form action="login.html">
	<input type="submit" value="Return" />
	</form>';
}
} else {
echo "Password or User Field is emtpy";
echo '<form action="login.html">
	<input type="submit" value="Return" />
	</form>';
}


?>

</body>
</html>