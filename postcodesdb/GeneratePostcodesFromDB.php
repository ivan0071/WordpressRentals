<?php
	//MySQL Information
	$config['mysql_host'] = 'localhost';
	//$config['mysql_host'] = '127.0.0.1';
	$config['mysql_user'] = 'root';
	$config['mysql_pass'] = '';
	$config['mysql_db'] = 'wp_rentals';

	//Nice output if an error occurs during the interaction with the DBMS
	function dberror($connection) {  
		die("DB Error " . mysqli_errno($connection) . " : " . mysqli_error($connection));
	}

	function mysqlclean($input, $maxlength, $connection){
		$input = substr($input, 0, $maxlength);
		$input = mysqli_real_escape_string($connection, $input);
		return $input;
	}
	//opening a DB connection
	if (!($config['mysql_con'] = @ mysqli_connect($config['mysql_host'], $config['mysql_user'], $config['mysql_pass'], $config['mysql_db'])))
		die("Cannot connect to database");
	
	$yesValue = 'Yes';
	$noValue = 'No';
	$query = "SELECT * FROM wp_london_post_codes WHERE in_use = '$yesValue' OR in_use = '$noValue'";
	$result = mysqli_query($config['mysql_con'], $query);
	if(!$result)
	{
		echo 'no success';
		echo $result;
		exit();
	} 
	
	$rootObject = array();	
	if(mysqli_num_rows($result) > 0)
	{
		$alphas = range('A', 'Z');
		$alphasArray = array();
		foreach ($alphas as $key => $value) {
			$alphasArray[$value] = array();
		}
		
		ini_set('memory_limit', '-1');
		while($row = mysqli_fetch_assoc($result))
		{		
			foreach ($alphas as $key => $value) 
			{
				$postcode = $row['postcode'];				
				if ($postcode[0] == $value) 
				{
					array_push($alphasArray[$value], 
													array(
														'postcode' => $row['postcode'],
														'in_use' => $row['in_use'],
														'latitude' => $row['latitude'],
														'longitude' => $row['longitude'],
														'district' => $row['district'],
														'ward' => $row['ward'],
														'constituency' => $row['constituency']
													)
					);
				}			
			}
		}
		
		foreach ($alphas as $key => $value) {
			var_dump(">>>>>>>>>>>>");
			echo "letter " . $value . "<br>";
			
			$object = new stdClass();
			foreach ($alphasArray[$value] as $key1 => $value1)
			{
				$tmpKey = strtoupper(str_replace(' ', '', $value1['postcode']));
				$object->$tmpKey = $value1;	
			}
			
			$rootObject = json_encode($object, JSON_FORCE_OBJECT);
			var_dump($rootObject);
			$fp = fopen('postcodes' . $value . '.json', 'w');
			fwrite($fp, $rootObject);
			fclose($fp);
			var_dump("<<<<<<<<<<<");
		}
	}
?>