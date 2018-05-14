
<?php $this->load->view('templates/header'); ?>


<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h3>

			School Details
		</h3>
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



							<div class="box">

								<div class="box-header with-border">
									<h3 class="box-title">School Information</h3>
								</div>


								<!-- /.box-header -->
								<div class="box-body">
									<form role="form"  method="POST">
										<!-- text input -->

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">

													<label class=" ">Start Date</label>
													<input type="text" name="start_date" class="form-control" value="" placeholder="date" >

												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">

													<div class="">
														<label >End Date</label>
														<input type="text" name="end_date" class="form-control" value="" placeholder="Time" autocomplete="off" >
													</div>
												</div>
											</div>
											<!--/span-->
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">


													<div class="">
														<label >Group</label>
														<input type="text" name="end_date" class="form-control" value="" placeholder="Time" autocomplete="off" >
													</div>




												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">

													<label >Mploy / Self</label>
													<input type="text" name="mploy_self" class="form-control" value="" placeholder="Name" autocomplete="off" >
												</div>


											</div>
											<!--/span-->
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">

													<label >Placed</label>
													<input type="text" name="mploy_self" class="form-control" value="" placeholder="Name" autocomplete="off" >



												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">

													<label >Call Notes</label>
													<textarea style="width:100%" class="form-control" type="textarea" name="receiver" class="form-control" value="" placeholder="Name" autocomplete="off" ></textarea>
												</div>


											</div>
											<!--/span-->
										</div>

								</div>
								<input type="submit" class="btn btn-success" value="Save Changes">
								<input type="button" class="btn btn-danger" value="Cancel" onclick="window.location.replace('/schools/contacts')">
								</form>
							</div>


						</section>



					</div>








				</div> <!-- end tab content -->



			</div>
		</div>
	</div> <!-- end tab container -->














	<?php $this->load->view('templates/footer'); ?>
