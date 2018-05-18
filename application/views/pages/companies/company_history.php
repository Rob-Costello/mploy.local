
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
                                        <h3 class="box-title">Call History</h3>
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
                                        <?php foreach($contacts['data'] as $history): ?>
                                            <tr>

                                                <?php foreach($fields as $contact): ?>

                                                    <td><?php echo $history->$contact; ?></td>

                                                <?php endforeach ?>

                                            </tr>
                                        <?php endforeach ?>
                                        </tbody>

                                    </table>

                                </div>

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
                                        <?php foreach($contacts['data'] as $history): ?>
                                            <tr>

                                                <?php foreach($fields as $contact): ?>

                                                    <td><?php echo $history->$contact; ?></td>

                                                <?php endforeach ?>

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


