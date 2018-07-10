
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

                                                <th>Date </th>
	                                            <th>School</th>
	                                            <th>Student</th>
	                                            <th></th>



                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php foreach($placements as $history): ?>
                                            <tr>

                                               <td><?php echo $history->date_time ?></td>
	                                            <td><?php echo $history->name ?></td>
	                                            <td><?php echo 'TBC'//echo $history->job_title ?></td>
	                                            <td><button type="button" class="btn btn-mploy"> WEX</button></td>
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

                                                <th>Date / Time</th>
	                                            <th>Caller</th>
	                                            <th>Receiver</th>
	                                            <th>Notes</th>
	                                            <th>Status</th>




                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php foreach($calls as $history): ?>
                                            <tr>


	                                            <td><?php echo $history->date_time; ?></td>
	                                            <td><?php echo $history->first_name .' ' .$history->last_name ; ?></td>
	                                            <td><?php echo $history->receiver; ?></td>

	                                            <td><?php echo $history->notes; ?></td>


	                                            <td><?php if($history->rag_status=='') $history->rag_status ='red';  echo '<img src="'.base_url().'assets/dist/img/'.$history->rag_status.'.png" class="img-circle" alt="User Image">'; ?></td>





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


