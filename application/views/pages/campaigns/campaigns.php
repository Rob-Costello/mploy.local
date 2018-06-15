


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
			</div>

			<div class="box-header">
				<h2 class="box-title">
					<?= $title; ?>
				</h2>
			</div>
			<!-- /.box-header -->
			
            <div  class="addButton col-md-offset-9 col-md-3">

					<button class="  btn btn-mploy-submit waves-effect waves-light" style="float:right" onclick="window.location.replace('/campaigns/newcampaign')"><i class="fa fa-plus"></i>
						<span class="buttonText">Create Campaign</span></button>
				</div>

            <div class="box-body">
            <?php if(count($campaigns['data'])>0):  ?>

                <table id="example2" class="table table-bordered table-striped">
					<thead>
					<tr>
						<?php foreach($headings as $heading):?>
						<th>
							<form method="get">
								<input type="hidden" name="orderby" value="<?php echo $heading ?>">
								<button class="no-button"><?php echo ucwords(str_replace('_','  ',$heading)); ?> <i class=" fa fa-sort"></i></button>
							</form>

							 </th>
						<?php endforeach;?>
					<th></th>
					</tr>
					</thead>
					<tbody>
					<?php foreach($campaigns['data'] as $company): ?>
                    <tr>    
                    <?php foreach($headings as $h): ?>
                   
						<td>
                            <?php if($h == 'campaign_place_start_date' || $h == 'campaign_place_end_date') { ?>
                                <?php echo date('d/m/Y', strtotime($company->$h)); ?>
                            <?php } else { ?>
                                <?php echo $company->$h; ?>
                            <?php } ?>
						</td>
						<?php endforeach ?>
                        <td><a class="" href="/campaigns/employers/<?php echo $company->campaign_id; ?>/0"> <i class="fa fa-play"></i> </a></td>
						<td><a class="" href="/campaigns/edit/<?php echo $company->campaign_id; ?>/0"> <i class="fa fa-edit"></i> </a></td>
					</tr>
					<?php endforeach ?>
					</tbody>

				</table>
                <?php else:  ?>
                <div><h1>No Active Campaigns</h1></div>
                <?php endif ?>

            </div>
			<!-- /.box-body -->


		</div>
		<!-- /.box -->
		<div class="box-footer clearfix">
			<div class="dataTables_info" id="example23_info" role="status" aria-live="polite">
				Showing <?php echo $pagination_start; ?> to <?php echo $pagination_end; ?> of <?php $campaigns['count']; ?> entries</div>
			<div class="dataTables_paginate paging_simple_numbers">
				<?php echo $pagination; ?>
			</div>

		</div>

</div>

	</section>

</div>





<?php $this->load->view('templates/footer'); ?>







