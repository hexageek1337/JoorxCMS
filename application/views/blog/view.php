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
                        </div>
                    </div>
                </div>
            </div>
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
<!-- News JoorxCMS -->
