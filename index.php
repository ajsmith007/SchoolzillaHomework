<?php
/**
 * Schoolzilla Homework	
 *
 * index.php 
 *
 *	Application to read an input file (csv, xlsx), clean data entries and remap cells to Schoolzilla data warehouse format.
 *
 * @author     Drew Smith <ajsmith007gmail.com>
 * @copyright  2014 Drew Smith
 * @version    0.7.01.14 - demo
**/

include 'templates/header.php' ;
include 'templates/navbar.php' ;
?>

<div class="container">	
    <!-- Main page components -->
  		
   		<!-- START THE FEATURETTES -->
		<div class="col-lg-10 col-md-10 col-xs-12">			
			<div class="row featurette">
	    		<p>Sunday, January 14, 2014</p>
	    		<h2 class="featurette-heading">Welcome to Drew's Schoolzilla Homework</h2>
	    		<h4 class="text-muted">Demonstrating a Data Transform Scenario</h4>
				<p>
					This is a demonstration of an approach for how an input data file or spreadsheet can be transformed to a format suitable for insertion into the Schoolzilla data warehouse. Background information and the original scenario is available for download <a href="resources/Schoolzilla Homework Scenario.pdf" target="_blank">here</a>.
				</p>

				<h4>Scenario</h2> 
				<p>
					At Schoolzilla, we want to help people use data to change students’ lives for the better. But sometimes the data isn't perfect, and needs a lot of cleanup before certain reports can be useful.
					
					For example, imagine the only version of data a customer has for a recent test is in a spreadsheet in the following format.
				</p>
				<table class="table table-bordered table-condensed table-hover">
					<thead>
					<tr>
						<th>Student Number</th>
						<th>Math Score</th>
						<th>Science Score</th>
					</tr>
					</thead>
					<tbody>
					<tr>
						<td>1597530</td>
						<td>100</td>
						<td>80</td>
					</tr>
					<tr>
						<td>2468975</td>
						<td>85</td>
						<td></td>
					</tr>
					<tr>
						<td>8675309</td>
						<td>blue</td>
						<td>95</th>
					</tr>
					</tbody>
				</table>
				<p>
					As you can see, the spreadsheet has missing values in some important columns, a color is in a column that is supposed to have the test score, etc. And it turns out that Student Number 8675309 isn’t a real student number.
					We also need to reshape this data from it’s current format to prepare it for loading into the data warehouse. The table that you would be loading has similar purpose but a different structure:
					<table class="table table-bordered table-condensed table-hover">
					<thead>
					<tr>
						<th>student_id</th>
						<th>subject</th>
						<th>score</th>
					</tr>
					</thead>
					<tbody>
					<tr>
						<td>1597530</td>
						<td>Math</td>
						<td>100</td>
					</tr>
					<tr>
						<td>1597530</td>
						<td>Science</td>
						<td>80</td>
					</tr>
					<tr>
						<td>2468975</td>
						<td>Math</td>
						<td>85</td>
					</tr>
					</tbody>
					</table>
				<p>
					You've accepted the challenge to build a tool to help our users take data in whatever format they have it in, then perform the required cleanup and mapping on our website.
				</p>
			</div>

			<hr class="col-lg-12 col-md-12 col-xs-12 featurette-divider">
			
			<div class="row featurette">
				<h4>Homework Questions</h4>
				<h5>Question 1: How would you design a solution to this problem?</h5>
				<h5>Question 2: How would you verify that your solution continues to perform well?</h5>
			</div>

			<hr class="col-lg-12 col-md-12 col-xs-12 featurette-divider">
			
			<h4>Continue on to the <a href="demo.php">Demo</a>.</h4>

    	</div> <!-- ./col-lg-10 col-md-10 col-xs-12 -->
		<!-- /END THE FEATURETTES -->

	<?php include 'templates/footer.php' ; ?>
</div><!-- /.container -->