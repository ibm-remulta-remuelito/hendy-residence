<div class="hero-gallery hero-gallery--smaller">
	<div class="flexslider">
		<ul class="slides">
			<li>
				<div class="image-center" style="background-image: url('<?php echo base_url('assets/media/residence3/residence3-hero.jpg'); ?>');">
				</div>
			</li>
		</ul>
	</div>
		<!-- <div class="ribbon-desktop">
			<img class="ribbon-desktop__img" src="<?php echo base_url('assets/images/ribbon.png');?>?v=9">
		</div> -->
</div>

<article class="article article--odd">
	<div class="container">
		<div class="col-xs-60 col-sm-33 article__image__wrapper">

			<a data-fancybox="" data-ratio="" href="https://vimeo.com/354803494">
	            <figure class="article__image image-center" style="background-image: url('<?php echo base_url('assets/media/residence3/residence3-img1.jpg'); ?>');">
				</figure>
	        </a>

		</div>
		<div class="col-xs-60 col-sm-25 article__text__wrapper">
			<div class="valign-parent"><i class="valign"></i><div class="valign">
			<h1 class="article__heading h2"><u class="custom-underline">SUPERB spaces, AND a seamless flow through the living areas MAKE FOR COMPLETE LIVING.</u></h1>
			<p class="article__description">Relax in the large North-facing master suite with walk-in robes and twin-sink luxury ensuite with indulgent tub. A second master suite and a third bedroom, both with private ensuites.</p>
			<a data-fancybox="" data-ratio="" class="button" href="https://vimeo.com/354803494">Step Inside</a>
			</div></div>
		</div>
	</div>
</article>

<div class="hero-gallery">
	<?php
		$slides = array(
'assets/media/residence3/residence3-carousel-1.jpg',
'assets/media/residence3/residence3-carousel-2.jpg',
'assets/media/residence3/residence3-carousel-3.jpg',
'assets/media/residence3/residence3-carousel-4.jpg',
'assets/media/residence3/residence3-carousel-5.jpg',
'assets/media/residence3/residence3-carousel-6.jpg',
'assets/media/residence3/residence3-carousel-7.jpg',
'assets/media/residence3/residence3-carousel-8.jpg',
'assets/media/residence3/residence3-carousel-9.jpg',
		);
	?>

	<div class="flexslider">
		<ul class="slides">
			<?php foreach ($slides as $slide) : ?>
			<li>
				<figure class="image-center" style="background-image: url('<?php echo base_url($slide); ?>');">
					<img src="<?php echo base_url($slide); ?>" alt="interior" />
				</figure>
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>

<article class="article article--odd">
	<div class="container">
		<div class="col-xs-60 col-sm-33 article__image__wrapper">
			<figure class="article__image image-center" style="background-image: url('<?php echo base_url('assets/media/residence3/residence3-img2.jpg'); ?>');">
			</figure>
		</div>
		<div class="col-xs-60 col-sm-25 article__text__wrapper">
			<div class="valign-parent"><i class="valign"></i><div class="valign">

			<h1 class="article__heading h2"><u class="custom-underline">INVEST YOUR HEART AND SOUL INTO THE FABRIC OF YOUR HOME</u></h1>
			<p class="article__description">Sublime outdoor entertaining with beautiful bay aspects. Accessed by internal lift, complete with outdoor kitchen, pergola shading and convenient storage. Brilliant terrace landscaping conceived with care by renowned landscape designer, Jack Merlo.</p>
			</div></div>
		</div>
	</div>
</article>

<article class="article article--even article--background" style="background-image: url('<?php echo base_url('assets/media/residence4/dendy-st-bowls-blue.jpg'); ?>');">
	<div class="container">
		<div class="hidden-xs col-xs-60 col-sm-33 article__image__wrapper">
			<div class="article__image image-center">

			</div>
		</div>
		<div class="col-xs-60 col-sm-25 article__text__wrapper">
			<div class="valign-parent"><i class="valign"></i><div class="valign">

			<h1 class="article__heading h2"><u class="custom-underline">Watch as light streams through the windows, and the sea breeze Drifts through the gardens. You’ve come home.</u></h1>
			<a href="<?php echo base_url('register'); ?>" class="button">Enquire Now</a>

			</div></div>
		</div>
	</div>
</article>
