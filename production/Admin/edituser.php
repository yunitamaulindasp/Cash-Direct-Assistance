<?php
	if (!isset ($_GET['ID'])){	
		die("<script>alert('Tentukan dulu data yang akan diubah!');
		window.location.href = '?kode=user'</script>");
	}
	
	$id = $_GET['ID'];
	$_SESSION['ID'] = $id;
	require 'koneksi.php';
	$sql = "SELECT * FROM user WHERE id_user='$id'";
	$hasil = $mysqli->query($sql) or die("Error: ". $mysqli->error);
	if ($hasil->num_rows == 0){	
		die("User tidak ditemukan!");
	}
	$data = $hasil->fetch_row();
?>
<div class="row">
	<div class="col-md-12 col-sm-12 ">
		<div class="x_panel">
			<div class="x_title">
				<h2>Edit User</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br/>
				<form id="isiuser" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="?kode=updateuser">
					<input type="hidden" id="id" name="id" required="required" class="form-control" value="<?php echo $id ?>">
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Username</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="username" name="username" required="required" class="form-control" value="<?php echo $data[1] ?>">
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama User</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="nama" name="nama" required="required" class="form-control" value="<?php echo $data[2] ?>">
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align">Status User</label>
						<?php
							if ($data[3] == 'admin' ){
						?>
						<div class="col-md-6 col-sm-6 ">
							admin <input type="radio" class="flat" name="status" id="status" value="admin" checked="" required />
							staf <input type="radio" class="flat" name="status" id="status" value="staf" />
						</div>
						<?php
							}else if ($data[3] == 'staf' ){
						?>
						<div class="col-md-6 col-sm-6 ">
							admin <input type="radio" class="flat" name="status" id="status" value="admin"  />
							staf <input type="radio" class="flat" name="status" id="status" value="staf" checked="" required />
						</div>
						<?php
							}
						?>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Password</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="pass" name="pass" required="required" class="form-control" value="<?php echo $data[4] ?>">
						</div>
					</div>
					<div class="ln_solid"></div>
					<div class="item form-group">
						<div class="col-md-6 col-sm-6 offset-md-3">
							<button class="btn btn-primary" type="button" onclick="location.href='?kode=user'">Cancel</button>
							<button class="btn btn-primary" type="reset">Reset</button>
							<button type="submit" class="btn btn-success">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
