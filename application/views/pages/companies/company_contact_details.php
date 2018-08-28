
<?php $this->load->view('templates/header'); ?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h3>

           Contact Details
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

                            <!-- Main content School Details-->
                            <!--- Schools contacts -->

                            <div class="box">

                                <div class="box-header with-border">
                                    <h3 class="box-title">Contact Details</h3>
                                </div>


                                <!-- /.box-header -->
                                <div class="box-body">
                                    <form role="form"  method="POST">
                                        <!-- text input -->

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <label class=" ">First Name *</label>
                                                    <input type="text" name="first_name" class="form-control" value="<?php echo $table['first_name']; ?>" placeholder="John" >

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <div class="">
                                                        <label >Last Name </label>
                                                        <input type="text" name="last_name" class="form-control" value="<?php echo $table['last_name'] ?>" placeholder="Doe" autocomplete="off" >
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <label >
                                                        Phone
                                                    </label>
                                                    <input type="text" name="phone" class="form-control" value="<?php echo $table['phone']; ?>" placeholder="1234 56789" >

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <label >Email</label>
                                                    <input type="tel" name="email" class="form-control" value="<?php echo $table['email'] ?>" placeholder="John@Doe.com" autocomplete="off" >
                                                </div>


                                            </div>
                                            <!--/span-->
                                        </div>

	                                    <div class="row">
	                                    <div class="col-md-6">
		                                    <div class="form-group">

			                                    <label >Address </label>
			                                    <input type="tel" value="<?php echo $table["address"]?>" name="address" class="form-control"  placeholder="Fake Road" autocomplete="off" >
		                                    </div>


	                                    </div>
	                                    <!--/span-->

		                                    <div class="col-md-6">
			                                    <div class="form-group">

				                                    <label class=" ">
					                                    Postcode
				                                    </label>
				                                    <input type="text" value="<?php echo $table['postcode']?> " name="postcode" class="form-control"  placeholder="WA10 1PP" >

			                                    </div>
		                                    </div>

	                                    </div>


	                                    <div class="row">
		                            <div class="col-md-6">
			                            <div class="form-group">
				                            <label class=" ">
					                            Job Title
				                            </label>


				                            <input type="tel" value="<?php echo $table['job_title']?>" name="job_title" class="form-control"  placeholder="Job Title" autocomplete="off" >


			                            </div>
		                            </div>
											<div class="col-md-6">
												<div class="form-group">

													<label class=" ">
														Primary Contact
													</label>
													<br>
													<input type="checkbox" name="main_contact_id" value="1"  style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

												</div>
											</div>
											<!--/span-->
										</div>


                                </div>
                                <input type="submit" class="btn btn-mploy-submit" value="Save Changes">
                                <input type="button" class="btn btn-mploy-cancel" value="Cancel" onclick="window.location.replace('/companies/view/<?php echo $table['org_id'] ?>/contacts')">
                                </form>
                            </div>


                        </section>



                    </div>








                </div> <!-- end tab content -->



            </div>
        </div>
    </div> <!-- end tab container -->














    <?php $this->load->view('templates/footer'); ?>
