
<?php $this->load->view('templates/campaign_header'); ?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">


    </section>

    <div class="container-fluid ">
        <div class=" ">
            <div id="exTab1" class="">
                <?php $this->load->view('pages/companies/nav_tabs'); ?>

                <div class="tab-content clearfix">


                    <div class="tab-pane active" id="1a">


                        <section class="">
                            <form method="POST">

                            <!-- Main content School Details-->
                            <!--- Schools contacts -->

                            <div class="box">

                                <div class="box-header with-border">
                                    <h3 class="box-title">Company Information</h3>
                                </div>

                                <!-- /.box-header -->
                                <div class="box-body">
                                        <!-- text input -->

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <label class=" ">Company Name *</label>
                                                    <input type="text" name="name" class="form-control" value="<?php echo $company['name']; ?>" placeholder="School Name" >

                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <label class=" ">
                                                        Address 1
                                                    </label>
                                                    <input type="text" name="address1" class="form-control" value="<?php echo $company['address1']; ?>" placeholder="123 fake street" >

                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <label >Address 2</label>
                                                    <input type="tel" name="address2" class="form-control" value="<?php echo $company['address2'] ?>" placeholder="Fake area" autocomplete="off" >
                                                </div>


                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <label class=" ">
                                                        Town
                                                    </label>
                                                    <input type="text" name="town" class="form-control" value="<?php echo $company['town']; ?>" placeholder="Fake town" >

                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class=" ">
                                                        County
                                                    </label>


                                                    <input type="tel" name="county" class="form-control" value="<?php echo $company['county'] ?>" placeholder="Merseyside" autocomplete="off" >


                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <label class=" ">
                                                        Postcode
                                                    </label>
                                                    <input type="text" name="postcode" class="form-control" value="<?php echo $company['postcode']; ?>" placeholder="WA10 1PP" >

                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class=" ">
                                                        Phone Number
                                                    </label>


                                                    <input type="tel" name="phone_number" class="form-control" value="<?php echo $company['phone_number'] ?>" placeholder="0123 456789" autocomplete="off" >


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

                                                    <select name="line_of_business" class="form-control">
														<?php foreach ($industry as $ind): ?>
														<option <?php if($ind['line_of_business'] == $company['line_of_business']) echo ' selected '; ?>value="<?php echo $ind['line_of_business']; ?>"><?php echo $ind['line_of_business']; ?></option>
														<?php endforeach; ?>

                                                    </select>


                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <label class=" ">
                                                        Postcode
                                                    </label>
                                                    <input type="text" name="postcode" class="form-control" value="<?php echo $company['postcode']; ?>" placeholder="Doe" >

                                                </div>
                                            </div>


                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class=" ">
                                                        Number of Employees
                                                    </label>

                                                    <select name="no_of_employees" class="form-control">
                                                        <option<?php if ($company['no_of_employees'] =='1-4' ) echo ' selected' ?> value="1-4">1-4</option>
                                                        <option <?php if ($company['no_of_employees'] == "5-19") echo ' selected' ?> value="5-19">5-19</option>
														<option <?php if ($company['no_of_employees'] == "20-49") echo ' selected' ?> value="20-49">20-49</option>
														<option <?php if ($company['no_of_employees'] == "50-199") echo ' selected' ?> value="50-199">50-199</option>
														<option <?php if ($company['no_of_employees'] == "200+") echo ' selected' ?> value="200+">200+</option>
                                                    </select>


                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <label class=" ">
                                                        Company ERN
                                                    </label>
                                                    <input type="text" name="comp_ern" class="form-control" value="<?php echo $company['comp_ern']; ?>" placeholder="Doe" >

                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">

                                                    <label for="exampleInputFile">File input</label>
                                                    <input type="file" id="exampleInputFile">

                                                </div>
                                            </div>


                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">

                                                    <label class=" ">
                                                        Website
                                                    </label>
                                                    <input type="text" name="website" class="form-control" value="<?php echo $company['website']; ?>" placeholder="google.com" >

                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <label class=" ">
                                                        Line of Business
                                                    </label>
                                                    <input type="text" name="line_of_business" class="form-control" value="<?php echo $company['line_of_business']; ?>" placeholder="Support" >

                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">

                                                    <label class=" ">
                                                       Opt-out
                                                    </label><br />
                                                    <input type="hidden" name="optout" value="0">
                                                    <input type="checkbox" name="optout" value="1" <?php if( $company['optout'] == 1 ) echo 'checked'; ?>>

                                                </div>
                                            </div>


                                        </div>



                                </div>
                                <input type="submit" class="btn btn-mploy-submit" value="Save Changes">
                                <input type="button" class="btn btn-mploy-cancel" value="Cancel">

                            </div>
                            </form>

                        </section>



                    </div>








                </div> <!-- end tab content -->



            </div>
        </div>
    </div> <!-- end tab container -->














    <?php $this->load->view('templates/footer'); ?>
