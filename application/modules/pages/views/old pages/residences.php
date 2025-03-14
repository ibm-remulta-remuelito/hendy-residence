<div class="hero-gallery hero-gallery--smaller">
	<div class="flexslider">
		<ul class="slides">
			<li>
				<div class="image-center artist-impression" style="background-image: url('<?php echo base_url('assets/media/residences/residences-hero.jpg'); ?>');">
					<img src="<?php echo base_url('assets/media/residences/residences-hero.jpg'); ?>" alt="Residences" />
				</div>
			</li>
		</ul>
	</div>
		<!-- <div class="ribbon-desktop">
			<img class="ribbon-desktop__img" src="<?php echo base_url('assets/images/banner.png');?>?v=1">
		</div> -->
</div>

<article class="article article--odd">
	<div class="container">
		<div class="col-xs-60 col-sm-33 article__image__wrapper">
			<figure class="article__image image-center  artist-impression" style="background-image: url('<?php echo base_url('assets/media/residences/kitchen-living.jpg'); ?>');">
					<img src="<?php echo base_url('assets/media/residenceskitchen-living.jpg'); ?>" alt="Unwavering attention to detail, picking up from the coastal location" />
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

			<h1 class="article__heading h2"><u class="custom-underline">These four luxury residences feature</u></h1>
			<ul class="article__description" style="padding-left: 1em;">
				<li>3 bedroom, 3 bathrooms</li>
				<!-- <li>private fully equipped wine cellars</li> -->
				<li>individual private lift access for each rooftop terrace</li>
				<li>secure triple car parking with ample storage</li>
				<li>private roof top terrace including integrated bbq &amp; alfresco kitchen</li>
				<li>bespoke premium kitchens with state of the art appliances &amp; integrated butler solutions</li>
				<li>private study area</li>
			</ul>

			</div></div>
		</div>
	</div>
</article>

<div class="hero-gallery">
	<?php 
		$slides = array(
'assets/media/residences/slide-1.jpg',
'assets/media/residences/slide-2.jpg',
'assets/media/residences/slide-3.jpg',
'assets/media/residences/slide-4.jpg',
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
			<figure class="article__image image-center  artist-impression" style="background-image: url('<?php echo base_url('assets/media/residences/rooftop.jpg'); ?>');">
					<img src="<?php echo base_url('assets/media/residences/rooftop.jpg'); ?>" alt="Gardens, balconies, roof top. landscaped for elegance and sophistication" />
			</figure>
		</div>
		<div class="col-xs-60 col-sm-25 article__text__wrapper">
			<div class="valign-parent"><i class="valign"></i><div class="valign">

			<h1 class="article__heading h2"><u class="custom-underline">Gardens, balconies, roof top. landscaped for elegance and sophistication.</u></h1>
			<p class="article__description">Established plants for immediate satisfaction. Crafted for a beautiful sensory feast whilst minimising maintenance.</p>

			</div></div>
		</div>
	</div>
</article>

<article class="article article--even article--background" style="background-image: url('<?php echo base_url('assets/media/residences/dendy-st-bowls-green.jpg'); ?>');">
	<div class="container">
		<div class="hidden-xs col-xs-60 col-sm-33 article__image__wrapper">
			<div class="article__image image-center">

			</div>
		</div>
		<div class="col-xs-60 col-sm-25 article__text__wrapper">
			<div class="valign-parent"><i class="valign"></i><div class="valign">

			<h1 class="article__heading h2"><u class="custom-underline">You are looking for a sophisticated residence, in touch with its environment, bathing you in luxury.</u></h1>
			<a href="<?php echo base_url('register'); ?>" class="js-fancybox-iframe button">Register Now</a>

			</div></div>
		</div>
	</div>
</article>
<!-- 
<article class="info-section">
<div class="container">
	<div class="row dbl-pd">
		<div class="col-xs-60 col-sm-40 dbl-pd pull-right info-section__image">
			<a href="<?php echo base_url('assets/media/residences/wine-cellar.png'); ?>" class="js-fancybox pos-rel">
				<img class="img-responsive" src="<?php echo base_url('assets/media/residences/wine-cellar.png'); ?>" alt="Wine Cellar" />
				<span class="click-to-enlarge click-to-enlarge--overlay"><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
			</a>
		</div>
		<div class="col-xs-60 col-sm-20 dbl-pd pull-left">
			<h1 class="h4">Wine Cellar</h1>
			<p>Wine is one of the few commodities that can improve with age, but it can also rapidly deteriorate if kept in inadequate conditions. The three factors that have the most direct impact on a wine's condition are light, humidity, and temperature.</p>
			<ul>
				<li><i>1</i>Individual wine storage rooms</li>
				<li><i>2</i>Communal lounge</li>
				<li><i>3</i>Seated wine-tasting area</li>
				<li><i>4</i>Lift to all apartments</li>
				<li><i>5</i>Unisex bathroom</li>
				<li><i>6</i>General storage spaces</li>
				<li><i>7</i>Oak flooring throughout</li>
				<li><i>8</i>Kitchen</li>
				<li><i>9</i>Casual seating</li>
			</ul>
		</div>
	</div>
</div>
</article> -->
<!-- 
<div class="segment-image">
	<div class="row std-pd">
		<div class="col-xs-24 col-sm-21 std-pd">
			<figure class="image-center artist-impression" style="background-image: url('<?php echo base_url('assets/media/residences/wine-cellar-detail-1.jpg'); ?>');">
				<img src="<?php echo base_url('assets/media/residences/wine-cellar-detail-1.jpg'); ?>" alt="Wine Cellar Detail 1" />
			</figure>
		</div>
		<div class="col-xs-36 col-sm-33 std-pd">
			<figure class="image-center artist-impression" style="background-image: url('<?php echo base_url('assets/media/residences/wine-cellar-detail-2.jpg'); ?>');">
				<img src="<?php echo base_url('assets/media/residences/wine-cellar-detail-2.jpg'); ?>" alt="Wine Cellar Detail 2" />
			</figure>
		</div>
	</div>
</div>
 -->
