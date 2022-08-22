<?php
	$id = $_GET['ID'];
	require 'koneksi.php'; //buka koneksi database
	//susun query
	$sql = "SELECT * FROM user WHERE id_user='$id'";
	$hasil = $mysqli->query($sql) or die("Error: " . $mysqli->error);
	if ($hasil->num_rows == 0)
	{	die("User tidak ditemukan!");
	}
	$sql = "DELETE FROM user WHERE id_user='$id'";
	$hasil = $mysqli->query($sql) or die("Error: " . $mysqli->error);
	if ($mysqli->affected_rows > 0)
	{
		echo "<script> alert('User berhasil dihapus');
		window.location.href = '?kode=user'</script>";
	}
	else
	{	echo "<script> alert('User gagal dihapus');
		window.location.href = '?kode=user'</script>";
	}
	$mysqli->close();
?>