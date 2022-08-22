<div class="row">
	<div class="col-md-12 col-sm-12 ">
		<div class="x_panel">
			<div class="x_title">
				<h2>Kriteria Penerima BLT</h2>
				<div class="clearfix"></div>
			</div>
			<a href="?kode=inputkriteria"> <button type="button" class="btn btn-secondary btn-sm">Input Data</button> </a>
			<div class="x_content">
				<div class="row">
					<div class="col-sm-12">
						<div class="card-box table-responsive">
							<table id="datatable" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Nama Kriteria</th>
										<th>Tipe Kriteria</th>
										<th>Bobot</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
										require 'koneksi.php';
										$data = mysqli_query($koneksi,"SELECT * FROM kriteria");
										$i = 0;
										while ($hasil = mysqli_fetch_array($data)){
											echo '<tr>';
											echo '<td>'.$hasil['nama_kriteria'].'</td>';
											echo '<td>'.$hasil['tipe_kriteria'].'</td>';
											echo '<td>'.$hasil['bobot_kriteria'].'</td>';
											echo '<td><a href="?kode=editkriteria&ID='.$hasil['id_kriteria'].'"><button type="button" class="btn btn-secondary btn-sm">Edit</button></a> <a href="javascript:KonfirmasiHapus('.$hasil['id_kriteria'].');"><button type="button" class="btn btn-warning btn-sm">Hapus</button></td>';
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
			message: "Hapus Kriteria?",
			callback: function(result){
				if (result == true)
				{	$.ajax({
						type: "GET",
						url: "?kode=hapuskriteria",
						data: { "ID" : x},
				})
				.done(function(hasilProses){
					bootbox.alert({
						title: "Hasil Penghapusan",
						message: hasilProses,
						callback: function(result){
							window.location.href = "?kode=kriteria";
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