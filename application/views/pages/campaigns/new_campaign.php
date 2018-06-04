
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
                                        

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">

                                                    <label class=" ">Campaign Name</label>
                                                    <input type="text" name="campaign_name" class="form-control" value="" placeholder="Campaign Name" >

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">

                                                    <div class="">
                                                        <label >Students to Place</label>
                                                        <input type="number" name="students_to_place" class="form-control" value="" placeholder="999" autocomplete="off" >
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="">
                                                        <label >Self Placing Students </label>
                                                        <input type="number" name="last_name" class="form-control" value="" placeholder="Doe" autocomplete="off" >
                                                    </div>
                                                </div>
                                            </div><!--end col-->
                                        </div> <!--end row-->


                                        <div class="row">
                                           
                                            <div class="col-md-4">
                                                <div class="form-group">

                                                    <label class=" ">School</label>
                                                    <input type="text" name="campaign_name" class="form-control" value="" placeholder="Campaign Name" >

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">

                                                    <div class="">
                                                        <label >Placement Start Date</label>
                                                        <input type="number" name="students_to_place" class="form-control" value="" placeholder="999" autocomplete="off" >
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="">
                                                        <label >Placement End Date </label>
                                                        <input type="number" name="last_name" class="form-control" value="" placeholder="Doe" autocomplete="off" >
                                                    </div>
                                                </div>
                                            </div><!--end col-->
                                        
                                        </div> <!--end row-->
                                        
                                        
                                        <div class="row">

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="">
                                                        <label >Placement End Date </label>
                                                        <input type="number" name="last_name" class="form-control" value="" placeholder="Doe" autocomplete="off" >
                                                    </div>
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-md-8"> 
                                                <h4>School Holidays</h4>
                                                <div id="holidaysContainer">
                                                <table  id="holidays" class="table table-bordered table-striped">
					                            <thead>
					                            <tr>                                               
                                                    <th>Dates</th>
                                                    <th>Holiday</th>
                                                    <th></th>
					                            </tr>
					                            </thead>
					                            <tbody>                                               
					                            <tr>
                                                    <td>
                                                    <input name="date[]" type="text" class="form-control">
                                                    </td>
                                                    <td>
                                                    <input name="holiday[]" type="text" class="form-control">
                                                    </td>
                                                    <td>
                                                    <button type="button" class="white-btn btn ">Edit</button>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td><button type="button" id="add-row" class="btn btn-mploy white-btn">Add Holiday </button> </td>
                                                </tr>
                                                
                                                </tbody>
                                                </table>
                                            </div>
                                            </div><!--end col-->

                                        
                                        
                                        </div> <!--end row -->
                                        
                                        
                                        


                                </div>
                                <div class="row">
                                <div class="col-md-4">
                                <input type="submit" class="btn btn-mploy-submit" value="Save Changes">
                                <input type="button" class="btn btn-mploy-cancel" value="Cancel" onclick="window.location.replace('/companies/campaigns ?>/contacts')">
                                </div>
                                </div>
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
    $('#add-row').click(function(){
        var table = $('#holidays');
        var date ='<td><input type="text" name="date[]" value="" class="form-control"></td>';
        var holiday ='<td><input type="text" name="holiday[]" value="" class="form-control"></td>';
        var button = '<td><button type="button" class="white-btn btn ">Edit</button><td>';    
            var row = $('<tr>').html(date + holiday + button);
            table.find('tr:last').prev().after(row);
    });
</script>

<script>
    
    $(".white-btn.btn").click(function() {
    
    //var $item = $(this).closest("tr").find(".form-control");    // Gets a descendent with class="nr"                   
    var $item = $(this).closest("tr")   // Finds the closest row <tr> 
                       .find(".form-control")     // Gets a descendent with class="nr"
                       .toggleClass('test');        
    
    
   
    
    });

</script>



