<!DOCTYPE html>
<html>
<head>



</head>
<body>
	<div class="container">
		<h1>This is a test</h1>
		

		<div id="piechart"></div>

	</div>


	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 



	<script type="text/javascript">

		google.charts.load('current', {'packages':['corechart']});
	    //google.charts.load('current', {'packages':['table']});
  	    google.charts.setOnLoadCallback(drawChart);



		function drawChart() {

	        var data = new google.visualization.DataTable();
	        data.addColumn('date', 'Datum');
	        data.addColumn('number', 'Ocena');

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


	        var options = {
	          title: 'Napredek dijaka čez čas',
	          width: 900,
	          height: 500,
	          hAxis: {
	            format: 'M/d/yy',
	            gridlines: {count: 15}
	          },
	          vAxis: {
	            gridlines: {color: 'none'},
	            minValue: 0
	          }
	        };

	        var chart = new google.visualization.LineChart(document.getElementById('piechart'));

	        chart.draw(data, options);


		}
		
		//document.write("This is a test");

		function drawTable() {



        	var data = new google.visualization.DataTable();


        	data.addColumn('number', 'Ocena');

        	data.addColumn('date', 'Datum');

			data.addRows([
				[3, new Date(2020, 1, 1)],
				[5, new Date(2019, 5, 8)]
			]);

	        var table = new google.visualization.Table(document.getElementById('piechart'));

	        table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
	      }


		//document.write("To je test");

	</script>
</body>
</html>