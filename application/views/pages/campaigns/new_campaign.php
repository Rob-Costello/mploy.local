
<?php $this->load->view('templates/header'); ?>


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
                                    <h3 class="box-title">Contact Details</h3>
                                </div>


                                <!-- /.box-header -->
                                <div class="box-body">
                                    <form role="form"  method="POST">



                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">

                                                    <label class=" ">Campaign Name</label>
                                                    <input  type="text" name="campaign_name" class="form-control" value="<?php if(array_key_exists('campaign_name',$values)) echo $values['campaign_name'] ?> " placeholder="Campaign Name" >

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">

                                                    <div class="">
                                                        <label >Students to Place</label>
                                                        <input type="number" name="students_to_place" value="<?php if(array_key_exists('students_to_place',$values)) echo $values['students_to_place'] ?> "  class="form-control" value="" placeholder="" autocomplete="off" >
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="">
                                                        <label >Self Placing Students </label>
                                                        <input type="number" name="self_placing_students"  value="<?php if(array_key_exists('self_placing_students',$values)) echo $values['self_placing_students'] ?> " class="form-control" value="" placeholder="" autocomplete="off" >
                                                    </div>
                                                </div>
                                            </div><!--end col-->
                                        </div> <!--end row-->


                                        <div class="row">
                                           
                                            <div class="col-md-4">
                                                <div class="form-group">

                                                    <label class=" ">School</label>
                                                    <select class="form-control" name="select_school" id="select_school">
														<option>Select School</option>
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

	                                                    <div class="input-group">
		                                                    <div class="input-group-addon">
			                                                    <i class="fa fa-calendar"></i>
		                                                    </div>



		                                                    <input type="text" name="campaign_place_start_date" value="<?php if(array_key_exists('campaign_place_start_date',$values)) echo $values['campaign_place_start_date'] ?> " class="datepicker form-control" value="" placeholder="dd/mm/yyyy" autocomplete="off" >
	                                                    </div>
	                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="">
                                                        <label >Placement End Date </label>

	                                                    <div class="input-group">
		                                                    <div class="input-group-addon">
			                                                    <i class="fa fa-calendar"></i>
		                                                    </div>


		                                                    <input type="text" name="campaign_place_end_date" value="<?php if(array_key_exists('campaign_place_start_date',$values)) echo $values['campaign_place_start_date'] ?> " class="datepicker form-control" value="" placeholder="dd/mm/yyyy" autocomplete="off" >
	                                                    </div>
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
                                                    <tr id="last_row" style="background-color:#fff;border-color:#fff">
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

	                                                <div class="input-group">
		                                                <div class="input-group-addon">
			                                                <i class="fa fa-calendar"></i>
		                                                </div>


		                                                <input type="text" value="<?php echo date('d/m/Y'); ?>" class=" form-control" id="campaign_date" placeholder="dd/mm/yyyy" name="campaign_start_date" >
                                                </div>
                                                </div>

                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                        
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label >Mailshot 1 Date</label>
	                                                <div class="input-group">
		                                                <div class="input-group-addon">
			                                                <i class="fa fa-calendar"></i>
		                                                </div>


		                                                <input name="mailshot_1_date" placeholder="dd/mm/yyyy" type="text" value="<?php if(array_key_exists('mailshot_1_date',$values)) echo $values['mailshot_1_date'] ?> " class="datepicker form-control" >
	                                                </div>
	                                                </div>
                                            </div>
                                            
                                            <div class="col-md-4">   
                                                    <div class="form-group">
                                                    <label >Mailshot 2 Date</label>
	                                                    <div class="input-group">
		                                                    <div class="input-group-addon">
			                                                    <i class="fa fa-calendar"></i>
		                                                    </div>


		                                                    <input name="mailshot_2_date" placeholder="dd/mm/yyyy"value="<?php if(array_key_exists('mailshot_2_date',$values)) echo $values['mailshot_2_date'] ?> " type="text" class="datepicker form-control" >
	                                                    </div>
	                                                    </div>
                                            </div>
                                            
                                        </div> <!--end row -->

                                        <div class="row">
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label >Employer Engagement Start</label>
	                                            <div class="input-group">
		                                            <div class="input-group-addon">
			                                            <i class="fa fa-calendar"></i>
		                                            </div>


		                                            <input name="employer_engagement_start" placeholder="dd/mm/yyyy" value="<?php if(array_key_exists('employer_engagement_start',$values)) echo $values['employer_engagement_start'] ?> " type="text" class="datepicker form-control" >
	                                            </div>
	                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">   
                                                <div class="form-group">
                                                <label >Employer Engagement End</label>
	                                                <div class="input-group">
		                                                <div class="input-group-addon">
			                                                <i class="fa fa-calendar"></i>
		                                                </div>


		                                                <input name="employer_engagement_end" placeholder="dd/mm/yyyy" type="text" value="<?php if(array_key_exists('employer_engagement_end',$values)) echo $values['employer_engagement_end'] ?> " class="datepicker form-control pull-right" id="datepicker">
	                                                </div>
	                                                </div>
                                        </div>
                                        <div class="col-md-4">   
                                                <div class="form-group">
                                                <label >Self Place Deadline</label>
	                                                <div class="input-group">
		                                                <div class="input-group-addon">
			                                                <i class="fa fa-calendar"></i>
		                                                </div>


		                                                <input name="self_place_deadline" placeholder="dd/mm/yyyy" value="<?php if(array_key_exists('self_place_deadline',$values)) echo $values['self_place_deadline'] ?> " type="text"  class="datepicker form-control" >
	                                                </div>
	                                                </div>
                                        </div>
                                    </div> <!--end row -->

                                    <div class="row">
                                        <div class="col-md-4">   
                                                <div class="form-group">
                                                <label >Matching End</label>
	                                                <div class="input-group">
		                                                <div class="input-group-addon">
			                                                <i class="fa fa-calendar"></i>
		                                                </div>


		                                                <input placeholder="dd/mm/yyyy" value="<?php if(array_key_exists('matching_end',$values)) echo $values['matching_end'] ?> " name="matching_end" type="text" class="datepicker form-control" >
	                                                </div>
	                                                </div>
                                        </div>
                                        
                                    </div> <!--end row -->


	                                        <div class="box-header with-border">
		                                        <h3 class="box-title">Add Employers to Campaign </h3>

	                                        </div>

	                                        <div class="row">


		                                        <!-- Modal -->
		                                        <div id="myModal" class="modal fade" role="dialog">
			                                        <div class="modal-dialog">

				                                        <!-- Modal content-->
				                                        <div class="modal-content">
					                                        <div class="modal-header">

						                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
						                                        <h4 class="modal-title">Add Companies to Campaign</h4>

					                                        </div>
					                                        <div class="modal-body">


							                                        <div class="row">
								                                        <div class="col-md-12">
									                                        <div class="form-group">


									                                        </div>
								                                        </div>
							                                        </div>



							                                        <div class="row">
								                                        <div class="col-md-12">
								                                        <div class="col-md-offset-8" ><button  id="check_all" class="btn btn-mploy" type="button">Select All</button>
									                                        <button type="button" class="btn btn-mploy-submit" data-dismiss="modal">Save</button>
								                                        </div>

									                                        <div id="loading"> <h2>Please wait loading results..</h2></div>
									                                        <table class="table table-bordered table-striped" id="companyTable">

									                                        <thead>
									                                        <tr>
										                                        <th></th>
										                                        <th>Company Name</th>

										                                        <th>Address</th>

								                                        </table>
								                                        </div>
							                                        </div>




					                                        </div>
					                                        <div class="modal-footer">
						                                        <button  class="btn btn-mploy" >Add Entry</button>
						                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                </div>
                            </div>

                    </div>
                </div>




		                                        <div class="col-md-6">

				                                       <div class="input-group">

					                                       <input style="margin:20px; padding:19px;" type="text" name="search" class="form-control" placeholder="Employer postcode">
					                                       <span class="input-group-btn">
								                <button style="z-index:100" type="button"  id="search-btn" data-toggle="modal" data-target="#myModal" class="btn btn-flat btn-mploy">
								                    <i class=" fa fa-search"></i>
								                </button>
                                                </span>
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
	<script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>


	<script>
		//check all checkboxes when selecting company
		$("#check_all").click(function(){

			$('.comp').prop('checked', true);

		});

		//populates companies popup box with data
		$("#search-btn").click(function(){
			var target = '/campaigns/getBusiness';
			var start =$('[name="search"]').val();


			$.ajax({
				url: target,
				type: 'POST',
				data: {match_postcode:start},
				success: function(data, textStatus, XMLHttpRequest)
				{
					data = JSON.parse(data);
					Object.keys(data).forEach(function(key){
						console.log( data[key].name);
						var check = '<td> <input class="comp" type="checkbox" name="campaign_employer_id[]" value="'+data[key].comp_id+'" > </td>';
						var name = '<td>'+ data[key].name+' </td>';
						var address = '<td>'+ data[key].address1 + ' ' + data[key].address2 + ', '+ data[key].postcode + '</td>';
						var row = $('<tr>').html(check + name + address);
						$('#companyTable').append(row);
					});
					$('#loading').hide();
				}

			});
		});


		// row constructor for add school holiday functions
		function addRow(tbl =''){
			var start_date ='<td><input  type="text" name="start_date[]" value="" class="datepicker2 form-control"></td>';
			var end_date ='<td><input  type="text" name="end_date[]" value="" class="datepicker2 form-control"></td>';
			var holiday ='<td><input  type="text" name="holiday[]" value="" class="form-control"></td>';
			var row = $('<tr tbl>').html(start_date + end_date + holiday );
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
						console.log( data[key].name);
						var table = $('#holidays');
						var start_date ='<td><input  type="text" name="start_date[]" value="'+data[key].start_date+'" class="form-control"></td>';
						var end_date ='<td><input  type="text" name="end_date[]" value="'+data[key].end_date+'" class="form-control"></td>';
						var holiday ='<td><input  type="text" name="holiday[]" value="'+data[key].holiday_name+'" class="form-control"></td>';
						var row = $('<tr class="school_row">').html(start_date + end_date + holiday);
						$('#last_row').before(row);
						//table.append(row);
					});
				}
			});

		})



		$('#add-row').click(function(){
			$('#last_row').before(addRow());
			$(function() {$('.datepicker2').daterangepicker({opens: 'left',singleDatePicker: true,locale: {
					format: 'DD-MM-YYYY'
				}})});
		});


	</script>

	<script>
		$(function(){
			$('#active').change(function(){

				if(this.checked){
					$('#active').val('1')
				}else{
					$('#active').val('0');
				}
			})
		})

	</script>

	<script>
		/*
		$(function(){

	$('.daterangepicker').each(function(index,e){
		var $(e).val() = $(e);
		console.log(current);
		var d = current.split('-');
		var output = d[2]+'-'+d[1]+'-'+d[0];

		$(e).val(output);
		console.log(output);
	});


});




		//append holidays to holiday table


		//date range plugin

		//$(function() {



		$('#campaign_date').daterangepicker({
			opens: 'left',
			singleDatePicker: true,
			setDate:'',

			locale: {
				format: 'DD-MM-YYYY'
			}
		})



		$('.datepicker').daterangepicker({
			opens: 'left',
			singleDatePicker: true,
			setDate:'',

			locale: {
				format: 'DD-MM-YYYY'
			}

		});

		$('.datepicker2').daterangepicker({
			opens: 'left',
			singleDatePicker: true,
			setDate:'',

			locale: {
				format: 'DD-MM-YYYY'
			}

		});
		//});

		//remove prepopulated dates in date picker
		/*$(function(){
			$('.datepicker').val('');

		})*/


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

			$("#calculate").click(function(){
				var target = '/campaigns/calculateDates';
				var start =$('[name="campaign_place_start_date"]').val()
				var end =$('[name="campaign_place_end_date"]').val()
				var campStart= $('[name="campaign_start_date"]').val();
				//alert($('[name="campaign_place_start_date"]').val());
				//var start =$('#campaign_place_start_date').val();
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


	<script>


		$(function(){


			$(".datepicker").inputmask({"mask": "99/99/9999", "placeholder":"dd/mm/yyyy"});


		})


		$(function(){


			$( "#school" ).autocomplete({source: "http://mploy.local/schools/getSchools/?"});
		})
	</script>

