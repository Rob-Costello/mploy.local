


<?php $this->load->view('templates/header'); ?>

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
						<?php foreach($headings as $heading):?>
						<th><?php echo $heading; ?> </th>
						<?php endforeach;?>
					<th></th>
					</tr>
					</thead>
					<tbody>
					<?php foreach($schools['data'] as $school): ?>
					<tr>
						<td><?php echo $school->name; ?></td>
						<td><?php echo $school->address1." ". $school->address2 ?></td>
						<td><?php echo $school->town; ?></td>
						<td><?php echo $school->county; ?></td>
						<td><?php echo $school->postcode; ?></td>
						<td><?php echo $school->phone_number; ?></td>
						<td><?php echo $school->type; ?></td>
						<td><?php echo $school->price; ?></td>
						<td><a class="" href="/schools/view/<?php echo $school->id;?>"> <i class="fa fa-edit"></i> </a></td>

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
				Showing <?php echo $pagination_start; ?> to <?php echo $pagination_end; ?> of <?php $schools['count']; ?> entries</div>
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



