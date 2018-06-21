


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
			<form  method="POST" class="sidebar-form">
				<div class="input-group">
					<input style="margin:20px; padding:19px;" type="text" name="search" class="form-control" placeholder="School name">
					<span class="input-group-btn">
                <button style="z-index:100" type="submit"  id="search-btn" class="btn btn-flat btn-mploy">
                    <i class=" fa fa-search"></i>
                </button>
              </span>
				</div>
			</form>

			<div style="" class="box-header">
				<div class="box-header">
					<h2 class="box-title">
						<?= $title; ?>
					</h2>
				</div>

				<div style="z-index:100" class="col-md-12">
					<?php if( $message != '' ) { ?>
						<div class="alert alert-success alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<?php echo $message; ?>
						</div>
					<?php } ?>
				</div>
				<div style="opacity:0;"  id="message">
					<?php echo $message; ?>

				</div>

				<div  class="addButton col-md-offset-9 col-md-3">

					<button class="  btn btn-mploy-submit waves-effect waves-light" style="float:right" onclick="window.location.replace('/schools/newschool')"><i class="fa fa-plus"></i>
						<span class="buttonText">Add School</span></button>
				</div>

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
						
						<td><a class="" href="/schools/view/<?php echo $school->org_id;?>"> <i class="fa fa-edit"></i> </a></td>

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
				Showing <?php echo $pagination_start; ?> to <?php echo $pagination_end ; ?> of <?php $schools['count']-1; ?> entries</div>
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



