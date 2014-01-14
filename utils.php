<?php
/*
	Utilities for general PHP programming
*/

function printVar($var) {
    echo '<pre>';
    var_dump($var); 
    echo '</pre>';
}

function readCSV($csvFile){
	$file_handle = fopen($csvFile, 'r');
	while (!feof($file_handle) ) {
		$line_of_text[] = fgetcsv($file_handle, 1024);
	}
	fclose($file_handle);
	return $line_of_text;
}


?>