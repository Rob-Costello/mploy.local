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
						Edit User
					</h3>
					<div class="tab-pane active" id="1a">


						<section class="box">

							<!-- Main content School Details-->
							<!--- Schools contacts -->

							<div class="">



								<!-- /.box-header -->
								<div class="box-body">

									<div id="infoMessage"><?php echo $message;?></div>



<?php echo form_open(uri_string());?>

      <p>
		  <?php $first_name['class']='form-control'; ?>
            <?php echo lang('edit_user_fname_label', 'first_name');?> <br />
            <?php echo form_input($first_name);?>
      </p>

      <p>
		  <?php $last_name['class']='form-control'; ?>
		  <?php echo lang('edit_user_lname_label', 'last_name');?> <br />
            <?php echo form_input($last_name);?>
      </p>

      <p>
		  <?php $company['class']='form-control'; ?>
		  <?php echo lang('edit_user_company_label', 'company');?> <br />
            <?php echo form_input($company);?>
      </p>

      <p>
		  <?php $phone['class']='form-control'; ?>
            <?php echo lang('edit_user_phone_label', 'phone');?> <br />
            <?php echo form_input($phone);?>
      </p>

      <p>
		  <?php $password['class']='form-control'; ?>
		  <?php echo lang('edit_user_password_label', 'password');?> <br />
            <?php echo form_input($password);?>
      </p>

      <p>
		  <?php $password_confirm['class']='form-control'; ?>
		  <?php echo lang('edit_user_password_confirm_label', 'password_confirm');?><br />
            <?php echo form_input($password_confirm);?>
      </p>



      <?php echo form_hidden('id', $user->id);?>
      <?php echo form_hidden($csrf); ?>






								</div>
								<div class="form-row">
									<input type="submit" class="btn btn-mploy-submit" value="Save Changes">
									<input type="button" class="btn btn-mploy-cancel" value="Cancel" onclick="window.location.replace('/customers')">
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
