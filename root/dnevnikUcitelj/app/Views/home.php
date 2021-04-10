
	<h2>Pozdravljen, <?php echo session()->get('imeUporabnik') ?></h2>
	<h3>
	Vloga: <?php echo session()->get('vlogaUporabnik') ?>
	</h3>
	<?php
		if (session()->get('vlogaUporabnik') == "Administrator")
		{
	?>
			<br><br>
			
			<div class="razred_podatki">
				<h2>Podatki o razredu: <?php echo $razred_naziv[0]->nazivRazred; ?></h2>
				<div class="podatki">
					<div class="podatki_osnovni obroba_vec">
						<ul class="podatki_list">
							<li>Število dijakov: </li>
							<li>Število ocen: </li>
							<li>Povprečna ocena dijakov: </li>
							<li>Število predmetov: </li>
						</ul>
						<ul class="podatki_list vrednosti">
								<li><?php echo $razred_osnovno['st_dijakov']->st_dijakov; ?></li>
								<li><?php echo $razred_osnovno['st_ocen']->st_ocen; ?></li>
								<li><?php echo round($razred_osnovno['povp_ocena']->povp_ocena, 2); ?></li>
								<li><?php echo $razred_osnovno['st_predmetov']->st_predmetov; ?></li>
							</ul>
					</div>
					<div class="podatki_ocene obroba_vec">
						<ul class="podatki_list elementi">
							<li>Število 5: </li>
							<li>Število 4: </li>
							<li>Število 3: </li>
							<li>Število 2: </li>
							<li>Število 1: </li>
						</ul>
						<ul class="podatki_list vrednosti">
							<li><?php echo $razred_ocene['st_pet']->st_pet; ?></li>
							<li><?php echo $razred_ocene['st_stiri']->st_stiri; ?></li>
							<li><?php echo $razred_ocene['st_tri']->st_tri; ?></li>
							<li><?php echo $razred_ocene['st_dve']->st_dve; ?></li>
							<li><?php echo $razred_ocene['st_ena']->st_ena; ?></li>
						</ul>
					</div>
				</div>
				<div class="razred_graf">
					<div class="grafi obroba">
						<div id="graf_ocene_cez_cas"></div>
					</div>
						<div class="grafi obroba">
							<div id="graf_razporedje_ocen2"></div>
					</div>
				</div>
			</div>
			<br><br><br><br>
			<?php

			?>
	<?php
		}
	?>

		<div class="razred_podatki">
			<h2>Podatki o zapiskih učitelja: <?php echo $ucitelj_podatki_osnovno[0]->imeUporabnik . ", " . $ucitelj_podatki_osnovno[0]->priimekUporabnik; ?></h2>
			<div class="podatki">
				<div class="podatki_osnovni obroba_vec">
					<ul class="podatki_list">
						<li>Število dijakov: </li>
						<li>Število zapiskov: </li>
						<li>Povprečna ocena zapiskov: </li>
						<li>Število predmetov: </li>
					</ul>
					<ul class="podatki_list vrednosti">
							<li><?php try{echo $ucitelj_podatki['st_dijakov'][0]->st_dijakov;}catch(exception $e){echo 0;} ?></li>
							<li><?php echo $ucitelj_podatki['st_zapiskov'][0]->st_zapiskov; ?></li>
							<li><?php echo round($ucitelj_podatki['povp_ocena'][0]->povp_ocena, 2)?></li>
							<li><?php echo $ucitelj_podatki['st_predmetov'][0]->st_predmetov; ?></li>
						</ul>
				</div>
				<div class="podatki_ocene obroba_vec">
					<ul class="podatki_list elementi">
						<li>Število 5: </li>
						<li>Število 4: </li>
						<li>Število 3: </li>
						<li>Število 2: </li>
						<li>Število 1: </li>
					</ul>
					<ul class="podatki_list vrednosti">
						<li><?php echo $ucitelj_podatki_ocene['st_pet']->st_pet; ?></li>
						<li><?php echo $ucitelj_podatki_ocene['st_stiri']->st_stiri; ?></li>
						<li><?php echo $ucitelj_podatki_ocene['st_tri']->st_tri; ?></li>
						<li><?php echo $ucitelj_podatki_ocene['st_dve']->st_dve; ?></li>
						<li><?php echo $ucitelj_podatki_ocene['st_ena']->st_ena; ?></li>
					</ul>
				</div>
			</div>
			<div class="razred_graf">
				<div class="grafi obroba">
					<div id="graf_ocene_cez_cas_ucitelj"></div>
				</div>
					<div class="grafi obroba">
						<div id="graf_razporedje_ocen2_ucitelj"></div>
				</div>
			</div>
		<br><br><br><br>


	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 

	<script type="text/javascript">

		google.charts.load('current', {'packages':['corechart']});
		//google.charts.load('current', {'packages':['table']});
		//google.charts.setOnLoadCallback(columnChart);
		google.charts.setOnLoadCallback(lineChart);
		google.charts.setOnLoadCallback(pieChart);
		google.charts.setOnLoadCallback(drawChartUcitelj);
		google.charts.setOnLoadCallback(pieChartUcitelj);



		function columnChart() {

			var data = new google.visualization.arrayToDataTable([
				['Ocena', 'Število pojavov', {role: 'style'}],
				[5, <?php echo $razred_ocene['st_pet']->st_pet; ?>, '#0094da'],
				[4, <?php echo $razred_ocene['st_stiri']->st_stiri; ?>, '#0094da'],
				[3, <?php echo $razred_ocene['st_tri']->st_tri; ?>, '#0094da'],
				[2, <?php echo $razred_ocene['st_dve']->st_dve; ?>, '#0094da'],
				[1, <?php echo $razred_ocene['st_ena']->st_ena; ?>, '#0094da'],
			]);
			// data.addColumn('{role: "style"', "Style");

			// data.addRows([
			// 	[5, 5], [4, 7], [3, 3],
			// 	[2, 1], [1, 3]
			// ]);


			var options = {
				title: 'Ocene in število njihovih pojavov',
				height: 400,
				width: 650,
				legend: {position: "none"},
				color: '#0094da',
			};

			var chart = new google.visualization.ColumnChart(document.getElementById('graf_razporedje_ocen'));

			chart.draw(data, options);
		}


		function lineChart() {

			let data = new google.visualization.DataTable();
			//ustvari tabelo za ocene
			//data.addColumn('string', 'Naslov');
			data.addColumn('date', 'Datum');
			data.addColumn('number', 'Ocena');
			//data.addColumn('string', 'Naslov');
			//data.addColumn('number', 'idZapisek');
			

			<?php
				// doda vse ocene dijaka v tabelo
				foreach($razred_ocene_pojav as $ocena){
					if($ocena->ocenaZapisek != 0){ // 0 je default vrednost, kar pomeni, da ocena ni vpisana
						echo 'data.addRows([[new Date("'.$ocena->datumZapisek.'"),'.$ocena->ocenaZapisek.']]);';
						//echo 'console.log(new Date("'.$ocena->datumZapisek.'"),'.$ocena->ocenaZapisek.');';
					}
				}
			?>

			var view = new google.visualization.DataView(data);
			view.setColumns([0,1]);


			//console.log(new Date('2015-01-02'));
			/*
			data.addRows([
				[new Date(2015, 0, 1), 5],  [new Date(2015, 0, 2), 7],  [new Date(2015, 0, 3), 3],
				[new Date(2015, 0, 4), 1],  [new Date(2015, 0, 5), 3],  [new Date(2015, 0, 6), 4],
				[new Date(2015, 0, 7), 3],  [new Date(2015, 0, 8), 4],  [new Date(2015, 0, 9), 2],
				[new Date(2015, 0, 10), 5], [new Date(2015, 0, 11), 8], [new Date(2015, 0, 12), 6],
				[new Date(2015, 0, 13), 3], [new Date(2015, 0, 14), 3], [new Date(2015, 0, 15), 5],
				[new Date(2015, 0, 16), 7], [new Date(2015, 0, 17), 6], [new Date(2015, 0, 18), 6],
				[new Date(2015, 0, 19), 3], [new Date(2015, 0, 20), 1], [new Date(2015, 0, 21), 2],
				[new Date(2015, 0, 22), 4], [new Date(2015, 0, 23), 6], [new Date(2015, 0, 24), 5],
				[new Date(2015, 0, 25), 9], [new Date(2015, 0, 26), 4], [new Date(2015, 0, 27), 9],
				[new Date(2015, 0, 28), 8], [new Date(2015, 0, 29), 6], [new Date(2015, 0, 30), 4],
				[new Date(2015, 0, 31), 6], [new Date(2015, 1, 1), 7],  [new Date(2015, 1, 2), 9]
			]);
			*/



			let options = {
				title: 'Napredek dijakov čez čas',
				legend: 'none',
				width: 650,
				height: 500,
				color: '#0094da',
				hAxis: {
					format: 'MM/dd/yy',
					gridlines: {count: 15}
				},
				vAxis: {
					gridlines: {color: 'none'},
					minValue: 0,
					maxValue: 7,
				},
				pointSize: 10,
				trendlines: { 0: {
					type: 'polynomial', // type of curve
					degree: 2,
					color: 'green',
					lineWidth: 2,
					opacity: 0.5,
					pointSize: 5,
					pointsVisible: false, // hides the points on graph
					tooltip: false, // disables the tooltip on hover
				}}
			};

			let chart = new google.visualization.LineChart(document.getElementById('graf_ocene_cez_cas'));

			chart.draw(view, options);

		}
		
		

		function pieChart() {

			var data = new google.visualization.arrayToDataTable([
				['Ocena', 'Število pojavov'],
				["5", <?php echo $razred_ocene['st_pet']->st_pet; ?>],
				["4", <?php echo $razred_ocene['st_stiri']->st_stiri; ?>],
				["3", <?php echo $razred_ocene['st_tri']->st_tri; ?>],
				["2", <?php echo $razred_ocene['st_dve']->st_dve; ?>],
				["1", <?php echo $razred_ocene['st_ena']->st_ena; ?>],
			]);

			var options = {
				title: 'Ocene in število njihovih pojavov',
				height: 400,
				width: 650,
			};

			var chart = new google.visualization.PieChart(document.getElementById('graf_razporedje_ocen2'));

			chart.draw(data, options);
		}
	function drawChartUcitelj() {

		let data = new google.visualization.DataTable();
		//ustvari tabelo za ocene
		//data.addColumn('string', 'Naslov');
		data.addColumn('date', 'Datum');
		data.addColumn('number', 'Ocena');
		data.addColumn('string', {role: 'annotation'});
		data.addColumn('number', 'idZapisek');
		

		<?php
			// doda vse ocene dijaka v tabelo
			foreach($ucitelj_ocene as $ocena){
				if($ocena->ocenaZapisek != 0){ // 0 je default vrednost, kar pomeni, da ocena ni vpisana
					echo 'data.addRows([[new Date("'.$ocena->datumZapisek.'"),'.$ocena->ocenaZapisek.',"'.$ocena->naslovZapisek.'", '.$ocena->idZapisek.']]);';
					//echo 'console.log(new Date("'.$ocena->datumZapisek.'"),'.$ocena->ocenaZapisek.');';
				}
			}
		?>

		var view = new google.visualization.DataView(data);
		view.setColumns([0,1]);


		//console.log(new Date('2015-01-02'));
		/*
		data.addRows([
			[new Date(2015, 0, 1), 5],  [new Date(2015, 0, 2), 7],  [new Date(2015, 0, 3), 3],
			[new Date(2015, 0, 4), 1],  [new Date(2015, 0, 5), 3],  [new Date(2015, 0, 6), 4],
			[new Date(2015, 0, 7), 3],  [new Date(2015, 0, 8), 4],  [new Date(2015, 0, 9), 2],
			[new Date(2015, 0, 10), 5], [new Date(2015, 0, 11), 8], [new Date(2015, 0, 12), 6],
			[new Date(2015, 0, 13), 3], [new Date(2015, 0, 14), 3], [new Date(2015, 0, 15), 5],
			[new Date(2015, 0, 16), 7], [new Date(2015, 0, 17), 6], [new Date(2015, 0, 18), 6],
			[new Date(2015, 0, 19), 3], [new Date(2015, 0, 20), 1], [new Date(2015, 0, 21), 2],
			[new Date(2015, 0, 22), 4], [new Date(2015, 0, 23), 6], [new Date(2015, 0, 24), 5],
			[new Date(2015, 0, 25), 9], [new Date(2015, 0, 26), 4], [new Date(2015, 0, 27), 9],
			[new Date(2015, 0, 28), 8], [new Date(2015, 0, 29), 6], [new Date(2015, 0, 30), 4],
			[new Date(2015, 0, 31), 6], [new Date(2015, 1, 1), 7],  [new Date(2015, 1, 2), 9]
		]);
		*/




		let options = {
			title: 'Ocene, ki jih je podeljeval ucitelj čez čas',
			legend: 'none',
			width: 650,
			height: 400,
			hAxis: {
				format: 'MM/dd/yy',
				gridlines: {count: 15}
			},
			vAxis: {
				gridlines: {color: 'none'},
				minValue: 0,
				maxValue: 8,
			},
			pointSize: 10,
			trendlines: { 0: {
				type: 'polynomial', // type of curve
				degree: 2,
				color: 'green',
				lineWidth: 3,
				opacity: 0.5,
				pointSize: 5,
				pointsVisible: false, // hides the points on graph
				tooltip: false, // disables the tooltip on hover
			}}
		};

	
		let chart = new google.visualization.LineChart(document.getElementById('graf_ocene_cez_cas_ucitelj'));

		chart.draw(view, options);

		google.visualization.events.addListener(chart, 'select', function(e)
				{
					// get selected element
					let selection = chart.getSelection();
					// get first row of selected element 
					let row = selection[0].row;
					// get id of selected element which is 4th(3) colomun of selected row
					let idZapisek = data.getValue(row,3);
					//console.log(selection);


					let baseurl = '<?php echo base_url(); ?>';
					let link = baseurl + "/vnos/index/"+idZapisek;
					//console.log(link);
					

					window.location.replace(link);
				}
			);


	}
	function pieChartUcitelj() {

		var data = new google.visualization.arrayToDataTable([
			['Ocena', 'Število pojavov'],
			["5", <?php echo $ucitelj_podatki_ocene['st_pet']->st_pet; ?>],
			["4", <?php echo $ucitelj_podatki_ocene['st_stiri']->st_stiri; ?>],
			["3", <?php echo $ucitelj_podatki_ocene['st_tri']->st_tri; ?>],
			["2", <?php echo $ucitelj_podatki_ocene['st_dve']->st_dve; ?>],
			["1", <?php echo $ucitelj_podatki_ocene['st_ena']->st_ena; ?>],
		]);

		var options = {
			title: 'Ocene in število njihovih pojavov',
			width: 650,
			height: 400,
		};

		var chart = new google.visualization.PieChart(document.getElementById('graf_razporedje_ocen2_ucitelj'));

		chart.draw(data, options);
	}

	</script>




