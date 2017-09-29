<!-- News JoorxCMS -->
<div class="header"></div>

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12 post">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="center"><strong><?php echo $news_slug['title']; ?></strong></h1>
                            <div class="image-count center">
                                <img class="img-responsive img-rounded" src="<?php echo base_url('assets/images/'.$news_slug['photo']); ?>" alt="<?php echo $news_slug['title']; ?>" title="<?php echo $news_slug['title']; ?>">
                            </div>
                            <br />
                            <p><?php echo $news_slug['text']; ?></p>
                            <div id="disqus-comment-joorxcms" class="center">
                              <?=$disqus?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="banner-footer-joorxcms" class="center">
              <?php $this->load->view('blog/banner_footer'); ?>
            </div>
        </div>
        <div id="sidebar-joorxcms" class="center">
          <?php $this->load->view('blog/sidebar', $categoryitem); ?>
        </div>
    </div>
</div>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-59ce204d5b71e20a"></script>
<!-- News JoorxCMS -->
