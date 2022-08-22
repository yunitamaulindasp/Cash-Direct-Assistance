<?php
	if (!isset ($_GET['ID'])){	
		die("<script>alert('Tentukan dulu data yang akan diubah!');
		window.location.href = '?kode=kriteria'</script>");
	}
	
	$id = $_GET['ID'];
	$_SESSION['ID'] = $id;
	require 'koneksi.php';
	$sql = "SELECT * FROM kriteria WHERE id_kriteria='$id'";
	$hasil = $mysqli->query($sql) or die("Error: ". $mysqli->error);
	if ($hasil->num_rows == 0){	
		die("Kategori tidak ditemukan!");
	}
	$data = $hasil->fetch_row();
?>
<div class="row">
	<div class="col-md-12 col-sm-12 ">
		<div class="x_panel">
			<div class="x_title">
				<h2>Edit Kriteria</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content"><br/>
				<form id="isikriteria" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="?kode=updatekriteria">
					<input type="hidden" id="id" name="id" required="required" class="form-control" value="<?php echo $id ?>">
						<div class="item form-group">
							<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Kriteria 
							</label>
							<div class="col-md-6 col-sm-6 ">
								<input type="text" id="nama" name="nama" required="required" class="form-control" value="<?php echo $data[1] ?>">
							</div>
						</div>
						<div class="item form-group">
							<label class="col-form-label col-md-3 col-sm-3 label-align">Tipe Kriteria</label>
							<?php
								if ($data[2] == 'B' ){
							?>
							<div class="col-md-6 col-sm-6 ">
								Benefit <input type="radio" class="flat" name="tipe" id="tipe" value="B" checked="" required />
								Cost <input type="radio" class="flat" name="tipe" id="tipe" value="C" />
							</div>
							<?php
								} else if ($data[2] == 'C' ){
							?>
							<div class="col-md-6 col-sm-6 ">
								Benefit <input type="radio" class="flat" name="tipe" id="tipe" value="B" />
								Cost <input type="radio" class="flat" name="tipe" id="tipe" value="C" checked="" required />
							</div>
							
							<?php
								}
							?>
						</div>
						<div class="item form-group">
							<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Bobot 
							</label>
							<div class="col-md-6 col-sm-6 ">
								<input type="text" id="bobot" name="bobot" required="required" class="form-control" value="<?php echo $data[3] ?>">
							</div>
						</div>									
						<div class="ln_solid"></div>
						<div class="item form-group">
							<div class="col-md-6 col-sm-6 offset-md-3">
								<button class="btn btn-primary" type="button" onclick="location.href='?kode=kriteria'">Cancel</button>
								<button class="btn btn-primary" type="reset">Reset</button>
								<button type="submit" class="btn btn-success">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
