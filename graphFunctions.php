<?php
	$graphOffset  = 10;
	$minimY		  = 0;
	$maximY		  = 6;
	$dataCounter  = 0;
	
	function getDataCounter($table){
		$mysqli 			= new mysqli("localhost", "php", "php", "datadb");
		$result 			= $mysqli->query("SELECT COUNT(*) FROM table".$table);
		$dataCounter 		= mysqli_fetch_array($result);
		$dataCounter 		= $dataCounter[0];
		return $dataCounter;
	}
	
	
	function XCoordinates($table){
		global $dataCounter;
		$dataCounter = getDataCounter($table);
		$returnString 	= "1";
		
		for($i = 2; $i <= $dataCounter; $i++){
			$returnString .= ",".$i;
		}
		return $returnString;
	}
		
	function YCoordinates($set, $table){
		$column = "Data".$set;
		$mysqli = new mysqli("localhost", "php", "php", "datadb");
		$result = $mysqli->query("SELECT ".$column." FROM table".$table);
		$data = array();
		
		while ($row = mysqli_fetch_array($result)) {
			array_push($data, $row[$column]);
		}
		
		$result_string = implode(",", $data);
		
		return $result_string;
	}
	
	function minimumX(){
		global $dataCounter;
		global $graphOffset;
		if ($dataCounter - $graphOffset < 1)
			return 1;
		else
			return $dataCounter - $graphOffset;
	}
	
	function maximumX(){
		global $dataCounter;
		global $graphOffset;
		if($dataCounter < $graphOffset)
			return $graphOffset;
		else 
			return $dataCounter;	
	}
	
?>