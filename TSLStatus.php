<meta charset="UTF-8">
<html>
	<head>
		<title>Status TSL</title>
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
    
    function getData(){
		$column = "Data1";
		$mysqli = new mysqli("localhost", "php", "php", "datadb");
		$result = $mysqli->query("SELECT Data1 FROM table4");
		$data = array();
		$counter = 0;
		
		while ($row = mysqli_fetch_array($result)) {
			array_push($data, $row[$column]);
			$counter += 1;
		}
		return $data[$counter-1];
	}
    
    
	function getStatus(){
		$column = "Data1";
		$mysqli = new mysqli("localhost", "php", "php", "datadb");
		$result = $mysqli->query("SELECT Data1 FROM tableTSL");
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
			echo "#d32f2f";
		else
			echo "#43a047";
	}
	
	function getTxt(){
        echo getData()." lux";
        if(getStatus())
            echo " - OK";
        else
            echo " - EROARE";
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
