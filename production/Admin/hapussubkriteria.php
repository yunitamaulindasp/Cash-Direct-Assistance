<?php
	$idsub = $_GET['ID'];
	require 'koneksi.php'; //buka koneksi database
	//susun query
	$sql = "SELECT * FROM subkriteria WHERE id_sub='$idsub'";
	$hasil = $mysqli->query($sql) or die("Error: " . $mysqli->error);
	if ($hasil->num_rows == 0)
	{	die("Sub-Kriteria tidak ditemukan!");
	}
	$sql = "DELETE FROM subkriteria WHERE id_sub='$idsub'";
	$hasil = $mysqli->query($sql) or die("Error: " . $mysqli->error);
	if ($mysqli->affected_rows > 0)
	{	echo "<script> alert('Sub-Kriteria berhasil dihapus');
		window.location.href = '?kode=subkriteria'</script>";
	}
	else
	{	echo "<script> alert('Sub-Kriteria gagal dihapus');
		window.location.href = '?kode=subkriteria'</script>";
	}
	$mysqli->close();
?>