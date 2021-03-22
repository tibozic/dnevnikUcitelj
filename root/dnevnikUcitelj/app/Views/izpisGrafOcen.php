<div class="container">



	<h1>Graf: </h1>

	<div id="graf"></div>

	<?php

		//print_r($ocene);

		//echo $ocene[0]->datumZapisek;
		//echo "<br>";
		//echo 'data.addRows([[new Date('.$ocene[3]->datumZapisek.'),'.$ocene[3]->ocenaZapisek.']]);';
	?>



</div>


	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
	<script	type="text/javascript">


	

	google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(drawChart);



	function drawChart() {

		let data = new google.visualization.DataTable();
		//ustvari tabelo za ocene
		//data.addColumn('string', 'Naslov');
		data.addColumn('date', 'Datum');
		data.addColumn('number', 'Ocena');
		data.addColumn('string', 'Naslov');
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
			width: 1200,
			height: 500,
			hAxis: {
				format: 'MM/dd/yy',
				gridlines: {count: 15}
			},
			vAxis: {
				gridlines: {color: 'none'},
				minValue: 0
			},
			pointSize: 10,
			trendlines: { 0: {
				type: 'polynomial', // type of curve
				color: 'green',
				lineWidth: 2,
				opacity: 0.5,
				pointSize: 5,
				pointsVisible: false, // hides the points on graph
				tooltip: false, // disables the tooltip on hover
			}}
		};

		let chart = new google.visualization.LineChart(document.getElementById('graf'));

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
	


	</script>
