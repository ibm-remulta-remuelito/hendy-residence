<?php /*
<div class="banner">
	<h2 class="banner__title">Only 2 Exclusive<br>luxury bayside residences</h2>
	<h5 class="banner__address">Remaining</h5>
</div>
*/ ?>
<div class="hero-gallery" id="first-section">
	<div class="flexslider">
		<ul class="slides">
			<li>
				<figure class="image-center" style="background-image: url('<?php echo base_url('assets/media/home/home-hero.jpg'); ?>?v=1');">
					<img src="<?php echo base_url('assets/media/home/home-hero.jpg'); ?>?v=2" />
					<div class="caption caption--bottom-left">
						<div class="">
							<!-- <h1 class="h0" style="margin-bottom: 0.5em;"><u class="custom-underline--white">Only four individual residences</u></h1> -->
							<h1 class="h0"><u class="custom-underline--white"><!--two terrace level<br>-->luxury bayside residence on offer</h1>
						</div>
					</div>
					<a class="js-next-section flexslider__next-section fa-stack fa-lg hidden-xs" href="#home__content">
						<i class="fa fa-circle-thin fa-stack-2x"></i>
						<i class="fa fa-angle-down fa-stack-1x"></i>
					</a>
				</figure>
			</li>
		</ul>
		<!-- <div class="ribbon-desktop home">
			<img class="ribbon-desktop__img" src="<?php echo base_url('assets/images/ribbon.png');?>">
		</div> -->
	</div>

</div>

<article class="article article--odd" id="home__content">
	<div class="container">
		<div class="col-xs-60 col-sm-33 article__image__wrapper">
			<figure class="article__image image-center" style="background-image: url('<?php echo base_url('assets/media/home/residence3-leadin.jpg'); ?>');">
			</figure>
		</div>
		<div class="col-xs-60 col-sm-25 article__text__wrapper">
			<div class="valign-parent"><i class="valign"></i><div class="valign">

			<h1 class="article__heading h2"><u class="custom-underline">The Residence<br>delivers complete luxury living</u></h1>
			<a href="<?php echo base_url('residence3'); ?>" class="button">Step Inside</a>

			</div></div>
		</div>
	</div>
</article>

<!-- <article class="article article--even article--background" style="background-image: url('<?php echo base_url('assets/images/background-marble-grey.jpg'); ?>');">
	<div class="container">
		<div class="col-xs-60 col-sm-33 article__image__wrapper">
			<figure class="article__image image-center" style="background-image: url('<?php echo base_url('assets/media/home/residence4-leadin.jpg'); ?>?v=9');">
			</figure>
		</div>
		<div class="col-xs-60 col-sm-25 article__text__wrapper">
			<div class="valign-parent"><i class="valign"></i><div class="valign">

			<h1 class="article__heading h2"><u class="custom-underline">Residence 4 -<br>Sublime outdoor entertaining with beautiful bay aspects</u></h1>
			<a href="<?php echo base_url('residence4'); ?>" class="button">Step Inside</a>

			</div></div>
		</div>
	</div>
</article> -->

<!-- <article class="article article--odd">
	<div class="container">
		<div class="col-xs-60 col-sm-33 article__image__wrapper">

		<a data-fancybox="" data-ratio="" href="https://vimeo.com/355493875">
            <figure class="article__image image-center" style="background-image: url('<?php echo base_url('assets/media/home/testimonial-leadin.jpg'); ?>');">
			</figure>
        </a>

		</div>
		<div class="col-xs-60 col-sm-25 article__text__wrapper">
			<div class="valign-parent"><i class="valign"></i><div class="valign">

			<h1 class="article__heading h2"><u class="custom-underline">Meet new residents Annie &amp; Rob as they discuss what they love about Dendy Residences.</u></h1>
			<a data-fancybox="" data-ratio="" class="button" href="https://vimeo.com/355493875">Watch Now</a>
			</div></div>
		</div>
	</div>
</article>
 -->
 <article class="article article--even article--background" style="background-image: url('<?php echo base_url('assets/images/background-marble-grey.jpg'); ?>');">
	<div class="container">
		<div class="col-xs-60 col-sm-25 article__text__wrapper">
			<div class="valign-parent"><i class="valign"></i><div class="valign">

			<h1 class="article__heading h2"><u class="custom-underline">OPEN THE DOORS at dendy residences TO A REFINED LIFESTYLE.</u></h1>
			<a href="<?php echo base_url('lifestyle'); ?>" class="button">Experience Lifestyle</a>

			</div></div>
		</div>
		<div class="col-xs-60 col-sm-33 article__image__wrapper">
			<figure class="article__image image-center" style="background-image: url('<?php echo base_url('assets/media/home/lifestyle-leadin.jpg'); ?>');">
			</figure>
		</div>
	</div>
</article>

<article class="article article--odd">
	<div class="container">
		<div class="col-xs-60 col-sm-33 article__image__wrapper">
			<figure class="article__image image-center" style="background-image: url('<?php echo base_url('assets/media/home/location-leadin.jpg'); ?>');">
			</figure>
		</div>
		<div class="col-xs-60 col-sm-25 article__text__wrapper">
			<div class="valign-parent"><i class="valign"></i><div class="valign">

			<h1 class="article__heading h2"><u class="custom-underline">a coastal location of utmost distinction.</u></h1>
			<a href="<?php echo base_url('location'); ?>" class="button">Explore Brighton</a>

			</div></div>
		</div>
	</div>
</article>

<span itemprop="location" itemscope itemtype="http://schema.org/Place" style="display: none;">
	<meta itemprop="name" content="Dendy Residences" />
	<meta itemprop="logo" content="<?php echo base_url('assets/favicon/apple-icon.png'); ?>" />
	<meta itemprop="url" content="<?php echo base_url(substr($_SERVER['REQUEST_URI'], 1)); ?>" />
	<meta itemprop="description" content="Exclusive Luxury Residences" />

	<span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
		<meta itemprop="streetAddress" content="2D Dendy Street" />
		<meta itemprop="addressLocality" content="Brighton" />
		<meta itemprop="addressRegion" content="Victoria" />
		<meta itemprop="postalCode" content="3186" />
		<meta itemprop="addressCountry" content="Australia" />
	</span>
	<span itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">
		<meta itemprop="latitude" content="-37.919197" />
		<meta itemprop="longitude" content="144.989031" />
	</span>
</span>
