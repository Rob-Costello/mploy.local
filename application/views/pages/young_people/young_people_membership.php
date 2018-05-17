
<?php $this->load->view('templates/header'); ?>


<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">


		<?php //$this->load->view('/templates/components/notification') ?>
	</section>

	<div class="container-fluid ">
		<div class=" ">
			<div id="exTab1" class="">

				<?php $this->load->view('/pages/young_people/young_people_components/young_people_tabs') ?>




				<div class="tab-content clearfix">

					<h3 class="box-title">
						Membership
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
													<label class=" ">
														Membership Type
													</label>

													<select name="" class="form-control">
														<option>Type 1</option>
														<option>Type 2</option>
														<option>Type 3</option>
														<option>Type 4</option>
														<option>Type 5</option>


													</select>

												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class=" ">
														Sending Email
													</label>

													<select name="" class="form-control">
														<option>Type 1</option>
														<option>Type 2</option>
														<option>Type 3</option>
														<option>Type 4</option>
														<option>Type 5</option>


													</select>

												</div>
											</div>
											<!--/span-->
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class=" ">
														School
													</label>

													<select name="" class="form-control">
														<option>Type 1</option>
														<option>Type 2</option>
														<option>Type 3</option>
														<option>Type 4</option>
														<option>Type 5</option>


													</select>

												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class=" ">
														Status
													</label>

													<select name="" class="form-control">
														<option>Active</option>
														<option>Inactive</option>



													</select>

												</div>


											</div>
											<!--/span-->
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class=" ">
														Year Group
													</label>

													<select name="" class="form-control">
														<option>11A</option>
														<option>11B</option>
														<option>11C</option>
														<option>11D</option>
														<option>11E</option>


													</select>

												</div>
											</div>
											<div class="col-md-6 ">
												<div class="form-group">
												<label>Require Email Support</label>
													<label class="  container">
													<input type="checkbox" >
													<span class="checkbox"></span>
												</label>
												</div>


											</div>
											<!--/span-->
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class=" ">
														DBS Number
													</label>

													<input type="text" class="form-control" name="dbs_number">

												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">

													<label for="dbs_checked">DBS Checked</label><br>

													<div class="col-md-4">
														<label class="checkcontainer">Yes
															<input type="radio" checked="checked" name="dbs_checked">
															<span class="radiobtn"></span>
														</label>
													</div>
													<div class="col-md-4">
														<label class="checkcontainer">No
															<input type="radio"  name="dbs_checked">
															<span class="radiobtn"></span>
														</label>
													</div>

												</div>
											</div>

											<!--/span-->
										</div>



										<div class="row">
											<div class="col-md-6">
												<div class="form-group">

													<label class=" ">
														DBS Date
													</label>
													<input type="text" name="dbs_date" class="form-control" value="" placeholder="Date" >

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
