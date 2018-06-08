


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
						<td><a class="" href="/campaigns/employerdetails/<?php echo $camp_id ?>/<?php echo $company->comp_id;?>"> <i class="fa fa-edit"></i> </a></td>

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



