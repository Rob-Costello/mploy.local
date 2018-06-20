
<?php $this->load->view('templates/header'); ?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <?php //$this->load->view('/templates/components/notification') ?>
    </section>

    <div class="container-fluid ">
        <div class=" ">
            <div id="exTab1" class="">

				<?php $this->load->view('/pages/schools/school_components/school_tabs') ?>

                <div class="tab-content clearfix">


					<div class="" >

                        <section class="content">
                            <div class=" box-primary">
								<div  class="addButton col-md-offset-9 col-md-3">

									<button class="  btn btn-mploy-submit waves-effect waves-light" style="float:right" onclick="window.location.replace('/schools/newplacement/<?php echo $id ?>')"><i class="fa fa-plus"></i>
									<span class="buttonText">New Placement</span></button>
								</div>


                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table id="example2" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <?php foreach($table_header as $heading):?>
                                                <th><?php echo $heading; ?> </th>
                                            <?php endforeach;?>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($data as $school): ?>

                                            <tr>

                                                <?php foreach($fields as $contact): ?>

                                                    <td><?php if(isset($school[$contact])) echo $school[$contact]; ?></td>

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


