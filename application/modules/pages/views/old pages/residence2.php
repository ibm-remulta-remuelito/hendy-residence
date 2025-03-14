<div class="hero-gallery hero-gallery--smaller">
	<div class="flexslider">
		<ul class="slides">
			<li>
				<div class="image-center artist-impression" style="background-image: url('<?php echo base_url('assets/media/residence2/residence2-hero.jpg'); ?>');">
					<img src="<?php echo base_url('assets/media/residence2/residence2-hero.jpg'); ?>" alt="Residences" />
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
			<figure class="article__image image-center  artist-impression" style="background-image: url('<?php echo base_url('assets/media/residence2/residence2-article-1.jpg'); ?>');">
					<img src="<?php echo base_url('assets/media/residence2/kresidence2-article-1.jpg'); ?>" alt="Unwavering attention to detail, picking up from the coastal location" />
			</figure>
		</div>
		<!-- <div class="col-xs-60 col-sm-25 article__text__wrapper">
			<div class="valign-parent"><i class="valign"></i><div class="valign">

			<h1 class="article__heading h2"><u class="custom-underline">Unwavering attention to detail, picking up from the coastal location.</u></h1>
			<p class="article__description">Enjoy a reflection of coastal ruggedness, rich textures offset by soft seaside hues, mature accents and dark elements amid a mild coastal palette.</p>

			</div></div>
		</div> -->
		<div class="col-xs-60 col-sm-25 article__text__wrapper">
			<div class="valign-parent"><i class="valign"></i><div class="valign">

			<h1 class="article__heading h2"><u class="custom-underline">Superb spaces, and a seemless flow through the living areas make for complete living.</u></h1>
			<p class="article__description">Relax in the large garden-facing master suite with walk-in robes and twin-sink luxury ensuite with indulgent tub. A second master suite and a third bedroom, both with private ensuites.</p>

			</div></div>
		</div>
	</div>
</article>

<div class="hero-gallery">
	<?php
		$slides = array(
'assets/media/residence2/residence2-slide-1.jpg',
'assets/media/residence2/residence2-slide-2.jpg',
'assets/media/residence2/residence2-slide-3.jpg',
		);
	?>

	<div class="flexslider">
		<ul class="slides">
			<?php foreach ($slides as $slide) : ?>
			<li>
				<figure class="image-center artist-impression" style="background-image: url('<?php echo base_url($slide); ?>');">
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
			<figure class="article__image image-center  artist-impression" style="background-image: url('<?php echo base_url('assets/media/residence2/residence2-article-2.jpg'); ?>');">
					<img src="<?php echo base_url('assets/media/residence2/residence2-article-2.jpg'); ?>" alt="Gardens, balconies, roof top. landscaped for elegance and sophistication" />
			</figure>
		</div>
		<div class="col-xs-60 col-sm-25 article__text__wrapper">
			<div class="valign-parent"><i class="valign"></i><div class="valign">

			<h1 class="article__heading h2"><u class="custom-underline">Landscaped for elegance and sophistication.</u></h1>
			<p class="article__description">Established plants for immediate satisfaction. Crafted for a beautiful sensory feast whilst minimising maintenance.</p>

			</div></div>
		</div>
	</div>
</article>

<article class="article article--even article--background" style="background-image: url('<?php echo base_url('assets/media/residence2/dendy-st-bowls-green.jpg'); ?>');">
	<div class="container">
		<div class="hidden-xs col-xs-60 col-sm-33 article__image__wrapper">
			<div class="article__image image-center">

			</div>
		</div>
		<div class="col-xs-60 col-sm-25 article__text__wrapper">
			<div class="valign-parent"><i class="valign"></i><div class="valign">

			<h1 class="article__heading h2"><u class="custom-underline">Watch as light streams through the windows, and the sea breeze drifts through the gardens.<br/>You've come home.</u></h1>
			<a href="<?php echo base_url('register'); ?>" class="button">Register Now</a>

			</div></div>
		</div>
	</div>
</article>
