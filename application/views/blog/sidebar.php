<div class="col-md-3">
    <!-- Sidebar Category -->
    <div class="category-sidebar">
      <div class="category-item">Category</div>
      <div class="list-group">
        <?php foreach ($categoryitem as $joorxcms) { ?>
        <a href="<?=base_url('blog/category/'.$joorxcms['category_name'])?>" class="list-group-item"><?=$joorxcms['category_name']?></a>
        <?php } ?>
      </div>
    </div>
    <!-- Sidebar Banner -->
    <div class="joorxcms-sidebar">
        <img class="img-responsive" src="<?=base_url('assets/images/joorxcms/joorxcms-ads-300x300.jpg')?>" alt="Pasang Iklan Anda disini!" title="Pasang Iklan Anda disini!">
    </div>
    <!-- Sidebar Slide -->
    <div class="slide-sidebar">
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
                  <img src="<?=base_url('assets/images/joorxcms/joorxcms-slide-1.jpg')?>" alt="" class="img-responsive" />
              </div>
              <div class="item">
                  <img src="<?=base_url('assets/images/joorxcms/joorxcms-slide-2.jpg')?>" alt="" class="img-responsive" />
              </div>
              <div class="item">
                  <img src="<?=base_url('assets/images/joorxcms/joorxcms-slide-3.jpg')?>" alt="" class="img-responsive" />
              </div>
              <div class="item">
                  <img src="<?=base_url('assets/images/joorxcms/joorxcms-slide-4.jpg')?>" alt="" class="img-responsive" />
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
