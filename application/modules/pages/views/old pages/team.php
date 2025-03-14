<div class="hero-gallery hero-gallery--smaller">
	<div class="flexslider">
		<ul class="slides">
			<li>
				<div class="image-center" style="background-image: url('<?php echo base_url('assets/media/team/team-hero.jpg'); ?>');">
					<img src="<?php echo base_url('assets/media/team/team-hero.jpg'); ?>" alt="Team" />
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
		<div class="col-xs-60 col-sm-38 col-md-38 col-lg-38 article__image__wrapper">
			<figure class="article__image image-center" style="background-image: url('<?php echo base_url('assets/media/team/damgar-project-img.jpg'); ?>');">
					<img src="<?php echo base_url('assets/media/team/damgar-project-img.jpg'); ?>" alt="Damgar Property Group Project" />
			</figure>
		</div>
		<div class="col-xs-60 col-sm-21 col-md-21 col-lg-21 article__text__wrapper">
			<div class="valign-parent"><i class="valign"></i><div class="valign">

			<h1 class="article__heading h6 article__heading--plain">Developed By</h1>
			<a  href="http://damgargroup.com.au" target="_blank" class="article__logo"><img src="<?php echo base_url('assets/images/damgar-property-group.png'); ?>" alt="Damgar Property Group" /></a>
			<p class="article__description">Damgar Property Group stands at the forefront of boutique residential development in inner Melbourne. We have complete focus from beginning to end.</p>
			<p class="article__description">During our 30 years in property development, Damgar Property Group has fostered strong relationships with key industry partners including Architects, Engineers and Planning Consultants. All our projects are funded in conjunction with Australian Banks, with whom we have long-standing relationships.</p>
			<p class="article__description">As builders in our own right, we have a key eye for quality and liveability. We know what it takes to get the job done and done properly.</p>


			</div></div>
		</div>
	</div>
</article>

<div class="hero-gallery">
	<?php
		$slides = array(
'assets/media/team/jack-merlo-hero.jpg',
		);
	?>

	<div class="flexslider">
		<ul class="slides">
			<?php foreach ($slides as $slide) : ?>
			<li>
				<figure class="image-center" style="background-image: url('<?php echo base_url($slide); ?>');">
					<img src="<?php echo base_url($slide); ?>" alt="Project" />
				</figure>
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>

<article class="article article--odd">
	<div class="container">
		<div class="col-xs-60 col-sm-38 article__image__wrapper">
			<figure class="article__image image-center" style="background-image: url('<?php echo base_url('assets/media/team/jackson-clement-project-img.jpg'); ?>');">
					<img src="<?php echo base_url('assets/media/team/jackson-clement-project-img.jpg'); ?>" alt="Jackson Clements Burrows Architect Project" />
			</figure>
		</div>
		<div class="col-xs-60 col-sm-21 article__text__wrapper">
			<div class="valign-parent"><i class="valign"></i><div class="valign">

			<h1 class="article__heading article__heading--plain h6">Architecture By</h1>
			<a  href="http://www.jcba.com.au" target="_blank" class="article__logo"><img src="<?php echo base_url('assets/images/jackson-clements-burrows-architect.png'); ?>" alt="Jackson Clements Burrows Architect" /></a>
			<p class="article__description">A founding director of Jackson Clements Burrows Architects, an award-winning Architecture, Interior Design and Urban design firm based in Melbourne, Graham Burrows brings exemplary design leadership to every facet of the architectural process - from briefing and concept design and development through to project management.</p>
			<p class="article__description">He has a particular interest in projects that are in-tune with their local environment. A regular jury member on awards panels, Graham has also been a guest lecturer at the University of Melbourne and Deakin University. He has been instrumental in the development of many award-winning designs throughout his career. Graham is the Lead Architect for Dendy Residences.</p>

			</div></div>
		</div>
	</div>
</article>

<div class="hero-gallery">
	<?php
		$slides = array(
'assets/media/team/jackson-clement-hero.jpg',
		);
	?>

	<div class="flexslider">
		<ul class="slides">
			<?php foreach ($slides as $slide) : ?>
			<li>
				<figure class="image-center" style="background-image: url('<?php echo base_url($slide); ?>');">
					<img src="<?php echo base_url($slide); ?>" alt="Project" />
				</figure>
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>

<article class="article article--odd">
	<div class="container">
		<div class="col-xs-60 col-sm-38 article__image__wrapper">
			<figure class="article__image image-center" style="background-image: url('<?php echo base_url('assets/media/team/jack-merlo-project-img.jpg'); ?>');">
					<img src="<?php echo base_url('assets/media/team/jack-merlo-project-img.jpg'); ?>" alt="Jack Merlo Project" />
			</figure>
		</div>
		<div class="col-xs-60 col-sm-21 article__text__wrapper">
			<div class="valign-parent"><i class="valign"></i><div class="valign">

			<h1 class="article__heading article__heading--plain h6">Landscaped By</h1>
			<a href="http://jackmerlo.com" target="_blank" class="article__logo"><img src="<?php echo base_url('assets/images/jack-merlo.png'); ?>" alt="Jack Merlo" /></a>
			<p class="article__description">Jack Merlo is a celebrated landscape architect, well known for his contemporary landscapes that are both stylish and functional, presenting natural, organic designs which are useful and enjoyable to use. Jack has collaborated with Jackson Clements Burrows Architects many times before and brings his landscape inspiration to the Dendy Residences project.</p>

			</div></div>
		</div>
	</div>
</article>
