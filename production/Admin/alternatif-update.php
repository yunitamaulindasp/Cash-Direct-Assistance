<?php
	if (!isset ($_GET['ID'])){
		die("<script>alert('Tentukan dulu data yang akan diubah!');
		window.location.href = '?kode=alternatif'</script>");
	}
	$id = $_GET['ID'];
	$_SESSION['ID'] = $id;
	require 'koneksi.php';
	$sql = "SELECT * FROM penerima INNER JOIN alternatif ON penerima.id_penerima=alternatif.idpenerima WHERE id_penerima='$id'";
	$hasil = $mysqli->query($sql) or die("Error: ". $mysqli->error);
	if ($hasil->num_rows == 0){
		die("Sub-Kategori tidak ditemukan!");
	}
	$data = $hasil->fetch_array();
?>
<div class="row">
	<div class="col-md-12 col-sm-12 ">
		<div class="x_panel">
			<div class="x_title">
				<h2>Edit Alternatif</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br/>
				<form id="isialternatif" method = "POST" action = "?kode=updatealternatif" data-parsley-validate class="form-horizontal form-label-left">
					<input type="hidden" id="id" name="id" required="required" class="form-control" value="<?php echo $id ?>">
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="nama" name="nama" required="required" class="form-control" value="<?php echo $data['nama'] ?>">
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Alamat</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="alamat" name="alamat" required="required" class="form-control" value="<?php echo $data['alamat'] ?>">
						</div>
					</div>
					<?php
						$data1 = mysqli_query($koneksi,"SELECT * FROM kriteria");
						$a = 0;
						while ($hasil1 = mysqli_fetch_array($data1)){
					?>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"><?php echo $hasil1['nama_kriteria']; ?></label>
						<div class="col-md-6 col-sm-6 ">
							<select id="k<?php echo $hasil1['id_kriteria']; ?>" name = "k<?php echo $hasil1['id_kriteria']; ?>" class="form-control" required>
								<option value="">Pilih <?php echo $hasil1['nama_kriteria']; ?></option>
								<?php
									$data2 = mysqli_query($koneksi,"SELECT * FROM subkriteria WHERE id_kri=".$hasil1['id_kriteria']);
									$i = 0;
									while ($hasil2 = mysqli_fetch_array($data2)){
										$data3 = mysqli_query($koneksi,"SELECT * FROM alternatif INNER JOIN subkriteria ON alternatif.idsubkriteria=subkriteria.id_sub WHERE (alternatif.idpenerima='$id' and subkriteria.id_kri=".$hasil1['id_kriteria'].")");
										$hasil3 = mysqli_fetch_array($data3);
								?>
								<option value="<?php echo $hasil2['id_sub']; ?>" <?php echo $hasil3['idsubkriteria'] == $hasil2['id_sub'] ? "selected" : "" ?>> <?php echo $hasil2['nama_sub']; ?></option>
								<?php
										$i++;
									}
								?>
							</select>
						</div>
					</div>
					<?php
							$a++;
						}
					?>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Penerima Bantuan Lain</label>
						<div class="col-md-6 col-sm-6 ">
							<?php
								if ($data['bantuan'] == 'T'){
							?>
							<select id="bantuan" name = "bantuan" class="form-control" required>
								<option value="T" selected>Tidak Menerima Bantuan Lain</option>
								<option value="I">Penerima Bantuan Lain</option>
							</select>
							<?php
								} else{
							?>	
							<select id="bantuan" name = "bantuan" class="form-control" required>
								<option value="T">Tidak Menerima Bantuan Lain</option>
								<option value="I" selected>Penerima Bantuan Lain</option>
							</select>
							<?php
								}
							?>
						</div>
					</div>
					<div class="ln_solid"></div>
					<div class="item form-group">
						<div class="col-md-6 col-sm-6 offset-md-3">
							<button class="btn btn-primary" type="button" onclick="location.href='?kode=alternatif'">Cancel</button>
							<button class="btn btn-primary" type="reset">Reset</button>
							<button type="submit" class="btn btn-success">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
