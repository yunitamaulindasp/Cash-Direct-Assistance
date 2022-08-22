<?php
	if (!isset ($_GET['ID'])){	
		die("<script>alert('Tentukan dulu data yang akan diubah!');
		window.location.href = '?kode=subkriteria'</script>");
	}
	
	$id = $_GET['ID'];
	$_SESSION['ID'] = $id;
	require 'koneksi.php';
	$sql = "SELECT * FROM subkriteria WHERE id_sub='$id'";
	$hasil = $mysqli->query($sql) or die("Error: ". $mysqli->error);
	if ($hasil->num_rows == 0){	
		die("Sub-Kategori tidak ditemukan!");
	}
	$data = $hasil->fetch_row();
?>
<div class="row">
	<div class="col-md-12 col-sm-12 ">
		<div class="x_panel">
			<div class="x_title">
				<h2>Edit Subkriteria</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content"><br/>
				<form id="isisub" method = "POST" action = "?kode=updatesubkriteria"data-parsley-validate class="form-horizontal form-label-left">
					<input type="hidden" id="id" name="id" required="required" class="form-control" value="<?php echo $id ?>">
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Kriteria</label>
						<div class="col-md-6 col-sm-6 ">
							<?php
								$sql1 = mysqli_query($koneksi,"SELECT * FROM subkriteria INNER JOIN kriteria ON subkriteria.id_kri=kriteria.id_kriteria WHERE subkriteria.id_sub=$id");
								$Data1 = $sql1->fetch_array();
							?>
							<input type="text" id="namakri" name="namakri" required="required" class="form-control" value="<?php echo $Data1['nama_kriteria'] ?>" readonly>
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Nama Subkriteria </label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="namasub" name="namasub" required="required" class="form-control" value="<?php echo $data[2] ?>">
						</div>
					</div>
					<div class="item form-group">
						<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Bobot</label>
						<div class="col-md-6 col-sm-6 ">
							<input id="bobotsub" name="bobotsub" class="form-control" type="text" name="middle-name" value="<?php echo $data[3] ?>">
						</div>
					</div>					
					<div class="ln_solid"></div>
					<div class="item form-group">
						<div class="col-md-6 col-sm-6 offset-md-3">
							<button class="btn btn-primary" type="button" onclick="location.href='?kode=subkriteria'">Cancel</button>
							<button class="btn btn-primary" type="reset">Reset</button>
							<button type="submit" class="btn btn-success">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
