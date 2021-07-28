<?php
$conn = mysqli_connect('localhost', 'root', '');
if (!$conn) {
	echo "Database connection failed: " .mysqli_error($conn);
}
else{
	$db_select = mysqli_select_db($conn,'contacts');
	if (!$db_select) {
		echo "Database selection failed: " .mysqli_error($conn);
	}
}

session_start();
ob_start();

?>