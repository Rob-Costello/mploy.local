
<?php $this->load->view('templates/header'); ?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h3>

            Company Details
        </h3>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Company Details</li>
        </ol>
    </section>

    <div class="container-fluid ">
        <div class=" ">
            <div id="exTab1" class="">
                <?php $this->load->view('pages/companies/nav_tabs'); ?>

                <div class="tab-content clearfix">


                    <div class="tab-pane active" id="1a">


                        <section class="">

                            <!-- Main content School Details-->
                            <!--- Schools contacts -->

                            <div class="box">

                                <div class="box-header with-border">
                                    <h3 class="box-title">Company Information</h3>
                                </div>

                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div role="form"  method="POST">
                                        <!-- text input -->

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <label class=" ">Company Name *</label>
                                                    <input type="text" name="name" class="form-control" value="<?php echo $table['name']; ?>" placeholder="School Name" >

                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <label class=" ">
                                                        Address 1
                                                    </label>
                                                    <input type="text" name="address1" class="form-control" value="<?php echo $table['address1']; ?>" placeholder="Doe" >

                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <label >Address 2</label>
                                                    <input type="tel" name="address2" class="form-control" value="<?php echo $table['address2'] ?>" placeholder="0123 456789" autocomplete="off" >
                                                </div>


                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <label class=" ">
                                                        Town
                                                    </label>
                                                    <input type="text" name="town" class="form-control" value="<?php echo $table['town']; ?>" placeholder="Doe" >

                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class=" ">
                                                        County
                                                    </label>


                                                    <input type="tel" name="county" class="form-control" value="<?php echo $table['county'] ?>" placeholder="0123 456789" autocomplete="off" >


                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <label class=" ">
                                                        Postcode
                                                    </label>
                                                    <input type="text" name="postcode" class="form-control" value="<?php echo $table['postcode']; ?>" placeholder="Doe" >

                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
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

                                        <div class="box-header with-border">
                                            <h3 class="box-title">General Information</h3>
                                        </div>
                                    <div class="box-body">


                                        <div class="row">

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class=" ">
                                                        Industry
                                                    </label>

                                                    <select name="industry" class="form-control">
                                                        <option>Industry</option>
                                                    </select>


                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <label class=" ">
                                                        Postcode
                                                    </label>
                                                    <input type="text" name="postcode" class="form-control" value="<?php echo $table['postcode']; ?>" placeholder="Doe" >

                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class=" ">
                                                        Show In Search
                                                    </label>

                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox"> Yes
                                                        </label>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class=" ">
                                                        Number of Employees
                                                    </label>

                                                    <select name="industry" class="form-control">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                    </select>


                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <label class=" ">
                                                        Company ERN
                                                    </label>
                                                    <input type="text" name="postcode" class="form-control" value="<?php echo $table['postcode']; ?>" placeholder="Doe" >

                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class=" ">
                                                        Status
                                                    </label>

                                                    <select name="industry" class="form-control">
                                                        <option>Active</option>
                                                    </select>


                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">

                                                    <label class=" ">
                                                        Website
                                                    </label>
                                                    <input type="text" name="line_of_business" class="form-control" value="<?php echo $table['postcode']; ?>" placeholder="Doe" >

                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <label class=" ">
                                                        Line of Business
                                                    </label>
                                                    <input type="text" name="line_of_business" class="form-control" value="<?php echo $table['postcode']; ?>" placeholder="Doe" >

                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">

                                                    <label for="exampleInputFile">File input</label>
                                                    <input type="file" id="exampleInputFile">

                                                </div>
                                            </div>
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
