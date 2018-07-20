
<?php $this->load->view('templates/campaign_header'); ?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h3>&nbsp;</h3>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">School Details</li>
        </ol>
        <?php //$this->load->view('/templates/components/notification') ?>
    </section>

    <div class="container-fluid ">


            <div class="col-md-4" style="margin-bottom: 20px;">
                <?php if($prev !== null) { ?><a class="btn btn-mploy-cancel" href="/campaigns/employerdetails/<?php echo $camp_id ?>/<?php echo $prev;?>?campid=<?php echo $campaign ?>">PREV</a><?php } ?>
            </div>

            <div class="col-md-4" style="margin-bottom: 20px;">
                <a class="btn btn-mploy-cancel center-block" href="/campaigns/employers/<?php echo $campaign ?>/0">BACK TO CAMPAIGN</a>
            </div>

            <div class="col-md-4" style="margin-bottom: 20px;">
                <?php if($next !== null) { ?><a class="btn btn-mploy-submit pull-right" href="/campaigns/employerdetails/<?php echo $camp_id ?>/<?php echo $next;?>?campid=<?php echo $campaign ?>">NEXT</a><?php } ?>
            </div>
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
                                    <form role="form" action="?campid=<?php echo $campaign ?>" method="POST">
                                        
                                    
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
                                    <input name="update_company" value="Save" type="submit" class="btn btn-mploy-submit">
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
                                        
                                    <table id="example2" class="table table-bordered table-hover">
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
                                                    <td><a href="mailto:<?php echo $school->email ?>"><?php echo $school->email ?></a></td>
                                                </tr>
                                            <?php endforeach ?>
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
        <?php $this->view('pages/companies/components/call_history'); ?>
    </div>


    <div style="padding-top:20px;" class="col-md-6">
        <?php $this->view('pages/companies/components/placements'); ?>
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
