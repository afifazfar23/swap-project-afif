<link rel="stylesheet" href="mystyle.css" >
<?php

session_start();
session_destroy();

echo '<form action="login.html">
	<input type="submit" value="Return To Login Page" />
	</form>';

?>