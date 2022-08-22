<div class="row">
	<div class="col-md-12 col-sm-12 ">
		<div class="x_panel">
			<div class="x_title">
				<h2> Subkriteria Penerima BLT <small>Users</small></h2>
				<div class="clearfix"></div>
			</div>
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