<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pendaftaran Kartu Kuning | Digital Signature QR-Code</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bluef/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bluef/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bluef/bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bluef/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bluef/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bluef/bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bluef/dist/css/AdminLTE.min.css">
  <!-- <link rel="stylesheet" href="<?=base_url()?>assets/footable/footable.core.standalone.min.css"> -->
  <link rel="stylesheet" href="<?=base_url()?>assets/footable-bootstrap.latest/css/footable.bootstrap.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bluef/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/bluef/toast/jquery.toast.min.css'?>"/>
<link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<!-- <link rel="shortcut icon" href="<?=base_url()?>assets/front/images/logo.png" type="image/x-icon"> -->
  <!-- <link rel="stylesheet" href="<?=base_url()?>assets/bluef/style.css"> -->
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
<!-- the fixed layout is not compatible with sidebar-mini -->
<body class="hold-transition skin-blue fixed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
    
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Q</b>R</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b> MDS</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">0</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 0 notifications</li>
              <li>
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-info text-aqua"></i> Tidak ada notifikasi
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li> -->

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=base_url()?>assets/bluef/dist/img/avatar.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?=$this->session->userdata('userNamaLengkap')?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=base_url()?>assets/bluef/dist/img/avatar.png" class="img-circle" alt="User Image">

                <p style="color:black">
                <?=$this->session->userdata('userNamaLengkap')?>
                  <small><?=$this->session->userdata('userDivisi')?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                  <a href="<?=base_url()?>pengguna/ubahpassword" class="btn btn-default btn-flat">Ubah Password</a>
                  <a href="<?=base_url()?>welcome/signout" class="btn btn-default btn-flat">Sign out</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url()?>assets/bluef/dist/img/avatar.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$this->session->userdata('userNamaLengkap')?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <!--<li class="header">MAIN NAVIGATION</li>-->
			  <li class="<?=(@$link=='home')?'active':''?>"><a href="<?php echo base_url();?>home"><i class="fa fa-dashboard"></i> <span>Home</span></a></li>
        
        <?php if($this->session->userdata('userLevel')=="1") { ?>
          <li class="<?=(@$link=='pekerja')?'active':''?>"><a href="<?php echo base_url();?>pekerja"><i class="fa fa-users"></i> <span>Data Pencari Kerja</span></a></li>
          <li class="<?=(@$link=='arsip')?'active':''?>"><a href="<?php echo base_url();?>arsip"><i class="fa fa-archive"></i> <span>Arsip Kartu Kuning</span></a></li>
          <li class="<?=(@$link=='pengguna')?'active':''?>"><a href="<?php echo base_url();?>pengguna"><i class="fa fa-users"></i> <span>User</span></a></li>
        <?php }?>
        <?php if($this->session->userdata('userLevel')=="0") { ?>
          <li class="<?=(@$link=='kartukuning')?'active':''?>"><a href="<?php echo base_url();?>kartukuning"><i class="fa fa-pencil"></i> <span>Tanda Tangan Kartu</span></a></li>
        <li class="<?=(@$link=='arsip')?'active':''?>"><a href="<?php echo base_url();?>arsip"><i class="fa fa-print"></i> <span>Arsip Kartu Kuning</span></a></li>
        <?php }?>
        <?php if($this->session->userdata('userLevel')=="2") { ?>
          <li class="<?=(@$link=='datapribadi')?'active':''?>"><a href="<?php echo base_url();?>datapribadi"><i class="fa fa-user"></i> <span>Data Pribadi</span></a></li>
          <li class="<?=(@$link=='pengajuan')?'active':''?>"><a href="<?php echo base_url();?>pengajuan"><i class="fa fa-archive"></i> <span>Pengajuan Kartu Kuning</span></a></li>
        <?php }?>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
