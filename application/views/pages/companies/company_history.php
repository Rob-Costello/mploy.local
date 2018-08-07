
<?php $this->load->view('templates/header'); ?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <?php //$this->load->view('/templates/components/notification') ?>
    </section>

    <div class="container-fluid ">
        <div class=" ">
            <div id="exTab1" class="">
                <?php $this->load->view('pages/companies/nav_tabs'); ?>

                <div class="tab-content clearfix">

                        <section class="content ">
                            <div class="box box-primary">

                                <!-- /.box-header -->
                                <div style="padding-top:20px;" class="col-md-6">
                                    <?php $this->view('pages/companies/components/call_history'); ?>
                                </div>


                                <div style="padding-top:20px;" class="col-md-6">
                                    <?php $this->view('pages/companies/components/placements'); ?>
                                </div>
                            </div>

                        </section>


                    </div>

                    <!-- end tab -->





                </div> <!-- end tab content -->



            </div>
        </div>
    </div> <!-- end tab container -->












    <?php $this->load->view('templates/footer'); ?>


