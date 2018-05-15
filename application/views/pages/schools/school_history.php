
<?php $this->load->view('templates/header'); ?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h3>

            Call History
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
                    <li ><a  href="/schools/view/<?php echo $id; ?>" >School Information</a>
                    </li>
                    <li ><a href="/schools/contacts" >School Contacts</a>
                    </li>
                    <li class="active"><a  href="/schools/history" >History</a>
                    </li>
                    <li><a href="/schools/placements" >Placements</a>
                    </li>
                </ul>

                <div class="tab-content clearfix">




                        <section class="content">
							<div  class="addButton col-md-offset-9 col-md-3">
								<button class="  btn btn-info waves-effect waves-light" style="float:right;"  onclick="window.location.replace('/schools/call')"><i class="fa fa-plus"></i>
									<span class="buttonText">New Call</span></button>


							</div>

							<div class="box-primary">



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
                                        <?php foreach($contacts['data'] as $school): ?>
                                            <tr>

                                                <?php foreach($fields as $contact): ?>

                                                    <td><?php echo $school->$contact; ?></td>

                                                <?php endforeach ?>


                                            </tr>
                                        <?php endforeach ?>
                                        </tbody>

                                    </table>

                                </div>
                            </div>
                            <div class="box-footer clearfix">
                                <div class="dataTables_info" id="example23_info" role="status" aria-live="polite">
                                    Showing <?php echo $pagination_start; ?> to <?php echo $pagination_end; ?> of <?php $contacts['count']; ?> entries</div>
                                <div class="dataTables_paginate paging_simple_numbers">
                                    <?php echo $pagination; ?>
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


