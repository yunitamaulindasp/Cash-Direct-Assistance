<?php
	$idkri = $_GET['ID'];
	require 'koneksi.php'; //buka koneksi database
	//susun query
	$sql = "SELECT * FROM kriteria WHERE ID_kriteria='$idkri'";
	$hasil = $mysqli->query($sql) or die("Error: " . $mysqli->error);
	if ($hasil->num_rows == 0)
	{	die("Kriteria tidak ditemukan!");
	}
	$sql = "DELETE FROM kriteria WHERE ID_kriteria='$idkri'";
	$hasil = $mysqli->query($sql) or die("Error: " . $mysqli->error);
	if ($mysqli->affected_rows > 0)
	{	
		$sql1 = "SELECT * FROM subkriteria WHERE id_kri='$idkri'";
		$hasil1 = $mysqli->query($sql1) or die("Error: " . $mysqli->error);
	
		$i=0;
		while ($data=mysqli_fetch_array($hasil1))
		{
			$sql = "DELETE FROM subkriteria WHERE id_kri='$idkri'";
			$hasil = $mysqli->query($sql) or die("Error: " . $mysqli->error);
			$i++;
		}
		
		$sql2 = "DELETE FROM alternatif WHERE idkriteria='$idkri'";
		$hasil2 = $mysqli->query($sql2) or die("Error: " . $mysqli->error);
		echo "<script> alert('Kriteria berhasil dihapus');
		window.location.href = '?kode=kriteria'</script>";
	}
	else
	{	echo "<script> alert('Kriteria gagal dihapus');
		window.location.href = '?kode=kriteria'</script>";
	}
	$mysqli->close();
?>