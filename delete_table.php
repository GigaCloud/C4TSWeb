<?php
	
	$tableNumber = $_GET["table"];
    $pass_get = $_GET["pass"];
	include('Backend/config.php');
    if($pass_get == $pass_script){
        $mysqli = new mysqli($host, $user, $pass, $database);
        $result = $mysqli->query("DELETE FROM table".$tableNumber);
        echo "OK";
	} else {
        echo "Parola gresita, boss";
    }
?>