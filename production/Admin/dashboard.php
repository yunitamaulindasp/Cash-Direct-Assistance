<div class="row">
	<div class="col-md-12">
		<div class="">
			<div class="x_content">
				<div class="row">
					<div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
						<div class="tile-stats">
							<div class="icon"><i class="glyphicon glyphicon-user"></i></div>
							<div class="count">273,5 juta</div>
							<h3>Jiwa</h3>
						</div>
					</div>
					<div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
						<div class="tile-stats">
							<div class="icon"><i class="glyphicon glyphicon-list-alt"></i></div>
							<div class="count">26,5 juta</div>
							<h3>Calon Penerima BLT</h3>
						</div>
					</div>
					<div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
						<div class="tile-stats">
							<div class="icon"><i class="glyphicon glyphicon-download-alt"></i></div>
							<div class="count">23,15 juta</div>
							<h3>Penerima BLT</h3>
						</div>
					</div>
					<div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
						<div class="tile-stats">
							<div class="icon"><i class="glyphicon glyphicon-time"></i></div>
							<?php
								date_default_timezone_set('Asia/Jakarta');
								setlocale(LC_ALL, 'id-ID', 'id_ID');
							?>
							<div class="count"><?php echo strftime('%A'); ?></div>
							<h3><?php echo strftime("%d %B %Y"); ?></h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6 ">
		<div class="x_panel">
			<div class="x_title">
				<h2>Peta Indonesia</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="glyphicon glyphicon-plane"></i></a></li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div class="col-md-12 col-sm-7 ">
					<div class="product-image">
						<img style="width: 100%; display: block;" src="production/images/peta.png"/>
					</div>
				</div>
			</div>
		</div>
		<div class="x_panel">
			<div class="x_title">
				<h2>Penerima Bantuan</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="glyphicon glyphicon-usd"></i></a></li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div id="efektif" style="width: 600px;height:400px;"></div>
			</div>
		</div>
	</div>
	
	<div class="col-md-6">
		<div class="x_panel">
			<div class="x_title">
				<h2>Hasil Survei<small>Penilaian Responden Dalam Program Jaring Pengaman Sosial (JPS)</small></h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="glyphicon glyphicon-check"></i></a></li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div id="survei" style="width: 600px;height:400px;"></div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	var chartDom = document.getElementById('efektif');
	var myChart = echarts.init(chartDom);
	var option;

	option = {
		legend: {
			top: 'bottom'
		},
		toolbox: {
			show: true,
			feature: {
				mark: { show: true },
				dataView: { show: true, readOnly: false },
				restore: { show: true },
				saveAsImage: { show: true }
			}
		},
		series: [{
			name: 'Jumlah Penerima Bantuan',
			type: 'pie',
			radius: [45, 150],
			center: ['50%', '50%'],
			roseType: 'area',
			itemStyle: {
				borderRadius: 8
			},
			data: [
				{ value: 26.9, name: 'Tepat Sasaran' },
				{ value: 54.8, name: 'Tidak Tepat Sasaran' },
				{ value: 18.3, name: 'Tidak Tahu/Tidak Menjawab' }
			]
		}]
	};

	option && myChart.setOption(option);
</script>
<script type="text/javascript">
	var chartDom = document.getElementById('survei');
	var myChart = echarts.init(chartDom);
	var option;

	option = {
		tooltip: {
			trigger: 'axis',
			axisPointer: {
				type: 'shadow'
			}
		},
		grid: {
			left: '3%',
			right: '3%',
			bottom: '5%',
			containLabel: true
		},
		xAxis: [{
			type: 'category',
			data: ['Bantuan Tunai', 'Sembako', 'Listrik Gratis', 'BLT UMK', 'BLT Desa', 'Kartu Prakerja', 'Subsidi Gaji', 'BLU Kemendikbud', 'Non-Penerima'],
			axisTick: {
				alignWithLabel: true
			}
		}],
		yAxis: [{
			type: 'value'
		}],
		series: [{
			name: 'Hasil Survei',
			type: 'bar',
			barWidth: '60%',
			data: [1.7, 7, 2.6, 2.4, 4.6, 2.9, 0.6, 0.2, 78]
		}]
	};

	option && myChart.setOption(option);
</script>