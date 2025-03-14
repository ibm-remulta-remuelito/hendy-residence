<div class="type-hero">
<?php if (isset($row->image) && $row->image): ?>
			<?php echo $this->load->view('modules/default/hero', array($row->image), TRUE); ?>
<?php endif ?>
</div>


<?php if ((isset($row->sub_heading) && $row->sub_heading) || (isset($row->detail) && $row->detail)): ?>
<div class="type-page_blurb">
	<div class="container">
		<div class="page_blurb template_block clearfix pd-t-lg pd-b-lg">
		<?php if ($row->sub_heading) : ?>
			<h2 class="title txt-responsive-xl txt-white"><?php echo $row->sub_heading; ?></h2>
		<?php endif ?>
			<div class="description txt-responsive-md text-center inherit <?php echo (!$row->sub_heading) ? 'pd-t-no' : '' ?>"><?php echo $row->detail; ?></div>
		</div>
	</div>
</div>
<?php endif ?>

<?php echo (isset($test)) ? $test : ''; ?>