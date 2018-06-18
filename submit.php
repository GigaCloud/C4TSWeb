<?php	
		$tableNumber = $_GET["table"];
		$v1 = $_GET["v1"];
        $pass_get = $_GET["pass"];
		$v3 = 0;
		
		include('Backend/config.php');
        if($pass_get == $pass_script){
            $mysqli = new mysqli($host, $user, $pass, $database);
            
            if ($tableNumber == "GPS" or $tableNumber == "BMP" or $tableNumber == "SHT" or $tableNumber == "DS18" or $tableNumber == "TSL" or $tableNumber == "time"){
                $result = $mysqli->query("INSERT INTO `table" .$tableNumber. "` (`Data1`) VALUES ('" .$v1. "')");
            } else { 
                $v2 = $_GET["v2"];		
                $result = $mysqli->query("INSERT INTO `table" .$tableNumber. "` (`Data1`, `Data2`, `Data3`) VALUES ('" .$v1. "', '" .$v2. "', '" .$v3. "')");
            }
            echo "OK";
        } else{
           echo "Parola gresita, boss"; 
        }
?>