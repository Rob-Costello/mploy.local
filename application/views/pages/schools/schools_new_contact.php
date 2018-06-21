


<?php $this->load->view('templates/header'); ?>


<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">


		<?php //$this->load->view('/templates/components/notification') ?>
	</section>

	<div class="container-fluid ">
		<div class="col-md-12">
			<?php if( $messages != '' ) { ?>
				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<?php echo $messages; ?>
				</div>
			<?php } ?>
		</div>
		<div class=" ">
			<div id="exTab1" class="">





				<div class="tab-content clearfix">


					<div class="tab-pane active" id="1a">


						<section class="">

							<!-- Main content School Details-->
							<!--- Schools contacts -->

							<div class="">

								<div class="box-header with-border">
									<h3 class="box-title">School Contact</h3>
								</div>


								<!-- /.box-header -->
								<div class="box-body">
									<form role="form"  method="POST">
										<!-- text input -->

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">

													<label class=" ">First Name</label>
													<input type="text" name="first_name" class="form-control" value="" placeholder="Name" >

												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">

													<div class="">
														<label >Surname</label>
														<input type="text" name="last_name" class="form-control" value="" placeholder="Doe" autocomplete="off" >
													</div>
												</div>
											</div>
											<!--/span-->
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">

													<label class=" ">
														Phone
													</label>
													<input type="text" name="phone" class="form-control" value="" placeholder="Doe" >

												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">

													<label >Email</label>
													<input type="tel" name="email" class="form-control" value="" placeholder="john.doe@fakename.com" autocomplete="off" >
												</div>


											</div>
											<!--/span-->
										</div>

								<input type="hidden" name="school_id" value="<?php echo $table['school_id']; ?>">
										<input type="hidden" name="contact_type" value="3">
								</div>
								<input type="submit" class="btn btn-mploy-submit" value="Save Changes">
								<input type="button" class="btn btn-mploy-cancel" value="Cancel" onclick="window.location.replace('/schools/view/<?php echo $table['school_id'] ?>/contacts')">
								</form>
							</div>


						</section>



					</div>








				</div> <!-- end tab content -->



			</div>
		</div>
	</div> <!-- end tab container -->














	<?php $this->load->view('templates/footer'); ?>
