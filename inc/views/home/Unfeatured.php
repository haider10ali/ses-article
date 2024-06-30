<div class="ses__posts__thumbnail__home">
    <?php foreach ($data['posts'] as $post) : ?>
        <?php if ($post['isFeatured'] === 'un-featured') : ?>
            <?php if (!empty($post['siteName'])) : ?>
                <div class="unfeatured__post__thumbnail">
                    <a href="<?= esc_url($post['redirectUrl']); ?>">
                        <?= $post['thumbnail_large']; ?>
                    </a>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    <?php endforeach; ?>
</div>
<!-- POST CONTENT -->
<div class="ses__post__home__content">
    <?php foreach ($data['posts'] as $post) : ?>
        <?php if ($post['isFeatured'] === 'un-featured') : ?>
            <?php if (!empty($post['siteName'])) : ?>
                <div class="unfeatured__post__content">
                    <strong class="strong__post__sitename"><?= esc_html($post['siteName']); ?></strong>
                    <h5 class="ses__post_h5__unfeatured__title">
                        <a href="<?= esc_url($post['redirectUrl']); ?>"><?= esc_html($post['title']); ?></a>
                    </h5>
                    <p class="ses__post__description__unfeatured"><?= esc_html(strip_tags($post['content'])); ?></p>
                    <a class="ses__readMore__btn" href="<?= esc_url($post['redirectUrl']); ?>">+ Read More</a>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    <?php endforeach; ?>
</div>
</div>