<?php
	include_once('models/fonctions.php');
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">
        
        <!-- MEGAFOLIO PRO GALLERY CSS SETTINGS -->
        <link rel="stylesheet" type="text/css" href="megafolio/css/settings.css" media="screen" />
        
        <!-- THE FANYCYBOX ASSETS -->
        <link rel="stylesheet" href="megafolio/fancybox/jquery.fancybox.css?v=2.1.3" type="text/css" media="screen" />

        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="main.php">L'Urdex</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="main.php">Acceuil</a></li>
            <li><a href="locations.php">Locations <span class="badge">3</span></a></li>
            <li><a href="#contact">Carte</a></li>
            <li><a href="#contact">Forum</a></li>
            <li><a href="#contact">Messages <span class="badge">2</span></a></li>
          </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </div>

	<div class="container">
		<div class="row">
        <!--Portfolio Container Start-->
			<div class="alert alert-warning">Teste de galleries en cours</div>
		</div>

		<img src="images/Logo Urdex_800.jpg" class="img-responsive img-center" alt="Responsive image">

		<hr>

		<footer>
            <div class="navbar navbar-inverse navbar-fixed-bottom">
      			<div class="container">
       			<p>&copy; L'Urdex 2013</p>
      			</div>
    		</div>	
        </footer>
	</div> <!-- /container -->        
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
        
<!-- MEGAFOLIO PRO GALLERY JS FILES -->
<script type="text/javascript" src="megafolio/js/jquery.themepunch.plugins.min.js"></script>
<script type="text/javascript" src="megafolio/js/jquery.themepunch.megafoliopro.js"></script>

<!-- THE FANYCYBOX ASSETS -->
<script type="text/javascript" src="megafolio/fancybox/jquery.fancybox.pack.js?v=2.1.3"></script>

<!-- Optionally add helpers - button, thumbnail and/or media ONLY FOR ADVANCED USAGE-->
<script type="text/javascript" src="megafolio/fancybox/helpers/jquery.fancybox-media.js?v=1.0.5"></script>

<script type="text/javascript">
   jQuery(document).ready(function() {
	  "use strict"; 
      // MEGAFOLIO PRO GALLERY SETTING
     var api=jQuery('.megafolio-container').megafoliopro(
        {
            filterChangeAnimation:"rotatescale",
            filterChangeSpeed:600,
            filterChangeRotate:99,
            filterChangeScale:0.6,          
            delay:20,
            paddingHorizontal:0,
            paddingVertical:0,
            layoutarray:[8]
         });

      // THE FANCYBOX PLUGIN INITALISATION
      jQuery(".fancybox").fancybox();

   });
</script>

    </body>
</html>
