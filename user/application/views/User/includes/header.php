<!DOCTYPE html>
<html>
  <!-- Bootstrap 3.3.7 -->
 
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CONSOL | Dashboard</title>
  
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">


  <link rel="stylesheet" href="<?php echo ASSETSPATH; ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo ASSETSPATH; ?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo ASSETSPATH; ?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo ASSETSPATH; ?>dist/css/AdminLTE.min.css">
   
<!-- fullCalendar -->
  <link rel="stylesheet" href="<?php echo ASSETSPATH; ?>bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="<?php echo ASSETSPATH; ?>bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">

  <link rel="stylesheet" href="<?php echo ASSETSPATH; ?>dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo ASSETSPATH; ?>dist/css/jquery.fancybox.css">
  
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo ASSETSPATH; ?>bower_components/morris.js/morris.css">

  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo ASSETSPATH; ?>bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo ASSETSPATH; ?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo ASSETSPATH; ?>bower_components/bootstrap-daterangepicker/daterangepicker.css">
   
  <link rel="stylesheet" href="<?php echo ASSETSPATH; ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <link rel="stylesheet" href="<?php echo ASSETSPATH; ?>bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
 
  <link rel="stylesheet" href="<?php echo ASSETSPATH; ?>plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo ASSETSPATH; ?>bower_components/select2/dist/css/select2.min.css">

  <link rel="stylesheet" href="<?php echo ASSETSPATH; ?>dist/css/AdminLTE.min.css">
   
  <link rel="stylesheet" href="<?php echo ASSETSPATH; ?>dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo ASSETSPATH; ?>dist/css/my-style.css">
  <link rel="stylesheet" href="<?php echo ASSETSPATH; ?>dist/css/jquery-clockpicker.min.css">
  <link rel="stylesheet" href="<?php echo ASSETSPATH; ?>dist/css/timepicker-default.min.css">
  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
  <script  src="https://code.jquery.com/jquery-2.2.4.min.js" > </script>

  <script  src="<?php echo ASSETSPATH; ?>/js/actions.js" > </script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.3.1/sweetalert2.all.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.3.1/sweetalert2.css" />
  <script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>

   <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/highcharts-3d.js"></script>
  <script src="https://code.highcharts.com/modules/funnel.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<style type="text/css">
  .logo-style
  {
        color: #d8b73e;
        border: 3px solid #fff;
        /*padding: 5px;
        border: 3px solid;
        border-radius: 3px;
         background- color: #d8b73e;  
        font-size: 18px*/
  }
  .page-section-header
  {
     margin-top: -30px; padding-top: 10px; padding-bottom: 10px;
  }
  .boxbbodyarea
  {
    min-height: 84.5vh !important; max-height: 84.5vh !important; padding: 0 !important;
  }
</style>
  <header class="main-header"> 
    <a href="index2.html" class="logo"> 
      <span class="logo-mini"><b>CONSOL</b> </span> 
      <span class="logo-lg"><span class="logo-style"><i class="fa fa-building"></i></span><b>&nbsp;CONSOL</b></span>
    </a> 
    <nav class="navbar navbar-static-top"> 
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a> 
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
           
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
       
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

 <?php $this->load->view("User/includes/sidebar"); ?>

                             