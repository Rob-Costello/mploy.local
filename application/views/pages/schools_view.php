
<?php $this->load->view('templates/header'); ?>


<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>

			<small>School Details</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">School Details</li>
		</ol>
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
	</section>




	<!-- Main content -->
	<section class="content">


		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">School Information</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<form role="form">
					<!-- text input -->

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">

									<label class=" ">School Name</label>
									<input type="text" name="name" class="form-control" value="<?php echo $table['name']; ?>" placeholder="Doe" disabled="">

							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">

								<div class="">
									<label >School Type</label>
									<input type="tel" name="type" class="form-control" value="<?php echo $table['type'] ?>" placeholder="0123 456789" autocomplete="off" disabled="">
								</div>
							</div>
						</div>
						<!--/span-->
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">

								<label class=" ">
								
								</label>
								<input type="text" name="name" class="form-control" value="<?php echo $table['name']; ?>" placeholder="Doe" disabled="">

							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">

								<div class="">
									<label >School Type</label>
									<input type="tel" name="type" class="form-control" value="<?php echo $table['type'] ?>" placeholder="0123 456789" autocomplete="off" disabled="">
								</div>

							</div>
						</div>
						<!--/span-->
					</div>





				</form>


			</div>
		</div>



	</section>

</div>












<?php $this->load->view('templates/footer'); ?>
