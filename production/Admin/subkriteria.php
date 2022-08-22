<div class="row">
	<div class="col-md-12 col-sm-12 ">
		<div class="x_panel">
			<div class="x_title">
				<h2> Subkriteria Penerima BLT</h2>
				<div class="clearfix"></div>
			</div>
			<a href="?kode=inputsubkriteria"> <button type="button" class="btn btn-secondary btn-sm">Input Data</button></a>
			<div class="x_content">
				<div class="row">
					<div class="col-sm-12">
						<div class="card-box table-responsive">
							<table id="datatable" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Kriteria</th>
										<th>Subkriteria</th>
										<th>Bobot</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
										require 'koneksi.php';
										$data = mysqli_query($koneksi,"SELECT * FROM subkriteria INNER JOIN kriteria ON subkriteria.id_kri=kriteria.id_kriteria");
										$i = 0;
										while ($hasil = mysqli_fetch_array($data)){
											echo '<tr>';
											echo '<td>'.$hasil['nama_kriteria'].'</td>';
											echo '<td>'.$hasil['nama_sub'].'</td>';
											echo '<td>'.$hasil['bobot_sub'].'</td>';
											echo '<td><a href="?kode=editsubkriteria&ID='.$hasil['id_sub'].'"><button type="button" class="btn btn-secondary">Edit</button></a> <a href="javascript:KonfirmasiHapus('.$hasil['id_sub'].');"><button type="button" class="btn btn-danger">Hapus</button></td>';
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
	function KonfirmasiHapus(x){	
		bootbox.confirm({
			title: "Konfirmasi",
			message: "Hapus Sub-Kriteria?",
			callback: function(result){
				if (result == true){	
					$.ajax({
						type: "GET",
						url: "?kode=hapussubkriteria",
						data: { "ID" : x},
					})
					.done(function(hasilProses){
						bootbox.alert({
							title: "Hasil Penghapusan",
							message: hasilProses,
							callback: function(result){
								window.location.href = "?kode=subkriteria";
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