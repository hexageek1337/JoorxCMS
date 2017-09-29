<?= '<?xml version="1.0" encoding="UTF-8" ?>' ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    <url>
        <loc><?= base_url()?></loc>
        <changefreq>always</changefreq>
        <priority>1.0</priority>
    </url>

    <url>
        <loc><?= base_url('tentang')?></loc>
        <changefreq>always</changefreq>
        <priority>1.0</priority>
    </url>

    <url>
        <loc><?= base_url('blog')?></loc>
        <changefreq>always</changefreq>
        <priority>1.0</priority>
    </url>

    <url>
        <loc><?= base_url('kontak')?></loc>
        <changefreq>always</changefreq>
        <priority>1.0</priority>
    </url>

    <?php foreach($data as $url) { ?>
    <url>
        <loc><?= base_url('blog/').$url['slug'] ?></loc>
        <lastmod><?=$url['publish']?></lastmod>
        <changefreq>always</changefreq>
        <priority>0.5</priority>
    </url>
    <?php } ?>

    <?php foreach($data as $tags) { ?>
    <?php $all_tags = explode(',' ,$tags['tags']); foreach ($all_tags as $one_tag){ ?>
    <url>
        <loc><?= base_url('blog/tag/').$one_tag ?></loc>
        <lastmod><?=$tags['publish']?></lastmod>
        <changefreq>always</changefreq>
        <priority>0.5</priority>
    </url>
    <?php } ?>
    <?php } ?>
</urlset>
