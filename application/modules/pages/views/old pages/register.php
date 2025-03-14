<main id="main" style="position: relative;">
	<!-- <div class="ribbon-desktop">
		<img class="ribbon-desktop__img" src="<?php echo base_url('assets/images/ribbon.png');?>?v=9">
	</div> -->
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
		<!-- Gtag Tracking Code -->
		<script type="text/javascript">
			gtag('event', 'submit', {
				'event_category': 'form',
				'event_label': 'contact'
			});
			goog_report_conversion();
		</script>
		<!-- END Gtag Tracking Code -->

		<!-- Adwords conversion tracking -->
		<script>trackConv(AW-794092647, '1xTACKKqgIcBEOfI0_oC');</script>
		<!-- END Adwords conversion tracking -->

		<!-- Facebook Tracking Code -->
		<script>fbq('track', 'Lead');</script>
		<!-- END Facebook Tracking Code -->
		<img height="1" width="1" style="display:none;" alt="" src="https://dc.ads.linkedin.com/collect/?pid=85778&conversionId=140390&fmt=gif" />
		<!-- Activity name for this tag: 131578_ActivityTag_CastranGilbert -->
		<script type='text/javascript'>
		var axel = Math.random()+"";
		var a = axel * 10000000000000;
		document.write('<img src="https://pubads.g.doubleclick.net/activity;xsp=4378983;ord='+ a +'?" width=1 height=1 border=0/>');
		</script>
		<noscript>
		<img src="https://pubads.g.doubleclick.net/activity;xsp=4378983;ord=1?" width=1 height=1 border=0/>
		</noscript>

		<?php else : ?>

		<h2 class="page-title">
			Enquire Now
		</h2>

		<?php if ($errors && validation_errors()) : ?>
		<div class="form-validation-errors">
			<?php echo validation_errors(); ?>
		</div>
		<?php endif; ?>

		<?php /* <form action="https://webto.salesforce.com/servlet/servlet.WebToLead?encodeingUTF-8" method="POST" class="col-xs-60 col-sm-35 center-block"> */ ?>
		<form action="" method="POST" class="col-xs-60 col-sm-35 center-block">
			<input type="hidden" name="ref" id="ref" value="general_enquiry">

			<?php /*
			<input type="hidden" name="old" value="00D7F000000zUdT">
			<input type="hidden" name="retURL" value="http://www.dendyresidences.com.au">
			*/ ?>

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

			<h1 class="h4" style="font-weight: bold; margin: 1.5em 0 1em; letter-spacing: 0;">Open for Inspection</h1>
			<h1 class="h4" style="font-weight: normal; text-transform: none; letter-spacing: 0; font-size: 1.325rem; margin-bottom: 1em;">By private appointment only</h1>
			<!-- <h1 class="h4" style="font-weight: normal; text-transform: none; letter-spacing: 0; font-size: 1.325rem; margin-bottom: 1em;">Saturday – 11am to 12pm</h1>
			<h1 class="h4" style="font-weight: normal; text-transform: none; letter-spacing: 0; font-size: 1.325rem; margin-bottom: 1em;">Sunday – 11am to 12pm</h1> -->

			<!-- <h1 class="h4" style="font-weight: normal; letter-spacing: 0; font-size: 1.325rem;">BY PRIVATE APPOINTMENT</h1> -->

		</form>

		<?php endif; ?>
	</div>

	<div class="row partners">
		<!--
		<div class="col-xs-60 col-sm-30 std-pd">
			<a style="margin-top: 2em; display: block;">
				<img class="img-responsive" src="<?php echo base_url('assets/images/mw-logo-black.png?v=2'); ?>" alt="Marshall White" />
			</a>
			<a class="h4 telephone-link telephone-link--1" href="tel:0419395241">Brian Devlin<br/> 0419 395 241</a>
		</div>
		<div class="col-xs-60 col-sm-60 std-pd">
			<a>
				<img class="img-responsive" src="<?php echo base_url('assets/images/agents/ue-logo-text.png?v=3'); ?>" alt="Unique Estates" width="142" height="94" />
			</a>
			<a class="h4 telephone-link telephone-link--2" href="tel:0411144877">Nicolette van Wijngaarden<br/> 0411 144 877</a>
		</div>
		-->
	</div>

	<!-- <div class="row company-logos std-pd">
		<div class="col-xs-60 col-sm-20 std-pd">
			<a href="http://jackmerlo.com" target="_blank">
				<img class="img-responsive" src="<?php echo base_url('assets/images/agents/jack-merlo.png?v=1'); ?>" alt="Jack Merlo Design" />
			</a>
		</div>
		<div class="col-xs-60 col-sm-20 std-pd">
			<a href="http://damgargroup.com.au" target="_blank">
				<img class="img-responsive" src="<?php echo base_url('assets/images/agents/damgar-property-group.png?v=1'); ?>" alt="Damgar Property Group" />
			</a>
		</div>
		<div class="col-xs-60 col-sm-20 std-pd">
			<a href="http://www.jcba.com.au" target="_blank">
				<img class="img-responsive" src="<?php echo base_url('assets/images/agents/jackson-celements-burrows-architect.png?v=1'); ?>" alt="Jackson Celements Burrows Architect" />
			</a>
		</div>
	</div> -->

	<div class="clearfix"></div>
	<div class="row statement">
		<a href="<?php echo base_url('assets/media/SOI_-_2D_Dendy_Street_Brighton_VIC_3186.pdf'); ?>" target="_blank">Statement of Information</a>
	</div>

</div>
</main>
