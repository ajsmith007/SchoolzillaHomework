<?php

function readCSV($csvFile){
	$file_handle = fopen($csvFile, 'r');
	while (!feof($file_handle) ) {
		$line_of_text[] = fgetcsv($file_handle, 1024);
	}
	fclose($file_handle);
	return $line_of_text;
}


// Set path to CSV file
$csvFile = 'input.csv';

$csv = readCSV($csvFile);
echo '<pre>';
print_r($csv);
echo '</pre>';

?>