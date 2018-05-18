

<?php $this->load->view('templates/header'); ?>


<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">


		<?php //$this->load->view('/templates/components/notification') ?>
	</section>

	<div class="container-fluid ">
		<div class=" ">
			<div id="exTab1" class="">

				<ul  class="nav nav-pills nav-background">
					<li class="active"><a  href="/schools/view/<?php echo $id; ?>" >Person's Details</a>
					</li>
					<li ><a href="/youngpeople/view/<?php echo $id;?>/membership" >Membership</a>
					</li>
					<li><a href="/youngpeople/view/<?php echo $id;?>/history" >History</a>
					</li>
					<li ><a  href="/youngpeople/view/<?php echo $id;?>/login" >Login Details</a>
					</li>

				</ul>




				<div class="tab-content clearfix">

					<h3 class="box-title">
						Student Details
					</h3>
					<div class="tab-pane active" id="1a">

						<section class="box">

							<div class="">



								<!-- /.box-header -->
								<div class="box-body">
									<form role="form" enctype="multipart/form-data" method="POST">
										<!-- text input -->
										<div class="form-row">
											<div class="col-md-6">
												<button class="btn btn-mploy">Download Template</button>
											</div>
											<div class="col-md-6">
												<label>Upload File </label>
												<input type="file" name="myfile" />
											</div>
										</div>


										<div style="margin-top:50px;" class="form-row">
											<div class="col-md-6">
												<div class="form-group">
													<label class=" ">School Year Name</label>
													<input type="text" name="first_name" class="form-control" value="" placeholder="Year Name" >
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">

													<div class="">
														<label >Reason for Upload</label>
														<textarea  name="notes" class="form-control" value="" placeholder="" autocomplete="off" >
														</textarea>
													</div>
												</div>
											</div>
											<!--/span-->
										</div>

										<div class="form-row">
											<div class="col-md-6">
												<label>Available Fields</label>
												<select class="form-control" multiple size="6">

													<option value="American">TEST </option>
													<option value="Andean">Andean flamingo</option>
													<option value="Chilean">Chilean flamingo</option>
													<option value="Greater">Greater flamingo</option>
													<option value="James's">James's flamingo</option>
													<option value="Lesser">Lesser flamingo</option>

												</select>



											</div>
											<div class="col-md-6">
												<label>Selected Fields</label>
												<select class="form-control" multiple size="6">

													<option value="American">TEST </option>
													<option value="Andean">Andean flamingo</option>
													<option value="Chilean">Chilean flamingo</option>
													<option value="Greater">Greater flamingo</option>
													<option value="James's">James's flamingo</option>
													<option value="Lesser">Lesser flamingo</option>

												</select>



											</div>


										</div>





										<div class="form-row">
											<div style="margin-top:50px;" class="col-md-7">
											<input type="submit" class="btn btn-mploy-submit" value="Save Changes">
											<input type="button" class="btn btn-mploy-cancel" value="Cancel" onclick="window.location.replace('/youngpeople')">
											</div>
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
