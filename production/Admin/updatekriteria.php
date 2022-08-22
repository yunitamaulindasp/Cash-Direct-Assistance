<?php
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$tipe = $_POST['tipe'];
	$bobot = $_POST['bobot'];
	
	require("koneksi.php");
	
	$query = "UPDATE kriteria SET nama_kriteria='$nama', tipe_kriteria='$tipe', bobot_kriteria='$bobot' WHERE id_kriteria='$id' ";
	$hasil = $mysqli->query($query); // eksekusi query
	if (!$hasil)
	{ echo "Error: " . $mysqli->error; // tampilkan pesan
	}
	else if ($mysqli->affected_rows == 0)
	{	echo "<script type ='text/javascript'>alert('Data Tidak Berubah!'); window.location.href='?kode=kriteria';</script>";
	}
	else
	{	echo "<script type ='text/javascript'>alert('Kriteria berhasil diubah'); window.location.href='?kode=kriteria';</script>";
	}
	$mysqli->close();
?>