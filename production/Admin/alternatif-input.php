<div class="row">
	<div class="col-md-12 col-sm-12 ">
		<div class="x_panel">
			<div class="x_title">
				<h2>Input Alternatif</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br />
				<form id="isialternatif" method = "POST" action = "?kode=simpanalternatif" data-parsley-validate class="form-horizontal form-label-left">
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="nama" name="nama" required="required" class="form-control ">
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Alamat</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="alamat" name="alamat" required="required" class="form-control">
						</div>
					</div>
					<?php
						require 'koneksi.php';
						$data = mysqli_query($koneksi,"SELECT * FROM kriteria");
						$a = 0;
						while ($hasil = mysqli_fetch_array($data)){
					?>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"><?php echo $hasil['nama_kriteria']; ?></label>
						<div class="col-md-6 col-sm-6 ">
							<select id="k<?php echo $hasil['id_kriteria']; ?>" name = "k<?php echo $hasil['id_kriteria']; ?>" class="form-control" required>
								<option value="">Pilih <?php echo $hasil['nama_kriteria']; ?></option>
								<?php
									$data1 = mysqli_query($koneksi,"SELECT * FROM subkriteria WHERE id_kri=".$hasil['id_kriteria']);
									$i = 0;
									while ($hasil1 = mysqli_fetch_array($data1)){
								?>
								<option value="<?php echo $hasil1['id_sub']; ?>"> <?php echo $hasil1['nama_sub']; ?></option>
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
							<select id="bantuan" name = "bantuan" class="form-control" required>
								<option value="T">Tidak Menerima Bantuan Lain</option>
								<option value="I">Penerima Bantuan Lain</option>
							</select>
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