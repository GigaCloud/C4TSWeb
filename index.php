<?php
	$generate	= file_get_contents("index.php");
	$header 	= file_get_contents("head.html");
	$functions 	= file_get_contents("graphFunctions.php");
	$Chart1  	= file_get_contents("Chart1.js");
	$end 		= file_get_contents("end.html");
	
	//SELECT COUNT(*) FROM MyBigtable
	
	//echo $header, $Chart1, $end;
	
	/*$mysqli = new mysqli("localhost", "php", "php", "date");
	$result = $mysqli->query("DROP TABLE ayylmao");
	echo $result;*/
	file_put_contents("index2.php", $header.$functions.$Chart1.$end);
	//
?>
<meta http-equiv="refresh" content="0; url=index2.php" />