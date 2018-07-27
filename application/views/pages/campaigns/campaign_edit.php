
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
								<div class="alert alert-danger alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									Please complete the highlighted fields
								</div>
							<?php endif ?>

							<div class="box">

								<div class="box-header with-border">
									<h3 class="box-title">Campaign Details</h3>
								</div>


								<!-- /.box-header -->
								<div class="box-body">
									<form role="form"  method="POST">


										<div class="row">
											<div class="col-md-4">
												<div class="form-group">

													<label class=" ">Campaign Name</label>
													<input type="text" name="campaign_name" class="form-control" value="<?php echo $campaign['campaign_name'];?>"   placeholder="Campaign Name" >

												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">

													<div class="">
														<label >Places to be sourced by MPLOY</label>
														<input type="number" name="students_to_place" class="form-control" value="<?php echo $campaign['students_to_place']?>" placeholder="" autocomplete="off" >
													</div>
												</div>
											</div>
											<!--/span-->
											<div class="col-md-4">
												<div class="form-group">
													<div class="">
														<label >Self Placing Students </label>
														<input type="number" name="self_placing_students" class="form-control" value="<?php echo $campaign['self_placing_students'] ?>" placeholder="" autocomplete="off" >
													</div>
												</div>
											</div><!--end col-->
										</div> <!--end row-->


										<div class="row">

											<div class="col-md-4">
												<div class="form-group">

													<label class=" ">School</label>

													<select class="form-control" name="org_id" id="select_school">
														<?php foreach($schools as $school): ?>
															<option <?php if( $school->id == $org_id ){ echo ' selected ';} ?>value="<?php echo $school->id ?>"><?php echo $school->name;?></option>
														<?php endforeach ?>
													</select>

												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">




													<div class="">
														<label >Placement Start Date</label>
														<input type="text" name="campaign_place_start_date" class="datepicker form-control" value="<?php echo $campaign['campaign_place_start_date'] ?>" placeholder="01/01/2018" autocomplete="off" >
													</div>
												</div>
											</div>
											<!--/span-->
											<div class="col-md-4">
												<div class="form-group">
													<div class="">
														<label >Placement End Date </label>
														<input type="text" name="campaign_place_end_date" class="datepicker form-control" value="<?php echo $campaign['campaign_place_end_date'] ?>" placeholder="01/01/2018" autocomplete="off" >
													</div>
												</div>
											</div><!--end col-->

										</div> <!--end row-->
										<div class="row">

											<div class="col-md-4">
												<div class="form-group">

													<label>Type</label>
													<select class="form-control" name="campaign_type_id" id="select_school" required>
														<option>Select Type</option>
														<?php foreach($types as $t): print_r($t) ?>
															<option <?php if($t->id == $campaign['campaign_type_id']) echo ' selected'?> value="<?php echo $t->id ?>"><?php echo $t->name;?></option>
														<?php endforeach ?>
													</select>

												</div>
											</div>

										</div>


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

															<th style="width:33%;">Holiday</th>
															<th></th>

														</tr>
														</thead>
														<tbody>

														<?php foreach ($holiday as $hol): ?>
															<tr class="school_row">

																<input type="hidden" name="hol_id[]" value="<?php echo $hol['hol_id']?>">
																<td>
																	<input value="<?php echo  $hol['start_date']; ?>" id="1start_date" name="start_date[]" type="text" class=" datepicker form-control">
																</td>
																<td>
																	<input value="<?php echo $hol['end_date']; ?>" id="1end_date" name="end_date[]" type="text" class=" datepicker form-control">
																</td>
																<td>
																	<input value="<?php echo $hol['holiday_name']; ?>"" name="holiday[]" type="text" class="form-control">
																</td>
																<td style="width:33%"> <button type="button" class="btn" style="border:none; background-color: transparent;" onclick="holiday(this,'<?php echo $hol["hol_id"]?>')" > <i class="fa fa-remove" style="font-size:14px;color:red"></i> </button></td>

															</tr>
														<?php endforeach ?>
														<tr  id="last_row" style="background-color:#fff;border-color:#fff">
															<td></td>
															<td></td>
															<td class="pull-right"><button type="button" id="add-row" class="btn btn-mploy white-btn">Add Holiday </button> </td>
														</tr>

														</tbody>
													</table>
												</div>
											</div><!--end col-->
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label >Campaign Start Date </label>
														<input type="text" id="campaign_date" class="datepicker form-control" value="<?php echo $campaign['campaign_start_date'] ?>"  name="campaign_start_date" >
													</div>

												</div>
											</div>

											<div class="row">

												<div class="col-md-4">
													<div class="form-group">
														<label >Mailshot 1 Date</label>
														<input name="mailshot_1_date" value="<?php echo $campaign['mailshot_1_date'] ?>" type="text" class="datepicker form-control" >
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group">
														<label >Mailshot 2 Date</label>
														<input name="mailshot_2_date" value="<?php echo $campaign['mailshot_2_date'] ?>" type="text" class="datepicker form-control" >
													</div>
												</div>

											</div> <!--end row -->

											<div class="row">

												<div class="col-md-4">
													<div class="form-group">
														<label >Employer Engagement Start</label>
														<input name="employer_engagement_start" value="<?php echo $campaign['employer_engagement_start'] ?>" type="text" class="datepicker form-control" >
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group">
														<label >Employer Engagement End</label>
														<input name="employer_engagement_end" type="text" value="<?php echo $campaign['employer_engagement_end'] ?>" class="datepicker form-control pull-right" id="datepicker">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label >Self Place Deadline</label>
														<input name="self_place_deadline" value="<?php echo $campaign['self_place_deadline'] ?>" type="text" class="datepicker form-control" >
													</div>
												</div>
											</div> <!--end row -->

											<div class="row">



												<div class="col-md-4">
													<div class="form-group">
														<label >Matching End</label>
														<input name="matching_end"  value="<?php echo $campaign['matching_end'] ?>" type="text" class="datepicker form-control" >
													</div>
												</div>
												<div class="col-md-4">
													<label style="float:top" >Campaign Status</label>
													<div class="form-group">

															<select name="active" class="form-control">

																<option <?php if($campaign['active'] == 2) echo ' selected' ?> value="2"> Active</option>
																<option <?php if($campaign['active'] == 3) echo ' selected' ?> value="3"> On Hold</option>
																<option <?php if($campaign['active'] == 4) echo ' selected' ?> value="4"> Complete</option>



															</select>



													</div>
												</div>

											</div> <!--end row -->
											<div class="box-header with-border">
												<h3 class="box-title">Add Employers to Campaign </h3>
											</div>





											<div class="row">

												<!-- Modal -->
												<div id="myModal" class="modal fade" role="dialog">
													<div style="width: 60% !important;" class="modal-dialog">

														<!-- Modal content-->
														<div class="modal-content">
															<div class="modal-header">

																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h4 class="modal-title">Add Companies to Campaign</h4>

															</div>
															<div class="modal-body">


																<div class="row">
																	<div class="col-md-6" id="total"> <h1>Showing <?php echo $companies['count']; ?></h1> </div>
																	<div class="selected col-md-6"><h1>Selected <?php echo $companies['count']; ?> companies</h1></div>
																	<div class="col-md-12">

																		<div class="form-group">

																			<div class="input-group">
																				<div class="col-md-3">
																					<input style="margin:20px; padding:19px;" type="text" name="name" class="form-control" placeholder="Company name" id="searchCompanyName" >
																				</div>
																				<div class="col-md-3">
																					<input style="margin:20px; padding:19px;" type="text" name="address1" class="form-control" placeholder="Address" id="searchCompanyAddr" >
																				</div>
																				<div class="col-md-2">
																					<input style="margin:20px; padding:19px;" type="text" name="postcode" class="form-control" placeholder="Postcode" id="searchCompanyPostcode" >
																				</div>
																				<div class="col-md-2">
																					<select style="margin:20px; padding:19px;" name="line_of_business" class="form-control" id="searchCompanyIndustry">
																						<option value="">Select Sector</option>
																						<?php foreach($sector as $s): ?>
																						<option value="<?php echo $s['line_of_business']; ?>"> <?php echo $s['line_of_business'];?> </option>
																						<?php endforeach ?>
																					</select>
																				</div>
																				<span class="input-group-btn">
                            <button style="z-index:100" type="button"  id="search-btn" class="btn btn-flat btn-mploy">
                                <i class=" fa fa-search"></i>
                            </button>
                            <button type="button" class="btn btn-flat btn-mploy" id="clear-selected-companies" style="margin-left: 8px;">Clear</button>

                        </span>
																			</div>

																		</div>
																	</div>
																</div>



																<div class="row">
																	<div class="col-md-12">
																		<div class="col-md-offset-6" >

																			<button type="button" class="btn btn-mploy-submit pull-right" style="margin-left: 8px;" data-dismiss="modal">Save</button>
                                                                            <button  id="check_all" class="btn btn-mploy pull-right" type="button">Select All</button>
																		</div>

																		<div style="display:none" id="loading"> <h2>Please wait loading results..</h2></div>
																		<table class="table table-bordered table-striped" id="companyTable">

																			<thead>
																			<tr>
																				<th></th>
																				<th>Company Name</th>

																				<th>Address</th>
																				<th>Sector</th>
																				<th>Status</th>
																			</tr>
																			</thead>
																			<tbody>
																			<?php foreach($companies['data'] as $company):?>
																			<tr>
																				<td> <input class="comp" type="checkbox" name="campaign_employer_id[]" checked value="<?php echo $company->id; ?>" > </td>
																				<td class="compname"><?php echo $company->name; ?></td>
																				<td><?php echo $company->address1 . ' ' . $company->address2 . ', '. $company->postcode; ?></td>
																				<td><?php echo $company->line_of_business; ?></td>
																				<td><?php echo $company->status; ?></td>
																			</tr>
																			<?php endforeach ?>

																			</tbody>


																		</table>
																	</div>
																</div>




															</div>
															<div class="modal-footer">

															</div>
														</div>

													</div>
												</div>


												<div style="padding-bottom:100px;" id="row">
												<div class="col-md-3">


													<div class="input-group">


								                <button style="z-index:100" type="button"   data-toggle="modal" data-target="#myModal" class="btn btn-flat btn-mploy">
								                    Add Companies to Campaign
								                </button>

													</div>

													</div>
													<div class="col-md-6">
													<div class="selected "><h3>Selected <?php echo $companies['count']; ?> companies</h3></div>
														 <h3> <?php echo $campaign['students_to_place'] * 20; ?> is recommended</h3>
													</div>
												</div>



											</div>

											<div class="row">
												<div class="col-md-12">

												</div>

											</div>


											<div class="row">
												<div class="col-md-4">
													<input type="submit" class="btn btn-mploy-submit" value="Save Changes">
													<input type="button" class="btn btn-mploy-cancel" value="Cancel" onclick="window.location.replace('/campaigns')">
												</div>
											</div>

									</form>
								</div>


						</section>



					</div>

				</div> <!-- end tab content -->



			</div>
		</div>
	</div> <!-- end tab container -->
<input type="hidden" id="counter">
	<?php $this->load->view('templates/footer'); ?>

	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


	<script>
		//check all checkboxes when selecting company
		$("#check_all").click(function(){

			$('.comp').prop('checked', true);

		});

		//populates companies popup box with data
		$("#search-btn").click(function(){
			var target = '/campaigns/getBusiness/<?php echo $campaign['id'] ?>';
			//var start =$('[name="search"]').val();
			var name =$('[name="name"]').val();
			var status =$('[name="status"]').val();
			var line_of_business =$('[name="line_of_business"]').val();
			var address1 =$('[name="address1"]').val();
			var postcode =$('[name="postcode"]').val();
			var seen= [];

			$('.compname').each(function(){

				seen[$(this).text()] = 1

			});

			$('#loading').show();
			$.ajax({
				url: target,
				type: 'POST',
				data: {name:name,status:status,line_of_business:line_of_business,address1:address1,postcode:postcode},

				success: function(data, textStatus, XMLHttpRequest)
				{
					data = JSON.parse(data);
					Object.keys(data).forEach(function(key){
						if( seen[data[key].name] == undefined) {
							var check = '<td> <input class="comp" type="checkbox" name="campaign_employer_id[]" value="' + data[key].id + '" > </td>';
							var name = '<td class="compname">' + data[key].name + '</td>';
							var address = '<td>' + data[key].address1 + ' ' + data[key].address2 + ', ' + data[key].postcode + '</td>';
							var business = '<td>' + data[key].line_of_business + '</td>';
							var status = '<td>' + data[key].status + '</td>';
							var row = $('<tr>').html(check + name + address + business + status);

							$('#companyTable').append(row);
						}

					});
					$('#loading').hide();
				$('#total').html('<h1>'+($('#companyTable tr').length -1)+' Results</h1>')
				}

			});
		});


		// row constructor for add school holiday functions
		function addRow(tbl =''){
			var start_date ='<td><input  type="text" name="start_date[]" value="" class="datepicker'+tbl+' form-control"></td>';
			var end_date ='<td><input  type="text" name="end_date[]" value="" class="datepicker'+tbl+' form-control"></td>';
			var holiday ='<td><input  type="text" name="holiday[]" value="" class="form-control"></td>';
			var del = '<td> <button type="button" class="btn" style="border:none; background-color: transparent;" onclick="holiday(this)" > <i class="fa fa-remove" style="font-size:14px;color:red"></i> </button></td>';

			var row = $('<tr tbl>').html(start_date + end_date + holiday + del );
			return row;
		}
		// listener for school drop down  populates school holidays when option changed
		$('#select_school').change(function(){
			var target= '/campaigns/getSchoolHolidays/'+$('#select_school').val();
			$('.school_row').remove();
			var table = $('#holidays');
			//$('#last_row').before(addRow());
			//table.find('tr:last').prev().before(addRow());

			//table.append(addRow('class="school_row"'));
			$.ajax({
				url: target,
				type: 'GET',
				//data: {match_postcode:start},
				success: function(data, textStatus, XMLHttpRequest)
				{
					data = JSON.parse(data);
					Object.keys(data).forEach(function(key){
						console.log(data[key].hol_id);
						var table = $('#holidays');
						var start_date ='<td><input  type="text" name="start_date[]" value="'+data[key].start_date+'" class="form-control"></td>';
						var end_date ='<td><input  type="text" name="end_date[]" value="'+data[key].end_date+'" class="form-control"></td>';
						var holiday ='<td><input  type="text" name="holiday[]" value="'+data[key].holiday_name+'" class="form-control"></td>';
						var del = '<td> <button type="button" class="btn" style="border:none; background-color: transparent;" onclick="holiday(this,'+data[key].id+')" > <i class="fa fa-remove" style="font-size:14px;color:red"></i> </button></td>';
						var row = $('<tr class="school_row">').html(start_date + end_date + holiday + del);
						$('#last_row').before(row);
						//table.append(row);
					});
				}
			});

		})

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







	</script>

	<script>


	</script>

	<script>



		<?php if (isset($error)): ?>

		$(function(){
			<?php foreach($error as $e): ?>
			$('input[name="<?php echo $e;?>"]').addClass('error-box');
			<?php endforeach ?>
		})
		<?php endif ?>

	</script>




	<script>

		$(function(){



		});

		$(function(){

			$("#calculate").click(function(){
				var target = '/campaigns/calculateDates';
				var start =$('[name="campaign_place_start_date"]').val()
				var end =$('[name="campaign_place_end_date"]').val()
				var campStart= $('[name="campaign_start_date"]').val();
				$.ajax({
					url: target,
					type: 'POST',
					data: {campaign_place_start_date:start, campaign_place_end_date:end,campaign_start_date:campStart},
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
	 <script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>


	<script>


		function holiday(item,id=null){

			if(id==null){

				$(item).closest('tr').remove();

			}
			else {
				var target = '/campaigns/removeholiday';
				$.ajax({
					url: target,
					type: 'POST',
					data: {hol_id: id},
					success: function (data, textStatus, XMLHttpRequest) {
						$(item).closest('tr').remove();
					}
				});
			}
		}

		$('.modal-body').click(function(){
			var i = 0;
			$('.comp').each(function(){
				if($(this).prop("checked")){
					i++;
				}
			})
			$('.selected').html('<h1>Selected '+i+' companies </h1>');

		});


		$('#add-row').click(function(){

			///var num = $('#companyTable tr').length ;
			var num = $('#counter').val()+1;
			$('#counter').val(num);

			$('#last_row').before(addRow(num));

			$(function(){

				$(".datepicker"+num).inputmask({"mask": "99/99/9999", "placeholder":"dd/mm/yyyy"});

			})
			$(function() {$('.datepicker'+num).daterangepicker({opens: 'left',singleDatePicker: true,locale: {
					format: 'DD-MM-YYYY'
				}}).val('')});

		});

		$(function(){


			$(".datepicker").inputmask({"mask": "99/99/9999", "placeholder":"dd/mm/yyyy"});


		})

		$(function(){


			$( "#school" ).autocomplete({source: "http://mploy.local/schools/getSchools/?"});
		})




	</script>
