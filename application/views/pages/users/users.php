


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


            <?php if ($password_message !=''): ?>
<div id="message">
    <div class="col-md-12">
        <?php if( $password_message != '' ) { ?>
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $password_message; ?>
            </div>
        <?php } ?>
    </div>



</div>
<?php endif; ?>

			<div style="" class="box-header">

					<div class="box-header">
						<h2 class="box-title">
							<?= $title; ?>
						</h2>

					</div>

				<div  class="addButton col-md-offset-9 col-md-3">

					<button class="  btn btn-mploy-submit waves-effect waves-light" style="float:right" onclick="window.location.replace('/users/register')"><i class="fa fa-plus"></i>
						<span class="buttonText">Add User</span></button>
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
					<?php foreach($users['data'] as $school): ?>
						<tr>
							<td><?php echo $school->first_name; ?></td>
							<td><?php echo $school->email;?></td>
							<td><?php echo $school->username; ?></td>
							<td><?php echo $school->phone; ?></td>
							<td><?php echo $school->company; ?></td>

							<td><a class="" href="/users/edit/<?php echo $school->id;?>"> <i class="fa fa-edit"></i> </a></td>

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
				Showing <?php echo $pagination_start; ?> to <?php echo $pagination_end; ?> of <?php $users['count']; ?> entries</div>
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
		if($("#message").length){

			$.ajax({
            type: 'post',
			url:'users/message';
           
            data: {remove:'true'},
            success: function (data) {
              alert('done');
            }
          });

		}

	})
</script>