

<?php $this->load->view('templates/header'); ?>


<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">

		<?php //$this->load->view('/templates/components/notification') ?>
	</section>

	<div class="container-fluid ">

		<div class=" ">
			<div id="exTab1" class="content">




				<div class="tab-content clearfix">


					<div class="tab-pane active" id="1a">


						<section class="">

							<h4>

								Add new company
							</h4>
							<div class="">



								<!-- /.box-header -->
								<div class="box-body">
									<form role="form"  method="POST">
										<!-- text input -->

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">

													<label >Business Name</label>
													<input type="text" name="name" class="form-control"  placeholder="Customer Name" required>

												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">

													<div class="">
														<label >Phone</label>
														<input type="text" name="phone_number" class="form-control"  placeholder="Phone Number" autocomplete="off" required>
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
													<input type="text" name="address1" class="form-control" placeholder="Address Line 1" required >

												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">

													<label >Address 2</label>
													<input type="tel" name="address2" class="form-control"  placeholder="Address Line 2" autocomplete="off" >
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
													<input type="text" name="town" class="form-control"  placeholder="Town" >

												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class=" ">
														County
													</label>


													<input type="tel" name="county" class="form-control"  placeholder="County" autocomplete="off" >


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
													<input type="text" name="postcode" class="form-control"  placeholder="Postcode" required>

												</div>
											</div>


											<div class="col-md-6">
												<div class="form-group">

													<label class=" ">
														Organisation Type
													</label>
													<select  name="organisation_type_id" class="form-control" >
													<?php foreach($organisation_type as $org): ?>
														<option value="<?php echo $org['id']; ?>"><?php echo $org['name']; ?></option>
													<?php endforeach ?>
													</select>




												</div>
											</div>

											<input type="hidden" value="2" name="organisation_type_id">

											<!--/span-->
										</div>


										<div class="row">
											<div class="col-md-4">
												<div class="form-group">

													<label class=" ">
														Number of Employees
													</label>
													<input type="text" name="no_of_employees" class="form-control"  placeholder="1 - 4" required>

												</div>
											</div>





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
