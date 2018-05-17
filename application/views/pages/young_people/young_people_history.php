
<?php $this->load->view('templates/header'); ?>


<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">


		<?php //$this->load->view('/templates/components/notification') ?>
	</section>

	<div class="container-fluid ">
		<div class=" ">
			<div id="exTab1" class="">

				<?php $this->load->view('young-people/young_people_components/young_people_tabs') ?>




				<div class="tab-content clearfix">

					<h3 class="box-title">
						Student Details
					</h3>
					<div class="tab-pane active" id="1a">


						<section class="box">

							<!-- Main content School Details-->
							<!--- Schools contacts -->

							<div class="">



								<!-- /.box-header -->
								<div class="box-body">
									<form role="form"  method="POST">
										<!-- text input -->

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">

													<label class=" "> First Name</label>
													<input type="text" name="first_name" class="form-control" value="<?php echo $table['first_name']; ?>" placeholder="First Name" >

												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">

													<div class="">
														<label >Last Name</label>
														<input type="tel" name="last_name" class="form-control" value="<?php echo $table['last_name'] ?>" placeholder="0123 456789" autocomplete="off" >
													</div>
												</div>
											</div>
											<!--/span-->
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">

													<label class=" ">
														Year
													</label>
													<input type="text" name="year" class="form-control" value="<?php echo $table['year']; ?>" placeholder="Doe" >

												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">

													<label >Form</label>
													<input type="tel" name="form_name" class="form-control" value="<?php echo $table['form_name'] ?>" placeholder="0123 456789" autocomplete="off" >
												</div>


											</div>
											<!--/span-->
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">

													<label for="gender">Gender</label><br>

													<div class="col-md-4">
														<label class="checkcontainer">Male
															<input type="radio" checked="checked" name="gender">
															<span class="radiobtn"></span>
														</label>
													</div>
													<div class="col-md-4">
														<label class="checkcontainer">Female
															<input type="radio"  name="gender">
															<span class="radiobtn"></span>
														</label>
													</div>

												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class=" ">
														Ethnicity
													</label>

													<select class="form-control">
														<option>White British</option>
														<option>White Irish</option>
														<option>Caribbean</option>
														<option>African</option>
														<option>Indian</option>
														<option>Bangladeshi</option>
														<option>Chinese</option>
														<option>Korean</option>
														<option>Other</option>

													</select>

												</div>
											</div>
											<!--/span-->
										</div>



										<div class="row">
											<div class="col-md-6">
												<div class="form-group">

													<label class=" ">
														Carer
													</label>
													<input type="text" name="carer" class="form-control" value="<?php echo $table['carer']; ?>" placeholder="Doe" >

												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class=" ">
														Phone Number
													</label>


													<input type="tel" name="phone" class="form-control" value="<?php echo $table['phone'] ?>" placeholder="0123 456789" autocomplete="off" >


												</div>
											</div>
											<!--/span-->
										</div>
										<div class="form-row">
											<input type="submit" class="btn btn-mploy-submit" value="Save Changes">
											<input type="button" class="btn btn-mploy-cancel" value="Cancel" onclick="window.location.replace('/youngpeople')">
											<div>
											</div>

									</form>
								</div>


						</section>



					</div>








				</div> <!-- end tab content -->



			</div>
		</div>
	</div> <!-- end tab container -->














	<?php $this->load->view('templates/footer'); ?>
