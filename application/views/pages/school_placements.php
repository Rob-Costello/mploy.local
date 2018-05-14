
<?php $this->load->view('templates/header'); ?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h3>

            Contacts
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
                    <li ><a href="/schools/contacts/" >School Contacts</a>
                    </li>
                    <li ><a  href="/schools/history" >History</a>
                    </li>
                    <li class="active"><a href="/schools/placements" >Placements</a>
                    </li>
                </ul>

                <div class="tab-content clearfix">
					<button class="  btn btn-info waves-effect waves-light" style="float:right" onclick="window.location.replace('/schools/newplacement')"><i class="fa fa-plus"></i>
						<span class="buttonText">New Placement</span></button>
                    <div class="" >
                        <h3>Contacts</h3>
                        <section class="content">
                            <div class="box box-primary">



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
                                        <?php foreach($active['data'] as $school): ?>
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


                        </section>


                    </div>

                    <!-- end tab -->





                </div> <!-- end tab content -->



            </div>
        </div>
    </div> <!-- end tab container -->












    <?php $this->load->view('templates/footer'); ?>


