<?php include('functii.php'); ?>
<meta charset="UTF-8">
<html>
	<head>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
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
		window.addEventListener('unload', function () { //Ceva memory leak in chrome fara asta
			document.documentElement.innerHTML = '';
		});

		<?php $chartNumber = 2; /*Spune ce grafic esti*/?>
		var config = {
            type: 'line',
            data: {
                labels: [<?php echo XCoordinates($chartNumber);?>],
                datasets: [{
                    label: "Presiune (hPa)",
                    backgroundColor: window.chartColors.yellow,
                    borderColor: window.chartColors.yellow,
                    //data: [1,2,4,4,5,6,7,5,9],
                    data: [<?php echo YCoordinates(1, $chartNumber);?>], //(setDeDate, Grafic)
                    fill: false,
                }, {
                    label: "Umiditate (centi%)",
                    fill: false,
                    backgroundColor: window.chartColors.blue,
                    borderColor: window.chartColors.blue,
                    data: [<?php echo YCoordinates(2, $chartNumber);?>],
                }]
            },
            options: {
                responsive: true,
                title:{
                    display:true,
                    text:'Presiune și umiditate'
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
							labelString: 'Nr. Crt.'
						}

                    }],
                    yAxes: [{
						scaleLabel: {
							display: true,
							labelString: 'hPa / centi%'
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
