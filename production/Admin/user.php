<div class="row">
	<div class="col-md-12 col-sm-12 ">
		<div class="x_panel">
			<div class="x_title">
				<h2>User BLT</h2>
				<div class="clearfix"></div>
			</div>
			<a href="?kode=inputuser"> <button type="button" class="btn btn-secondary btn-sm">Input User</button> </a>
			<div class="x_content">
				<div class="row">
					<div class="col-sm-12">
						<div class="card-box table-responsive">
							<table id="datatable" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Username</th>
										<th>Nama Staf</th>
										<th>Status User</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
										require 'koneksi.php';
										$data = mysqli_query($koneksi,"SELECT * FROM user");
										$i = 0;
										while ($hasil = mysqli_fetch_array($data)){
											echo '<tr>';
											echo '<td>'.$hasil['username'].'</td>';
											echo '<td>'.$hasil['nama_user'].'</td>';
											echo '<td>'.$hasil['status_user'].'</td>';
											echo '<td><a href="?kode=edituser&ID='.$hasil['id_user'].'"><button type="button" class="btn btn-secondary btn-sm">Edit</button></a> <a href="javascript:KonfirmasiHapus('.$hasil['id_user'].');"><button type="button" class="btn btn-warning btn-sm">Hapus</button></td>';
											echo '</tr>';
											$i++;
										}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function KonfirmasiHapus(x)
	{	bootbox.confirm({
			title: "Konfirmasi",
			message: "Hapus User?",
			callback: function(result){
				if (result == true){
					$.ajax({
						type: "GET",
						url: "?kode=hapususer",
						data: { "ID" : x},
				})
				.done(function(hasilProses){
					bootbox.alert({
						title: "Hasil Penghapusan",
						message: hasilProses,
						callback: function(result){
							window.location.href = "?kode=user";
						}
					});
				})
				.fail(function(jqXHR, textStatus){
					alert( "Request gagal: " + textStatus );
				});
				}
			}
		});
	}
</script>