<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <title><?=$news_slug['title']?> - <?php echo $this->config->item('joorxcms_title'); ?></title>
<!-- Favicon -->
<link rel="shortcut icon" type="image/x-icon" href="<?=base_url('assets/images/joorxcms/favicon.ico')?>" />
<!-- Meta Tag JoorxCMS -->
<meta charset="utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="index, follow">
<meta name="description" content="<?=word_limiter($news_slug['text'], 20)?>">
<meta name="keywords" content="<?=$news_slug['tags']?>">
<meta http-equiv="Copyright" content="<?php echo $this->config->item('joorxcms_copyright'); ?>">
<meta name="author" content="<?php echo $this->config->item('joorxcms_author'); ?>">
<meta http-equiv="imagetoolbar" content="no">
<meta name="language" content="<?php echo $this->config->item('joorxcms_language'); ?>">
<meta name="revisit-after" content="7">
<meta name="webcrawlers" content="all">
<meta name="rating" content="general">
<meta name="spiders" content="all">
<link rel="canonical" href="<?=base_url('blog/'.$news_slug['slug'])?>" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="article" />
<?php
$all_tags = explode(',' ,$news_slug['tags']);
foreach ($all_tags as $one_tag){
  echo '<meta property="article:tag" content="'.$one_tag.'" />';
} ?>

<meta property="article:section" content="<?=$news_slug['category']?>" />
<meta property="article:published_time" content="<?=$news_slug['publish']?>T15:08:15+00:00" />
<meta property="og:title" content="<?=$news_slug['title']?>" />
<meta property="og:description" content="<?=word_limiter($news_slug['text'], 20)?>" />
<meta property="og:url" content="<?=base_url('blog/'.$news_slug['slug'])?>" />
<meta property="og:site_name" content="<?php echo $this->config->item('joorxcms_title'); ?>" />
<meta property="og:image" content="<?=base_url('assets/images/'.$news_slug['photo'])?>" />
<meta property="og:image:secure_url" content="<?=base_url('assets/images/'.$news_slug['photo'])?>" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:description" content="<?=word_limiter($news_slug['text'], 20)?>" />
<meta name="twitter:title" content="<?=$news_slug['title']?>" />
<meta name="twitter:image" content="<?=base_url('assets/images/'.$news_slug['photo'])?>" />
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
        <li><a href="/tentang">About</a></li>
        <li class="active"><a href="/blog">Blog</a></li>
        <li><a href="/kontak">Contact</a></li>
      </ul>
    </div>
  </div>
</nav>
</header>
<!-- Header JoorxCMS -->
