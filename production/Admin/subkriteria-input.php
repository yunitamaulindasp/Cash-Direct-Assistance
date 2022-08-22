<div class="row">
	<div class="col-md-12 col-sm-12 ">
		<div class="x_panel">
			<div class="x_title">
				<h2>Input Subkriteria</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content"><br/>
				<form id="isisub" method = "POST" action = "?kode=simpansubkriteria" data-parsley-validate class="form-horizontal form-label-left">
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Kriteria</label>
						<div class="col-md-6 col-sm-6 ">
							<select id="pilihkriteria" name = "pilihkriteria" class="form-control" required>
								<option value="">Pilih Kriteria</option>
								<?php
									require 'koneksi.php';
									$data = mysqli_query($koneksi,"SELECT * FROM kriteria");
									$i = 0;
									while ($hasil = mysqli_fetch_array($data)){
								?>
								<option value="<?php echo $hasil['id_kriteria']; ?>"> <?php echo $hasil['nama_kriteria']; ?></option>
								<?php 
										$i++;
									}
								?>
							</select>
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Nama Subkriteria</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="namasub" name="namasub" required="required" class="form-control">
						</div>
					</div>
					<div class="item form-group">
						<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Bobot</label>
						<div class="col-md-6 col-sm-6 ">
							<input id="bobotsub" name="bobotsub" class="form-control" type="text" name="middle-name">
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
