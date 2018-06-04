
<?php $this->load->view('templates/header'); ?>


<div class="content-wrapper">



	<!-- Content Header (Page header) -->
    <section class="content-header">




			<?php //$this->load->view('/templates/components/notification') ?>
    </section>

    <div class="container-fluid ">
		<div class="col-md-12">
			<?php if( $messages != '' ) { ?>
				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<?php echo $messages; ?>
				</div>
			<?php } ?>
		</div>

        <div class=" ">
            <div id="exTab1" class="">




                <div class="tab-content clearfix">


                    <div class="tab-pane active" id="1a">


                        <section class="">

							<!-- Main content School Details-->
                            <!--- Schools contacts -->

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

                                                    <label class=" ">Date</label>
                                                    <input type="text" name="date" class="form-control" value="" placeholder="01-01-2001" >

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <div class="">
                                                        <label >Caller</label>
                                                        <input type="text" name="time" class="form-control" value="" placeholder="02-01-2001" autocomplete="off" >
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">

                                                     <div class="">
                                                        <label >Caller</label>
                                                        <input type="text" name="time" class="form-control" value="" placeholder="John Doe" autocomplete="off" >
                                                    </div>



                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <label >Receiver</label>
                                                    <input type="text" name="receiver" class="form-control" value="" placeholder="Jane Doe" autocomplete="off" >
                                                </div>


                                            </div>
                                            <!--/span-->
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">

                                                    <label >Origin</label>
                                                    <select name="origin" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                        <option value="In">In</option>
                                                        <option value="In">Out</option>
                                                    </select>


                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-group">

                                                    <label >Call Notes</label>
                                                    <textarea style="width:100%" class="form-control" type="textarea" name="call_notes" class="form-control" value="" placeholder="Add a note here.." autocomplete="off" ></textarea>
                                                </div>

												<input type="hidden" value="<?php echo $id; ?>" name="school_id">
                                            </div>
                                            <!--/span-->
                                        </div>

                                </div>
                                <input type="submit" class="btn btn-mploy-submit" value="Save Changes">
                                <input type="button" class="btn btn-mploy-cancel" value="Cancel" onclick="window.location.replace('/schools/view/<?php echo $id ?>/history')">
                                </form>
                            </div>


                        </section>



                    </div>








                </div> <!-- end tab content -->



            </div>
        </div>
    </div> <!-- end tab container -->














    <?php $this->load->view('templates/footer'); ?>
