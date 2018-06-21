
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
                                <div class="box-body col-md-6">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Placement History</h3>
                                    </div>
                                    <table id="example2" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <?php foreach($table_header as $heading):?>
                                                <th><?php echo $heading; ?> </th>
                                            <?php endforeach;?>

                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php foreach($placements as $history): ?>
                                            <tr>

                                               <td><?php echo $history->first_name . ' ' . $history->last_name ?></td>
	                                            <td><?php echo $history->placement_start_date ?></td>
	                                            <td><?php echo $history->job_title ?></td>
	                                            <td><?php echo $history->school_name ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                        </tbody>

                                    </table>

                                </div>

                                <div class="box-body col-md-6">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Call History</h3>
                                    </div>
                                    <table id="example2" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <?php foreach($calls_header as $heading):?>
                                                <th><?php echo $heading; ?> </th>
                                            <?php endforeach;?>

                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php foreach($calls as $history): ?>
                                            <tr>



                                                    <td><?php $history->campaign_activity_type_id; ?></td>
	                                            <td><?php $history->notes; ?></td>
	                                            <td><?php $history->date_time; ?></td>
	                                            <td><?php $history->rag_status; ?></td>




                                            </tr>
                                        <?php endforeach ?>
                                        </tbody>

                                    </table>

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


