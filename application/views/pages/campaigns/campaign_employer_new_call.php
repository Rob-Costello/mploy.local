
<?php $this->load->view('templates/campaign_header'); ?>


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
                                            <div class="col-md-4">
                                                <div class="form-group">

                                                    <label class=" ">Date</label>
                                                    <input type="text" name="date_time" class="form-control" value="<?php echo $date ?>" placeholder="01-01-2001" >

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">

                                                    <div class="">
                                                        <label >Name</label>
                                                        <input type="text"  class="form-control" value="<?php echo $user->username; ?>" placeholder="02-01-2001" autocomplete="off" >
                                                        <input type="hidden" name="user_id" value="<?php echo $user->id; ?>" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label >Recipient</label>
                                                    <input type="text" name="receiver" class="form-control" value="" placeholder="Jane Doe" autocomplete="off" >
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>

                                        <div class="row">
                                           
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label >Origin</label>
                                                    <select name="campaign_activity_type_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                        <?php foreach($activity as $a): ?>
                                                           <option value="<?php echo $a->campaign_type_id ?>"> <?php echo $a->description; ?> </option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                            </div>

                                             <div class="col-md-4">
                                                <div class="form-group">
                                                    <label >Status</label>
                                                    <select name="rag_status" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                        <option value="red">Red</option>
                                                        <option value="amber">Amber</option>
                                                        <option value="green">Green</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>

                                        <div class="row">
                                            
                                            <div class="col-md-12">
                                                <div class="form-group">

                                                    <label >Call Notes</label>
                                                    <textarea style="width:100%" class="form-control" type="textarea" name="notes" class="form-control" value="" placeholder="Add a note here.." autocomplete="off" ></textarea>
                                                </div>

												
                                            </div>
                                            <!--/span-->
                                        </div>

                                </div>
                                <input type="hidden" value="<?php echo $camp_id; ?>" name="campaign_ref">
                                <input type="hidden" value="<?php echo $comp_id; ?>" name="org_id">
                                <input type="submit" class="btn btn-mploy-submit" value="Save Changes">
                                <input type="button" class="btn btn-mploy-cancel" value="Cancel" onclick="window.location.replace('/campaigns/employerdetails/<?php echo $camp_id ?>/<?php echo $comp_id; ?>')">
                                </form>
                            </div>


                        </section>



                    </div>








                </div> <!-- end tab content -->



            </div>
        </div>
    </div> <!-- end tab container -->














    <?php $this->load->view('templates/footer'); ?>