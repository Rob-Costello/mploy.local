
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

					<div class="box-header">
						<div class="box-body">

							<div style="z-index:100" class="col-md-12">
								<?php if( $error != '' ) { ?>
									<div class="alert alert-success alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<?php echo $message; ?>
									</div>
								<?php } ?>
							</div>
							<div style="opacity:0;"  id="message">
								<?php echo $error; ?>

							</div>

							<h2 class="box-title">
							<?= $title; ?>
						</h2>
					</div>
					<div class="tab-pane active" id="1a">


						<section class="box">

							<!-- Main content School Details-->
							<!--- Schools contacts -->

							<div class="">



								<!-- /.box-header -->


								<div class="box-body">

                                    <?php if($message!==null): ?>
                                    <div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <?php echo $message; ?>
                                    </div>
                                    <?php endif ?>




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
									<p>
										<label>Super User</label>
										<input type="checkbox"  name="super" value="3" <?php if ($super_user ==true) echo ' checked '; ?>>
									</p>



      <?php echo form_hidden('id', $user->id);?>
      <?php echo form_hidden($csrf); ?>






								</div>
								<div class="form-row">
								<input type="submit" class="btn btn-mploy-submit" value="Save Changes">
								
									<input type="button" class="btn btn-mploy-cancel" value="Cancel" onclick="window.location.replace('/users')">
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
	<script>
$(function () {

        $('#button').on('click', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
			//url:<?php echo uri_string();?>
           
            data: $('form').serialize(),
            success: function (data) {
              alert(data);
            }
          });

        });

      });
	  </script>
