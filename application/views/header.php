<!DOCTYPE html>
<html>
<head>
	<title>Smart Trace Dashboard</title>
	<!-- Bootstrap -->
    <script src="<?php echo base_url('assets/DataTable/jQuery-3.3.1/jquery-3.3.1.js');?>"></script>
    <link  rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css');?>">
    <link  rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.css');?>">
    <link  rel="stylesheet" href="<?php echo base_url('assets/simple-sidebar.css');?>">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!---<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js');?>"></script>	
    <!--<script src="<?php echo base_url('assets/bootstrap/datepicker/bootstrap-datepicker.js');?>"></script> -->
    
    <script src="<?php echo base_url('assets/DataTable/jquery.js');?>"></script>
    <script src="<?php echo base_url('assets/js/dateFormat.js');?>"></script>
    <script src="<?php echo base_url('assets/js/alasql.min.js');?>"></script>
    <script src="<?php echo base_url('assets/DataTable/DataTables/js/jquery.dataTables.min.js');?>"></script>
    <script src="<?php echo base_url('assets/chartjs/Chart.min.js');?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.5.0"></script>
    <!--- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/datepicker/datepicker3.css"> -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/fonts/fontawesome/css/font-awesome.css">    
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/DataTable/DataTables/css/jquery.dataTables.min.css"> 

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css" />    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.semanticui.min.css" />    

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css"> 

    <!--<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>-->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />    
</head>
<body>

<div class="d-flex" id="wrapper">

    <!-- Side Bar -->
    <?php $this->load->view('sidebar'); ?>			

    <!-- Menu Bar -->
    <div id="page-content-wrapper">        
          <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <button class="btn btn-primary" id="menu-toggle"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i></button>            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

          </nav>

