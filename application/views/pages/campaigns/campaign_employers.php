


<?php $this->load->view('templates/campaign_header'); ?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>

			<small></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><?=$title; ?></li>
		</ol>
	</section>

<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="col-md-offset-3"><h2 class=""><?php echo $campaign_name?></h2></div>
					<div class="box-header with-border">
						<h3 class="box-title"> Campaign Progress Dashboard</h3>

						<!--<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
							<div class="btn-group">
								<button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-wrench"></i></button>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#">Action</a></li>
									<li><a href="#">Another action</a></li>
									<li><a href="#">Something else here</a></li>
									<li class="divider"></li>
									<li><a href="#">Separated link</a></li>
								</ul>
							</div>
							<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
						</div>-->
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="row">

							<!-- /.col -->
							<div class="col-md-11">
								<p class="text-center">
									<strong>Goal Completion</strong>
								</p>

								<div class="progress-group">
									<span class="progress-text">Calls completed</span>
									<span class="progress-number"><b><?php echo $call_data['calls'] ?></b>/<?php echo (int)$campaign['count']; ?></span>

									<div class="progress sm">



										<div class="progress-bar progress-bar-aqua" style="width: <?php if ((int)$call_data['calls']  <= 0 ) echo 0; echo ((int)$call_data['calls']  * 100  / (int)$campaign['count']  )?>%"></div>
									</div>
								</div>
								<!-- /.progress-group -->
								<div class="progress-group">
									<span class="progress-text">Rejections</span>
									<span class="progress-number"><b><?php echo $call_data['rejected'] ?></b>/<?php echo $camp_data['students_to_place']?></span>

									<div class="progress sm">
										<div class="progress-bar progress-bar-red" style="width: <?php if ((int)$call_data['rejected']  <= 0 ) echo 0; echo ((int)$call_data['rejected']  * 100  / (int)$camp_data['students_to_place']  )?>%"></div>
									</div>
								</div>
								<!-- /.progress-group -->
								<div class="progress-group">
									<span class="progress-text">Successful Placements</span>
									<span class="progress-number"><b><?php echo $call_data['success'] ?></b>/<?php echo $camp_data['students_to_place']?></span>

									<div class="progress sm">
										<div class="progress-bar progress-bar-green" style="width: <?php if ((int)$call_data['success']  <= 0 ) echo 0; echo ((int)$call_data['success']  * 100  / (int)$camp_data['students_to_place']  )?>%"></div>
									</div>
								</div>
								<!-- /.progress-group -->
								<div class="progress-group">
									<span class="progress-text">Maybe</span>
									<span class="progress-number"><b><?php echo $call_data['maybe'] ?></b>/<?php echo $camp_data['students_to_place']?></span>

									<div class="progress sm">
										<div class="progress-bar progress-bar-yellow" style="width: <?php if ((int)$call_data['maybe']  <= 0 ) echo 0; echo ((int)$call_data['maybe']  * 100  / (int)$camp_data['students_to_place']  )?>%"></div>
									</div>
								</div>
								<!-- /.progress-group -->
							</div>
							<!-- /.col -->
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
	</section>


	<section style="min-height:100px !important" class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Mode</h3>

						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
							<div class="btn-group">
								<button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-wrench"></i></button>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#">Action</a></li>
									<li><a href="#">Another action</a></li>
									<li><a href="#">Something else here</a></li>
									<li class="divider"></li>
									<li><a href="#">Separated link</a></li>
								</ul>
							</div>
							<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
						</div>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="row">

							<div class="col-md-3">

								<form method="GET" >
									<button class="btn <?php if($status == 'all') echo 'btn-mploy' ?>" name="status" value="all"> All</button>
								</form>

							</div>



							<div class="col-md-3">

								<form method="GET" >
									<button class="btn <?php if($status == 'pending') echo 'btn-mploy' ?>" name="status" value="pending"> Pending</button>
								</form>

							</div>


							<div class="col-md-3">

								<form method="GET" >
									<button class="btn <?php if($status == 'available') echo 'btn-mploy' ?>"name="status" value="available"> Available</button>
								</form>

							</div>


							<div class="col-md-3">

								<form method="GET" >
									<button class="btn <?php if($status == 'not willing to take') echo 'btn-mploy' ?>" name="status" value="not willing to take"> Not Willing</button>
								</form>

							</div>


							<!-- /.col -->

							<!-- /.col -->
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
	</section>

	<!-- Main content -->
	<section class="content">



		<div class="box">
			<div class <div class="col-md-offset-6 col-md-6">
				<form  method="POST" class="sidebar-form">
					<div class="input-group">
						<input style="margin:20px; padding:19px;" type="text" name="search" class="form-control" placeholder="Search...">
						<span class="input-group-btn">
                <button style="z-index:100" type="submit"  id="search-btn" class="btn btn-flat btn-mploy">
                    <i class=" fa fa-search"></i>
                </button>
              </span>
					</div>
				</form>

			<div class="box-header"></div>
			<div class="box-header">
				<h2 class="box-title">
					<?= $title; ?>
				</h2>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<table id="example2" class="table table-bordered table-striped">
					<thead>
					<tr>




						<?php for($i=0; $i< count($headings); $i++ ):?>
							<th>
								<form method="get">
									<input type="hidden" name="orderby" value="<?php echo $fields[$i] ?>">
									<button class="no-button"><?php echo $headings[$i]; ?> <i class=" fa fa-sort"></i></button>
								</form>

							</th>
						<?php endfor;?>

					<th></th>
					</tr>
					</thead>
					<tbody>
					<?php foreach($campaign['data'] as $company): ?>
					<tr>
						<td><?php echo $company->name; ?>, <?php echo $company->town; ?></td>
						
						<td><?php echo $company->phone; ?></td>
						<td><?php echo $company->address1 .' '.$company->address2.' '.$company->town.' '.$company->postcode; ?></td>
						<td>
							<?php echo $company->line_of_business;?>
						</td>
						<td>
							<?php echo $company->status;?>
						</td>
						<td><a class="" href="/campaigns/employerdetails/<?php echo $camp_id ?>/<?php echo $company->comp_id;?>?campid=<?php echo $camp_ref ?>">
								<i class="fa fa-edit"></i> </a></td>

					</tr>
					<?php endforeach ?>
					</tbody>

				</table>
			</div>
			<!-- /.box-body -->


		</div>
		<!-- /.box -->
		<div class="box-footer clearfix">
			<div class="dataTables_info" id="example23_info" role="status" aria-live="polite">
				Showing <?php echo $pagination_start; ?> to <?php echo $pagination_end; ?> of <?php $campaign['count']; ?> entries</div>
			<div class="dataTables_paginate paging_simple_numbers">
				<?php echo $pagination; ?>
			</div>

		</div>

</div>

	</section>

</div>







<?php $this->load->view('templates/footer'); ?>

<script>
	$(function () {
		$('#example1').DataTable()
		$('#example2').DataTable({
			'paging'      : true,
			'lengthChange': false,
			'searching'   : false,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : false
		})
	})
</script>



