<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>404 Page Not Found</title>
<link type="text/css" rel="stylesheet" href="/assets/dist/bootstrap.css?v=1" />
	<link type="text/css" rel="stylesheet" href="/assets/dist/library.css?v=1" />
	<link type="text/css" rel="stylesheet" href="/assets/css/lib/jquery.fancybox.min.css?v=1" />
	<link type="text/css" rel="stylesheet" href="/assets/css/core.css?v=15" />
<style type="text/css">

::selection { background-color: #E13300; color: white; }
::-moz-selection { background-color: #E13300; color: white; }

body {
	background-color: #fff;
	margin: 45px;
	font: 13px/20px normal Helvetica, Arial, sans-serif;
	color: #4F5155;
}

a {
	color: #003399;
	background-color: transparent;
	font-weight: normal;
}

h1 {
	color: #444;
	background-color: transparent;
	border-bottom: 1px solid #D0D0D0;
	font-size: 19px;
	font-weight: normal;
	margin: 0 0 14px 0;
	padding: 14px 15px 10px 15px;
}

code {
	font-family: Consolas, Monaco, Courier New, Courier, monospace;
	font-size: 12px;
	background-color: #f9f9f9;
	border: 1px solid #D0D0D0;
	color: #002166;
	display: block;
	margin: 14px 0 14px 0;
	padding: 12px 10px 12px 10px;
}

#container {
	margin: 10px;
	border: 1px solid #D0D0D0;
	max-width: 500px; margin: 100px auto;padding-top: 30px;
}

p {
	margin: 12px 15px 12px 15px;
}
</style>
</head>
<body>
	<div id="container">
		<a  style="padding:15px;" href="http://dendyresidences/" id="logo"><img src="/assets/images/dendy-horizontal.svg" alt="Dendy Residences"></a>
		<div class="row">

		<h1><?php echo $heading; ?></h1>
		<?php echo $message; ?>
<div style="padding:15px;">

<a href="/" class="button"><span>Return to homepage</span></a>
</div>
</div>
	</div>
</body>
</html>
