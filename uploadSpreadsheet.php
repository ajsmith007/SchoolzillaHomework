<?php

include 'utils.class.php';
include 'simplexlsx.class.php';
error_reporting(E_ERROR | E_PARSE);

$allowedExts = array("csv", "txt", "xls", "xlsx");
$filename = explode(".", $_FILES["file"]["name"]);
$extension = end($filename);
$filesize_limit = 20000; // file size limit of 20kB

printVar($temp);
echo $_FILES["file"]["type"] ."\n";
echo $extension . "\n";

if (
	(($_FILES["file"]["type"] == "text/csv")
	|| ($_FILES["file"]["type"] == "text/txt")
	|| ($_FILES["file"]["type"] == "application/vnd.ms-excel")
	|| ($_FILES["file"]["type"] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"))
	&& ($_FILES["file"]["size"] <= $filesize_limit) 
	&& in_array($extension, $allowedExts)
	){
 	if ($_FILES["file"]["error"] > 0){
    	echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    } else {
	    /*if (DEBUG) {
		    echo "<div>";
		    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
		    echo "Type: " . $_FILES["file"]["type"] . "<br>";
		    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
		    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
		    echo "</div>";
		}*/	
    	if (file_exists("upload/" . $_FILES["file"]["name"])){
      		echo $_FILES["file"]["name"] . " already exists. ";
      	} else {
      		move_uploaded_file($_FILES["file"]["tmp_name"],
      		"upload/" . $_FILES["file"]["name"]);
      		echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
      	}
      	switch ($extension) {
    	case "csv":
			$csv = readCSV("upload/" . $_FILES["file"]["name"]);
			echo '<pre>';
			print_r($csv);
			echo '</pre>';
			break;
		case "txt":
			echo $extension . " format not supported at this time... please check back later.";
			break;
		case "xls":
			echo $extension . " format not supported at this time... please check back later.";
			break;
		case "xlsx":
			$xlsx = new SimpleXLSX("upload/" . $_FILES["file"]["name"]);
			echo '<table cellpadding="10">
			<tr><td valign="top">';

			// output worsheet 1
			list($num_cols, $num_rows) = $xlsx->dimension();

			echo '<h1>Sheet 1</h1>';
			echo '<table>';
			foreach( $xlsx->rows() as $r ) {
				echo '<tr>';
				for( $i=0; $i < $num_cols; $i++ )
					echo '<td>'.( (!empty($r[$i])) ? $r[$i] : '&nbsp;' ).'</td>';
				echo '</tr>';
			} //end foreach
			echo '</table>';

			echo '</td><td valign="top">';
			break;
		} // end switch
    } // end error
} else {
  echo "Invalid file";
}


?>