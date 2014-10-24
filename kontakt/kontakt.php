<?php
error_reporting(0);
session_start();
require_once("AntiSpam.php");

$q = AntiSpam::getRandomQuestion();

  $script_root = substr(__FILE__, 0,
                        strrpos(__FILE__,
                                DIRECTORY_SEPARATOR)
                       ).DIRECTORY_SEPARATOR;



$remote = getenv("REMOTE_ADDR");

@require('config.php');
require_once("AntiSpam.php");
if ($_POST['delete'])
{
unset($_POST);
}

if ($_POST["kf-km"]) {


$name = $_POST["name"];
$email = $_POST["email"];
$betreff = $_POST["betreff"];
$nachricht = $_POST["nachricht"];
   
   $date = date("d.m.Y | H:i");
   $ip = $_SERVER['REMOTE_ADDR']; 
   $UserAgent = $_SERVER["HTTP_USER_AGENT"];
   $host = getHostByAddr($remote);
   

$name = stripslashes($name);
$email = stripslashes($email);
$betreff = stripslashes($betreff);
$nachricht = stripslashes($nachricht);


$_SESSION['name']= $name; 


//check antiSpam
if(isset($_POST["q_id"])){
  $answer = AntiSpam::getAnswerById(intval($_POST["q_id"]));
  if($_POST["q"] != $answer){
    $fehler['q_id12'] = "<font color=#cc3333>Bitte die <strong>Sicherheitsfrage</strong> richtig beantworten.<br /></font>";
  }
}
   

  
     

   
if(!$name) {
 
 $fehler['name'] = "<font color=#cc3333>Geben Sie bitte Ihren <strong>Namen</strong> ein.<br /></font>";
 
}


if (!preg_match("/^[0-9a-zA-ZÄÜÖ_.-]+@[0-9a-z.-]+\.[a-z]{2,6}$/", $email)) {
   $fehler['email'] = "<font color=#cc3333>Geben Sie bitte Ihre <strong>E-Mail-Adresse</strong> ein.<br /></font>";
}

 
if(!$betreff) {
 
 $fehler['betreff'] = '<font color=#cc3333>Geben Sie bitte einen <strong>Betreff</strong> ein.<br /></font>';
 
 
}
 
if(!$nachricht) {
 
 $fehler['nachricht'] = '<br /><font color=#cc3333>Geben Sie bitte eine <strong>Nachricht</strong> ein.<br /></font>';
 
 
}




   if (!isset($fehler))
   {


   $recipient = "".$empfaenger."";
   $betreff = "".$_POST["betreff"]."";
   $mailheaders = "From: \"".stripslashes($_POST["name"])."\" <".$_POST["email"].">\n";
   $mailheaders .= "Reply-To: <".$_POST["email"].">\n";
   $mailheaders .= "X-Mailer: PHP/" . phpversion() . "\n";


   $msg  = "Folgendes wurde am ". $date ." Uhr per Formular geschickt:\n" . "-------------------------------------------------------------------------\n\n";
$msg .= "Name: " . $name . "\n";
$msg .= "E-Mail: " . $email . "\n";
$msg .= "\nBetreff: " . $betreff . "\n";
$msg .= "Nachricht:\n" . $_POST['nachricht'] = preg_replace("/\r\r|\r\n|\n\r|\n\n/","\n",$_POST['nachricht']) . "\n\n";
   "-------------------------------------------------------------------------\n\n";
 
  $msg .= "\n\nIP Adresse: " . $ip . "\n";
   
   $msg = strip_tags ($msg);

   
   $dsubject = "Ihre Anfrage"; 
   $dmailheaders = "From: ".$ihrname." <".$recipient.">\n";
   $dmailheaders .= "Reply-To: <".$recipient.">\n";
   $dmsg  = "Vielen Dank für Ihre E-Mail. Wir werden schnellstmöglich darauf antworten.\n\n";
   $dmsg .= "Zusammenfassung: \n" .
  "-------------------------------------------------------------------------\n\n";
$dmsg .= "Name: " . $name . "\n";

$dmsg .= "\nBetreff: " . $betreff . "\n";
$dmsg .= "Nachricht:\n" . str_replace("\r", "", $nachricht) . "\n\n";
   

   
   $dmsg = strip_tags ($dmsg);


if (mail($recipient,$betreff,$msg,$mailheaders)) {
mail($email, $dsubject, $dmsg, $dmailheaders);


echo "<META HTTP-EQUIV=\"refresh\" content=\"0;URL=".$danke."\">";
exit;
 
}
}
}

?>
<!DOCTYPE html>
 <html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, inital-scale=1.0, maxium-scale=1.0, user-scalable=0">
    <meta name="description" content="SHIELD - Free Bootstrap 3 Theme">
    <meta name="author" content="Haris Pepic">
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

    <!-- Google Analytics -->
    <script>
    (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function() {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
        m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-53989353-2', 'auto');
    ga('send', 'pageview');
    </script>

  </head>

  <body data-spy="scroll" data-offset="0" data-target="#navbar-main">
  
  
  	<div id="navbar-main">
      <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon icon-shield" style="font-size:30px; color:#3498db;"></span>
          </button>
          <a class="navbar-brand hidden-xs hidden-sm" href="#fahrzeuge"><span class="icon icon-shield" style="font-size:18px; color:#3498db;"></span></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li> <a href="../index.html">Home</a></li>
			<li> <a href="../fahrlehrer/fahrlehrer.html"> Fahrlehrer</a></li>
			<li> <a href="../fahrstunden/fahrstunden.html"> Fahrstunden</a></li>
			<li> <a href="../fahrzeuge/fahrzeuge.html"> Fahrzeuge</a></li>
			<li> <a href="../nothelfer-vku/nothelfer-vku.html"> Nothelfer / VKU</a></li>
			<li> <a href="kontakt.php" class="active"> Kontakt</a></li>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    </div>

  
  
		<!-- ==== HEADERWRAP ==== -->
	    <div id="headerwrapu">
			<header class="clearfix">
	  		 		<h1><span class="icon icon-car"></span></h1>
	  		 		<p>Fahrschule Pepic</p>
	  		 		
	  		</header>	    
	    </div><!-- /headerwrap -->

		
		<div class="container" id="contact" name="contact">
			<div class="row">
			<br>
				<h1 class="centered">DANKE FÜR IHREN BESUCH</h1>
				<hr>
				<br>
				<br>
				<!--<div class="col-lg-4">
					<h3>Kontakt Informationen</h3>
						<span class="icon icon-mobile"></span> +41 76 388 55 77 <br/>
						<span class="icon icon-envelop"></span> <a href="#"> info@fsps.ch</a> <br/>
						<span class="icon icon-facebook"></span> <a href="#"> Fahrschule Pepic </a> <br/>
					</p>
				</div><!-- col -->
				
				<div class="col-lg-4">
					<h3>Kontaktformular</h3>
					<p>
						<form action="<?php $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data" >
            
						<?php if ($fehler["name"] != "") { echo $fehler["name"]; } ?><input name="name" type="text" value="<?php echo $_POST[name]; ?>" placeholder="IHRE NAME*"/><br />
                <?php if ($fehler["email"] != "") { echo $fehler["email"]; } ?><input name="email" type="text" id="email" value="<?php echo $_POST[email]; ?>" placeholder="EMAIL*"/><br />
				
        <?php if ($fehler["betreff"] != "") { echo $fehler["betreff"]; } ?><input name="betreff" type="text"  value="<?php echo $_POST[betreff]; ?>" placeholder="BETREFF*"/><br />
               
                <?php if ($fehler["nachricht"] != "") { echo $fehler["nachricht"]; } ?><textarea name="nachricht" placeholder="Hinterlassen Sie hier Ihre Nachricht..."><?php echo $_POST[nachricht]; ?></textarea>
                
                <div style="clear:both;"></div>
                <?php if ($fehler["q_id12"] != "") { echo $fehler["q_id12"]; } ?><?php echo $q[1]; ?>  <input type="hidden" name="q_id" value="<?php echo $q[0]; ?>"/>
				<br />
        
        <input type="text" <?php if ($fehler["q_id12"] != "") { echo 'class="errordesignfields"'; } ?> name="q" placeholder="SICHERHEITSFRAGE*"/>

				<br /><input name="kf-km" type="submit" value="SENDEN" class="button_submit">
				<input name="delete" type="submit" value="L&Ouml;SCHEN" class="button_submit">
            </form>
            
					</p>
				</div><!-- col -->
				
				<div class="col-lg-4">
					<h3>Unterstüzen Sie uns</h3>
					<section id="social">
  <div class="social-links">
    <a href="https://www.facebook.com/#" class="social-link facebook" target="_blank"></a>

  </div>
</section>
				</div><!-- col -->

				</div>

		
		</div><!-- container -->
		
		


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
