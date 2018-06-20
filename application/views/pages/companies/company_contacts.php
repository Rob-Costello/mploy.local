
<?php $this->load->view('templates/header'); ?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <?php //$this->load->view('/templates/components/notification') ?>
    </section>

    <div class="container-fluid ">
        <div class=" ">
            <div id="exTab1" class="">
                <?php $this->load->view('pages/companies/nav_tabs', array('page' => $page)); ?>

                <div class="tab-content clearfix">
                    <div class="" >


                        <section class="content">
                            <div class="box box-primary">
	                            <div style="z-index:100" class="col-md-12">
		                            <?php if( $message != '' ) { ?>
			                            <div class="alert alert-success alert-dismissable">
				                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				                            <?php echo $message; ?>
			                            </div>
		                            <?php } ?>
	                            </div>
	                            <div style="opacity:0;"  id="message">
		                            <?php echo $message; ?>

	                            </div>



	                            <div  class="addButton col-md-offset-9 col-md-3">

		                            <button class="  btn btn-mploy-submit waves-effect waves-light" style="float:right" onclick="window.location.replace('/companies/addcontact/<?php echo $id; ?>')"><i class="fa fa-plus"></i>
			                            <span class="buttonText">Add Contact</span></button>
	                            </div>



                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table id="example2" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>

											<?php for($i=0; $i< count($table_header); $i++ ):?>
                                                <th>
													<form method="get">
														<input type="hidden" name="orderby" value="<?php echo $fields[$i] ?>">
														<button class="no-button"><?php echo $table_header[$i]; ?> <i class=" fa fa-sort"></i></button>
													</form>

													 </th>
                                            <?php endfor;?>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        
                                        <?php foreach($contacts['data'] as $school): ?>
                                            <tr>

                                                <?php foreach($fields as $contact): ?>

                                                    <td><?php echo $school->$contact; ?></td>

                                                <?php endforeach ?>

                                            <td><a  href="/companies/contactdetails/<?php echo $school->id; ?>"> <i class="fa fa-edit"></i> </a></td></td>
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


