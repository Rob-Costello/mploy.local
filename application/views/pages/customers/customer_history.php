
<?php $this->load->view('templates/header'); ?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <?php //$this->load->view('/templates/components/notification') ?>
    </section>

    <div class="container-fluid ">
        <div class=" ">
            <div id="exTab1" class="">

				<?php $this->load->view('/pages/customers/customer_components/customer_tabs') ?>

                <div class="tab-content clearfix">




                        <section class="content">
							<div  class="addButton col-md-offset-9 col-md-3">
								<button class="  btn btn-mploy-submit waves-effect waves-light" style="float:right;"  onclick="window.location.replace('/customers/call/<?php echo $id ?>')"><i class="fa fa-plus"></i>
									<span class="buttonText">New Call</span></button>


							</div>

							<div class="box-primary">

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
                                        <?php foreach($contacts['data'] as $customer): ?>
                                            <tr>

                                                <?php foreach($fields as $contact): ?>

                                                    <?php if ($contact=='rag_status'){
                                                    	$customer->$contact = '<img src="'.base_url().'assets/dist/img/'.$customer->$contact.'.png" class="img-circle" alt="Status">';
                                                    }?>
	                                                <td><?php echo $customer->$contact; ?></td>

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


