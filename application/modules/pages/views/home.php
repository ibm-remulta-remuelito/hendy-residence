<div class="hero-gallery hero-gallery--smaller">
	<div class="flexslider">
		<ul class="slides">
			<li>
				<div class="image-center" style="background-image: url('<?php echo base_url('assets/media/landing/landing-hero.jpg'); ?>');">
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

			<a data-fancybox="" data-ratio="" href="/assets/media/landing/2d-dendy-street-brighton.mp4">
	            <figure class="article__image image-center" style="background-image: url('<?php echo base_url('assets/media/landing/video-thumb.jpg'); ?>');">
				</figure>
	        </a>

		</div>
		<div class="col-xs-60 col-sm-25 article__text__wrapper">
			<div class="valign-parent"><i class="valign"></i><div class="valign">
			<h1 class="article__heading h2"><u class="custom-underline">Architecturally designed specifically for modern living without any compromises</u></h1>
			</div></div>
		</div>
	</div>
</article>

<div class="hero-gallery">
	<?php
		$slides = array(
			'assets/media/landing/landing-carousel-1.jpg',
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
			<figure class="article__image image-center" style="background-image: url('<?php echo base_url('assets/media/landing/landing-img2.jpg'); ?>');">
			</figure>
		</div>
		<div class="col-xs-60 col-sm-25 article__text__wrapper">
			<div class="valign-parent"><i class="valign"></i><div class="valign">

			<h1 class="article__heading h2"><u class="custom-underline">Private rooftop terraces with alfresco kitchens overlooking spectacular bay views</u></h1>
			</div></div>
		</div>
	</div>
</article>

<div class="hero-gallery">
	<?php
		$slides1 = array(
			'assets/media/landing/landing-carousel2-1.jpg',
		);
	?>

	<div class="flexslider">
		<ul class="slides">
			<?php foreach ($slides1 as $slide) : ?>
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
			<figure class="article__image image-center" style="background-image: url('<?php echo base_url('assets/media/landing/landing-img3.jpg'); ?>');">
			</figure>
		</div>
		<div class="col-xs-60 col-sm-25 article__text__wrapper">
			<div class="valign-parent"><i class="valign"></i><div class="valign">

			<h1 class="article__heading h2"><u class="custom-underline">Oversized fully equipped kitchen and ensuite bathrooms fitted with designer fittings and quality appliances</u></h1>
			</div></div>
		</div>
	</div>
</article>


<main id="enquire" style="position: relative;">
<div class="container text-center register-form">

	<?php echo $this->form_validation->show_validation_errors(); ?>

	<?php
	$form_name = "general_enquiry";
	$sent = FALSE;
	$errors = FALSE;


	if (isset($form_result) && $form_result)
	{
		if (isset($form_result->form_name) && $form_result->form_name == $form_name)
		{
			$errors = TRUE;
			if (isset($form_result->form_success) && $form_result->form_success == TRUE)
			{
				$sent = TRUE;
				$errors = FALSE;
			}
		}
	}

	?>

	<div class="row">
		<?php if ($sent) : ?>
		<div class="form-thankyou">
			<h1 class="h4">Thank you for enquiring.</h1>
		</div>
		

		<?php else : ?>

		<h2 class="page-title">
			Enquire Now
		</h2>

		<?php if ($errors && validation_errors()) : ?>
		<div class="form-validation-errors">
			<?php echo validation_errors(); ?>
		</div>
		<?php endif; ?>

		<form action="" method="POST" class="col-xs-60 col-sm-35 center-block">
			<input type="hidden" name="ref" id="ref" value="general_enquiry">

			<div class="row">
				<input type="text" name="name" value="<?php echo set_value('name'); ?>" placeholder="Full Name*" title="Full Name*" required="required" />
			</div>
			<div class="row">
				<input type="text" name="phone" value="<?php echo set_value('phone'); ?>" placeholder="Phone" title="Phone" />
			</div>
			<div class="row">
				<input type="email" name="email" value="<?php echo set_value('email'); ?>" placeholder="Email*" title="Email*" required="required" />
			</div>
			<div class="row">
				<button class="button">Submit</button>
			</div>

			<h1 class="h4" style="font-weight: bold; margin: 1.5em 0 1em; letter-spacing: 0;">To experience what this penthouse has to offer an inspection is a must</h1>

		</form>

		<?php endif; ?>
	</div>


	<div class="clearfix"></div>

</div>
</main>
