<?php
	$nama = $_POST['nama'];
	$tipe = $_POST['tipe'];
	$bobot = $_POST['bobot'];
	
	require("koneksi.php");
	$hsl = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM kriteria"));
		//if ($hsl == 0) //bisa dipakai agar data tidak dobel
		//{
			$query = "INSERT INTO kriteria (nama_kriteria, tipe_kriteria, bobot_kriteria)
					VALUES ('$nama', '$tipe', '$bobot' )";
			$hasil = $mysqli->query($query);
		if (!$hasil)
		{	echo "Eror: " . $mysqli->error;
		}
	else
	{	
		$kri = mysqli_query($koneksi, "SELECT * FROM kriteria WHERE nama_kriteria='$nama'");
		$hkri = mysqli_fetch_array($kri);
		$sql = mysqli_query($koneksi, "SELECT * FROM penerima");
		$byk = mysqli_num_rows($sql);
		if ($byk <> 0)
		{
			$i=0;
			while ($hasil = mysqli_fetch_array($sql))
			{
				$query1 = "INSERT INTO alternatif (idpenerima, idkriteria, idsubkriteria)
				VALUES ('".$hasil['id_penerima']."', '".$hkri['id_kriteria']."', '32' )";
				$hasil1 = $mysqli->query($query1);
				$i++;
			}
		}
		
		echo "<script type ='text/javascript'>alert('Kriteria berhasil ditambahkan'); window.location.href='?kode=kriteria';</script>";
	}
	$mysqli->close();
		//}
		//else
		//{	die("Data Kriteria Sudah Didaftarkan");	}
?>