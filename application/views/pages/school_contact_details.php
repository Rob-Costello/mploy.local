
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





                <div class="tab-content clearfix">


                    <div class="tab-pane active" id="1a">


                        <section class="">

                            <!-- Main content School Details-->
                            <!--- Schools contacts -->

                            <div class="box">

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

                                                    <label class=" ">School Name *</label>
                                                    <input type="text" name="name" class="form-control" value="<?php echo $table['name']; ?>" placeholder="Name" >

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <div class="">
                                                        <label >Position</label>
                                                        <input type="text" name="position" class="form-control" value="<?php echo $table['position'] ?>" placeholder="Position" autocomplete="off" >
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <label class=" ">
                                                        Phone
                                                    </label>
                                                    <input type="text" name="phone" class="form-control" value="<?php echo $table['phone']; ?>" placeholder="Doe" >

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <label >Email</label>
                                                    <input type="tel" name="email" class="form-control" value="<?php echo $table['email'] ?>" placeholder="0123 456789" autocomplete="off" >
                                                </div>


                                            </div>
                                            <!--/span-->
                                        </div>


                                </div>
                                <input type="submit" class="btn btn-success" value="Save Changes">
                                <input type="button" class="btn btn-danger" value="Cancel" onclick="window.location.replace('/schools/contacts')">
                                </form>
                            </div>


                        </section>



                    </div>








                </div> <!-- end tab content -->



            </div>
        </div>
    </div> <!-- end tab container -->














    <?php $this->load->view('templates/footer'); ?>
