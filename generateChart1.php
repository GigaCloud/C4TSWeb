<?php
	$header 	= file_get_contents("headChart.html");
	$functions 	= file_get_contents("graphFunctions.php");
	$chart  	= file_get_contents("Chart1.js");
	$end 		= file_get_contents("endChart.html");
	
	file_put_contents("Chart1.php", $header.$functions.$chart.$end);
	
?>