


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
		<!-- Trigger the modal with a button -->






        <div class="box">
			<div class="col-md-12">

				<h1 class="text-center"><?php echo $school_name; ?></h1>

			</div>
            <?php if($org_id !== null) { ?>
			    <button style="margin-top:10px; margin-left:10px" type="button" class=" btn btn-mploy-submit waves-effect waves-light" data-toggle="modal" data-target="#myModal">New Calendar Entry</button>
            <?php } ?>
			<!-- Modal -->
			<div id="myModal" class="modal fade" role="dialog">
				<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">New Calendar Entry</h4>
						</div>
						<div class="modal-body">

							<form method="post"  >
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label >Appointment Title</label>
											<input type="text" name="title" class="form-control" value="" placeholder="New Calendar Entry" autocomplete="off" >
										</div>
									</div>
								</div>



								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label >Start Date</label>
											<input type="text" name="start" class="form-control datepicker " value="" placeholder="dd/mm/yyyy" autocomplete="off" >

										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label >End Date</label>
											<input type="text" name="end" class="form-control datepicker " value="" placeholder="dd/mm/yyyy" autocomplete="off" >

										</div>
									</div>
								</div>




						</div>
						<div class="modal-footer">
							<button  class="btn btn-mploy" >Add Entry</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</form>
						</div>
					</div>

				</div>
			</div>
            <section class="content">
                <div class="row">

                    <!-- /.col -->
                    <div class="col-md-12">
                        <div class="box box-primary">
                            <div class="box-body no-padding">
                                <!-- THE CALENDAR -->
                                <div id="calendar"></div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /. box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>


            </div>
            <!-- /.box-body -->


        </div>
        <!-- /.box -->
        <div class="box-footer clearfix">


        </div>

</div>

</section>

</div>















<?php $this->load->view('templates/footer'); ?>
   <script>


    $(function () {

        /* initialize the external events
         -----------------------------------------------------------------*/
        function init_events(ele) {
            ele.each(function () {
                var eventObject = {
                    title: $.trim($(this).text()) // use the element's text as the event title
                }
                $(this).data('eventObject', eventObject)
                $(this).draggable({
                    zIndex        : 1070,
                    revert        : true, // will cause the event to go back to its
                    revertDuration: 0  //  original position after the drag
                })
            })
        }

        init_events($('#external-events div.external-event'))

        /* initialize the calendar
         -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)
        var date = new Date()
        var d    = date.getDate(),
            m    = date.getMonth(),
            y    = date.getFullYear()
        $('#calendar').fullCalendar({
            header    : {
                left  : 'prev,next today',
                center: 'title',
                right : 'month,agendaWeek,agendaDay'
            },
            buttonText: {
                today: 'today',
                month: 'month',
                week : 'week',
                day  : 'day'
            },

            //Random default events
            events    : [

				<?php echo $entries; ?>

            ],
            editable  : true,
            droppable : true, // this allows things to be dropped onto the calendar !!!
            drop      : function (date, allDay) { // this function is called when something is dropped


            	// retrieve the dropped element's stored Event Object
                var originalEventObject = $(this).data('eventObject')

                // we need to copy it, so that multiple events don't have a reference to the same object
                var copiedEventObject = $.extend({}, originalEventObject)

                // assign it the date that was reported
	            copiedEventObject.id           = response.idEvent
	            copiedEventObject.start           = date
                copiedEventObject.allDay          = allDay
                copiedEventObject.backgroundColor = $(this).css('background-color')
                copiedEventObject.borderColor     = $(this).css('border-color')

                // render the event on the calendar
                // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)

                // is the "remove after drop" checkbox checked?
                if ($('#drop-remove').is(':checked')) {
                    // if so, remove the element from the "Draggable Events" list
                    $(this).remove()
                }
            },

	        eventDrop: function(event, delta, revertFunc) {
		        var target = '/campaigns/updateCalendar';
            	var id = event.id;
            	var update = id.split("-");
				var start = event.start.format();
				if(event.end ==null) {
					var end = event.start.format();
				}
				else{
					var end = event.end.format();
				}

				$.ajax({
			        url: target,
			        type: 'POST',
			        data: {start:start, end:end, id:update[1], type:update[0], title:event.title},
			        success: function(data, textStatus, XMLHttpRequest)
			        {
				        data = JSON.parse(data);
				        Object.keys(data).forEach(function(key){
					        console.log(key + '=' + data[key]);
					        $('[name="'+key+'"]').val(data[key]);
				        });
			        }
		        });

            	//alert(update[0]);
		        //alert(event.title + " was dropped on " + event.start.format());
		        //alert(event.id + " was dropped on " + event.start.format());

		        /*if (!confirm("Are you sure about this change?")) {
			        revertFunc();
		        }*/

	        },
            displayEventTime: false


        })

        /* ADDING EVENTS */
        var currColor = '#3c8dbc' //Red by default
        //Color chooser button
        var colorChooser = $('#color-chooser-btn')
        $('#color-chooser > li > a').click(function (e) {
            e.preventDefault()
            //Save color
            currColor = $(this).css('color')
            //Add color effect to button
            $('#add-new-event').css({ 'background-color': currColor, 'border-color': currColor })
        })
        $('#add-new-event').click(function (e) {
            e.preventDefault()
            //Get value and make sure it is not null
            var val = $('#new-event').val()
            if (val.length == 0) {
                return
            }

            //Create events
            var event = $('<div />')
            event.css({
                'background-color': currColor,
                'border-color'    : currColor,
                'color'           : '#fff'
            }).addClass('external-event')
            event.html(val)
            $('#external-events').prepend(event)

            //Add draggable funtionality
            init_events(event)

            //Remove event from text input
            $('#new-event').val('')
        })
    })
</script>

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
	$(function(){
		$('.datepicker').val('');

	})




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

</body>
</html>
