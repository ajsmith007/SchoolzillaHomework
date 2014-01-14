<?php
// get the current script name
$current_file = explode('/', $_SERVER['SCRIPT_NAME']);
$current_file = end($current_file);
?>
	<!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php" ><img class="img-responsive" src="assets/img/schoolzilla-logo-small.png"></a>
			</div>
			<!-- Everything you want hidden at 992px or less, place within here -->
			<div class="navbar-collapse collapse">
			  <ul class="nav navbar-nav">
			  	<?php $active = ($current_file == 'index.php') ? "active" : "nonactive"?>
				<li class=<?php echo $active ?>><a href="index.php">Homework <i class="fa fa-home"></i></a></li>
				<?php $active = ($current_file == 'demo.php') ? "active" : "nonactive"?>
				<li class=<?php echo $active ?>><a href="demo.php">Demo</a></li>
				<?php $active = ($current_file == 'answers.php') ? "active" : "nonactive"?>
				<li class=<?php echo $active ?>><a href="answers.php">Answers <i class="fa fa-envelope-o"></i></a></li>
				<li><a href="//www.linkedin.com/in/ajsmith007" target="_blank">Who Is This Guy<i class="fa fa-question"></i></a></li>
			</ul>
        </div><!--/.nav-collapse -->
      </div><!--/.container -->
    </div><!--/.navbar navbar-default navbar-fixed-top -->