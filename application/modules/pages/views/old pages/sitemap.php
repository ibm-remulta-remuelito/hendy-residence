<?php echo '<?xml version="1.0" encoding="UTF-8" ?>'; ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?php echo base_url();?></loc> 
        <priority>1.0</priority>
    </url>
    
    <?php if (isset($pages) && is_array($pages)): ?>
        <?php foreach($pages as $url): ?>
            <?php if($url[0]): ?>
            <url>
                <loc><?php echo base_url($url[0]) ?></loc>
                <priority>0.5</priority>
            </url>
            <?php endif ?>
        <?php endforeach; ?>
    <?php endif ?>

</urlset>
