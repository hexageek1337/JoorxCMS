<!-- News JoorxCMS -->
<h1 class="header">news</h1>

<div class="container">
    <div class="row">
        <div class="col-md-9">
        <?php foreach ($seeker as $seekerData): ?>
            <div class="row">
                <div class="col-md-12 post">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>
                                <strong><a href='<?php echo site_url('blog/'.$seekerData['slug']); ?>' class="post-title"><?php echo $seekerData['title']; ?></a></strong></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 post-header-line">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>by <a href="#"><?php echo $seekerData['created']; ?></a> | <span class="glyphicon glyphicon-calendar">
                            </span><?php echo $seekerData['publish']; ?> | <span class="glyphicon glyphicon-comment"></span><a href="#">
                                3 Comments</a> | <i class="icon-share"></i><a href="#">39 Shares</a> | <span class="glyphicon glyphicon-tags">
                                </span>Tags : <?php $all_tags = explode(',' ,$seekerData['tags']); foreach ($all_tags as $one_tag){?> <a href="<?=base_url('blog/tag/'.$one_tag)?>"><span class="label label-info"><?=$one_tag?></span></a>  <?php } ?>
                        </div>
                    </div>
                    <div class="row post-content">
                        <div class="col-md-3">
                            <a href="#">
                                <img src='<?php echo base_url().'assets/images/'.$seekerData['photo']; ?>' alt='<?php echo $seekerData['title']; ?>' class="img-responsive img-rounded">
                            </a>
                        </div>
                        <div class="col-md-9">
                            <p>
                                <?php echo word_limiter($seekerData['text'], 40); ?>
                            </p>
                            <p>
                                <a href='<?php echo site_url('blog/'.$seekerData['slug']); ?>'><button class="btn btn-default btn-read-more">Read more</button></a></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div id="sidebar-joorxcms" class="center">
          <?php $this->load->view('blog/sidebar'); ?>
        </div>
    </div>
</div>
<div id="banner-footer-joorxcms" class="center">
  <?php $this->load->view('blog/banner_footer'); ?>
</div>
<div class='center'>
<nav aria-label="Page navigation">
    <?php echo $links; ?>
</nav>
</div>
<!-- News JoorxCMS -->
