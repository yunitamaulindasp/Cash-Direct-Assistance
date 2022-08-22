<?php
	require("koneksi.php");
	
	//matriks keputusan
	//echo "1. Matriks Keputusan";
	$ar_keputusan=[];

	$penerima = mysqli_query($koneksi,"SELECT * FROM penerima");
	
	$no = 1 ;
	while ($calon = mysqli_fetch_array($penerima))
	{
		$id = $calon['id_penerima'];
		$alternatif = mysqli_query($koneksi,"SELECT * FROM alternatif JOIN subkriteria ON alternatif.idsubkriteria=subkriteria.id_sub WHERE alternatif.idpenerima=$id");
		$n = 1;
		while ($nilai = mysqli_fetch_array($alternatif))
		{
			$ar_keputusan[$no-1][$n-1] = $nilai['bobot_sub'];
			//echo "<br>Matriks Keputusan [".($no-1).",".($n-1)."] = ".$nilai['bobot_sub'];
			$n++;
		}
		$no++;
	}
	
	//normalisasi matriks keputusan
	//echo "<br><br>2. Normalisasi Matriks Keputusan";
	
	//akar kuadrat
	$ar_C=[];
	$kriteria = mysqli_query($koneksi,"SELECT * FROM kriteria");
	$n = 1;
	while ($nilai = mysqli_fetch_array($kriteria))
	{
		$kuadrat = 0;
		$penerima = mysqli_query($koneksi,"SELECT * FROM penerima");
		$no = 1 ;
		while ($calon = mysqli_fetch_array($penerima))
		{
			$kuadrat = $kuadrat+pow($ar_keputusan[$no-1][$n-1],2);
			$no++;
		}
		$ar_C[$n-1]=$kuadrat;
		$n++;
	} 
	//

	$ar_normalisasi=[];
	
	$penerima = mysqli_query($koneksi,"SELECT * FROM penerima");
		
	$no = 1 ;
	while ($calon = mysqli_fetch_array($penerima))
	{
		$id = $calon['id_penerima'];
		$alternatif = mysqli_query($koneksi,"SELECT * FROM alternatif JOIN subkriteria ON alternatif.idsubkriteria=subkriteria.id_sub WHERE alternatif.idpenerima=$id");
		$n = 1;
		while ($nilai = mysqli_fetch_array($alternatif))
		{
			$ar_normalisasi[$no-1][$n-1]= round(($ar_keputusan[$no-1][$n-1]/sqrt($ar_C[$n-1])),4);
			//echo "<br>Normalisasi Matriks Keputusan [".($no-1).",".($n-1)."] = ".$ar_normalisasi[$no-1][$n-1];
			$n++;
		}
		$no++;
	} 
	
	//terbobot
	//echo "<br><br>3. Matriks Normalisasi Terboobot";
	
	$ar_terbobot=[];
	
	$penerima = mysqli_query($koneksi,"SELECT * FROM penerima");

	$no = 1 ;
	while ($calon = mysqli_fetch_array($penerima))
	{
		$id = $calon['id_penerima'];
		$alternatif = mysqli_query($koneksi,"SELECT * FROM alternatif JOIN subkriteria JOIN kriteria ON (alternatif.idsubkriteria=subkriteria.id_sub AND subkriteria.id_kri=kriteria.id_kriteria) WHERE alternatif.idpenerima=$id");
		$n = 1;
		while ($nilai = mysqli_fetch_array($alternatif))
		{
			$ar_terbobot[$no-1][$n-1]= round($ar_normalisasi[$no-1][$n-1]*($nilai['bobot_kriteria']/100),4);
			//echo "<br>Matriks Normalisasi Terbobot [".($no-1).",".($n-1)."] = ".$ar_terbobot[$no-1][$n-1];
			$n++;
		}
		$no++;
	} 
	
	//hitung nilai Yi
	//echo "<br><br>4. Nilai Yi";
	$ar_Yi=[];
	
	$penerima = mysqli_query($koneksi,"SELECT * FROM penerima");

	$no = 1 ;
	while ($calon = mysqli_fetch_array($penerima))
	{
		$id = $calon['id_penerima'];
		$nama = $calon['nama'];
		$alternatif = mysqli_query($koneksi,"SELECT * FROM alternatif JOIN subkriteria JOIN kriteria ON (alternatif.idsubkriteria=subkriteria.id_sub AND subkriteria.id_kri=kriteria.id_kriteria) WHERE alternatif.idpenerima=$id");
		$n = 1;
		$hitung = 0;
		while ($nilai = mysqli_fetch_array($alternatif))
		{
			if ($nilai['tipe_kriteria']=='B')
			{
				$hitung = $hitung+$ar_terbobot[$no-1][$n-1];
			}
			else if ($nilai['tipe_kriteria']=='C')
			{
				$hitung = $hitung+$ar_terbobot[$no-1][$n-1];
			}
			$n++;
		}
		$ar_Yi = $ar_Yi+["$nama" => $hitung];
		//echo "<br>ID penerima : ".$nama." | Y".($no-1)." : ".$hitung;
		$no++;
	}
	
	//rangking
	//echo "<br><br>5. Rangking";
	arsort($ar_Yi);
?>
<div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> Rangking Penerima BLT <small>Menggunakan Metode SPK Moora</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    
                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Rangking</th>
						  <th>Nama Penerima BLT</th>
                          <th>Nilai SPK Moora</th>
                          </tr>
                      </thead>


                      <tbody>
                        <?php
							$no = 0;
							foreach($ar_Yi as $nama=>$nilai_Yi)
							{
								echo '<tr>';
								echo '<td>'.($no+1).'</td>';
								echo '<td>'.$nama.'</td>';
								echo '<td>'.$nilai_Yi.'</td>';
								echo '</tr>';
								$no++;
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
<?php
	$no = 0;
	foreach($ar_Yi as $nama=>$nilai_Yi)
	{
		//echo "<br>Nama Calon : ".$nama;
		//echo " | nilai Yi = ".$nilai_Yi;
	}
?>