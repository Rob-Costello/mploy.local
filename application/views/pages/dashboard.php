
<?php $this->load->view('templates/header'); ?>
<?php
	function percent ($percent)
	{

		if ($percent < 50) {
			$color = '#00a65a';
		}
		if ($percent > 51) {
			$color = '#f39c12';
		}
		if ($percent > 85) {
			$color = 'red';
		}
		return $color;
	}
?>
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>

			<small></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Dashboard</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">



		<div class="">
			<!-- Content Header (Page header) -->

			<!-- Main content -->
			<section class="content">
				<!-- Info boxes -->
				<div class="row">
                    <a href="/customers"><div class="col-md-3 col-sm-6 col-xs-12">
						<div class="info-box">
							<span class="info-box-icon bg-aqua"><i class="fa fa-graduation-cap"></i></span>

							<div class="info-box-content">
								<span class="info-box-text">Active Customers</span>
								<span class="info-box-number"><?php echo number_format($school_count,0,"",","); ?></span>
                            </div></a>
							<!-- /.info-box-content -->
						</div>
						<!-- /.info-box -->
					</div>
					<!-- /.col -->
        <a href="/companies"><div class="col-md-3 col-sm-6 col-xs-12">
						<div class="info-box">
							<span class="info-box-icon bg-red"><i class="fa fa fa-building"></i></span>

							<div class="info-box-content">
								<span class="info-box-text">Companies</span>
                                <span class="info-box-number"><?php echo number_format($company_count,0,"",","); ?></span>
							</div>
							<!-- /.info-box-content -->
						</div>
						<!-- /.info-box -->
            </div></a>
					<!-- /.col -->

					<!-- fix for small devices only -->
					<div class="clearfix visible-sm-block"></div>

            <a href="/users">	<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="info-box">
							<span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>

							<div class="info-box-content">
								<span class="info-box-text">Active Users</span>
								<span class="info-box-number"><?php echo number_format($user_count,0,"",","); ?></span>
							</div>
							<!-- /.info-box-content -->
						</div>
						<!-- /.info-box -->
                </div></a>
					<!-- /.col -->
        <a href="/campaigns"><div class="col-md-3 col-sm-6 col-xs-12">
						<div class="info-box">
							<span class="info-box-icon bg-yellow"><i class="fa fa-briefcase"></i></span>

							<div class="info-box-content">
								<span class="info-box-text">Active Campaigns</span>
								<span class="info-box-number"><?php echo number_format($campaigns_count,0,"",","); ?></span>
							</div>
							<!-- /.info-box-content -->
						</div>
						<!-- /.info-box -->
            </div></a>
					<!-- /.col -->
				</div>
				<!-- /.row -->

				<div class="row">
					<div class="col-md-12">
						<div class="box">
							<div class="box-header with-border">
								<h3 class="box-title">Campaign Status</h3>

<!--								<div class="box-tools pull-right">-->
<!--									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>-->
<!--									</button>-->
<!--									<div class="btn-group">-->
<!--										<button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">-->
<!--											<i class="fa fa-wrench"></i></button>-->
<!--										<ul class="dropdown-menu" role="menu">-->
<!--											<li><a href="#">Action</a></li>-->
<!--											<li><a href="#">Another action</a></li>-->
<!--											<li><a href="#">Something else here</a></li>-->
<!--											<li class="divider"></li>-->
<!--											<li><a href="#">Separated link</a></li>-->
<!--										</ul>-->
<!--									</div>-->
<!--									<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
<!--								</div>-->
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<div class="row">

                                <?php foreach($output as  $key => $campaign){ ?>

                                    <!-- /.col -->
									<div style="margin-right:20px; " class="col-md-2 "><a href="/campaigns/employers/<?php echo $campaign['campaign_display']->campaign_id ?>/0">
                                        <!--										<p class="text-center">-->
                                        <!--											<strong>Goal Completion</strong>-->
                                        <!--										</p>-->

										<div style="height:80px">
                                        <h3 style="color:#54667a;" class="text-center box-title"><?php echo $campaign['campaign_display']->campaign_name; ?></h3>
										</div>
											<h4 class="box-title"><?php echo date('d/m/Y',strtotime($campaign['campaign_display']->campaign_place_start_date)); ?></h4>
                                        <div class="progress-group">
                                            <span class="progress-text">Companies Contacted</span>
                                            <span class="progress-number"><b> <?php  echo $campaign['call_info'][$key]['call']; ?>
                                                </b>/<?php echo $callinfo[$key]['info']; ?></span>
                                            <div class="progress sm">
                                                <div class="progress-bar progress-bar-aqua" style="width: <?php if ((int)$callinfo[$key]['call']  <= 0 ) echo 0; else echo $percent = ((int)$callinfo[$key]['call'] * 100  / (int)$callinfo[$key]['info']  )?>%;
	                                                background-color:<?php echo percent($percent);?> "></div>
                                            </div>
                                        </div>
                                        <!-- /.progress-group -->
                                        <div class="progress-group">
                                            <span class="progress-text">Places Agreed</span>

	                                        <span class="progress-number"><b><?php echo $campaign['call_info'][$key]['success']; ?>
                                                </b>/ <?php echo $campaign['call_info'][$key]['total'];?></span>

                                            <div class="progress sm">
                                                <div class="progress-bar progress-bar-yellow" style="width: <?php if ((int)$callinfo[$key]['success']  <= 0 ) echo 0; echo $percent = ((int)$callinfo[$key]['success'] * 100  / (int)$callinfo[$key]['total']  );?>%
	                                                ;background-color:<?php echo percent($percent);?>"></div>
                                            </div>
                                        </div>
                                        <!-- /.progress-group -->
                                        <div class="progress-group">
                                            <span class="progress-text">Success Rate</span>
                                            <span class="progress-number"><b><?php echo round((int)$callinfo[$key]['success'] * 100  / (int)$callinfo[$key]['total']);?></b>/ <?php echo $callinfo[$key]['info']; ?></span>

                                            <div class="progress sm">
	                                            <div class="progress-bar progress-bar-yellow" style="width: <?php if ((int)$callinfo[$key]['success']  <= 0 ) echo 0; echo $percent = ((int)$callinfo[$key]['success'] * 100  / (int)$callinfo[$key]['total']  );?>%
		                                            ;background-color:<?php echo percent($percent);?>"></div>
                                            </div>
                                        </div>
											<div class="progress-group">
												<span class="progress-text">Days Remaining</span>


												<?php
												$startdate= strtotime($campaign['campaign_display']->campaign_start_date); //Future date
												$enddate= strtotime($campaign['campaign_display']->employer_engagement_end); //Future date
												$cmplength = (  $startdate - $enddate);
												$days = round($cmplength / (60 * 60 * 24));
												$now = strtotime(date('d/m/Y h:i:s'));
												$timeleft = ( $enddate - $now);
												$daysleft = round($timeleft / (60 * 60 * 24));
												$percent = ($daysleft * 100 / $days);

												$color = percent($percent)
												?>

												<span class="progress-number">
													<b>
														<?php echo $daysleft; ?>
													</b>
												</span>

												<div class="progress sm">
													<div class="progress-bar progress-bar-yellow" style="width: <?php  echo $percent; ?>%; background-color: <?php echo $color?>;"></div>
												</div>
											</div>
										</a>
                                    </div>
									<!-- /.col -->

                                <?php } ?>

								</div>
								<!-- /.row -->
							</div>
							<!-- ./box-body -->

							<!-- /.box-footer -->
						</div>
						<!-- /.box -->
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->

				<!-- Main row -->
				<div class="row">
					<!-- Left col -->
					<div class="col-md-8">
						<!-- MAP & BOX PANE -->
						<div class="box box-success">
							<!-- /.box-header -->
							<div class="box-body no-padding">
								<div class="row">

                                    <div class="col-md-12">
                                        <!-- AREA CHART -->
                                            <div class="box-header with-border">
                                                <h3 class="box-title">Usage Last 30 Days</h3>

                                                <div class="box-tools pull-right">
                                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                                </div>
                                            </div>
                                            <div class="box-body">
                                                <div class="chart">
                                                    <canvas id="areaChart" style="height:250px"></canvas>
                                                </div>
                                            </div>
                                            <!-- /.box-body -->
                                        </div>
                                        <!-- /.box -->

                                    </div>

                                    <script src="<?php echo base_url()."assets/";?>bower_components/chart.js/Chart.js"></script>

                                    <script>
                                        $(function () {
                                            /* ChartJS
                                             * -------
                                             * Here we will create a few charts using ChartJS
                                             */

                                            //--------------
                                            //- AREA CHART -
                                            //--------------

                                            // Get context with jQuery - using jQuery's .get() method.
                                            var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
                                            // This will get the first returned node in the jQuery collection.
                                            var areaChart       = new Chart(areaChartCanvas)

                                            var areaChartData = {
                                                //labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                                                labels  : [<?php foreach ($login_data as $data) { echo "'".$data->day . "/".$data->month ."',"; } ?>],
                                                datasets: [
                                                    {
                                                        label               : 'New Users',
                                                        fillColor           : 'rgba(210, 214, 222, 1)',
                                                        strokeColor         : 'rgba(210, 214, 222, 1)',
                                                        pointColor          : 'rgba(210, 214, 222, 1)',
                                                        pointStrokeColor    : '#c1c7d1',
                                                        pointHighlightFill  : '#fff',
                                                        pointHighlightStroke: 'rgba(220,220,220,1)',
                                                        data                : [<?php foreach ($login_data as $data) { echo $data->created . ','; } ?>]
                                                    },
                                                    {
                                                        label               : 'Successful Logins',
                                                        fillColor           : 'rgba(60,141,188,0.9)',
                                                        strokeColor         : 'rgba(60,141,188,0.8)',
                                                        pointColor          : '#3b8bba',
                                                        pointStrokeColor    : 'rgba(60,141,188,1)',
                                                        pointHighlightFill  : '#fff',
                                                        pointHighlightStroke: 'rgba(60,141,188,1)',
                                                        data                : [<?php foreach ($login_data as $data) { echo $data->success . ','; } ?>]
                                                    },
                                                    {
                                                        label               : 'Failed Logins',
                                                        fillColor           : 'rgba(221,75,57,0.9)',
                                                        strokeColor         : 'rgba(221,75,57,0.8)',
                                                        pointColor          : '#dd4b39',
                                                        pointStrokeColor    : 'rgba(221,75,57,1)',
                                                        pointHighlightFill  : '#fff',
                                                        pointHighlightStroke: 'rgba(221,75,57,1)',
                                                        data                : [<?php foreach ($login_data as $data) { echo $data->fail . ','; } ?>]
                                                    }
                                                ]
                                            }

                                            var areaChartOptions = {
                                                //Boolean - If we should show the scale at all
                                                showScale               : true,
                                                //Boolean - Whether grid lines are shown across the chart
                                                scaleShowGridLines      : false,
                                                //String - Colour of the grid lines
                                                scaleGridLineColor      : 'rgba(0,0,0,.05)',
                                                //Number - Width of the grid lines
                                                scaleGridLineWidth      : 1,
                                                //Boolean - Whether to show horizontal lines (except X axis)
                                                scaleShowHorizontalLines: true,
                                                //Boolean - Whether to show vertical lines (except Y axis)
                                                scaleShowVerticalLines  : true,
                                                //Boolean - Whether the line is curved between points
                                                bezierCurve             : true,
                                                //Number - Tension of the bezier curve between points
                                                bezierCurveTension      : 0.3,
                                                //Boolean - Whether to show a dot for each point
                                                pointDot                : false,
                                                //Number - Radius of each point dot in pixels
                                                pointDotRadius          : 4,
                                                //Number - Pixel width of point dot stroke
                                                pointDotStrokeWidth     : 1,
                                                //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
                                                pointHitDetectionRadius : 20,
                                                //Boolean - Whether to show a stroke for datasets
                                                datasetStroke           : true,
                                                //Number - Pixel width of dataset stroke
                                                datasetStrokeWidth      : 2,
                                                //Boolean - Whether to fill the dataset with a color
                                                datasetFill             : true,
                                                //String - A legend template
                                                legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
                                                //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
                                                maintainAspectRatio     : true,
                                                //Boolean - whether to make the chart responsive to window resizing
                                                responsive              : true
                                            }

                                            //Create the line chart
                                            areaChart.Line(areaChartData, areaChartOptions)

                                            //-------------
                                            //- LINE CHART -
                                            //--------------
                                            var lineChartCanvas          = $('#lineChart').get(0).getContext('2d')
                                            var lineChart                = new Chart(lineChartCanvas)
                                            var lineChartOptions         = areaChartOptions
                                            lineChartOptions.datasetFill = false
                                            lineChart.Line(areaChartData, lineChartOptions)


                                        })



                                    </script>
								<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.0/jquery.matchHeight-min.js"><script>

										<script>


									</script>
									<!-- /.col -->
								</div>
								<!-- /.row -->
							</div>
							<!-- /.box-body -->


					</div>
					<!-- /.col -->
					<div class="row">
						<div class="col-md-4">
                            <div class="box box-info">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Last 30 Days</h3>
                                </div>
                            </div>
							<!-- Info Boxes Style 2 -->
<!--							<div class="info-box bg-yellow">-->
<!--								<span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>-->
<!---->
<!--								<div class="info-box-content">-->
<!--									<span class="info-box-text">Call Backs</span>-->
<!--									<span class="info-box-number">5,200</span>-->
<!---->
<!--									<div class="progress">-->
<!--										<div class="progress-bar" style="width: 50%"></div>-->
<!--									</div>-->
<!--									<span class="progress-description">-->
<!--                    50% Increase in 30 Days-->
<!--                  </span>-->
<!--								</div>-->
<!--								<!-- /.info-box-content -->
<!--							</div>-->
							<!-- /.info-box -->
							<div class="info-box bg-green">
								<span class="info-box-icon"><i class="fa fa-envelope"></i></span>

								<div class="info-box-content">
									<span class="info-box-text">Emails Sent</span>
									<span class="info-box-number">92,050</span>

									<div class="progress">
										<div class="progress-bar" style="width: 20%"></div>
									</div>
									<span class="progress-description">20% Increase in 30 Days</span>
								</div>
								<!-- /.info-box-content -->
							</div>
							<!-- /.info-box -->
<!--							<div class="info-box bg-red">-->
<!--								<span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>-->
<!---->
<!--								<div class="info-box-content">-->
<!--									<span class="info-box-text">Not Willing to accept</span>-->
<!--									<span class="info-box-number">114,381</span>-->
<!---->
<!--									<div class="progress">-->
<!--										<div class="progress-bar" style="width: 70%"></div>-->
<!--									</div>-->
<!--									<span class="progress-description">-->
<!--                    70% Increase in 30 Days-->
<!--                  </span>-->
<!--								</div>-->
<!--								<!-- /.info-box-content -->
<!--							</div>-->
							<!-- /.info-box -->
							<div class="info-box bg-aqua">
								<span class="info-box-icon"><i class="fa fa-phone"></i></span>

								<div class="info-box-content">
									<span class="info-box-text">Calls Logged</span>
									<span class="info-box-number"><?php echo $total_calls['total'] ?></span>
										<?php $percent = $total_calls['days'] * 100 / $total_calls['total']; ?>
										<div class="progress">
											<div class="progress-bar" style="width: <?php echo (int)$percent?>%"></div>
										</div>
										<span class="progress-description"><?php   echo (int)$percent ?>% Increase in 30 Days</span>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->


								<!-- /.box -->

								<!-- PRODUCT LIST -->

								<!-- /.box -->
							</div>
							<!-- /.col -->
						</div>
					</div>
					<!-- /.row -->
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->



</div>

</section>

</div>

<?php $this->load->view('templates/footer'); ?>
