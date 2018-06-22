
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

								Customer Details
							</h4>
							<div class="">



								<!-- /.box-header -->
								<div class="box-body">
									<form role="form"  method="POST">
										<!-- text input -->

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">

													<label >Customer Name</label>
													<input type="text" name="name" class="form-control"  placeholder="Fakes School" >

												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">

													<div class="">
														<label >Phone</label>
														<input type="text" name="phone_number" class="form-control"  placeholder="01234 56789" autocomplete="off" >
													</div>
												</div>
											</div>
											<!--/span-->
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">

													<label class=" ">
														Address 1
													</label>
													<input type="text" name="address1" class="form-control" " placeholder="123 Fake Street" >

												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">

													<label >Address 2</label>
													<input type="tel" name="address2" class="form-control"  placeholder="Fake Road" autocomplete="off" >
												</div>


											</div>
											<!--/span-->
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">

													<label class=" ">
														Town
													</label>
													<input type="text" name="town" class="form-control"  placeholder="Fake Town" >

												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class=" ">
														County
													</label>


													<input type="tel" name="county" class="form-control"  placeholder="Merseyside" autocomplete="off" >


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
														Organisation Type
													</label>
													<select name="organisation_type_id" class="form-control">
														<option >Select Organisation Type</option>
														<option value="1">School</option>
														<option value="4">Local Authority</option>
														<option value="5">College</option>

													</select>

												</div>
											</div>

											<input type="hidden" value="1" name="organisation_type_id">

											<!--/span-->
										</div>







								</div>
								<input type="submit" class="btn btn-mploy-submit" value="Save Changes">
								<input type="button" class="btn btn-mploy-cancel" value="Cancel" onclick="window.location.replace('/Customers')">
								</form>
							</div>


						</section>



					</div>








				</div> <!-- end tab content -->



			</div>
		</div>
	</div> <!-- end tab container -->














	<?php $this->load->view('templates/footer'); ?>
