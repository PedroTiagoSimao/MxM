<?php
include("cnn.php");
$version = "1.0.3";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"> 
<html> 
<head> 
<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" >
 
<!-- Website Title --> 
<title>MXM myCMS <?php echo $version; ?></title>

<!-- Meta data for SEO -->
<meta name="description" content="">
<meta name="keywords" content="">

<!-- Template stylesheet -->
<link href="css/blue/screen.css" rel="stylesheet" type="text/css" media="all">
<link href="css/blue/datepicker.css" rel="stylesheet" type="text/css" media="all">
<link href="css/tipsy.css" rel="stylesheet" type="text/css" media="all">
<link href="js/visualize/visualize.css" rel="stylesheet" type="text/css" media="all">
<link href="js/jwysiwyg/jquery.wysiwyg.css" rel="stylesheet" type="text/css" media="all">
<link href="js/fancybox/jquery.fancybox-1.3.0.css" rel="stylesheet" type="text/css" media="all">
<link href="css/tipsy.css" rel="stylesheet" type="text/css" media="all">

<!-- Google Web Fonts -->
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:bold" rel='stylesheet' type='text/css'>

<!--[if IE]>
	<link href="css/ie.css" rel="stylesheet" type="text/css" media="all">
	<script type="text/javascript" src="js/excanvas.js"></script>
<![endif]-->

<!-- Jquery and plugins -->
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/jquery.img.preload.js"></script>
<script type="text/javascript" src="js/hint.js"></script>
<script type="text/javascript" src="js/visualize/jquery.visualize.js"></script>
<script type="text/javascript" src="js/jwysiwyg/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="js/fancybox/jquery.fancybox-1.3.0.js"></script>
<script type="text/javascript" src="js/jquery.tipsy.js"></script>
<script type="text/javascript" src="js/custom_blue.js"></script>

</head>
<body>

<div class="content_wrapper">

	<!-- Begin header -->
	<div id="header">
		<div id="logo">
			<p style="font-family: 'Yanone Kaffeesatz', arial, serif; font-size:14px; color:#CCC"><img src="images/logo_mycms.png" alt="logo" style="vertical-align:top	"/></p>
		</div>
		<div id="search">
			<form action="search.php" id="search_form" name="search_form" method="get">
				<input type="text" id="q" name="q" title="Procurar Artigo" class="search noshadow"/>
			</form>
		</div>
		<div id="account_info">
			<img src="images/icon_online.png" alt="Online" class="mid_align"/>
			Ola <a href="users_edit.php?action=edit&id=<?php echo $_COOKIE["id"]; ?>"><?php echo $_COOKIE["name"]; ?></a> | <a href="logout.php">Sair</a>
		</div>
	</div>
	<!-- End header -->

