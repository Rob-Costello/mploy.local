
<?php $this->load->view('templates/header'); ?>

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
									<div style="margin-right:20px" class="col-md-2"><a href="/campaigns/employers/<?php echo $campaign['campaign_display']->campaign_id ?>/0">
                                        <!--										<p class="text-center">-->
                                        <!--											<strong>Goal Completion</strong>-->
                                        <!--										</p>-->


                                        <h3 class="box-title"><?php echo $campaign['campaign_display']->campaign_name; ?></h3>
                                        <h4 class="box-title"><?php echo date('d/m/Y',strtotime($campaign['campaign_display']->campaign_place_start_date)); ?></h4>
                                        <div class="progress-group">
                                            <span class="progress-text">Companies Contacted</span>
                                            <span class="progress-number"><b> <?php  echo $campaign['call_info'][$key]['call']; ?>
                                                </b>/<?php echo $callinfo[$key]['info']; ?></span>
                                            <div class="progress sm">
                                                <div class="progress-bar progress-bar-aqua" style="width: <?php if ((int)$callinfo[$key]['call']  <= 0 ) echo 0; else echo ((int)$callinfo[$key]['call'] * 100  / (int)$callinfo[$key]['info']  )?>%"></div>
                                            </div>
                                        </div>
                                        <!-- /.progress-group -->
                                        <div class="progress-group">
                                            <span class="progress-text">Places Agreed</span>

	                                        <span class="progress-number"><b><?php echo $campaign['call_info'][$key]['success']; ?>
                                                </b>/ <?php echo $campaign['call_info'][$key]['total'];?></span>

                                            <div class="progress sm">
                                                <div class="progress-bar progress-bar-yellow" style="width: <?php if ((int)$callinfo[$key]['success']  <= 0 ) echo 0; echo ((int)$callinfo[$key]['success'] * 100  / (int)$callinfo[$key]['total']  )?>%"></div>
                                            </div>
                                        </div>
                                        <!-- /.progress-group -->
                                        <div class="progress-group">
                                            <span class="progress-text">Success Rate</span>
                                            <span class="progress-number"><b>4</b>/100</span>

                                            <div class="progress sm">
                                                <div class="progress-bar progress-bar-green" style="width: 4%"></div>
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
							<div class="box-header with-border">
								<h3 class="box-title">Usage Last 30 Days</h3>

<!--								<div class="box-tools pull-right">-->
<!--									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>-->
<!--									</button>-->
<!--									<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
<!--								</div>-->
							</div>
							<!-- /.box-header -->
							<div class="box-body no-padding">
								<div class="row">

									<!-- /.col -->
									<div class="col-md-12 col-sm-12">
										<div class="pad box-pane-right bg-green" style="min-height: 280px">
											<div class="description-block margin-bottom">
												<div class="sparkbar pad" data-color="#fff"></div>
												<h5 class="description-header">43</h5>
												<span class="description-text">Successful Logins</span>
											</div>
											<!-- /.description-block -->
											<div class="description-block margin-bottom">
												<div class="sparkbar pad" data-color="#fff"></div>
												<h5 class="description-header">2</h5>
												<span class="description-text">Failed Logins</span>
											</div>
											<!-- /.description-block -->
											<div class="description-block">
												<div class="sparkbar pad" data-color="#fff"></div>
												<h5 class="description-header">30</h5>
												<span class="description-text">New Users</span>
											</div>
											<!-- /.description-block -->
										</div>
									</div>
									<!-- /.col -->
								</div>
								<!-- /.row -->
							</div>
							<!-- /.box-body -->
						</div>
						<!-- /.box -->


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
									<span class="info-box-number">182</span>

										<div class="progress">
											<div class="progress-bar" style="width: 40%"></div>
										</div>
										<span class="progress-description">40% Increase in 30 Days</span>
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
