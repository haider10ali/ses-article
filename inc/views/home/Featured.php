<?php foreach ($data['posts'] as $post) : ?>
    <?php if ($post['isFeatured'] === 'featured') : ?>
        <a href="<?= esc_url($post['redirectUrl']) ?>">
            <?= $post['thumbnail']; ?>
        </a>
        <div style="margin-top: 10px;">
            <strong class="strong__post__sitename"><?= esc_html($post['siteName']); ?></strong>
            <h5 class="ses__post_h5__title">
                <a href="<?= esc_url($post['redirectUrl']); ?>"><?= esc_html($post['title']); ?></a>
            </h5>
            <p class="ses__post__description"><?= esc_html(strip_tags($post['content'])); ?></p>
            <a class="ses__readMore__btn" href="<?= esc_url($post['redirectUrl']); ?>">+ Read the article</a>
        </div>
        <?php break; ?>
    <?php endif; ?>
<?php endforeach; ?>