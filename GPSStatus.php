<meta charset="UTF-8">
<html>
	<head>
		<title>Status GPS</title>
		<style>
			div {
				height: 90px;
				line-height: 90px;
				text-align: center;
			}
			h1 {
				font-family: Helvetica;
				color: white;
				-webkit-text-stroke-width: 1px;
				-webkit-text-stroke-color: black;
			}
		</style>
	</head>

	<?php
	function getStatus(){
		$column = "Data1";
		$mysqli = new mysqli("localhost", "php", "php", "datadb");
		$result = $mysqli->query("SELECT Data1 FROM tableGPS");
		$data = array();
		$counter = 0;
		
		while ($row = mysqli_fetch_array($result)) {
			array_push($data, $row[$column]);
			$counter += 1;
		}
		return $data[$counter-1];
	}
	
	function getColor(){
		if (getStatus() == 0)
			echo "red";
		else
			echo "green";
	}
	
	function getTxt(){
		if (getStatus() == 0)
			echo "EROARE GPS";
		else
			echo "GPS OK";
	}
	?>
	
	<body style = "background-color: <?php getColor() ?>;">
		<div><h1><?php getTxt() ?></h1></div>
			
	
		<script>
		window.addEventListener('unload', function () { //Ceva memory leak in chrome fara asta
			document.documentElement.innerHTML = '';
		});
		</script>
		
		
		
</body>

</html>