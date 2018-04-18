<html>
	<head>
		<script src="Chart.bundle.js"></script>
		<script src="http://www.chartjs.org/samples/latest/utils.js"></script>
		<title>Line Chart</title>
		<style>
		canvas{
			-moz-user-select: none;
			-webkit-user-select: none;
			-ms-user-select: none;
		}
		</style>
	</head>

	<body style = "background-color: white;">
		<div width= "75%" height = "75%">
		<canvas id="chart"></canvas>
		</div>
		<script>
	<?php
	$graphOffset  = 100;
	$minimY		  = 0;
	$maximY		  = 6;
	$dataCounter  = 0;

	function getDataCounter($table){
		$mysqli 			= new mysqli("localhost", "php","php", "datadb");
		$result 			= $mysqli->query("SELECT COUNT(*) FROM table".$table);
		$dataCounter 		= mysqli_fetch_array($result);
		$dataCounter 		= $dataCounter[0];
		return $dataCounter;
	}


	function XCoordinates($table){
		global $dataCounter;
		$dataCounter = getDataCounter($table);
		$returnString 	= "1";

		for($i = 2; $i <= $dataCounter; $i++){
			$returnString .= ",".$i;
		}
		return $returnString;
	}

	function YCoordinates($set, $table){
		$column = "Data".$set;
		$mysqli = new mysqli("localhost", "php", "php", "datadb");
		$result = $mysqli->query("SELECT ".$column." FROM table".$table);
		$data = array();

		while ($row = mysqli_fetch_array($result)) {
			array_push($data, $row[$column]);
		}

		$result_string = implode(",", $data);

		return $result_string;
	}

	function minimumX(){
		global $dataCounter;
		global $graphOffset;
		if ($dataCounter - $graphOffset < 1)
			return 1;
		else
			return $dataCounter - $graphOffset;
	}

	function maximumX(){
		global $dataCounter;
		global $graphOffset;
		if($dataCounter < $graphOffset)
			return $graphOffset;
		else
			return $dataCounter;
	}

?>
		window.addEventListener('unload', function () { //Ceva memory leak in chrome fara asta
			document.documentElement.innerHTML = '';
		});

		<?php $chartNumber = 5; /*Spune ce grafic esti*/?>
		var config = {
            type: 'line',
            data: {
                labels: [<?php echo XCoordinates($chartNumber);?>],
                datasets: [{
                    label: "Total (V)",
                    backgroundColor: window.chartColors.red,
                    borderColor: window.chartColors.red,
                    //data: [1,2,4,4,5,6,7,5,9],
                    data: [<?php echo YCoordinates(1, $chartNumber);?>], //(setDeDate, Grafic)
                    fill: false,
                }, {
                    label: "Celulă (V)",
                    fill: false,
                    backgroundColor: window.chartColors.green,
                    borderColor: window.chartColors.green,
                    data: [<?php echo YCoordinates(2, $chartNumber);?>],
                }]
            },
            options: {
                responsive: true,
                title:{
                    display:true,
                    text:'Grafic de test'
                },
                tooltips: {
                    mode: 'index',
                    intersect: false
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
				animation: {
					duration: 0
				},
				elements: {
					tension: 0.0
				},
                scales: {
                    xAxes: [{
						display: true,
						ticks: {
                            min: <?php echo minimumX();?>,
                            max: <?php echo maximumX();?>
                        },
						scaleLabel: {
							display: true,
							labelString: 'X'
						}

                    }],
                    yAxes: [{
						scaleLabel: {
							display: true,
							labelString: 'Y'
						}
                    }]
                }
            }
        };


		var ctx = document.getElementById("chart").getContext("2d");

		var myChart = new Chart(ctx, config);
    </script>
</body>

</html>
