<?php
	$id = $_GET['ID'];
	require 'koneksi.php'; //buka koneksi database
	//susun query
	$sql = "SELECT * FROM penerima WHERE id_penerima='$id'";
	$hasil = $mysqli->query($sql) or die("Error: " . $mysqli->error);
	if ($hasil->num_rows == 0)
	{	die("Penerima tidak ditemukan!");
	}
	$sql = "DELETE FROM penerima WHERE id_penerima='$id'";
	$hasil = $mysqli->query($sql) or die("Error: " . $mysqli->error);
	if ($mysqli->affected_rows > 0)
	{	
		$sql1 = "SELECT * FROM alternatif WHERE idpenerima='$id'";
		$hasil1 = $mysqli->query($sql1) or die("Error: " . $mysqli->error);
	
		$i=0;
		while ($data=mysqli_fetch_array($hasil1))
		{
			$sql = "DELETE FROM alternatif WHERE idpenerima='$id'";
			$i++;
		}
		echo "<script> alert('Penerima berhasil dihapus');
		window.location.href = '?kode=alternatif'</script>";
	}
	else
	{	echo "<script> alert('Penerima gagal dihapus');
		window.location.href = '?kode=alternatif'</script>";
	}
	$mysqli->close();
?>