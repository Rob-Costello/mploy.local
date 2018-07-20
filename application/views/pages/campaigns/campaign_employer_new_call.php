
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
<!--                                            <div class="col-md-4">-->
<!--                                                <div class="form-group">-->

<!--                                                    <label class=" ">Date</label>-->
                                                    <input type="hidden" name="date_time" class="form-control" value="<?php echo $date ?>">

<!--                                                </div>-->
<!--                                            </div>-->
<!--                                            <div class="col-md-4">-->
<!--                                                <div class="form-group">-->
<!---->
<!--                                                    <div class="">-->
<!--                                                        <label >Name</label>-->
<!--                                                        <input type="text"  class="form-control" value="--><?php //echo $user->username; ?><!--" placeholder="02-01-2001" autocomplete="off" >-->
                                                        <input type="hidden" name="user_id" value="<?php echo $user->id; ?>" >
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label >Recipient</label>
                                                    <input type="text" name="receiver" class="form-control" value="" placeholder="Jane Doe" autocomplete="off" required>
                                                </div>
                                            </div>
                                            <!--/span-->
                                           
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label >Origin</label>
                                                    <select name="activity_type_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                                                        <option></option>
                                                        <?php foreach($activity as $a): ?>
                                                           <option value="<?php echo $a->id ?>"> <?php echo $a->description; ?> </option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                            </div>

                                             <div class="col-md-2">
                                                <div class="form-group">
                                                    <label >Status</label>



													<div class="dropdown">
														<button id="dropdown-button" class="btn " style="border: solid 1px ;  border-color: #f7f3f7;" type="button" data-toggle="dropdown">Status
															<span class="caret"></span></button>
														<ul id="rag-dropdown" class="dropdown-menu">
															<li onclick="setValue('4')" class="rag-option" value="4" >
																<img src="<?php echo base_url()."assets/";?>dist/img/4.png" class="img-circle" alt="User Image">
															</li>
															<li style="marign:auto;" onclick="setValue('3')" class="rag-option" value="3" >
																<img  src="<?php echo base_url()."assets/";?>dist/img/3.png" class="img-circle" alt="User Image">
															</li>

															<li onclick="setValue('2')" class="rag-option" value="2" >
																<img src="<?php echo base_url()."assets/";?>dist/img/2.png" class="img-circle" alt="User Image">
															</li>
														</ul>
													</div>
												<input type="hidden" name="rag_status" id="rag_status" required>
												</div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label >Number of Placements</label>
                                                    <input type="number" name="placements" class="form-ctext form-control" value="0" placeholder="Jane Doe" autocomplete="off">
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
                                <input type="hidden" value="<?php echo $dropdown; ?>" name="campaign_id">
                                <input type="hidden" value="<?php echo $comp_id; ?>" name="org_id">
                                <input type="submit" class="btn btn-mploy-submit" value="Save Changes">
                                <input type="button" class="btn btn-mploy-cancel" value="Cancel" onclick="window.location.replace('/campaigns/employerdetails/<?php echo $camp_id ?>/<?php echo $comp_id; ?>?campid=<?php echo $campaign_dropdown ?>')">
                                </form>
                            </div>


                        </section>



                    </div>








                </div> <!-- end tab content -->



            </div>
        </div>
    </div> <!-- end tab container -->














    <?php $this->load->view('templates/footer'); ?>

	<script>
		function setValue(value){

			$('#rag_status').val(value);
			var button = '<img src="<?php echo base_url().'assets/';?>dist/img/'+value+'.png">  <span class="caret"></span>';
			$('#dropdown-button').html(button);


		}
	</script>
