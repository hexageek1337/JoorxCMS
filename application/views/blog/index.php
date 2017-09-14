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
        <div class="col-md-3">
            <div class="joorxcms-sidebar">
                <img class="img-responsive" src="https://4.bp.blogspot.com/-bsQqxqSTSPc/WOjR6MSNgGI/AAAAAAAAABU/Bd90CuCr9PoLUDrRM4yQvbnLxl9J6Bp8gCLcB/s1600/SealGEEK_AvailableAds300x250.jpg" alt="Pasang Iklan Anda disini!" title="Pasang Iklan Anda disini!">
            </div>
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="http://placehold.it/292/16a085/FFF&text=jQuery" alt="" class="img-responsive" />
                    </div>
                    <div class="item">
                        <img src="http://placehold.it/292/d35400/FFF&text=HTML5" alt="" class="img-responsive" />
                    </div>
                    <div class="item">
                        <img src="http://placehold.it/292/2980b9/FFF&text=CSS3" alt="" class="img-responsive" />
                    </div>
                    <div class="item">
                        <img src="http://placehold.it/292/8e44ad/FFF&text=jQuery2DotNet" alt="" class="img-responsive" />
                    </div>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span></a><a class="right carousel-control"
                        href="#carousel-example-generic" data-slide="next"><span class="glyphicon glyphicon-chevron-right">
                        </span></a>
            </div>
        </div>
    </div>
</div>

<div class='center'>
<nav aria-label="Page navigation">
    <?php echo $links; ?>
</nav>
</div>
<!-- News JoorxCMS -->
