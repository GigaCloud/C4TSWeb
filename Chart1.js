		window.addEventListener('unload', function () { //Ceva memory leak in chrome fara asta
			document.documentElement.innerHTML = '';
		});
		
		<?php $chartNumber = 1; /*Spune ce grafic esti*/?> 
		var config = {
            type: 'line',
            data: {
                labels: [<?php echo XCoordinates($chartNumber);?>],
                datasets: [{
                    label: "Set 1",
                    backgroundColor: window.chartColors.red,
                    borderColor: window.chartColors.red,
                    //data: [1,2,4,4,5,6,7,5,9],
                    data: [<?php echo YCoordinates(1, $chartNumber);?>], //(setDeDate, Grafic)
                    fill: false,
                }, {
                    label: "Set 2",
                    fill: false,
                    backgroundColor: window.chartColors.blue,
                    borderColor: window.chartColors.blue,
                    data: [<?php echo YCoordinates(2, $chartNumber);?>],
                },{
				
                    label: "Set 3",
                    fill: false,
                    backgroundColor: window.chartColors.yellow,
                    borderColor: window.chartColors.yellow,
                    data: [<?php echo YCoordinates(3, $chartNumber);?>],
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
					tension: 0.1
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
		
		
		var ctx = document.getElementById("chart" + <?php echo $chartNumber;?>).getContext("2d");
		
		var myChart = new Chart(ctx, config);