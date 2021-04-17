



	<?php

		//print_r($ocene);

		//echo $ocene[0]->datumZapisek;
		//echo "<br>";
		//echo 'data.addRows([[new Date('.$ocene[3]->datumZapisek.'),'.$ocene[3]->ocenaZapisek.']]);';
	?>

	<div class="dijak_podatki">
		<h2>Dijak: <?php echo $dijak[0]->imeDijak . " " . $dijak[0]->priimekDijak; ?>, <?php echo $dijak[0]->nazivRazred; ?></h2>
	</div>
		<div class="razred_podatki">
			<div class="podatki">
				<div class="podatki_osnovni obroba_vec">
					<ul class="podatki_list">
						<li>Število ocen: </li>
						<li>Povprečna ocena dijakov: </li>
						<li>Število predmetov: </li>
					</ul>
					<ul class="podatki_list vrednosti">
							<li><?php echo $ocene_osnovno['st_ocen']->st_ocen; ?></li>
							<li><?php echo round($ocene_osnovno['povp_ocena']->povp_ocena, 2); ?></li>
							<li><?php echo $ocene_osnovno['st_predmetov']->st_predmetov; ?></li>
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
						<li><?php echo $dijak_ocene['st_pet']->st_pet; ?></li>
						<li><?php echo $dijak_ocene['st_stiri']->st_stiri; ?></li>
						<li><?php echo $dijak_ocene['st_tri']->st_tri; ?></li>
						<li><?php echo $dijak_ocene['st_dve']->st_dve; ?></li>
						<li><?php echo $dijak_ocene['st_ena']->st_ena; ?></li>
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
	<div class="izpiski">
	<h2>Zapiski dijaka: </h2>
	<?php
		foreach($zapiski as $zapisek){
			echo '<div class="izpisek">
					<div class="izpisek_vsebina_2">
					<h3>'.trim($zapisek->naslovZapisek).'</a></h3> 
					<p>'.$zapisek->nazivPredmet. ", ".$zapisek->imeUporabnik.' '.$zapisek->priimekUporabnik.', '.$zapisek->datumZapisek.'</p>
					<p>'.$zapisek->imeDijak.' '.$zapisek->priimekDijak.', '. $zapisek->nazivRazred.'</p>
					<p class="zapisek_vsebina">'.$zapisek->vsebinaZapisek.'</p>
					</div>
					<a href="'.base_url().'/zapisek_pregled/index/'.$zapisek->idZapisek.'"><button class="btn btn-success">Preglej</button></a>
				</div>';
		}

	?>
	</div>



	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
	<script	type="text/javascript">


	

	google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(drawChart);
	google.charts.setOnLoadCallback(pieChart);



	function drawChart() {

		let data = new google.visualization.DataTable();
		//ustvari tabelo za ocene
		//data.addColumn('string', 'Naslov');
		data.addColumn('date', 'Datum');
		data.addColumn('number', 'Ocena');
		data.addColumn('string', {role: 'annotation'});
		data.addColumn('number', 'idZapisek');
		

		<?php
			// doda vse ocene dijaka v tabelo
			foreach($ocene as $ocena){
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
			title: 'Napredek dijaka čez čas',
			legend: 'none',
			width: 1000,
			colors: ['#0094da'],
			height: 500,
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
				color: '#26cc78',
				lineWidth: 3,
				opacity: 0.5,
				pointSize: 5,
				pointsVisible: false, // hides the points on graph
				tooltip: false, // disables the tooltip on hover
			}}
		};

	
		let chart = new google.visualization.LineChart(document.getElementById('graf_ocene_cez_cas'));

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
	
	function pieChart() {

		var data = new google.visualization.arrayToDataTable([
			['Ocena', 'Število pojavov'],
			["5", <?php echo $dijak_ocene['st_pet']->st_pet; ?>],
			["4", <?php echo $dijak_ocene['st_stiri']->st_stiri; ?>],
			["3", <?php echo $dijak_ocene['st_tri']->st_tri; ?>],
			["2", <?php echo $dijak_ocene['st_dve']->st_dve; ?>],
			["1", <?php echo $dijak_ocene['st_ena']->st_ena; ?>],
		]);

		var options = {
			title: 'Ocene in število njihovih pojavov',
			width: 1000,
			height: 500,
			colors:  ['#0094da', '#00add9', '#00c0b4', '#26cc78', '#a6ce39'],
		};

		var chart = new google.visualization.PieChart(document.getElementById('graf_razporedje_ocen2'));

		chart.draw(data, options);
	}

	</script>
