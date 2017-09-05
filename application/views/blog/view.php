<!-- Content JoorxCMS -->
<h1 class="header-news"><?php echo $news_slug['title']; ?></h1>

<div id="news" class="container">
<div class="image-count center">
  <img class="img-responsive img-rounded" src="<?php echo site_url('assets/images/'.$news_slug['images']); ?>" alt="<?php echo $news_slug['title']; ?>" title="<?php echo $news_slug['title']; ?>">
</div>
  <br />
  <p><?php echo $news_slug['text']; ?></p>
</div>
<!-- Content JoorxCMS -->