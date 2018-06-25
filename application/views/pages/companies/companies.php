


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
			<div class="box-header"></div>
			<div class="box-header">
				<h2 class="box-title">
					<?= $title; ?>
				</h2>
			</div>
			<!-- /.box-header -->
			<div class="box-body">

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
                            <select style="margin:20px; padding:19px;" name="industry_id" class="form-control">
                                <option value="">Select Sector</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <input style="margin:20px; padding:19px;" type="text" name="status" class="form-control" placeholder="Status" value="<?php if(isset($post_data['status'])) echo $post_data['status']; ?>">
                        </div>
                        <span class="input-group-btn">
                            <button style="z-index:100" type="submit"  id="search-btn" class="btn btn-flat btn-mploy">
                                <i class=" fa fa-search"></i>
                            </button>
                            <button class="btn btn-flat btn-mploy" id="clear-form">Clear</button>

                        </span>
                    </div>
                </form>
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
						
						<td><?php echo $company->phone; ?></td>
						<td><?php echo $company->first_name .' '.$company->last_name ; ?></td>
						<td>
						
							
							<?php echo $company->status;?>

						</td>
						<td><a class="" href="/companies/view/<?php echo $company->org_id;?>"> <i class="fa fa-edit"></i> </a></td>

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
				Showing <?php echo $pagination_start; ?> to <?php echo $pagination_end; ?> of <?php $companies['count']; ?> entries</div>
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



