


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
				<form id="companyFilter" method="POST" class="sidebar-form">
					<div class="input-group">
						<div class="col-md-3">
							<input style="margin:20px; padding:19px;" type="text" name="name" class="form-control" placeholder="Company name" value="<?php if(isset($post_data['name'])) echo $post_data['name']; ?>">
						</div>
						<div class="col-md-3">
							<input style="margin:20px; padding:19px;" type="text" name="town" class="form-control" placeholder="Town" value="<?php if(isset($post_data['town'])) echo $post_data['town']; ?>">
						</div>
						<div class="col-md-2">
							<input style="margin:20px; padding:19px;" type="text" name="postcode" class="form-control" placeholder="Postcode" value="<?php if(isset($post_data['postcode'])) echo $post_data['postcode']; ?>">
						</div>
						<div class="col-md-2">
							<select style="margin:20px;" name="line_of_business" class="form-control" id="searchCompanyIndustry">
								<option value="">Select Sector</option>
								<?php foreach($sector as $s): ?>
									<option value="<?php echo $s['line_of_business']; ?>" <?php if( isset($post_data['line_of_business']) && $post_data['line_of_business'] == $s['line_of_business']) echo 'selected'; ?>> <?php echo $s['line_of_business'];?> </option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="col-md-2">
							<input style="margin:20px; padding:19px;" type="text" name="status" class="form-control" placeholder="Status" value="<?php if(isset($post_data['status'])) echo $post_data['status']; ?>">
						</div>
						<span class="input-group-btn">
                            <button style="z-index:100" type="submit"  id="search-btn" class="btn btn-flat btn-mploy">
                                <i class=" fa fa-search"></i>
                            </button>
                            <button type="button" class="btn btn-flat btn-mploy" id="clear-selected-companies" style="margin-left: 8px;">Clear</button>

                        </span>
					</div>
				</form>
			</div>
			<div class="box-header">
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


				<h2 class="box-title">
					<?= $title; ?>
				</h2>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div  class="addButton col-md-offset-9 col-md-3">

					<button class="  btn btn-mploy-submit waves-effect waves-light" style="float:right" onclick="window.location.replace('/companies/newcompany')"><i class="fa fa-plus"></i>
						<span class="buttonText">Add Company</span></button>
				</div>
				<div class="col-md-12">

				<table id="example2" class="table table-bordered table-striped">
					<thead>
					<tr>
						<?php foreach($headings as $key => $heading):?>
							<th class="sorting"> <form method="get">
									<input type="hidden" name="orderby" value="<?php echo $key ?>">
									<button class="no-button"><?php echo $heading; ?> <i class=" fa fa-sort"></i></button>
								</form> </th>
						<?php endforeach;?>
					<th></th>
					</tr>
					</thead>
					<tbody>
					<?php foreach($companies['data'] as $company): ?>
					<tr>
						<td><?php echo $company->name; ?>, <?php echo $company->town; ?></td>
						
						<td><?php echo $company->postcode; ?></td>
						<td><?php echo $company->phone; ?></td>
						<td><?php echo $company->first_name .' '.$company->last_name ; ?></td>
						<td>
						
							
							<?php echo $company->status;?>

						</td>
						<td><?php echo $company->line_of_business; ?></td>
						<td><a class="" href="/companies/view/<?php echo $company->id;?>"> <i class="fa fa-edit"></i> </a></td>

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
				Showing <?php echo $pagination_start; ?> to <?php echo $pagination_end; ?> of <?php echo $companies['count']; ?> entries</div>
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



