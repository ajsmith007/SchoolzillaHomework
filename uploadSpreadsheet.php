<?php

/**
 * Schoolzilla Homework	
 *
 * uploadSpreadsheet.php 
 *
**/

include 'templates/header.php' ;
include 'templates/navbar.php' ;

include 'utils.class.php';
include 'simplexlsx.class.php';
error_reporting(E_ERROR | E_PARSE);

	define('DEBUG', false);
	$allowedExts = array("csv", "txt", "xls", "xlsx");
	$filename = explode(".", $_FILES["file"]["name"]);
	$extension = end($filename);
	$filesize_limit = 20000; // file size limit of 20kB

	echo '<div class="col-lg-10 col-md-10 col-xs-12">';

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
		    if (DEBUG === true) {
			    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
			    echo "Type: " . $_FILES["file"]["type"] . "<br>";
			    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
			    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
			}	
	    	if (file_exists("upload/" . $_FILES["file"]["name"])){
	      		echo $_FILES["file"]["name"] . " has already been uploaded. <br>";
	      	} else {
	      		move_uploaded_file($_FILES["file"]["tmp_name"],
	      		"upload/" . $_FILES["file"]["name"]);
	      		echo "Stored in: " . "upload/" . $_FILES["file"]["name"] . "<br>";
	      	}
	      	switch ($extension) {
	    	case "csv":
				$csv = readCSV("upload/" . $_FILES["file"]["name"]);

				echo '<h4>Input Spreadsheet (csv)</h4>';
				// worsheet 1
				$num_cols = sizeof($csv);		// number of arrays in the array = rows 
				$num_rows = sizeof($csv[0]); 	// assume all rows have the same number of columns as the header row[0]

				echo '<table class="table table-bordered table-condensed table-hover">';
				echo '<thead>';
				for( $c=0; $c < $num_cols; $c++ ) {
					if ($c == 0){
						echo '<tr>';
						for( $r=0; $r < $num_rows; $r++ ) {
							echo ( (!empty($csv[$c][$r])) ? '<th>'. $csv[$c][$r] : '<th class="warning">'.'&nbsp;' ).'</th>';
						}
						echo '</tr>';
						echo '</thead>';
						echo '<tbody>';
					} else {
						echo '<tr>';
						for( $r=0; $r < $num_rows; $r++ ) {
							echo ( (!empty($csv[$c][$r])) ? '<td>'. $csv[$c][$r] : '<td class="warning">'.'&nbsp;' ).'</td>';
						}
						echo '</tr>';
					} // end if/else
				} //end for $c
				echo '</tbody>';
				echo '</table>';
				break;
			case "txt":
				echo "<p>" . $extension . " format not supported at this time... please check back later. </p>";
				break;
			case "xls":
				echo "<p>" . $extension . " format not supported at this time... please check back later. </p>";
				break;
			case "xlsx":
				$xlsx = new SimpleXLSX("upload/" . $_FILES["file"]["name"]);
				echo '<h4>Input Spreadsheet (xlsx)</h4>';
				// worsheet 1
				list($num_cols, $num_rows) = $xlsx->dimension();

				echo '<table class="table table-bordered table-condensed table-hover">';
				foreach( $xlsx->rows() as $r ) {
					echo '<tr>';
					for( $i=0; $i < $num_cols; $i++ ) {	
						echo ( (!empty($r[$i])) ? '<td>'. $r[$i] : '<td class="warning">'.'&nbsp;' ).'</td>';
					}
					echo '</tr>';
				} //end foreach
				echo '</table>';
				break;
			} // end switch
			echo "Process Data";
			/*<form action="Answers.php" method="post">
				<input type="submit" name="submit" value="Process">
			</form>*/
	    } // end if error
	} else {
	  echo "Invalid file";
	}
	
	echo "</div>";
	include 'templates/footer.php' ;
?>
</div><!-- /.container -->
