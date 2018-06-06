


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
        <div class="col-md-offset-6 col-md-6">
        <form  method="POST" class="sidebar-form">
        <div class="input-group">
          <input style="margin:20px; padding:19px;" type="text" name="search" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button style="z-index:100" type="submit" name="search" id="search-btn" class="btn btn-flat btn-mploy">
                    <i class=" fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
        </div>
        <div class="box-header"></div>
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
						<th><?php echo $heading; ?> </th>
						<?php endforeach;?>
					<th></th>
					</tr>
					</thead>
					<tbody>
					<?php foreach($campaigns['data'] as $company): ?>
                    <tr>    
                    <?php foreach($headings as $h): ?>
                   
						<td>
                            <?php echo $company->$h; ?>
						</td>
						<?php endforeach ?>
                        <td><a class="" href="/campaigns/employers/<?php echo $company->campaign_id; ?>"> <i class="fa fa-edit"></i> </a></td>
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

<button onclick="getServerTime()">

	test
</button>



<?php $this->load->view('templates/footer'); ?>


<script>

	function getServerTime()
	{
		// Target url
		var target = '/campaigns/findCampaigns';
		var data = 1;

		$.ajax({
			url: target,
			type: 'POST',
			data: data,
			success: function(data, textStatus, XMLHttpRequest)
			{
				return data;

			},
			error: function(XMLHttpRequest, textStatus, errorThrown)
			{
				return 'error';

			}
		});
	}

	$(function(){
		$('#school-dropdown').change(function(){
			var values = getServerTime();
			alert(values);
		});

	});

</script>




