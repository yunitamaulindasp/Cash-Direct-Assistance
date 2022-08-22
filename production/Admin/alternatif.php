<div class="row">
	<div class="col-md-12 col-sm-12 ">
		<div class="x_panel">
			<div class="x_title">
				<h2> Alternatif  Penerima BLT </h2>
				<div class="clearfix"></div>
			</div>
			<a href="?kode=inputalternatif"> <button type="button" class="btn btn-secondary btn-sm">Input Data</button> </a>
			<div class="x_content">
				<div class="row">
					<div class="col-sm-12">
						<div class="card-box table-responsive">
							<table id="datatable" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Nama</th>
										<th>Alamat</th>
										<?php
											require 'koneksi.php';
											$data = mysqli_query($koneksi,"SELECT * FROM kriteria");
											$i = 0;
											while ($hasil = mysqli_fetch_array($data)){
												echo '<th>'.$hasil['nama_kriteria'].'</th>';
												$i++;
											}
										?>
										<th> Penerima Bantuan </th>
										<th> Action </th>
									</tr>
								</thead>
								<tbody>
									<?php
										$d = mysqli_query($koneksi,"SELECT * FROM penerima");
										$i = 0;
										while ($h = mysqli_fetch_array($d)){
											$id = $h['id_penerima'];
											$data1 = mysqli_query($koneksi,"SELECT * FROM penerima INNER JOIN alternatif ON penerima.id_penerima=alternatif.idpenerima WHERE alternatif.idpenerima=$id");
											$hasil1 = mysqli_fetch_array($data1);
											echo '<tr>';
											echo '<td>'.$hasil1['nama'].'</td>';
											echo '<td>'.$hasil1['alamat'].'</td>';
											$data2 = mysqli_query($koneksi,"SELECT * FROM alternatif INNER JOIN subkriteria ON alternatif.idsubkriteria=subkriteria.id_sub WHERE alternatif.idpenerima=$id");
											while ($hasil2 = mysqli_fetch_array($data2)){
												echo '<td>'.$hasil2['nama_sub'].'</td>';
											}
											if ($hasil1['bantuan'] == 'T'){
												echo '<td>Tidak Menerima Bantuan Lain</td>';
											}
											else{
												echo '<td>Penerima Bantuan Lain</td>';
											}
											echo '<td><a href="?kode=editalternatif&ID='.$id.'"><button type="button" class="btn btn-secondary">Edit</button></a> <a href="javascript:KonfirmasiHapus('.$id.');"><button type="button" class="btn btn-danger">Hapus</button></td>';
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
			message: "Hapus Penerima?",
			callback: function(result){
				if (result == true){
					$.ajax({
						type: "GET",
						url: "?kode=hapusalternatif",
						data: { "ID" : x},
				})
				.done(function(hasilProses){
					bootbox.alert({
						title: "Hasil Penghapusan",
						message: hasilProses,
						callback: function(result){
							window.location.href = "?kode=alternatif";
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