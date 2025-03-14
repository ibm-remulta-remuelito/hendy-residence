<div class="hero-gallery hero-gallery--smaller">
	<div class="flexslider">
		<ul class="slides">
			<li>
				<div class="image-center artist-impression" style="background-image: url('<?php echo base_url('assets/media/residence4/residence4-hero.jpg'); ?>');">
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
			<figure class="article__image image-center  artist-impression" style="background-image: url('<?php echo base_url('assets/media/residence4/residence4-article-1.jpg'); ?>');">
					<img src="<?php echo base_url('assets/media/residence4/residence4-article-1.jpg'); ?>" alt="Unwavering attention to detail, picking up from the coastal location" />
			</figure>
		</div>
		<div class="col-xs-60 col-sm-25 article__text__wrapper">
			<div class="valign-parent"><i class="valign"></i><div class="valign">

			<h1 class="article__heading h2"><u class="custom-underline">Sophisticated appointments completing the ultimate retreat.</u></h1>
			<p class="article__description">Cater for friends from the stunning state-of-the-art designer kitchen with fabulous central island and complete butler's pantry.</p>
			<p class="article__description">Attend to business from the conveniently placed home office, set apart from the other living zones. Excellent separation between living and sleeping areas, and cleverly laid out amenities.</p>

			</div></div>
		</div>
	</div>
</article>

<div class="hero-gallery">
	<?php
		$slides = array(
'assets/media/residence4/residence4-slide-1.jpg',
'assets/media/residence4/residence4-slide-2.jpg',
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
			<figure class="article__image image-center  artist-impression" style="background-image: url('<?php echo base_url('assets/media/residence4/residence4-article-2.jpg'); ?>');">
					<img src="<?php echo base_url('assets/media/residence4/residence4-article-2.jpg'); ?>" alt="Gardens, balconies, roof top. landscaped for elegance and sophistication" />
			</figure>
		</div>
		<div class="col-xs-60 col-sm-25 article__text__wrapper">
			<div class="valign-parent"><i class="valign"></i><div class="valign">

			<h1 class="article__heading h2"><u class="custom-underline">Each residence in Dendy St delivers complete living.</u></h1>
			<p class="article__description">Sublime outdoor entertaining with beautiful bay aspects. Discover an immense private terrace covering the entire half of the rooftop, accessed by internal lift, complete with outdoor kitchen, pergola shading and convenient storage. Brilliant terrace landscaping conceived with care by renowned landscape designer, Jack Merio.</p>

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
			<a href="<?php echo base_url('register'); ?>" class="button">Register Now</a>

			</div></div>
		</div>
	</div>
</article>
