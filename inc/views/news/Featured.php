<?php foreach ($data['newsPosts'] as $post) : ?>
    <?php if ($post['isFeatured'] === 'featured') : ?>
        <a href="<?= esc_url($post['redirectUrl']); ?>">
            <?= $post['thumbnail_large']; ?>
        </a>
        </div>

        <div class="ses__featured__content">
            <strong class="ses__postDate"><?= esc_html($post['postDate']); ?></strong>
            <h5 class="ses__post_h5__title">
                <a href="<?= esc_url($post['redirectUrl']); ?>"><?= $post['title']; ?></a>
            </h5>
            <p class="ses__post__description" style="line-height: 2rem !important;"><?= esc_html(strip_tags($post['content'])); ?></p>
            <a class="ses__readMore__btn" href="<?= esc_url($post['redirectUrl']); ?>">+ Read the article</a>
        </div>
        <?php break; ?>
    <?php endif; ?>
<?php endforeach; ?>