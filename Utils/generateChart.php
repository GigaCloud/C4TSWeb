<?php
	$number = $_GET["chart"];
	$header 	= file_get_contents("headChart.html");
	$functions 	= file_get_contents("graphFunctions.php");
	$headChart  = file_get_contents("headChart.js");
	$endChart  	= file_get_contents("endChart.js");
	$end 		= file_get_contents("endChart.html");
	
	file_put_contents("Chart".$number.".js" , $headChart.$number.$endChart);
	
	$chart = file_get_contents("Chart".$number.".js");
	
	file_put_contents("Chart".$number.".php", $header.$functions.$chart.$end);
	
?>