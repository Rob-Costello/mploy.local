
<?php $this->load->view('templates/campaign_header'); ?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h3>

          
        </h3>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">School Details</li>
        </ol>
        <?php //$this->load->view('/templates/components/notification') ?>
    </section>

    <div class="container-fluid ">
        <div class="col-md-7">
        <div class=" ">
            <div id="exTab1" class="">


                <div class="tab-content clearfix">


                    <div class="tab-pane active" id="1a">


                        <section class="">


                            <!-- Main content School Details-->
                            <!--- Schools contacts -->

                            <div class="box">

                                <div class="box-header with-border">
                                    <h3 class="box-title">Company Details</h3>
                                </div>
                                <div style="z-index:100" class="col-md-12">
                                    <?php if( $company_message != '' ) { ?>
                                        <div class="alert alert-success alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <?php echo $company_message; ?>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div style="opacity:0;"  id="message">
                                    <?php echo $call_message; ?>

                                </div>

                                <!-- /.box-header -->
                                <div class="box-body">
                                    <form role="form"  method="POST">
                                        
                                    
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <label class=" ">Name</label>
                                                    <input type="text" name="name" class="form-control" value="<?php echo $employer->name ?>" placeholder="Campaign Name" >

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <div class="">
                                                        <label >Address</label>
                                                        <input type="text" name="address1" class="form-control" value="<?php echo $employer->address1 ?>" placeholder="" autocomplete="off" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <label class=" ">Address2</label>
                                                    <input type="text" name="address2" class="form-control" value="<?php echo $employer->address2 ?>" placeholder="Campaign Name" >

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <div class="">
                                                        <label >Postcode</label>
                                                        <input type="text" name="postcode" class="form-control" value="<?php echo $employer->postcode ?>" placeholder="WA10 1PP" autocomplete="off" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <label class=" ">Category</label>
                                                    <input type="text" name="line_of_business" class="form-control" value="<?php echo $employer->line_of_business ?>" placeholder="Campaign Name" >

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <div class="">
                                                        <label >Status</label>
                                                        <input type="text" name="status" class="form-control" value="<?php echo $employer->status ?>" placeholder="999" autocomplete="off" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                
                                <div class="row">
                                    <div class="col-md-12">
                                    <input name="update_company" value="submit" type="submit" class="btn btn-mploy-submit" value="Save Changes">
                                    <input type="button" class="btn btn-mploy-cancel" value="Cancel" onclick="window.location.replace('/campaigns')">
                                    </div>
                                </div>

                                </form>
                            </div>


                        </section>



                    </div>

                </div> <!-- end tab content -->



            </div>
        </div>
    </div>

    <div class="col-md-5">
        <div class=" ">
            <div id="exTab1" class="">


                <div class="tab-content clearfix">


                    <div class="tab-pane active" id="1a">


                        <section class="">

                            <!-- Main content School Details-->
                            <!--- Schools contacts -->

                            <div class="box">

                                <div class="box-header with-border">
                                    <h3 class="box-title">Contacts </h3>
                                </div>


                                <!-- /.box-header -->
                                <div class="box-body">
                                    <form role="form"  method="POST">
                                        
                                    <table id="example2" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <?php foreach($contacts_table as $heading):?>
                                                <th><?php echo $heading; ?> </th>
                                            <?php endforeach;?>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        
                                        <?php foreach($company as $school): ?>
                                            <tr>

                                               

                                                    <td><?php echo $school->first_name .' ' .$school->last_name; ?></td>
                                                    <td><?php echo $school->job_title ?></td>
                                                    <td><?php echo $school->phone ?></td>
                                                    <td><?php echo $school->email ?></td>
                                              

                                            
                                        <?php endforeach ?>

                                            </tr>
                                        </tbody>

                                    </table>

                                       
                                            
                                       

                                       
                
                              
                                <input type="hidden" name="active" value="1">
                                </form>
                            </div>


                        </section>



                    </div>

                </div> <!-- end tab content -->



            </div>
        </div>
    </div>
    
    
    <div style="padding-top:20px;" class="col-md-6">
        <div class=" ">
            <div id="exTab1" class="">

                <div class="tab-content clearfix">

                    <div class="tab-pane active" id="1a">

                        <section class="">
                            <!-- Main content School Details-->
                            <!--- Schools contacts -->

                            <div class="box">

                                <div class="box-header with-border">
                                    <h3 class="box-title">Call History </h3>
                                </div>

                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div style="z-index:100" class="col-md-12">
                                        <?php if( $call_message != '' ) { ?>
                                            <div class="alert alert-success alert-dismissable">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <?php echo $call_message; ?>
                                            </div>
                                        <?php } ?>
                                    </div>

                                    <div style="opacity:0;"  id="message">
                                        <?php echo $call_message; ?>

                                    </div>
                                <div  style="padding-bottom:20px;" class="col-md-offset-8 col-md-3">
                                    <input type="submit" class="btn btn-mploy-submit" value="New Call" onclick="window.location.replace('/campaigns/newcall/<?php echo $camp_id ?>/<?php echo $comp_id ?>')">
                                </div> 
                                   
                                        
                                    <table id="example2" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <?php foreach($call_table as $heading):?>
                                                <th><?php echo $heading; ?> </th>
                                            <?php endforeach;?>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        
                                        <?php foreach($calls as $call): ?>
                                            <tr>
                                                    <td><?php echo $call->first_name . ' ' . $call->last_name; ?></td>
                                                    <td><?php echo $call->description ?></td>
                                                    <td><?php echo $call->receiver ?></td>
                                                    <td><?php echo $call->notes ?></td>
                                                    <td><?php echo date("d/m/Y H:i", strtotime($call->date_time)); ?></td>
                                                    <td>
														<img src="<?php echo base_url()."assets/";?>dist/img/<?php echo $call->rag_status ?>.png" class="img-circle" alt="Status">
														</td>
                                              

                                            
                                        <?php endforeach ?>

                                            </tr>
                                        </tbody>

                                    </table>

                            </div>


                        </section>



                    </div>

                </div> <!-- end tab content -->



            </div>
        </div>
    </div>


	    <div style="padding-top:20px;" class="col-md-6">
		    <div class=" ">
			    <div id="exTab1" class="">

				    <div class="tab-content clearfix">

					    <div class="tab-pane active" id="1a">

						    <section class="">
							    <!-- Main content School Details-->
							    <!--- Schools contacts -->

							    <div class="box">

								    <div class="box-header with-border">
									    <h3 class="box-title">Placements </h3>
								    </div>

								    <!-- /.box-header -->
								    <div class="box-body">
									    <div style="z-index:100" class="col-md-12">
										    <?php if( $student_message != '' ) { ?>
											    <div class="alert alert-success alert-dismissable">
												    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
												    <?php echo $student_message; ?>
											    </div>
										    <?php } ?>
									    </div>

									    <div style="opacity:0;"  id="message">
										    <?php echo $student_message; ?>

									    </div>
									    <div  style="padding-bottom:20px;" class="col-md-offset-8 col-md-3">
										    <input type="submit" class="btn btn-mploy-submit" value="New Call" onclick="window.location.replace('/campaigns/newplacement/<?php echo $camp_id ?>/<?php echo $comp_id ?>')">
									    </div>



									    <table id="example2" class="table table-bordered table-striped">
										    <thead>
										    <tr>
											  <th>
												  Receiver
											  </th>
											    <th>
												    Start Date
											    </th>
											    <th>
												    Agreed Placements
											    </th>
											    <th>
												    Notes
											    </th>
											    <th>
												    Student Name
											    </th>

										    </tr>
										    </thead>
										    <tbody>

										    <?php foreach($placements as $call): ?>
										    <tr>
											    <td><?php echo $call->receiver?></td>
											    <td><?php echo $call->date_time ?></td>
											    <td><?php echo $call->placements ?></td>
											    <td><?php echo $call->notes ?></td>
											    <td>Student TBC</td>




											    <?php endforeach ?>

										    </tr>
										    </tbody>

									    </table>


								    </div>


						    </section>



					    </div>

				    </div> <!-- end tab content -->



			    </div>
		    </div>
	    </div>



    </div> <!-- end tab container -->

    <?php $this->load->view('templates/footer'); ?>
    
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>


<script>
   $('#add-row').click(function(){
        var rows = $('#holidays tbody tr').length;
        var table = $('#holidays');
        var start_date ='<td><input id ="'+rows+'start_date" type="text" name="start_date[]" value="" class="datepicker form-control"></td>';
        var end_date ='<td><input id ="'+rows+'end_date" type="text" name="end_date[]" value="" class="datepicker form-control"></td>';
        var holiday ='<td><input id ="'+rows+'holiday" type="text" name="holiday[]" value="" class="form-control"></td>';
        var button = '<td><button onclick="editRow('+rows+')" id ="'+rows+'" type="button" class="white-btn btn ">Edit</button><td>';    
            var row = $('<tr>').html(start_date + end_date + holiday + button);
            table.find('tr:last').prev().after(row);
           
            $(function() {$('.datepicker').daterangepicker({opens: 'left',singleDatePicker: true,});});
    });

    function editRow(id){        
        var date = $('#'+id+'date');
        var holiday = $('#'+id+'holiday');
        if (date.attr('disabled')) {
            date.removeAttr('disabled');
            holiday.removeAttr('disabled');
        } else {
            date.attr('disabled', 'disabled');
            holiday.attr('disabled', 'disabled');
        }
    }


//date range
$(function() {
  $('input[name="daterange"]').daterangepicker({
    opens: 'left'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
  });
});

$(function() {$('.datepicker').daterangepicker({opens: 'left',singleDatePicker: true,});});





</script>



<script>
    $(function(){
        
        
        
        
        $( "#school" ).autocomplete({source: "http://mploy.local/schools/getSchools/?"});
    })
</script>
