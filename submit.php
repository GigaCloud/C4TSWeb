<?php	
		$tableNumber = $_GET["table"];
		$v1 = $_GET["v1"];
		$v3 = 0;
		
		$mysqli = new mysqli("localhost", "php", "php", "datadb");
		if ($tableNumber == "GPS"){
			$result = $mysqli->query("INSERT INTO `table" .$tableNumber. "` (`Data1`) VALUES ('" .$v1. "')");
		} else {
			$v2 = $_GET["v2"];		
			$result = $mysqli->query("INSERT INTO `table" .$tableNumber. "` (`Data1`, `Data2`, `Data3`) VALUES ('" .$v1. "', '" .$v2. "', '" .$v3. "')");
		}
?>