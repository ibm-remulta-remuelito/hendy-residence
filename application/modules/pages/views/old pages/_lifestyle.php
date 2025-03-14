<div class="hero-gallery hero-gallery--smaller">
	<div class="flexslider">
		<ul class="slides">
			<li>
				<div class="image-center" style="background-image: url('<?php echo base_url('assets/media/lifestyle/lifestyle-hero.jpg'); ?>');">
					<img src="<?php echo base_url('assets/media/lifestyle/lifestyle-hero.jpg'); ?>" alt="Lifestyle" />
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
			<figure class="article__image image-center" style="background-image: url('<?php echo base_url('assets/media/lifestyle/shopping.jpg'); ?>');">
					<img src="<?php echo base_url('assets/media/lifestyle/shopping.jpg'); ?>" alt="You have a reputation for refinement and enjoy the finer things in life. you know what brighton represents" />
			</figure>
		</div>
		<div class="col-xs-60 col-sm-25 article__text__wrapper">
			<div class="valign-parent"><i class="valign"></i><div class="valign">

			<h1 class="article__heading h2"><u class="custom-underline">You have a reputation for refinement and enjoy the finer things in life. you know what brighton represents:</u></h1>
			<p class="article__description">A relaxed coastal lifestyle surrounded by the elegance of prestige homes, boutique shopping, cafes and restaurants, and the supreme convenience of living so close to the city.</p>

			</div></div>
		</div>
	</div>
</article>

<div class="hero-gallery">
	<?php
		$slides = array(
'assets/media/lifestyle/slide-1.jpg',
'assets/media/lifestyle/slide-2.jpg',
'assets/media/lifestyle/slide-3.jpg',
'assets/media/lifestyle/slide-4.jpg',
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
			<figure class="article__image image-center" style="background-image: url('<?php echo base_url('assets/media/lifestyle/swimming.jpg'); ?>');">
					<img src="<?php echo base_url('assets/media/lifestyle/swimming.jpg'); ?>" alt="With almost 6 kilometres of coastline within brighton, water activities are central to the brighton lifestyle" />
			</figure>
		</div>
		<div class="col-xs-60 col-sm-25 article__text__wrapper">
			<div class="valign-parent"><i class="valign"></i><div class="valign">

			<h1 class="article__heading h2"><u class="custom-underline">With almost 6 kilometres of coastline within brighton, water activities are central to the brighton lifestyle.</u></h1>
			<p class="article__description">The beachfront is lined with palm trees, gardens and open lawns. A pedestrian and bicycle path runs along much of the foreshore, and the historic Middle Brighton Baths, which have been enjoyed by visitors since 1881, sit next to a large marina.</p>

			</div></div>
		</div>
	</div>
</article>

<article class="article article--even article--background" style="background-image: url('<?php echo base_url('assets/media/lifestyle/dendy-st-bowls-grey.jpg'); ?>');">
	<div class="container">
		<div class="col-xs-60 col-sm-33 article__image__wrapper hidden-xs">
			<div class="article__image image-center">

			</div>
		</div>
		<div class="col-xs-60 col-sm-25 article__text__wrapper">
			<div class="valign-parent"><i class="valign"></i><div class="valign">

			<h1 class="article__heading h2"><u class="custom-underline">Dendy Residences invites you to be part of the journey, to invest your heart and soul into the fabric of your home.</u></h1>
			<a href="<?php echo base_url('register'); ?>" class="button">Enquire Now</a>

			</div></div>
		</div>
	</div>
</article>

<article class="article article--odd">
	<div class="container">
		<div class="col-xs-60 col-sm-33 article__image__wrapper">
			<figure class="article__image image-center" style="background-image: url('<?php echo base_url('assets/media/lifestyle/running.jpg'); ?>');">
					<img src="<?php echo base_url('assets/media/lifestyle/running.jpg'); ?>" alt="An evening stroll along dendy beach towards stunning green point" />
			</figure>
		</div>
		<div class="col-xs-60 col-sm-25 article__text__wrapper">
			<div class="valign-parent"><i class="valign"></i><div class="valign">

			<h1 class="article__heading h2"><u class="custom-underline">An evening stroll along dendy beach towards stunning green point.</u></h1>
			<p class="article__description">You want to stroll on Dendy Beach sands, enjoy an espresso in the urbane cafés of church street, peruse cosmopolitan boutiques, then return home to effortless, luxury modern living, with all the complex accents of a superior wine.</p>

			</div></div>
		</div>
	</div>
</article>
