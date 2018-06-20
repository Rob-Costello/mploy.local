
<?php $this->load->view('templates/header'); ?>


<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">

		<?php //$this->load->view('/templates/components/notification') ?>
	</section>

	<div class="container-fluid ">
		<div class=" ">
			<div id="exTab1" class="">





				<div class="tab-content clearfix">


					<div class="tab-pane active" id="1a">


						<section class="">



							<div class="">

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

													<label class=" ">Student Name</label>
													<select name="id" class="form-control">
														<?php foreach($contacts['data'] as $c): ?>
														<option value="<?php echo $c->id; ?>">
															<?php echo $c->first_name . ' ' . $c->last_name ; ?>
														</option>
														<?php endforeach; ?>

													</select>



												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">

													<div class="">
														<label >Start Date</label>
														<input type="text" name="placement_start_date" class="form-control" value="" placeholder="01-02-2001" autocomplete="off" >
													</div>
												</div>
											</div>
											<!--/span-->
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">

													<label class=" ">End Date</label>
													<input type="text" name="placement_end_date" class="form-control" value="" placeholder="01-01-2001" >

												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">

													<label >Mploy / Self</label>
													<input type="text" name="self" class="form-control" value="" placeholder="Name" autocomplete="off" >
												</div>


											</div>
											<!--/span-->
										</div>




											<!--/span-->


										<div class="row">
											<div class="col-md-6">
												<div class="form-group">

													<label >Company Name</label>

													<select name="placement_company_id" class="form-control">
														<option>Select Company</option>
														<?php foreach($companies as $c): ?>

														<option value="<?php echo $c->comp_id?>"> <?php echo $c->name ?></option>
														<?php endforeach ?>
													</select>


												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">

													<label >Call Notes</label>
													<textarea style="width:100%" class="form-control" type="textarea" name="notes" class="form-control" value="" placeholder="" autocomplete="off" ></textarea>
												</div>


											</div>
											<!--/span-->
										</div>

								</div>
								<!--<input type="submit" class="btn btn-mploy-submit" value="Save Changes">-->
								<button class="btn btn-mploy-submit"> Save Changes </button>
								<input type="button" class="btn btn-mploy-cancel" value="Cancel" onclick="window.location.replace('/schools/view/<?php echo $id; ?>/placements/')">
								</form>
							</div>


						</section>



					</div>








				</div> <!-- end tab content -->



			</div>
		</div>
	</div> <!-- end tab container -->














	<?php $this->load->view('templates/footer'); ?>
