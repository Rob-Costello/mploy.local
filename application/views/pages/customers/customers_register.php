
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

					<h3 class="box-title">
						Create New Customer
					</h3>
					<div class="tab-pane active" id="1a">


						<section class="box">
							<div id="infoMessage"><?php echo $message;?></div>
							<!-- Main content School Details-->
							<!--- Schools contacts -->

							<div class="">



								<!-- /.box-header -->
								<div class="box-body">

										<!-- text input -->

										<h1><?php echo lang('create_user_heading');?></h1>
										<div class="col-md-6"><div class="form-group"><?php echo lang('create_user_subheading');?></div></div>



										<?php echo form_open("auth/create_user");?>

										<div class="col-md-6"><div class="form-group">
												<?php echo lang('create_user_fname_label', 'first_name');?> <br />
												<?php echo form_input($first_name);?>
											</div></div>

										<div class="col-md-6"><div class="form-group">
												<?php echo lang('create_user_lname_label', 'last_name');?> <br />
												<?php echo form_input($last_name);?>
											</div></div>



										<div class="col-md-6"><div class="form-group">
												<?php echo lang('create_user_company_label', 'company');?> <br />
												<?php echo form_input($company);?>
											</div></div>

										<div class="col-md-6"><div class="form-group">
												<?php echo lang('create_user_email_label', 'email');?> <br />
												<?php echo form_input($email);?>
											</div></div>

										<div class="col-md-6"><div class="form-group">
												<?php echo lang('create_user_phone_label', 'phone');?> <br />
												<?php echo form_input($phone);?>
											</div></div>

										<div class="col-md-6"><div class="form-group">
												<?php echo lang('create_user_password_label', 'password');?> <br />
												<?php echo form_input($password);?>
											</div></div>

										<div class="col-md-6"><div class="form-group">
												<?php echo lang('create_user_password_confirm_label', 'password_confirm');?> <br />
												<?php echo form_input($password_confirm);?>
											</div></div>


									</div>
								<div class="form-row">
									<input type="submit" class="btn btn-mploy-submit" value="Save Changes">
									<input type="button" class="btn btn-mploy-cancel" value="Cancel" onclick="window.location.replace('/youngpeople')">
								</div>
										<?php echo form_close();?>



										<!--/span-->
										</div>



						</section>



					</div>








				</div> <!-- end tab content -->



			</div>
		</div>
	</div> <!-- end tab container -->














	<?php $this->load->view('templates/footer'); ?>
