
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
                    <div class="" >

                        <section class="content">
                            <div class="box box-primary">

	                            <div  class="addButton col-md-offset-9 col-md-3">

		                            <button class="  btn btn-mploy-submit waves-effect waves-light" style="float:right" onclick="window.location.replace('/customers/newcontact/<?php echo $id ?>')"><i class="fa fa-plus"></i>
			                            <span class="buttonText">Add Contact</span></button>
	                            </div>

                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table id="example2" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <?php foreach($table_header as $heading):?>
                                                <th><?php echo $heading; ?> </th>
                                            <?php endforeach;?>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($contacts['data'] as $customer): ?>
                                            <tr>

                                                <?php foreach($fields as $contact): ?>

                                                    <td><?php echo $customer->$contact; ?></td>

                                                <?php endforeach ?>

                                            <td><a  href="/customers/contactdetails/<?php echo $customer->id;?>"> <i class="fa fa-edit"></i> </a></td></td>
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


