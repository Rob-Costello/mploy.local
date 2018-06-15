

<?php $this->load->view('templates/campaign_header'); ?>


<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h3>


		</h3>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">School Details</li>
		</ol>
		<?php //$this->load->view('/templates/components/notification') ?>
	</section>

	<div class="container-fluid ">
		<div class=" ">
			<div id="exTab1" class="">


				<div class="tab-content clearfix">


					<div class="tab-pane active" id="1a">


						<section class="">

							<!-- Main content School Details-->
							<!--- Schools contacts -->

							<?php if (isset($error)): ?>
								<div class=""
								<h4>Please complete the highlighted fields</h4>
							<?php endif ?>

							<div class="box">

								<div class="box-header with-border">
									<h3 class="box-title">Contact Details</h3>
								</div>


								<!-- /.box-header -->
								<div class="box-body">
									<form role="form"  method="POST">


										<div class="row">
											<div class="col-md-4">
												<div class="form-group">

													<label class=" ">Campaign Name</label>
													<input type="text" name="campaign_name" class="form-control" value="<?php echo $entries['campaign_name'];?>"   placeholder="Campaign Name" >

												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">

													<div class="">
														<label >Students to Place</label>
														<input type="number" name="students_to_place" class="form-control" value="<?php echo $entries['students_to_place']?>" placeholder="" autocomplete="off" >
													</div>
												</div>
											</div>
											<!--/span-->
											<div class="col-md-4">
												<div class="form-group">
													<div class="">
														<label >Self Placing Students </label>
														<input type="number" name="self_placing_students" class="form-control" value="<?php echo $entries['self_placing_students'] ?>" placeholder="" autocomplete="off" >
													</div>
												</div>
											</div><!--end col-->
										</div> <!--end row-->


										<div class="row">

											<div class="col-md-4">
												<div class="form-group">

													<label class=" ">School</label>
													<select class="form-control" name="select_school">
														<?php foreach($dropdown as $d): ?>
															<option value="<?php echo $d->school_id ?>"><?php echo $d->name;?></option>
														<?php endforeach ?>
													</select>

												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">

													<div class="">
														<label >Placement Start Date</label>
														<input type="text" name="campaign_place_start_date" class="datepicker form-control" value="<?php echo $entries['campaign_place_start_date'] ?>" placeholder="01/01/2018" autocomplete="off" >
													</div>
												</div>
											</div>
											<!--/span-->
											<div class="col-md-4">
												<div class="form-group">
													<div class="">
														<label >Placement End Date </label>
														<input type="text" name="campaign_place_end_date" class="datepicker form-control" value="<?php echo $entries['campaign_place_end_date'] ?>" placeholder="01/01/2018" autocomplete="off" >
													</div>
												</div>
											</div><!--end col-->

										</div> <!--end row-->


										<div class="row">

											<div class="col-md-4">
												<div class="form-group">
													<div style="padding-top:40px;" >
														<button id="calculate" type="button" class="btn btn-mploy"> Calculate Dates </button>
													</div  >
												</div>
											</div><!--end col-->

											<div class="col-md-8">
												<h4>School Holidays</h4>
												<div id="holidaysContainer">

													<table  id="holidays" class="table table-bordered table-striped">
														<thead>
														<tr>
															<th>Start</th>
															<th>End</th>

															<th>Holiday</th>

														</tr>
														</thead>
														<tbody>
														<tr>
															<td>
																<input id="1start_date" name="start_date[]" type="text" class="datepicker form-control">
															</td>
															<td>
																<input id="1end_date" name="end_date[]" type="text" class="datepicker form-control">
															</td>
															<td>
																<input name="holiday[]" type="text" class="form-control">
															</td>

														</tr>
														<tr style="background-color:#fff;border-color:#fff">
															<td></td>
															<td></td>
															<td><button type="button" id="add-row" class="btn btn-mploy white-btn">Add Holiday </button> </td>
														</tr>

														</tbody>
													</table>
												</div>
											</div><!--end col-->
											<div class="row">
												.                                        <div class="col-md-4">
													<div class="form-group">
														<label >Campaign Start Date </label>
														<input type="text" class="datepicker form-control" value="<?php echo $entries['campaign_start_date'] ?>"  name="campaign_start_date" >
													</div>

												</div>
											</div>

											<div class="row">

												<div class="col-md-4">
													<div class="form-group">
														<label >Mailshot 1 Date</label>
														<input name="mailshot_1_date" value="<?php echo $entries['mailshot_1_date'] ?>" type="text" class="datepicker form-control" >
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group">
														<label >Mailshot 2 Date</label>
														<input name="mailshot_2_date" value="<?php echo $entries['mailshot_2_date'] ?>" type="text" class="datepicker form-control" >
													</div>
												</div>

											</div> <!--end row -->

											<div class="row">

												<div class="col-md-4">
													<div class="form-group">
														<label >Employer Engagement Start</label>
														<input name="employer_engagement_start" value="<?php echo $entries['employer_engagement_start'] ?>" type="text" class="datepicker form-control" >
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group">
														<label >Employer Engagement End</label>
														<input name="employer_engagement_end" type="text" value="<?php echo $entries['employer_engagement_end'] ?>" class="datepicker form-control pull-right" id="datepicker">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label >Self Place Deadline</label>
														<input name="self_place_deadline" value="<?php echo $entries['self_place_deadline'] ?>" type="text" class="datepicker form-control" >
													</div>
												</div>
											</div> <!--end row -->

											<div class="row">

												<div class="col-md-4">
													<div class="form-group">
														<label >Matching Start</label>
														<input name="matching_start" value="<?php echo $entries['matching_start'] ?>" type="text" class="datepicker form-control" >
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group">
														<label >Matching End</label>
														<input name="matching_end"  value="<?php echo $entries['matching_end'] ?>" type="text" class="datepicker form-control" >
													</div>
												</div>

											</div> <!--end row -->






											<div class="row">
												<div class="col-md-4">
													<input type="submit" class="btn btn-mploy-submit" value="Save Changes">
													<input type="button" class="btn btn-mploy-cancel" value="Cancel" onclick="window.location.replace('/campaigns')">
												</div>
											</div>
											<input type="hidden" name="active" value="1">
									</form>
								</div>


						</section>



					</div>

				</div> <!-- end tab content -->



			</div>
		</div>
	</div> <!-- end tab container -->

	<?php $this->load->view('templates/footer'); ?>

	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

	<script>


		$('#add-row').click(function(){
			var rows = $('#holidays tbody tr').length;
			var table = $('#holidays');
			var start_date ='<td><input id ="'+rows+'start_date" type="text" name="start_date[]" value="" class="datepicker form-control"></td>';
			var end_date ='<td><input id ="'+rows+'end_date" type="text" name="end_date[]" value="" class="datepicker form-control"></td>';
			var holiday ='<td><input id ="'+rows+'holiday" type="text" name="holiday[]" value="" class="form-control"></td>';

			var row = $('<tr>').html(start_date + end_date + holiday );
			table.find('tr:last').prev().after(row);

			$(function() {$('.datepicker').daterangepicker({opens: 'left',singleDatePicker: true,});});
		});


	</script>



	<script>

		//check for errors in form
		<?php if (isset($error)): ?>

		$(function(){
			<?php foreach($error as $e): ?>
			$('input[name="<?php echo $e;?>"]').addClass('error-box');
			<?php endforeach ?>
		})
		<?php endif ?>

		//append holidays to holiday table


		//date range plugin

		$(function() {
			$('.datepicker').daterangepicker({
				opens: 'left',
				singleDatePicker: true,
				defaultViewDate: null,

				locale: {
					format: 'DD-MM-YYYY'
				}
			});
		});

		//remove prepopulated dates in date picker





	</script>


	<script>
		$(function(){

			$("#calculate").click(function(){
				var target = '/campaigns/calculateDates';
				var start =$('[name="campaign_place_start_date"]').val()
				var end =$('[name="campaign_place_end_date"]').val()
				//alert($('[name="campaign_place_start_date"]').val());
				//var start =$('#campaign_place_start_date').val();
				$.ajax({
					url: target,
					type: 'POST',
					data: {campaign_place_start_date:start, campaign_place_end_date:end},
					success: function(data, textStatus, XMLHttpRequest)
					{
						data = JSON.parse(data);
						Object.keys(data).forEach(function(key){
							console.log(key + '=' + data[key]);
							$('[name="'+key+'"]').val(data[key]);
						});
					}
				});
			});
		})

	</script>


	<script>
		$(function(){


			$( "#school" ).autocomplete({source: "http://mploy.local/schools/getSchools/?"});
		})
	</script>
