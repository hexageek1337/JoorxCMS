<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <title><?php echo $this->config->item('joorxcms_title'); ?></title>
<!-- Favicon -->
<link rel="shortcut icon" type="image/x-icon" href="<?=base_url('assets/images/joorxcms/favicon.ico')?>" />
<!-- Meta Tag JoorxCMS -->
<meta charset="utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="noindex, nofollow">
<meta name="description" content="<?php echo $this->config->item('joorxcms_description'); ?>">
<meta name="keywords" content="<?php echo $this->config->item('joorxcms_keywords'); ?>">
<meta http-equiv="Copyright" content="<?php echo $this->config->item('joorxcms_copyright'); ?>">
<meta name="author" content="<?php echo $this->config->item('joorxcms_author'); ?>">
<meta http-equiv="imagetoolbar" content="no">
<meta name="language" content="<?php echo $this->config->item('joorxcms_language'); ?>">
<meta property="og:url" content="<?php echo $this->config->item('joorxcms_url'); ?>">
<meta property="og:site_name" content="<?php echo $this->config->item('joorxcms_title'); ?>">
<!-- Custom CSS JoorxCMS -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/media/css/hexaainside.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/media/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/media/vendor/bootstrap/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/media/vendor/datatables/media/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/media/vendor/datatables/media/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/media/css/fontawesome/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/media/css/fontawesome/css/font-awesome.css">
<!-- Custom JavaScript JoorxCMS -->
<script src="<?php echo base_url(); ?>assets/media/js/jquery-3.2.1.js"></script>
<script src="<?php echo base_url(); ?>assets/media/js/jquery-migrate-3.0.0.js"></script>
<script src="<?php echo base_url(); ?>assets/media/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/media/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/media/vendor/datatables/media/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/media/js/joorx.js"></script>
</head>
<body>
<!-- Header JoorxCMS -->
<header>
<nav class="navbar navbar-primary navbar-custom navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <div class="navbar-brand">
      <a href="/"><img width="60" alt="Brand" src="<?=base_url('assets/images/joorxcms/joorxcms-logo.png')?>"></a></div>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-left">
        <li><a href="/admin/berita">Berita</a></li>
        <li><a href="/admin/blog">Blog</a></li>
        <li><a href="/admin/kontak">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle fa-lg" aria-hidden="true"></i> <?php echo $session; ?></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url('user'); ?>">Setting</a></li>
            <li><a href="<?php echo base_url('logout'); ?>">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
</header>
<!-- Header JoorxCMS -->
