
<?php $this->load->view('templates/header'); ?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h3>

            School Details
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
                <ul  class="nav nav-pills nav-background">
                    <li class="active"><a  href="/schools/view/<?php echo $id ;?>" >School Information</a>
                    </li>
                    <li><a href="/schools/contacts/" >School Contacts</a>
                    </li>
                    <li><a href="/schools/history" >History</a>
                    </li>
                    <li><a href="/schools/placements" >Placements</a>
                    </li>
                </ul>




                <div class="tab-content clearfix">


                    <div class="tab-pane active" id="1a">


                        <section class="">

                            <!-- Main content School Details-->
                            <!--- Schools contacts -->

                            <div class="">



                                <!-- /.box-header -->
                                <div class="box-body">
                                    <form role="form"  method="POST">
                                        <!-- text input -->

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <label class=" ">School Name *</label>
                                                    <input type="text" name="name" class="form-control" value="<?php echo $table['name']; ?>" placeholder="School Name" >

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <div class="">
                                                        <label >Type of Institution</label>
                                                        <input type="tel" name="type" class="form-control" value="<?php echo $table['type'] ?>" placeholder="0123 456789" autocomplete="off" >
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <label class=" ">
                                                        Address 1
                                                    </label>
                                                    <input type="text" name="address1" class="form-control" value="<?php echo $table['address1']; ?>" placeholder="Doe" >

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <label >Address 2</label>
                                                    <input type="tel" name="address2" class="form-control" value="<?php echo $table['address2'] ?>" placeholder="0123 456789" autocomplete="off" >
                                                </div>


                                            </div>
                                            <!--/span-->
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <label class=" ">
                                                        Town
                                                    </label>
                                                    <input type="text" name="town" class="form-control" value="<?php echo $table['town']; ?>" placeholder="Doe" >

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class=" ">
                                                        County
                                                    </label>


                                                    <input type="tel" name="county" class="form-control" value="<?php echo $table['county'] ?>" placeholder="0123 456789" autocomplete="off" >


                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>



                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <label class=" ">
                                                        Postcode
                                                    </label>
                                                    <input type="text" name="postcode" class="form-control" value="<?php echo $table['postcode']; ?>" placeholder="Doe" >

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class=" ">
                                                        Phone Number
                                                    </label>


                                                    <input type="tel" name="phone_number" class="form-control" value="<?php echo $table['phone_number'] ?>" placeholder="0123 456789" autocomplete="off" >


                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>







                                </div>
                                <input type="submit" class="btn btn-success" value="Save Changes">
                                <input type="button" class="btn btn-danger" value="Cancel">
                                </form>
                            </div>


                        </section>



                    </div>








                </div> <!-- end tab content -->



            </div>
        </div>
    </div> <!-- end tab container -->














    <?php $this->load->view('templates/footer'); ?>
