<div class=" ">
    <div id="exTab1" class="">

        <div class="tab-content clearfix">

            <div class="tab-pane active" id="1a">

                <section class="">
                    <!-- Main content School Details-->
                    <!--- Schools contacts -->

                    <div class="box">

                        <div class="box-header with-border">
                            <h3 class="box-title">Call History </h3>
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">
                            <?php if( isset($call_message) &&  $call_message != '' ) { ?>
                                <div style="z-index:100" class="col-md-12">

                                        <div class="alert alert-success alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <?php echo $call_message; ?>
                                        </div>
                                </div>

                                <div style="opacity:0;"  id="message">
                                    <?php echo $call_message; ?>

                                </div>
                            <?php } ?>
                            <?php if( isset($camp_id)) { ?>
                                <div  style="padding-bottom:20px;" class="col-md-offset-9 ">
                                    <input type="submit" class="btn btn-mploy-submit" value="New Call"
                                           onclick="window.location.replace('/campaigns/newcall/<?php echo $camp_id ?>/<?php echo $comp_id ?>?campid=<?php echo $campaign;?>')">
                                </div>
                            <?php } ?>


                            <div class="col-md-12">
                                <div class="table-responsive-md">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <?php foreach($call_table as $heading):?>
                                                <th><?php echo $heading; ?> </th>
                                            <?php endforeach;?>

                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php foreach($calls as $call): ?>
                                        <tr>
                                            <td><?php echo $call->first_name . ' ' . $call->last_name; ?></td>
                                            <td><?php echo $call->description ?></td>
                                            <td><?php echo $call->receiver ?></td>
                                            <td><?php echo $call->notes ?></td>
                                            <td><?php echo date("d/m/Y H:i", strtotime($call->date_time)); ?></td>
                                            <td>
                                                <img src="<?php echo base_url()."assets/";?>dist/img/<?php echo $call->rag_status ?>.png" class="img-circle" alt="Status">
                                            </td>



                                            <?php endforeach ?>

                                        </tr>
                                        </tbody>

                                    </table>
                                </div>
                            </div>

                        </div>


                </section>



            </div>

        </div> <!-- end tab content -->



    </div>
</div>