
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="<?php echo base_url()."assets/";?>bower_components/jquery/dist/jquery.min.js"></script>

<script>
	//$.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url()."assets/";?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url()."assets/";?>bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url()."assets/";?>bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url()."assets/";?>bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url()."assets/";?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url()."assets/";?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url()."assets/";?>bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url()."assets/";?>bower_components/moment/min/moment.min.js"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url()."assets/";?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url()."assets/";?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url()."assets/";?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()."assets/";?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url()."assets/";?>dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url()."assets/";?>dist/js/demo.js"></script>

<!-- fullCalendar -->
<script src="<?php echo base_url()."assets/";?>bower_components/moment/moment.js"></script>
<script src="<?php echo base_url()."assets/";?>bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
<!-- Date picker -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>


<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<script>
    //script for campaign nav bar
	function campaigns(id)
    {
        var target = '/campaigns/findCampaigns';
        var data =id;
        var camp='';
        <?php if (isset($campaign_dropdown)): ?>
	    var camp = <?php echo $campaign_dropdown; ?>
	    <?php endif ?>

        $.ajax({
            url: target,
            type: 'POST',
            data: {school:data, camp:camp},
            success: function(data, textStatus, XMLHttpRequest)
            {
                $('#campaign-dropdown').html(data);

            }
        });
    }


    $(function(){
            campaigns($('#school-dropdown').val());

    });
    $(function(){
        $('#school-dropdown').change(function(){
            campaigns($('#school-dropdown').val());
        });
    });
	$(function(){
		$('#campaign-dropdown').change(function(){

			window.location.replace('/campaigns/employers/'+$(this).val()+'/0');
		});
	});




	$(function(){
	    $('#campaign-dropdown').change(function(){

		    window.location.replace('/campaigns/employers/'+$(this).val()+'/0');
	    });
    });


	$(document).ready(function()
    {
        $('#reset-form').on('click', function()
        {
            $(this).closest('form').trigger("reset");
        });

        $('#clear-form').on('click', function()
        {
            $(this).closest('form').find('input:text, input:password, select, textarea').val('');
            $(this).closest('form').find('input:radio, input:checkbox').prop('checked', false);
        });
        $('#clear-selected-companies').on('click', function()
        {
            $('#searchCompanyName').val('');
            $('#searchCompanyAddr').val('');
            $('#searchCompanyPostcode').val('');
            $('#searchCompanyIndustry').val('');
            $('#searchCompanyStatus').val('');
        });
    });


    <?php if (isset($campaign_dropdown)):?>

    $(function(){

	    //$('#campaign-dropdown option[value="<?php echo $campaign_dropdown ?>"]').attr('selected','selected');;
	    ////$('#campaign-dropdown').val(<?php echo $campaign_dropdown ?>);
	    $('#campaign-dropdown').val(<?php echo $campaign_dropdown ?>);
	    $('#campaign-dropdown').text(<?php echo $campaign_dropdown ?>);
        $('#edit').html('<a href="/campaigns/edit/<?php echo $campaign_dropdown ?>/0"><i class="fa fa-edit fa-2x"</a>');
    });
    <?php endif ?>
</script>
<script>

    function appendParmaterURL( paramName, paramValue)
    {

        url = window.location.href;

        if (paramValue == null) {
            paramValue = '';
        }
        var pattern = new RegExp('\\b('+paramName+'=).*?(&|$)');
        if (url.search(pattern)>=0) {
            return url.replace(pattern,'$1' + paramValue + '$2');
        }
        url = url.replace(/\?$/,'');
        return url + (url.indexOf('?')>0 ? '&' : '?') + paramName + '=' + paramValue;
    }

</script>

</body>
</html>
