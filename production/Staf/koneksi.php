<?php
	$server = "127.0.0.1";
	$user = "root";
	$password = "";
	$database = "BLT";
	
	$mysqli = new mysqli($server, $user, $password, $database);
	$koneksi = mysqli_connect($server, $user, $password, $database);
	
	if ($mysqli->connect_error)
	{die("Koneksi gagal: " . $mysqli->connect_error);}

?>