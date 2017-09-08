<?php
	
	$tableNumber = $_GET["table"];
	$mysqli = new mysqli("localhost", "php", "php", "date");
	$result = $mysqli->query("DELETE FROM tabel".$tableNumber);
	
?>