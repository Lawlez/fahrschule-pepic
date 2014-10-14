<?php
session_start();
error_reporting(0);
$name = $_SESSION['name']


?>
<!DOCTYPE html>
 <html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="SHIELD - Free Bootstrap 3 Theme">
    <meta name="author" content="Haris Pepic">
    <meta http-equiv="refresh" content="4; URL=kontakt.php">
    <link rel="shortcut icon" href="../assets/ico/favicon.png">

    <title>Fahrschule Pepic - Kontakt</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets/css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/icomoon.css">
    <link href="../assets/css/animate-custom.css" rel="stylesheet">


    
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
    
    <script src="../assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="../assets/js/modernizr.custom.js"></script>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
      <script src="../assets/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body data-spy="scroll" data-offset="0" data-target="#navbar-main">
  
 

  
  
		<!-- ==== HEADERWRAP ==== -->
	    <div id="headerwrapu" style="height:100%; width:100%">
			<header class="clearfix">
	  		 		<h1><span class="icon icon-smiley"></span></h1>
	  		 		<p>Vielen Dank <?php echo $name; ?>.</p>
	  		 		<p>Ihre Nachricht wurde erfolgreich &uuml;bermittelt.</p>
	  		</header>	    
	    </div><!-- /headerwrap -->

		
		
		
		


		<div id="footerwrap">
			<div class="container">
				<h4>Copyright 2014 | Farschule Pepic</h4>
			</div>
		</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
		

	<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../assets/js/retina.js"></script>
	<script type="text/javascript" src="../assets/js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="../assets/js/smoothscroll.js"></script>
	<script type="text/javascript" src="../assets/js/jquery-func.js"></script>
  </body>
</html>
