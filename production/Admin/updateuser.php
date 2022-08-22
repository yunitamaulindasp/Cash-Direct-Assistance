<?php
	$id = $_POST['id'];
	$username = $_POST['username'];
	$nama = $_POST['nama'];
	$status = $_POST['status'];
	$pass = $_POST['pass'];
	
	require("koneksi.php");
	
	$query = "UPDATE user SET username='$username', nama_user='$nama', status_user='$status', pass_user='$pass' WHERE id_user='$id' ";
	$hasil = $mysqli->query($query); // eksekusi query
	if (!$hasil)
	{ echo "Error: " . $mysqli->error; // tampilkan pesan
	}
	else if ($mysqli->affected_rows == 0)
	{	echo "<script type ='text/javascript'>alert('Data Tidak Berubah!'); window.location.href='?kode=user';</script>";
	}
	else
	{	echo "<script type ='text/javascript'>alert('User berhasil diubah'); window.location.href='?kode=user';</script>";
	}
	$mysqli->close();
?>