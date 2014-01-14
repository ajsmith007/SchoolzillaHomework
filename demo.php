<?php
/**
 * Schoolzilla Homework	
 *
 * demo.php 
 *
**/

include 'templates/header.php' ;
include 'templates/navbar.php' ;
?>

<div class="container">	
    <!-- Main page components -->
  		
	<!-- START THE FEATURETTES -->
	<div class="col-lg-10 col-md-10 col-xs-12">	
		<div class="row featurette">
			<h4>Upload Spreadsheet</h4>
			<p>
				This demo will allow you to select a file in a standard spreadsheet format (*.csv or *.xlsx) and upload it for processing. 
			</p>
			<form action="uploadSpreadsheet.php" method="post" enctype="multipart/form-data">
				<label for="file">Spreadsheet Filename:</label>
				<input type="file" name="file" id="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel, .csv, text/plain"><br>
				<input type="submit" name="submit" value="Submit">
			</form>
		</div>
	</div>
</div>