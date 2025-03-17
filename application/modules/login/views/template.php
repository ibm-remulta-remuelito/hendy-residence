<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class="" lang="en"> <!--<![endif]-->

<head>

	<title>Hendy Residences</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="keywords" content="Hendy, apartments, Brighton, 1 bedroom, 2 bedroom, Hendy Residences brighton">
	<meta name="description" content="Hendy Residences Brighton - Exclusive Luxury Residences">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="canonical" href="<?php echo base_url(substr($_SERVER['REQUEST_URI'], 1)); ?>">

	<link rel="apple-touch-icon" sizes="57x57" href="/assets/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/assets/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/assets/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/assets/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/assets/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/assets/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/assets/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/assets/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/assets/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="/assets/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/assets/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/assets/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/assets/favicon/favicon-16x16.png">
	<link rel="manifest" href="/assets/favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/assets/favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

	<?php if(isset($css) && count($css) > 0) :
		foreach ($css as $key => $file) : ?>
			<link type="text/css" rel="stylesheet" href="<?php echo base_url($file); ?>" />
		<?php endforeach; ?>
	<?php endif; ?>

	<?php if (isset($og) && is_array($og)): ?>
		<?php foreach ($og as $og_key => $og_value): ?>
			<meta property="og:<?php echo $og_key; ?>" content="<?php echo $og_value; ?>" />
		<?php endforeach ?>
	<?php endif ?>

	<?php if(isset($js) && count($js) > 0) : ?>
		<?php  foreach ($js as $key => $file): ?>
			<script type="text/javascript" src="<?php echo base_url($file); ?>"></script>
		<?php endforeach ?>
		<?php endif; ?>

	<?php if(isset($map['js']) && $map['js']) : ?>
		<?php echo $map['js']; ?>
	<?php endif; ?>

	<!--[if IE 9]>
	<script src="<?php echo base_url('assets/js/lib/html5shiv.js'); ?>"></script>
	<![endif]-->

	<!--[if lt IE 9]>
	<script src="<?php echo base_url('assets/js/lib/html5shiv.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/lib/respond.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/lib/placeholders.jquery.min.js'); ?>"></script>
	<![endif]-->

	<!--[if lt IE 8]>
	<style type="text/css">
		.image-center > img
		{
			top: 0px;
			right: 0px;
			bottom: 0px;
			left: 0px;
		}
	</style>
	<![endif]-->

<script type="text/javascript" src="<?php echo base_url('assets/js/lib/modernizr-custom.js'); ?>"></script>
</head>
<body class="page-<?php echo $page_name; ?>">

<!-- <div id="wrap"> -->
	<header id="header">
					<a href="<?php echo base_url(); ?>" id="logo"><img src="<?php echo base_url('assets/images/dendy-horizontal.svg'); ?>" alt="Hendy Residences" /></a>

		<div class="container">
			<nav class="menu">
				<div class="menu__inner">
                    <a><span>BRAND NEW LUXURY BEACHSIDE PENTHOUSES</span></a>
                    <a href="<?php echo base_url('register'); ?>" class="menu__enquire-now"><span>Register</span></a>
				</div>
			</nav>
		</div>


		<div class="menu__right-corner">
			<span class="gt-wrapper">
			<div id="google_translate_element"></div><script type="text/javascript">
			function googleTranslateElementInit() {
				document.getElementById("google_translate_element").style.border = "0px";
			  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, gaTrack: true, gaId: 'UA-34134321-16'}, 'google_translate_element');
			}
			</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
			</span>
		</div>
	</header>

	<!-- <main id="main"> -->
		<div class="header-placeholder" id="header-placeholder"></div>

			<?php echo $page_content; ?>


<footer id="footer">
	<div class="container">
		<div class="row">
			<div class="pull-left">
				<div class="row">
					<address>2D Hendy Street, Brighton</address>
				</div>
			</div>
			<div class="pull-right">
				<div class="row company ">
					<div class="column">
						<p>Developed By</p>
						<a href="#" target="_blank">
							<img class="" src="<?php echo base_url('assets/images/agents/damgar-property-group.png?v=1'); ?>" alt="Damgar Property Group" />
						</a>
					</div>
					<div class="column">
						<p>Architecture By</p>
						<a href="#" target="_blank">
							<img class="" src="<?php echo base_url('assets/images/agents/jackson-celements-burrows-architect.png?v=1'); ?>" alt="Jackson Celements Burrows Architect" />
						</a>
					</div>
					<div class="column">
						<p>Landscaping By</p>
						<a href="#" target="_blank">
							<img class="" src="<?php echo base_url('assets/images/agents/jack-merlo.png?v=1'); ?>" alt="Jack Merlo Design" />
						</a>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="row statement ">
					<a href="#disclaimer" class="popup js-fancybox" data-fancybox-width="400" >Disclaimer</a>
				</div>
			</div>
		</div>
	</div>
</footer>

<div id="disclaimer" style="display:none;">
	<h1 class="text-center" style="margin-bottom: 0.4em;">Disclaimer</h1>
	<p>
	This website has been prepared for information purposes only.
	Hendy Residences do not warrant or represent, either expressly or impliedly, the accuracy or completeness of information contained in this website.
	No information contained in this website or any conclusion derived from that information can be relied upon by any person as a warranty or representation.
	The provision of this website to any person does not constitute the giving of investment, financial or other advice. Interested parties should not rely on any information contained in this website and should make their own enquiries and consult their own professional advisers.
	Hendy Residences, to the fullest extent permitted by law will not have any responsibility or liability for any loss or damage however arising in relation to the provision of this website, any person’s purported reliance on this website or any error in or omission from this website.
	</p>
</div>

<script>
    $(window).ready(function(){
        $(".menu__enquire-now").click(function() {
            $([document.documentElement, document.body]).animate({
                scrollTop: $("#enquire").offset().top -100
            }, 500);
        });
    })
</script>

</body>
</html>
