<?php
	
	$tableNumber = $_GET["table"];
	$mysqli = new mysqli("localhost", "php", "php", "datadb");
	$result = $mysqli->query("DELETE FROM table".$tableNumber);
	
?>