<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mploy CRM</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->

	<link rel="stylesheet" href="<?php echo base_url()."assets/";?>bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/";?>bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/";?>bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/";?>dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/";?>dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/";?>bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/";?>bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/";?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet"href="<?php echo base_url()."assets/";?>bower_components/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet" href="<?php echo base_url()."assets/";?>bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/";?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="<?php echo base_url()."assets/";?>css/style.css">
    




    




    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="<?php echo base_url()."assets/";?>https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="<?php echo base_url()."assets/";?>https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body  class="hold-transition  sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>M</b>ploy</span>
            <!-- logo for regular state and mobile devices -->
            <div class="logo-lg pull-left">
				<img style="height: 65px;" src=" <?php echo base_url()?>assets/images/logo.png">

			</div>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
			<div class="">
				<form method="POST">
				<div style="margin-top:10px;" class="col-md-3">

					<select id="school-dropdown" class="form-control">
						<option>Select School</option>
                        <?php foreach($campaign_list as $c): ?>
						    <?php if(isset($camp_id)): ?>
		                        <option <?php if($camp_id == $c->select_school) echo ' selected'  ?> value="<?php echo $c->select_school ?>" >
                                    <?php echo $c->school_name ?>
                                </option>

                            <?php else: ?>
                            <option  value="<?php echo $c->select_school ?>" ><?php echo $c->school_name ?></option>
						    <?php endif ?>
                        <?php endforeach; ?>
					</select>
				</div>

				<div style="margin-top:10px;" class="col-md-3">
					<select  class="form-control" id="campaign-dropdown">

					</select>
				</div>
				</form>
				<?php if (isset($school_id)): ?>
				<div style="margin-top:10px;" class="col-md-3">
					<div class="col-md-6">
					<a href="/campaigns/calendar/<?php echo $school_id ?>"><i class="fa fa-calendar fa-2x" aria-hidden="true"></i></a>
					</div>
					<div class="col-md-6" id="edit">
					</div>

				</div>
				<?php endif ?>


            <div class="navbar-custom-menu">

				<ul class="nav navbar-nav">


                    <!-- Messages: style can be found in dropdown.less-->
                    <!--<li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">4</span>
                        </a>-->
                       <!-- <ul class="dropdown-menu"> -->
                            <?php //$this->load->view('templates/components/messages') ?>
                    <!-- Notifications: style can be found in dropdown.less -->
                            <?php //$this->load->view('templates/components/alerts') ?>
                    <!-- Tasks: style can be found in dropdown.less -->
                            <?php //$this->load->view('templates/components/tasks')?>
                    <!-- User Account: style can be found in dropdown.less -->
                            <?php $this->load->view('templates/components/user')?>
                    <!-- Control Sidebar Toggle Button -->
						<!--</ul>-->
            </div>

		</nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <?php $this->load->view('templates/components/sidebar') ?>

    <!-- Content Wrapper. Contains page content -->

<!-- ./wrapper -->


