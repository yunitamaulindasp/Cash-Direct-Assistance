<?php
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$bantuan = $_POST['bantuan'];
	
	require("koneksi.php");
	$query = "UPDATE penerima SET nama='$nama', alamat='$alamat', bantuan='$bantuan' WHERE id_penerima=$id";
	$hasil = $mysqli->query($query);
	if (!$hasil)
	{	
		echo "Eror: " . $mysqli->error;
	}
	else
	{	
		//ambil id penerima
		$data = mysqli_query($koneksi,"SELECT * FROM penerima where id_penerima='$id'");
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
			
			//echo '$idkri';
			$query1 = "UPDATE alternatif SET idsubkriteria='$subkri' WHERE (idpenerima='$idterima' and idkriteria='$idkri')";
			$hasil1 = $mysqli->query($query1);
			
			$k++;
		}
		
		echo "<script type ='text/javascript'>alert('Data Penerima BLT Berhasil Diubah'); window.location.href='?kode=alternatif';</script>";
	}
	$mysqli->close();
?>