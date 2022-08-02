<?php
	if (!isset($_POST["username"]) || !isset($_POST["pass"]))
	{	die("");
	}
	$username = $_POST["username"];
	$passw = $_POST["pass"];
	
	require("koneksi.php");
	$query = "SELECT * FROM user WHERE username='$username' AND pass_user='$passw'";
	$hasil = $mysqli->query($query) or die ("Error: ". $mysqli->error);
	if ($hasil->num_rows > 0)
	{	$data = $hasil->fetch_row();
		
		$username = $data[1]; //ambil username
		$nama = $data[2]; //ambil nama
		$status = $data[3]; //ambil status
		
		
		session_start(); //memulai session
		$_SESSION['username'] = $username; //menyimpan variabel session
		$_SESSION['nama'] = $nama;
		$_SESSION['status'] = $status;
		echo "<script type ='text/javascript'>alert('Selamat Datang!'); window.location.href='index.php?kode=dashboard';</script>";
		
	}
	else
	{	
		echo "<script type ='text/javascript'>alert('Login Gagal!'); window.location.href='login.php';</script>";
	}
	$mysqli->close();
?>