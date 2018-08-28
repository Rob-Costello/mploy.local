
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
			<div id="exTab1" class="content">




				<div class="tab-content clearfix">


					<div class="tab-pane active" id="1a">


						<section class="">

							<h4>

								New Contact
							</h4>
							<div class="">



								<!-- /.box-header -->
								<div class="box-body">
									<form role="form"  method="POST">
										<!-- text input -->

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">

													<label class=" ">First Name</label>
													<input type="text" name="first_name" class="form-control"  placeholder="John" required>

												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">

													<div class="">
														<label >Last Name</label>
														<input type="text" name="last_name" class="form-control"  placeholder="Doe" autocomplete="off" required>
													</div>
												</div>
											</div>
											<!--/span-->
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">

													<label class=" ">
														Email
													</label>
													<input type="text" name="email" class="form-control" " placeholder="your@email.com" >

												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">

													<label >Address </label>
													<input type="tel" name="address" class="form-control"  placeholder="Fake Road" autocomplete="off" >
												</div>


											</div>
											<!--/span-->
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">

													<label class=" ">
														Postcode
													</label>
													<input type="text" name="postcode" class="form-control"  placeholder="WA10 1PP" >

												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class=" ">
														Job Title
													</label>


													<input type="text" name="job_title" class="form-control"  placeholder="Job Title" autocomplete="off" >


												</div>
											</div>
											<!--/span-->
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">

													<label class=" ">
														Telephone
													</label>
													<input type="text" name="phone" class="form-control"  placeholder="01234 567890" required>

												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">

													<label class=" ">
														Primary Contact
													</label>
													<br>
													<input type="checkbox" name="main_contact_id" value="1" <div="" style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

												</div>
											</div>
											<!--/span-->
										</div>



									<input type="hidden" name="org_id" value="<?php echo $org_id ?>" >
										<input type="hidden" name="contact_type_id" value="2" >






								</div>
								<input type="submit" class="btn btn-mploy-submit" value="Save Changes">
								<input type="button" class="btn btn-mploy-cancel" value="Cancel" onclick="window.location.replace('/companies/view/<?php echo $org_id ?>/contacts/')">
								</form>
							</div>


						</section>



					</div>








				</div> <!-- end tab content -->



			</div>
		</div>
	</div> <!-- end tab container -->














	<?php $this->load->view('templates/footer'); ?>
