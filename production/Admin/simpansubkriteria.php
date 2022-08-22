<?php
	$kriteria = $_POST['pilihkriteria'];
	$nama = $_POST['namasub'];
	$bobot = $_POST['bobotsub'];
	
	require("koneksi.php");
	$hsl = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM subkriteria"));
		//if ($hsl == 0) //bisa dipakai agar data tidak dobel
		//{
			$query = "INSERT INTO subkriteria (id_kri, nama_sub, bobot_sub)
					VALUES ('$kriteria', '$nama', '$bobot' )";
			$hasil = $mysqli->query($query);
		if (!$hasil)
		{	echo "Eror: " . $mysqli->error;
		}
	else
	{	echo "<script type ='text/javascript'>alert('Kriteria berhasil ditambahkan'); window.location.href='?kode=subkriteria';</script>";
	}
	$mysqli->close();
?>