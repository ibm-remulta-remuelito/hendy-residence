<div class="hero-gallery hero-gallery--smaller">
	<div class="flexslider">
		<ul class="slides">
			<li>
				<div class="image-center" style="background-image: url('<?php echo base_url('assets/media/residence4/residence4-hero.jpg'); ?>');">
					<img src="<?php echo base_url('assets/media/residence4/residence4-hero.jpg'); ?>" alt="Residences" />
				</div>
			</li>
		</ul>
	</div>
		<div class="ribbon-desktop">
			<img class="ribbon-desktop__img" src="<?php echo base_url('assets/images/ribbon.png');?>?v=9">
		</div>
</div>

<article class="article article--odd">
	<div class="container">
		<div class="col-xs-60 col-sm-33 article__image__wrapper">

			<a data-fancybox="" data-ratio="" href="https://vimeo.com/354803667">
	            <figure class="article__image image-center" style="background-image: url('<?php echo base_url('assets/media/residence4/residence4-img1.jpg'); ?>');">
				</figure>
	        </a>

		</div>
		<div class="col-xs-60 col-sm-25 article__text__wrapper">
			<div class="valign-parent"><i class="valign"></i><div class="valign">

			<h1 class="article__heading h2"><u class="custom-underline">Sophisticated appointments completing the ultimate retreat.</u></h1>
			<p class="article__description">Cater for friends from the stunning state-of-the-art designer kitchen with fabulous central island and complete butler's pantry.</p>
			<p class="article__description">Attend to business from the conveniently placed home office, set apart from the other living zones. Excellent separation between living and sleeping areas, and cleverly laid out amenities.</p>
			<a data-fancybox="" data-ratio="" class="button" href="https://vimeo.com/354803667">Step Inside</a>

			</div></div>
		</div>
	</div>
</article>

<div class="hero-gallery">
	<?php
		$slides = array(
'assets/media/residence4/residence4-carousel-1.jpg',
'assets/media/residence4/residence4-carousel-2.jpg',
'assets/media/residence4/residence4-carousel-3.jpg',
'assets/media/residence4/residence4-carousel-4.jpg',
'assets/media/residence4/residence4-carousel-5.jpg',
'assets/media/residence4/residence4-carousel-6.jpg',
'assets/media/residence4/residence4-carousel-7.jpg',
'assets/media/residence4/residence4-carousel-8.jpg',
'assets/media/residence4/residence4-carousel-9.jpg',
'assets/media/residence4/residence4-carousel-10.jpg',
'assets/media/residence4/residence4-carousel-11.jpg',
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
			<figure class="article__image image-center" style="background-image: url('<?php echo base_url('assets/media/residence4/residence4-img2.jpg'); ?>');">
			</figure>
		</div>
		<div class="col-xs-60 col-sm-25 article__text__wrapper">
			<div class="valign-parent"><i class="valign"></i><div class="valign">

			<h1 class="article__heading h2"><u class="custom-underline">Each residence in Dendy St delivers complete living.</u></h1>
			<p class="article__description">A gorgeous combination of landscaped balcony and entertainer's style showcasing sweeping open-plan living spaces and an oversized private balcony. Secure, triple side-by-side basement parking with large storage areas and bike racks.</p>

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

			<h1 class="article__heading h2"><u class="custom-underline">Dendy St invites you to be part of the journey, to invest your heart and soul into the fabric of your home.</u></h1>
			<a href="<?php echo base_url('register'); ?>" class="button">Enquire Now</a>

			</div></div>
		</div>
	</div>
</article>
