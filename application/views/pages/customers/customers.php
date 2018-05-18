


<?php $this->load->view('templates/header'); ?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>

			<small></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><?=$title; ?></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">



		<div class="box">


			<div style="padding-bottom:50px;" class="box-header">
				<div class="col-md-3"><h3 class="">
						<?= $title; ?>
					</h3></div>

				<div  class="addButton col-md-offset-6 col-md-3">

					<button class="  btn btn-mploy-submit waves-effect waves-light" style="float:right" onclick="window.location.replace('/customers/register')"><i class="fa fa-plus"></i>
						<span class="buttonText">Add Customer</span></button>
				</div>

			</div>
			<!-- /.box-header -->

			<div class="box-body">
				<table id="example2" class="table table-bordered table-striped">
					<thead>
					<tr>
						<?php foreach($headings as $k => $heading):?>
							<th><?php echo $k; ?> </th>
						<?php endforeach;?>
						<th></th>
					</tr>
					</thead>
					<tbody>

					<tr>
						<?php foreach($headings as $key => $val): ?>


							<?php foreach($customers['data'] as $person): ?>
								<td>
									<?php if(is_array($val)): ?>
									<?php foreach($val as $v): ?>
										<?php echo $person->$v." "; ?>
									<?php endforeach ?>
									<?php else: ?>
									<?php echo $person->$val; ?>
									<?php endif ?>
								</td>

							<?php  endforeach ?>



						<?php endforeach ?>
						<td><a class="" href="/customers/edit/<?php echo $person->id;?>"> <i class="fa fa-edit"></i> </a></td>
					</tr>
					</tbody>

				</table>
			</div>
			<!-- /.box-body -->


		</div>
		<!-- /.box -->
		<div class="box-footer clearfix">
			<div class="dataTables_info" id="example23_info" role="status" aria-live="polite">
				Showing <?php echo $pagination_start; ?> to <?php echo $pagination_end; ?> of <?php $customers['count']; ?> entries</div>
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



