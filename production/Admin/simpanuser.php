<?php
	$username = $_POST['username'];
	$nama = $_POST['nama'];
	$status = $_POST['status'];
	$pass = $_POST['pass'];
	
	require("koneksi.php");
	$hsl = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM user"));
		//if ($hsl == 0) //bisa dipakai agar data tidak dobel
		//{
			$query = "INSERT INTO user (username, nama_user, status_user, pass_user)
					VALUES ('$username', '$nama', '$status', '$pass' )";
			$hasil = $mysqli->query($query);
		if (!$hasil)
		{	echo "Eror: " . $mysqli->error;
		}
	else
	{	
		
		
		echo "<script type ='text/javascript'>alert('User berhasil ditambahkan'); window.location.href='?kode=user';</script>";
	}
	$mysqli->close();
		//}
		//else
		//{	die("Data Kriteria Sudah Didaftarkan");	}
?>