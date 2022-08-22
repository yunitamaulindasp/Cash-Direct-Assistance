<?php
	$id = $_POST['id'];
	$nama = $_POST['namasub'];
	$bobot = $_POST['bobotsub'];
	
	require("koneksi.php");
	
	$query = "UPDATE subkriteria SET nama_sub='$nama', bobot_sub='$bobot' WHERE id_sub='$id' ";
	$hasil = $mysqli->query($query); // eksekusi query
	if (!$hasil)
	{ echo "Error: " . $mysqli->error; // tampilkan pesan
	}
	else if ($mysqli->affected_rows == 0)
	{	echo "<script type ='text/javascript'>alert('Data Tidak Berubah!'); window.location.href='?kode=subkriteria';</script>";
	}
	else
	{	echo "<script type ='text/javascript'>alert('Sub-Kriteria berhasil diubah'); window.location.href='?kode=subkriteria';</script>";
	}
	$mysqli->close();
?>