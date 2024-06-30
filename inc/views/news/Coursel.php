<?php foreach ($data['newsPosts'] as $post) : ?>
    <?php if ($post['isFeatured'] === 'un-featured') : ?>
        <?php if (!empty($post['siteLogo'])) : ?>
            <div class="ses__news__coursel__content">
                <div class="ses__news__coursel__thumbnail">
                    <a href="<?= $post['redirectUrl'] ?>">
                        <?= $post['thumbnail']; ?>
                    </a>
                </div>
                <div>
                    <div class="ses__news__coursel__sitelogo">
                        <a href="<?= esc_url($post['redirectUrl']); ?>">
                            <img src="<?= $post['siteLogo']; ?>" alt="site-logo">
                        </a>
                        <h4 class="ses__news__coursel__postTitle">
                            <a href="<?= esc_url($post['redirectUrl']); ?>"><?= esc_html($post['title']); ?></a>
                        </h4>
                        <strong class="ses__news__coursel__postDate">
                            <?= esc_html($post['postDate']); ?>
                        </strong>
                        <p><?= esc_html(strip_tags($post['content'])); ?></p>
                        <a class="ses__readMore__btn" href="<?= esc_url($post['redirectUrl']); ?>">+ Read More</a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
<?php endforeach; ?>