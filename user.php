<link rel="stylesheet" href="mystyle.css" >
<?php

session_start();
$li  = $_SESSION["Login"];
$pi  = $_SESSION["Pass"];
$DB_USER  = 'dbreader';       
$DB_PASSWORD = 'dbpw';        
$DB_HOST = 'localhost';
$DB_NAME = 'auditor';

$dbc = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
if ($dbc->connect_error)
  {
  die("Failed to connect to MySQL: " . $conn->connect_error);
  }

$query= "SELECT * FROM udb WHERE uid='{$li}' AND pw='{$pi}' ";

$response = $dbc->query($query);

if($response){

	echo '<table align="left"
	cellspacing="5" cellpadding="8"
	
	<tr><th align="left"><b>User ID</b></th>
	<th align="left"><b>Password</b></th>
	<th align="left"><b>Name</b></th></tr>';

	while($row = mysqli_fetch_array($response)){
		echo '<tr><td align="left">' .
		$row['uid'] . '</td><td align="left">' .
		$row['pw'] . '</td><td align="left">' .
		$row['uname'] ;
		
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
 
 


</body>
</html>