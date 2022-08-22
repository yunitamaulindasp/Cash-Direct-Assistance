<div class="row">
	<div class="col-md-12 col-sm-12 ">
		<div class="x_panel">
			<div class="x_title">
				<h2>Input User</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br />
				<form id="isiuser" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="?kode=simpanuser">
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Username</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="username" name="username" required="required" class="form-control ">
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama User</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="nama" name="nama" required="required" class="form-control ">
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align">Status User</label>
						<div class="col-md-6 col-sm-6 ">
							Admin <input type="radio" class="flat" name="status" id="status" value="admin" checked="" required />
							Staf <input type="radio" class="flat" name="status" id="status" value="staf" />
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Password</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="password" id="pass" name="pass" required="required" class="form-control">
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