
<?php $this->load->view('templates/header'); ?>


<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">

		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">School Details</li>
		</ol>
		<?php //$this->load->view('/templates/components/notification') ?>
	</section>

	<div class="container-fluid ">
		<div class=" ">
			<div id="exTab1" class="">




				<div class="tab-content clearfix">


					<div class="tab-pane active" id="1a">


						<section class="">

							<h3>

								School Details
							</h3>
							<div class="">



								<!-- /.box-header -->
								<div class="box-body">
									<form role="form"  method="POST">
										<!-- text input -->

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">

													<label class=" ">School Name</label>
													<input type="text" name="name" class="form-control"  placeholder="School Name" >

												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">

													<div class="">
														<label >Type of Institution</label>
														<input type="text" name="type" class="form-control"  placeholder="Secondary School" autocomplete="off" >
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
														Phone Number
													</label>


													<input type="tel" name="phone_number" class="form-control"  placeholder="0123 456789" autocomplete="off" >


												</div>
											</div>
											<!--/span-->
										</div>







								</div>
								<input type="submit" class="btn btn-mploy-submit" value="Save Changes">
								<input type="button" class="btn btn-mploy-cancel" value="Cancel" onclick="window.location.replace('/schools')">
								</form>
							</div>


						</section>



					</div>








				</div> <!-- end tab content -->



			</div>
		</div>
	</div> <!-- end tab container -->














	<?php $this->load->view('templates/footer'); ?>
