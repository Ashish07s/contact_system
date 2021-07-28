<?php
require_once("connection.php");


$query = "DELETE FROM `contacts` WHERE `id` = '$_REQUEST[time_id]' ";
$result = mysqli_query($conn, $query);

header('location: http://localhost/contact_system/');

?>