<?php
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$bantuan = $_POST['bantuan'];
	
	require("koneksi.php");
	$query = "INSERT INTO penerima (nama, alamat, bantuan)
				VALUES ('$nama', '$alamat', '$bantuan' )";
	$hasil = $mysqli->query($query);
	if (!$hasil)
	{	
		echo "Eror: " . $mysqli->error;
	}
	else
	{	
		//ambil id penerima
		$data = mysqli_query($koneksi,"SELECT * FROM penerima where nama='$nama'");
		$id = mysqli_fetch_array($data);
		$idterima = $id[0];
		
		//pilih kriteria
		$kriteria = mysqli_query($koneksi,"SELECT * FROM kriteria");
		$k = 0;
		while ($hasilkri = mysqli_fetch_array($kriteria))
		{
			$idkri = $hasilkri['id_kriteria'];
			
			//ambil subkriteria
			$subkri = $_POST['k'.$hasilkri['id_kriteria']];
			
			$query1 = "INSERT INTO alternatif (idpenerima, idkriteria, idsubkriteria)
				VALUES ('$idterima', '$idkri', '$subkri' )";
			$hasil1 = $mysqli->query($query1);
			
			$k++;
		}
		
		echo "<script type ='text/javascript'>alert('Data Penerima BLT Berhasil Ditambahkan'); window.location.href='?kode=alternatif';</script>";
	}
	$mysqli->close();
?>