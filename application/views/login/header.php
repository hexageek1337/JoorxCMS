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
<link rel="canonical" href="<?php echo $this->config->item('joorxcms_url'); ?>" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:title" content="<?php echo $this->config->item('joorxcms_title'); ?>" />
<meta property="og:description" content="<?php echo $this->config->item('joorxcms_description'); ?>" />
<meta property="og:url" content="<?php echo $this->config->item('joorxcms_url'); ?>" />
<meta property="og:site_name" content="<?php echo $this->config->item('joorxcms_title'); ?>" />
<meta property="og:image" content="<?=base_url('assets/images/joorxcms/woman-sunglasses.jpg')?>" />
<meta property="og:image:secure_url" content="<?=base_url('assets/images/joorxcms/woman-sunglasses.jpg')?>" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:description" content="<?php echo $this->config->item('joorxcms_description'); ?>" />
<meta name="twitter:title" content="<?php echo $this->config->item('joorxcms_title'); ?>" />
<meta name="twitter:image" content="<?=base_url('assets/images/joorxcms/woman-sunglasses.jpg')?>" />
<!-- Meta Tag JoorxCMS -->
<!-- Custom CSS JoorxCMS -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/media/css/hexaainside.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/media/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/media/vendor/bootstrap/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/media/css/fontawesome/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/media/css/fontawesome/css/font-awesome.css">
<!-- Custom JavaScript JoorxCMS -->
<script src="<?php echo base_url(); ?>assets/media/js/jquery-3.2.1.js"></script>
<script src="<?php echo base_url(); ?>assets/media/js/jquery-migrate-3.0.0.js"></script>
<script src="<?php echo base_url(); ?>assets/media/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/media/js/joorx.js"></script>
</head>
<body>
<!-- Header JoorxCMS -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <div class="navbar-brand">
      <a href="/"><img width="24" height="24" alt="Brand" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAB+0lEQVR4AcyYg5LkUBhG+1X2PdZGaW3btm3btm3bHttWrPomd1r/2Jn/VJ02TpxcH4CQ/dsuazWgzbIdrm9dZVd4pBz4zx2igTaFHrhvjneVXNHCSqIlFEjiwMyyyOBilRgGSqLNF1jnwNQdIvAt48C3IlBmHCiLQHC2zoHDu6zG1iXn6+y62ScxY9AODO6w0pvAqf23oSE4joOfH6OxfMoRnoGUm+de8wykbFt6wZtA07QwtNOqKh3ZbS3Wzz2F+1c/QJY0UCJ/J3kXWJfv7VhxCRRV1jGw7XI+gcO7rEFFRvdYxydwcPsVsC0bQdKScngt4iUTD4Fy/8p7PoHzRu1DclwmgmiqgUXjD3oTKHbAt869qdJ7l98jNTEblPTkXMwetpvnftA0LLHb4X8kiY9Kx6Q+W7wJtG0HR7fdrtYz+x7iya0vkEtUULIzCjC21wY+W/GYXusRH5kGytWTLxgEEhePPwhKYb7EK3BQuxWwTBuUkd3X8goUn6fMHLyTT+DCsQdAEXNzSMeVPAJHdF2DmH8poCREp3uwm7HsGq9J9q69iuunX6EgrwQVObjpBt8z6rdPfvE8kiiyhsvHnomrQx6BxYUyYiNS8f75H1w4/ISepDZLoDhNJ9cdNUquhRsv+6EP9oNH7Iff2A9g8h8CLt1gH0Qf9NMQAFnO60BJFQe0AAAAAElFTkSuQmCC"></a> <?php echo $this->config->item('joorxcms_title'); ?></div>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-left">
        <li><a href="/tentang">About</a></li>
        <li><a href="/blog">Blog</a></li>
        <li><a href="/kontak">Contact</a></li>
      </ul>
    </div>
  </div>
</nav>
<!-- Header JoorxCMS -->
