<div class="row">
	<div class="col-md-12">
		<?php if( $messages != '' ) { ?>
			<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<?php echo $messages; ?>
			</div>
		<?php } ?>

		<?php if( $errors != '' ) { ?>
			<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<?php echo $errors; ?>
			</div>
		<?php } ?>
	</div>
</div>
