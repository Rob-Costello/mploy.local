<div class=" ">
    <div id="exTab1" class="">

        <div class="tab-content clearfix">

            <div class="tab-pane active" id="1a">

                <section class="">
                    <!-- Main content School Details-->
                    <!--- Schools contacts -->

                    <div class="box">

                        <div class="box-header with-border">
                            <h3 class="box-title">Placements <?php if(isset($placements_total)) echo '(' . $placements_total . ')'; ?></h3>
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">
                            <?php if( isset($student_message) &&  $student_message != '' ) { ?>
                                <div style="z-index:100" class="col-md-12">
                                    <?php if( $student_message != '' ) { ?>
                                        <div class="alert alert-success alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <?php echo $student_message; ?>
                                        </div>
                                    <?php } ?>
                                </div>

                                <div style="opacity:0;"  id="message">
                                    <?php echo $student_message; ?>

                                </div>
                            <?php } ?>
                            <!--
									    <div  style="displaypadding-bottom:20px;" class="col-md-offset-9 col-md-3">
										    <input type="submit" class="btn btn-mploy-submit" value="Placement" onclick="window.location.replace('/campaigns/newplacement/<?php //echo $camp_id ?>/<?php echo $comp_id ?>')">
									    </div>-->


                            <div class="col-sm-12 col-md-12">
                                <div class="table-responsive">
                                    <table id="example2" style="width: 100% !important;" class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>School</th>
                                            <th>Campaign</th>
                                            <th>Placement Start</th>
                                            <th>Placement End</th>
                                            <th>Placements</th>
                                            <th>WEX</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php foreach($placements as $call): ?>

	                                        <tr>
                                                <td><?php echo $call->name?></td>
                                                <td><?php echo $call->campaign_name ?></td>
                                                <td><?php echo date("d/m/Y", strtotime($call->campaign_place_start_date)); ?></td>
                                                <td><?php echo date("d/m/Y", strtotime($call->campaign_place_end_date)); ?></td>
                                                <td><?php echo $call->placements ?></td>
		                                        <td><button onclick =window.open("https://www.workexperiences.co.uk/businesses/company.cfm?id=<?php echo $call->wex_org_id ?>&sso_key=<?php echo $sso_key?>",'Mploy',"height=800,width=600") class="btn btn-mploy"> WEX</button></td>
                                            </tr>
                                        <?php endforeach ?>
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
