<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <title><?php echo $joorxcms_title; ?></title>
<!-- Meta Tag JoorxCMS -->
<meta charset="utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="index, follow">
<meta name="description" content="<?php echo $joorxcms_description; ?>">
<meta name="keywords" content="<?php echo $joorxcms_keywords; ?>">
<meta http-equiv="Copyright" content="<?php echo $joorxcms_copyright; ?>">
<meta name="author" content="<?php echo $joorxcms_author; ?>">
<meta http-equiv="imagetoolbar" content="no">
<meta name="language" content="<?php echo $joorxcms_language; ?>">
<meta name="revisit-after" content="7">
<meta name="webcrawlers" content="all">
<meta name="rating" content="general">
<meta name="spiders" content="all">
<meta property="og:url" content="<?php echo $joorxcms_url; ?>">
<meta property="og:site_name" content="<?php echo $joorxcms_title; ?>">
<!-- Custom CSS JoorxCMS -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/media/css/admincss/hexaainside.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/media/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/media/css/fontawesome/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/media/css/fontawesome/css/font-awesome.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/media/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/media/css/jquery.dataTables.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/media/css/dataTables.bootstrap.css">
<!-- Custom JavaScript JoorxCMS -->
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://code.jquery.com/jquery-migrate-3.0.0.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="<?php echo base_url(); ?>assets/media/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/media/js/joorx.js"></script>
<script src="<?php echo base_url(); ?>assets/media/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/media/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/media/js/dataTables.bootstrap.min.js"></script>
</head>
<body>
<!-- Header JoorxCMS -->
<ul id="topgan" class="topnav">
  <li><a class="active" href="/">Home</a></li>
  <li><a id="buttonabout" href="/tentang">About</a></li>
  <li><a id="buttonnews" href="/blog">Blog</a></li>
  <li><a id="buttongallery" onclick="navbar()">Gallery</a></li>
  <li><a id="buttonkontak" href="/kontak">Contact</a></li>
  <li class="right"><a href="<?php echo base_url('admin/logout'); ?>">Welcome , <?php echo $session; ?></a></li>
</ul>
<!-- Header JoorxCMS -->