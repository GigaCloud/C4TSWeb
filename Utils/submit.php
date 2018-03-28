<?php	
		$tableNumber = $_GET["table"];
		$v1 = $_GET["v1"];
		$v2 = $_GET["v2"];
		$v3 = $_GET["v3"];
		
		$mysqli = new mysqli("localhost", "php", "php", "datadb");
		$result = $mysqli->query("INSERT INTO `table" .$tableNumber. "` (`Data1`, `Data2`, `Data3`) VALUES ('" .$v1. "', '" .$v2. "', '" .$v3. "')");
?>