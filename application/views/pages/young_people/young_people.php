


<?php $this->load->view('templates/header'); ?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>

			<small></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Student Details</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">

		<div class="box">
			<div class="box-header"></div>
			<div class="box-header">
				<div class="col-md-3">
				<h2 class="box-title">
					Student Details
				</h2>
				</div>
				<div class="col-md-offset-3 col-md-6">
					<div class="box-header with-border">
						<h3 style="float:right;" class="box-title">Search</h3>
						<div class="box-tools pull-right">
							<form method="POST">
							<div class="has-feedback">
								<input type="text" class="form-control input-sm" placeholder="Search...">
								<span class="glyphicon glyphicon-search form-control-feedback"></span>
							</div>
							</form>
						</div><!-- /.box-tools -->
					</div><!-- /.box-header -->
				</div>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<table id="example2" class="table table-bordered table-striped">
					<thead>
					<tr>
						<?php foreach($headings as $heading):?>
							<th><?php echo $heading; ?> </th>
						<?php endforeach;?>
						<th></th>
					</tr>
					</thead>
					<tbody>

					<tr>
					<?php foreach($headings as $key => $val): ?>


						<?php foreach($people['data'] as $person): ?>
								<td><?php echo $person->$key; ?></td>

						<?php  endforeach ?>



					<?php endforeach ?>
						<td><a class="" href="/youngpeople/view/<?php echo $person->id;?>"> <i class="fa fa-edit"></i> </a></td>
					</tr>
					</tbody>

				</table>
			</div>
			<!-- /.box-body -->


		</div>
		<!-- /.box -->
		<div class="box-footer clearfix">
			<div class="dataTables_info" id="example23_info" role="status" aria-live="polite">
				Showing <?php echo $pagination_start; ?> to <?php echo $pagination_end; ?> of <?php $people['count']; ?> entries</div>
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



