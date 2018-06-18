<meta charset="UTF-8">
<html>
	<head>
		<title>Timpul ultimului pachet</title>
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
		include('config.php');$mysqli = new mysqli($host, $user, $pass, $database);
		$result = $mysqli->query("SELECT Data1 FROM tabletime");
		$data = array();
		$counter = 0;
		
		while ($row = mysqli_fetch_array($result)) {
			array_push($data, $row[$column]);
			$counter += 1;
		}
		return $data[$counter-1];
	}
    
	

	?>
	
	<body style = "background-color: ;">
		<div><h1><?php echo getData() ?></h1></div>
			
	
		<script>
		window.addEventListener('unload', function () { //Ceva memory leak in chrome fara asta
			document.documentElement.innerHTML = '';
		});
		</script>
		
		
		
</body>

</html>
