<?php
$digits = '';
	function randomDigits($length){
		$numbers = range(0,9);
		shuffle($numbers);
		for($i = 0; $i < $length; $i++){
			global $digits;
			$digits .= $numbers[$i];
		}
		return $digits;
	}
	$currentYear=date("Y");
	$year = $currentYear%100; //get last digit of year


?>