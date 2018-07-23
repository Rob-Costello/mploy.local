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
  
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/";?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="<?php echo base_url()."assets/";?>css/style.css">


    <!-- jQuery 3 -->
    <script src="<?php echo base_url()."assets/";?>bower_components/jquery/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-autocomplete/1.0.7/jquery.auto-complete.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

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
        <a href="/dashboard/" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>M</b>ploy</span>
            <!-- logo for regular state and mobile devices -->
            <div class="logo-lg pull-left">
				<img style="height: 60px; margin-top: 5px;" src=" <?php echo base_url()?>assets/images/logo.png">

			</div>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

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


